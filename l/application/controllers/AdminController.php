<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
use Doctrine\ORM\Tools\Pagination\Paginator;

class AdminController extends Zend_Controller_Action{

	public $fields = array('skill'=>'Skills', 'firstName'=>'First Name', 'lastName'=>'Last Name', 'email'=>'Email Id', 'tel'=>'Contact No',
		'empId'=>'Employee Id', 'totalYears'=>'Total year of experience', 'totalMonths'=>'Total month of experience', 'position'=>'Designation',
		'presentaddress'=>'Present Address','presentcity'=>'Present Address City','presentstate'=>'Present  Address State','presentpincode'=>'Present Address pincode',
		'permanentaddress'=>'Permanent Address','permanentcity'=>'Permanent Address City','permanentpincode'=>'Permanent Address Pincode','permanentstate'=>'Permanent Address State',
		'mainTechnology'=>'Main Technology','careerStarted'=>'Overall Career Started','careerSynergy'=>'Career Started in Synergy');

	public $userProfileFields = array('FirstName','LastName','EmpId','PhoneNumber','Email');
	public $userDetailProfileFields = array('ExpYears','ExpMonths','Position','MainTechnology','CareerSynergy','CareerStarted','PresentAddress','PresentCity','PresentPincode','PresentState','PermanentAddress','PermanentCity','PermanentPincode','PermanentState');
	public $selectedUsersNameArr;
	public $selectedUsersIdArr;
	public $isTeamLead;
	public $profileStatusReportHeadings=array('ID','Name','Profile Status','Skills Added');
	public $userReportHeading= array('Date','Day','First Event','Last Event','No.of Entry','No. of Exits','Total Working hours','Time out of office','Net working hours');
	public $DateRangeReportHeading=array('User Name','ID','Total Time','Entry','Exit','Total Time Out','Net Working Hours','Avg Total Time','Avg Entry','Avg Exit','Avg Total Time Out','Avg Net Working Hours');
	public $reportByDateHeading=array('User Name','ID','First Event','Last Event','No. of Entry','No. of Exit','Total Working hours','Total Time Out','Net working hours');
	public function init()
	{
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userId=$userSessionData->userId;
		//$userId=16;
		$em = Zend_Registry::get("em");
 		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$loggedinuser= $em->find('Entities\\Users', $userId);
		$qb = $em->createQueryBuilder();
		$qb->select('ur')->from('Entities\\UserRole', 'ur')->where("ur.user = ?1")->setParameter(1, $loggedinuser);
		$query = $qb->getQuery();
		$users = $query->getResult();
		$isTeamLead=false;
		foreach($users as $user){
		if($user->getRole()->getRoleName() == 'TL')
			$isTeamLead=true;
		}
		if($isTeamLead){
			$qb1 = $em->createQueryBuilder();
			$qb1->select('tu')->from('Entities\\TeamleadUsers', 'tu')->andWhere('tu.teamlead = ?1')->setParameter(1, $loggedinuser);
			$query = $qb1->getQuery();
			$teamleadusers = $query->getResult();
			$selectedUsersNameArr = array();
			$selectedUsersIdArr = array();
			foreach ($teamleadusers as $tu){
				$selectedUsersNameArr[] =  $tu->getUser()->getFirstName()." ".$tu->getUser()->getLastName();
				$selectedUsersIdArr[] =  $tu->getUser()->getUserId();
			}
			$selectedUsersNameArr[]=$userSessionData->firstName." ".$userSessionData->lastName;
		}
		$this->isTeamLead=$isTeamLead;
		$this->selectedUsersNameArr=$selectedUsersNameArr;
		$this->selectedUsersIdArr=$selectedUsersIdArr;
	}
	/**
	 * Dashboard of admin
	 *
	 * @author njaiswal
	 */

	public function indexAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$em = Zend_Registry::get("em");
		$changedField = array();
		$qb = $em->createQueryBuilder();
		$page = $this->_request->getParam('page', 1);
		$query = $em->createQuery('select ea from Entities\\EmployeeActivity ea inner join ea.user u order by ea.isOpened asc,ea.dateCreated desc');
		$d2_paginator = new Paginator($query);
		$d2_paginator_iter = $d2_paginator->getIterator();
		$adapter = new \Zend_Paginator_Adapter_Iterator($d2_paginator_iter);
		$zend_paginator = new \Zend_Paginator($adapter);
		$zend_paginator->setItemCountPerPage(5)->setCurrentPageNumber($page);

		foreach($zend_paginator as $empActivity){
			if($empActivity->getActivityType() == 'update')
				$changedField[$empActivity->getActivityId()] = unserialize($empActivity->getField());
		}

		$this->view->fields = $this->fields;
		$this->view->changedField = $changedField;
		$this->view->activityList = $zend_paginator;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	public function myprofileAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userSessionData->userId);

		$this->view->user = $user;
	}
	public function createpdfAction(){
		$em = Zend_Registry::get("em");
		$configObj = Zend_Registry::get("config");
		$Criteria = $this->_request->getParam('Criteria');
		$Criteriaarr= explode(" ",$Criteria);
		$searchBy= $this->_request->getParam('searchBy');
		if($searchBy=='Tech'){
			$technology=$Criteriaarr[0];
			$expYears=$Criteriaarr[1];
			$expMonths=$Criteriaarr[2];
			$titleCriteria=$technology;
			if($expYears !='years'){
				$ExpYear[]=$expYears;
			}
			else
				for($exp=0;$exp<=$configObj->experience->year;$exp++)
					$ExpYear[]=$exp;
			if($expMonths!='months'){
				$ExpMonth[]=$expMonths;
			}else
				for($expMnth=0;$expMnth<=11;$expMnth++)
					$ExpMonth[]=$expMnth;
			$query = $em->getConnection()->prepare("SELECT u.user_id,u.firstname,u.lastname,ud.exp_months,ud.exp_years,t.technology AS mainTechnology,p.position,GROUP_CONCAT(s.skill_name) AS skills FROM users u LEFT JOIN user_detail ud ON ud.user_id=u.user_id LEFT JOIN position p ON p.position_id=ud.position_id LEFT JOIN user_skills_detail usd ON usd.user_id=u.user_id LEFT JOIN skills s ON s.skill_id=usd.skill_id LEFT JOIN technology t ON t.id= ud.main_technology_id WHERE t.technology='".$technology."' and ud.exp_years>=".min($ExpYear)." and ud.exp_months>=".min($ExpMonth)." group by u.user_id");
		}elseif($searchBy=='Skill'){
			$titleCriteria=$Criteria;
			$level=$Criteriaarr[count($Criteriaarr)-1];
			unset($Criteriaarr[count($Criteriaarr)-1]);
			$skill=trim(implode(" ",$Criteriaarr));
			$query = $em->getConnection()->prepare("SELECT DISTINCT u.user_id,u.firstname,u.lastname,ud.exp_months,ud.exp_years,s.skill_id,l.level_id,p.position FROM users u LEFT JOIN user_detail ud ON u.user_id= ud.user_id LEFT JOIN position p ON ud.position_id= p.position_id JOIN user_skills_detail usd ON ud.user_id= usd.user_id JOIN skills
     					s  ON usd.skill_id=s.skill_id JOIN level l ON usd.level_id= l.level_id WHERE l.level_name='".$level."' AND s.skill_name='".$skill."'  GROUP BY u.user_id");
		}
		try {
			$query->execute();
			$result = $query->fetchAll();
			$pdf = new Tcpdf_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetTitle($titleCriteria);
			$pdf->AddPage();
			$pdf->SetFont('dejavusansb', '', 15);
			$pdf->Write(0,"Criteria: ".$titleCriteria, '', 0, 'L', true, 0, false, false, 0);
			$pdf->SetFont('pdfacourierb', '', 10);
			if($searchBy=='Tech'){
				$tbl='<table cellpadding="2" border="1"><tr><th>EMPLOYEE NAME</th><th>DESIGNATION</th><th>EXPERIENCE</th><th>MAIN TECHNOLOGY</th><th>SKILLS</th></tr>';
				foreach($result as $row) {
					$tbl=$tbl.'<tr>';
					$tbl=$tbl.'<td>'.$row['firstname']." ".$row['lastname'].'</td>';
					$tbl=$tbl.'<td>'. $row['position'].'</td>';
					$tbl=$tbl.'<td>'.$row['exp_years'].'Year(s) '.$row['exp_months'].'Month(s)'.'</td>';
					$tbl=$tbl.'<td>'.$row['mainTechnology'].'</td>';
					$tbl=$tbl.'<td>'.$row['skills'].'</td>';
					$tbl=$tbl.'</tr>';
				}
			}else{
				$tbl='<table cellpadding="2" border="1"><tr><th>EMPLOYEE NAME</th><th>DESIGNATION</th><th>EXPERIENCE</th></tr>';
				foreach($result as $row) {
					$tbl=$tbl.'<tr>';
					$tbl=$tbl.'<td>'.$row['firstname']." ".$row['lastname'].'</td>';
					$tbl=$tbl.'<td>'. $row['position'].'</td>';
					$tbl=$tbl.'<td>'.$row['exp_years'].'Year(s) '.$row['exp_months'].'Month(s)'.'</td>';
					$tbl=$tbl.'</tr>';
				}

			}
			$tbl=$tbl.'</table>';
			$pdf->writeHTML($tbl, true, false, false, false, '');
			$pdf->Output($Criteria.'.pdf', 'I');
			exit();
		} catch (Exception $e) {
			print_r($e);
			exit();
		}
	}

	/**
	 * Opens popup with user profile details
	 *
	 * @author njaiswal
	 */

	public function viewemployeedetailAction(){
		$this->_helper->layout->disableLayout();
		$layout = $this->_helper->layout();
		$layout->setLayout('modallayout');

		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$user_id = $this->_request->getParam('id');
		$em = Zend_Registry::get("em");

		$user = $em->find('Entities\\Users', $user_id);
		$changedField = array();
		foreach ($user->getEmployeeActivity() as $employeeActivity){
			if($employeeActivity->getActivityType()=='update'){
				$changedField = unserialize($employeeActivity->getField());
			}
		}

		$this->view->changedField = $changedField;
		$this->view->user = $user;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	/**
	 * Updates notification with isOpened true or false
	 *
	 * @author njaiswal
	 */

	public function viewnotificationAction(){
		$activity_id = $this->_request->getParam('id');
		try{
			$em = Zend_Registry::get("em");
			$activity = $em->find('Entities\\EmployeeActivity', $activity_id);
			if(isset($activity)){
				if(!$activity->getIsOpened()){
					$activity->setIsOpened(1);
					$em->persist($activity);
					$em->flush();
				}
			}
			$this->_helper->json->sendJson(true);
		}catch(Exception $ex){
			$this->_helper->json->sendJson(false);
		}
	}

	/**
	 * Shows stats in the company of employees based on Main technology
	 *
	 */
	public function viewtechstatusAction(){
		$searchForm = new Form_SearchForm();
		$configObj = Zend_Registry::get("config");
		$em = Zend_Registry::get("em");
		$mainTechnologyQuery = $em->createQuery('select t.id,t.technology from Entities\\Technology t order by t.technology asc');
		$mainTechnology = $mainTechnologyQuery->getResult();
		$qb = $em->createQueryBuilder();
		$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.isAdmin = ?1')->orderBy('u.firstname', 'ASC')->setParameter(1, false);
		$query = $qb->getQuery();
		$employee = $query->getResult();
		$this->view->totalEmployee = count($employee);
		$this->view->mainTechnology = $mainTechnology;
		$this->view->experience = $configObj->experience->year;
		$this->view->searchForm = $searchForm;
	}

	public function employeetechstatusAction(){
		$configObj = Zend_Registry::get("config");
		if($this->getRequest()->isPost()){
			try{
				$em = Zend_Registry::get("em");
				$mainTechnologyQuery = $em->createQuery('select t.id,t.technology from Entities\\Technology t order by t.technology asc');
				$mainTechnologys = $mainTechnologyQuery->getResult();
				foreach($mainTechnologys as $mainTechnology){
					$arrMainTechnology[] = $mainTechnology['id'];
				}

				$ExpMonthsQuery=$em->createQuery('');
				$data = json_decode($_POST["data"]);
				if(isset($data->MainTechnology) && count($data->MainTechnology) > 0)
					$arrMainTechnology = $data->MainTechnology;
				if($data->ExpYear !='years'){
					$ExpYear[]=$data->ExpYear;
				}else{
					for($exp=0;$exp<=$configObj->experience->year;$exp++){
						$ExpYear[]=$exp;
					}
				}
				if($data->ExpMonth!='months'){
					$ExpMonth[]=$data->ExpMonth;
				}else{
					for($expMnth=0;$expMnth<=11;$expMnth++){
						$ExpMonth[]=$expMnth;
					}
				}
				$query = $em->getConnection()->prepare('SELECT u.user_id,u.firstname,u.lastname,ud.exp_months,ud.exp_years,t.technology AS mainTechnology,p.position,GROUP_CONCAT(s.skill_name) AS skills,t.technology AS criteria FROM users u LEFT JOIN user_detail ud ON ud.user_id=u.user_id LEFT JOIN  position p ON p.position_id=ud.position_id LEFT JOIN user_skills_detail usd ON usd.user_id=u.user_id LEFT JOIN skills s ON s.skill_id=usd.skill_id LEFT JOIN technology t ON t.id= ud.main_technology_id WHERE ud.main_technology_id in('.implode(',',$arrMainTechnology).') and ud.exp_years >= '.min($ExpYear).' and ud.exp_months >='.min($ExpMonth).' group by u.user_id');
				$query->execute();
				$result = $query->fetchAll();
				$graphArray = array();
				$criteriaArr = array();
				$resultArray = array();
				$count = 0;
				foreach($result as $data){
					if(in_array($data['criteria'], $criteriaArr)){
						$index = array_search($data['criteria'], $criteriaArr);
						$graphArray[$index]['totalEmp'] = $graphArray[$index]['totalEmp'] + 1;
					}else{
						$graphArray[$count] = array('criteria'=>$data['criteria'], 'totalEmp'=>1);
						$criteriaArr[$count] = $data['criteria'];
						$count++;
					}
				}
				$resultArray[] = $graphArray;
				$resultArray[] = $result;
				$this->_helper->json->sendJson($resultArray);

			}catch(Exception $e){
				print_r($e);
				exit();
				$this->_helper->json->sendJson(false);
			}
		}
	}

	public function skilldetailAction(){
		$this->_helper->layout->disableLayout();
		$layout = $this->_helper->layout();
		$layout->setLayout('modallayout');
		$userId = $this->getRequest()->getParam('userId');
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userId);
		$this->view->user = $user;

	}
	/**
	 * Shows stats in the company of employees based on skills
	 *
	 * @author njaiswal
	 */

	public function viewstatsAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$em = Zend_Registry::get("em");

		$filterForm = new Form_FilterForm();

		$skillQuery = $em->createQuery('select s.skillName,s.skillId from Entities\\Skills s order by s.skillName asc');
		$skills = $skillQuery->getResult();

		$levelQuery = $em->createQuery('select l.levelName,l.levelId from Entities\\Level l');
		$level = $levelQuery->getResult();

		$projectQuery = $em->createQuery('select p.projectName,p.projectId from Entities\\Projects p');
		$project = $projectQuery->getResult();

		$qb = $em->createQueryBuilder();
		$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.isAdmin = ?1')->orderBy('u.firstname', 'ASC')->setParameter(1, false);
		$query = $qb->getQuery();
		$employee = $query->getResult();

		/*
		 * if($this->getRequest()->isPost()){ $postData =
		 * $this->_request->getPost(); $arrLvl = array(1, 2); $arrSkill =
		 * array(99, 152); if(isset($postData['skill']) && $postData['skill'] >
		 * 0) $arrSkill = $postData['skill']; if(isset($postData['level']) &&
		 * $postData['level'] > 0) $arrLvl = $postData['level']; $query =
		 * $em->createQuery( 'Select distinct CONCAT(CONCAT(s.skillName, \'
		 * \'),l.levelName) as criteria, count(usd.userSkillsDetailId) as
		 * totalEmp from Entities\\UserSkillsDetail usd join usd.skill s join
		 * usd.level l where l.levelId in(' . implode(',', $arrLvl) . ') and
		 * s.skillId in(' . implode(',', $arrSkill) . ') group by
		 * s.skillId,l.levelId'); $result = $query->getResult();
		 * $this->view->stats = $result; }
		 */
		$this->view->totalEmployee = count($employee);
		$this->view->filterForm = $filterForm;
		$this->view->level = $level;
		$this->view->skill = $skills;
		$this->view->project = $project;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	public function employeestatsAction(){
		if($this->getRequest()->isPost()){
			try{
				$em = Zend_Registry::get("em");
				$skillQuery = $em->createQuery('select s.skillId from Entities\\Skills s');
				$skills = $skillQuery->getResult();

				$levelQuery = $em->createQuery('select l.levelId from Entities\\Level l');
				$level = $levelQuery->getResult();

				foreach($level as $levelId){
					$arrLvl[] = $levelId['levelId'];
				}
				foreach($skills as $skillId){
					$arrSkill[] = $skillId['skillId'];
				}

				$data = json_decode($_POST["data"]);
				if(isset($data->skill) && count($data->skill) > 0)
					$arrSkill = $data->skill;
				if(isset($data->level) && count($data->level) > 0)
					$arrLvl = $data->level;

					/*
				 * Including project,skill and level Select distinct
				 * CONCAT(s.skill_name,' ',l.level_name) as criteria,
				 * p.project_name, count(usd.user_skills_detail_id) as totalEmp
				 * from user_skills_detail usd join skills s on usd.skill_id
				 * =s.skill_id join level l on l.level_id=usd.level_id join
				 * project_detail pd on pd.user_skill_detail_id =
				 * usd.user_skills_detail_id join projects p on p.project_id =
				 * pd.project_id group by s.skill_id,l.level_id,p.project_id
				 */
				// Only skill and level based
				$query = $em->createQuery(
					'Select distinct u.userId,u.firstname,u.lastname,ud.expMonths,ud.expYears,s.skillId,l.levelId,p.position, CONCAT(CONCAT(s.skillName, \'  \'),l.levelName) as criteria from Entities\\Users u join u.userdetail ud join ud.position p join u.userskilldetail usd join usd.skill
     					s join usd.level l where l.levelId in(' . implode(',', $arrLvl) . ') and s.skillId in(' . implode(',', $arrSkill) .
						 ') group by s.skillId,l.levelId,u.userId');

				$result = $query->getResult();

				$graphArray = array();
				$criteriaArr = array();
				$resultArray = array();
				$count = 0;
				foreach($result as $data){
					if(in_array($data['criteria'], $criteriaArr)){
						$index = array_search($data['criteria'], $criteriaArr);
						$graphArray[$index]['totalEmp'] = $graphArray[$index]['totalEmp'] + 1;
					}else{
						$graphArray[$count] = array('criteria'=>$data['criteria'], 'totalEmp'=>1);
						$criteriaArr[$count] = $data['criteria'];
						$count++;
					}
				}
				$resultArray[] = $graphArray;
				$resultArray[] = $result;
				$this->_helper->json->sendJson($resultArray);
			}catch(Exception $e){
				print_r($e);
				exit();
				$this->_helper->json->sendJson(false);
			}
		}
	}

	public function manageusersAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$page = $this->_request->getParam('page', 1);
		$em = Zend_Registry::get("em");
		$positionQuery = $em->createQuery('select p.position,p.positionId from Entities\\Position p order by p.position asc');
		$position = $positionQuery->getResult();
		$qb = $em->createQueryBuilder();
		if($this->isTeamLead && empty($this->selectedUsersIdArr)){
			$this->view->employee=NULL;
		}
		else{
			if(!$this->isTeamLead)
			$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.isAdmin = ?1')->orderBy('u.firstname', 'ASC')->setParameter(1, false);
			else if($this->isTeamLead && !empty($this->selectedUsersIdArr))
			$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.isAdmin = ?1')->andWhere('u.userId IN(?2)')->orderBy('u.firstname', 'ASC')->setParameter(1, false)->setParameter(2, $this->selectedUsersIdArr);
			$query = $qb->getQuery();

			$d2_paginator = new Paginator($query);
			$d2_paginator_iter = $d2_paginator->getIterator();
			$adapter = new \Zend_Paginator_Adapter_Iterator($d2_paginator_iter);
			$zend_paginator = new \Zend_Paginator($adapter);

			// records per page. Default 10 for zend
			$zend_paginator->setItemCountPerPage(5); // remove this line for default
			                                         // count
			$zend_paginator->setCurrentPageNumber($page);
			$this->view->employee = $zend_paginator;
		}

		// $employee = $query->getResult();

		$this->view->position = $position;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	public function manageemployeeAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		if($this->getRequest()->isPost()){
			$formData = $this->_request->getPost();
			$userSessionData->selectedEmployees = $formData['checkRow'];
			$routeArgs = array('controller'=>'admin', 'action'=>'employeeactivity');
			$this->_helper->redirector->gotoRoute($routeArgs);
		}
	}

	public function employeeactivityAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userId = $this->_request->getParam('userId');
		$isprevious=$this->_request->getParam('previous',false);
		if($isprevious=="true"){
			echo $userSessionData->lastUserId;
		}


		if(isset($userId))
			$this->view->singleuser=true;
		// if admin skips or done with current user in the queue and wants to
		// move on next
		if($userId == null || $userId == 0){
			if(count($userSessionData->selectedEmployees) != 0){
				$userId = $userSessionData->selectedEmployees[0];
				if(count($userSessionData->selectedEmployees)>1)
					$this->view->inloop=true;
				if(count($userSessionData->selectedEmployees)==1){
					$this->view->inloop=false;
				}

			}else{
				$routeArgs = array('controller'=>'admin', 'action'=>'manageusers');
				$this->_helper->redirector->gotoRoute($routeArgs);
			}
		}
		if($this->isTeamLead && isset($this->selectedUsersIdArr) && !in_array($userId,$this->selectedUsersIdArr)){
		}else{
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userId);
		$this->view->user = $user;

		}
		// remove first element($userId) from selected employee list
		if(count($userSessionData->selectedEmployees) != 0){
			$userSessionData->lastUserId=$userSessionData->selectedEmployees[0];
			array_shift($userSessionData->selectedEmployees);
		}

		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	public function approveuseractivitiesAction(){
		$skillIds = json_decode($_POST["skillId"]);
		$status= $_POST["status"];
		$em = Zend_Registry::get("em");
		try {
			foreach($skillIds as $skillId){
			$userSkillsDetail = $em->find('Entities\\UserSkillsDetail', $skillId);
			$employeeActivity = $userSkillsDetail->getUser()->getEmployeeActivity();
			 foreach ($employeeActivity as $empAct){
			 	if($empAct->getActivityType()=='update'){
			 		$field = unserialize($empAct->getField());
			 		if(isset($field['skill'])){
			 			$field['skill'] = array_diff($field['skill'], array($skillId));
			 			$empAct->setField(serialize($field));
			 			$em->persist($empAct);
			 		}
			 	}
			 }
			if($status=='Approve')
				$userSkillsDetail->setIsVerified(2);
			if($status=='Reject')
				$userSkillsDetail->setIsVerified(1);
			$em->persist($userSkillsDetail);
			$em->flush();
			}
			$this->_helper->json->sendJson(true);
		}catch (Exception $e){
			$em->rollback();
			$this->_helper->json->sendJson(false);
		}
	}

	/**
	 * Action to View timesheet report Options
	 * @author sadhana.dhande
	 */

	public function allreportAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$this->view->userName = $userSessionData->userName;
		$userSessionData->userName_sort_order='ASC';
		$userSessionData->ID_sort_order='ASC';
		$userSessionData->NWH_sort_order='ASC';
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}


	/**
	 * Action to View timesheet report for particular user
	 * @author sadhana.dhande
	 */

	public function viewbyuserAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$userId = $this->_request->getParam('userId');
		$sort_by = $this->getRequest()->getParam('sort_by');
		$userQuery=$sqlsrvEm->createQuery("select e.name from Entities\\Emp e where e.redbr=".$userId);
		$userArr = $userQuery->getResult();
		$userName =$userArr[0]['name'];
		$Month = $this->getRequest()->getParam('Month',date('m'));
		$Year = $this->getRequest()->getParam('Year',date('Y'));
		if(strlen((string) $Month)!=2){
			$Month='0'.$Month;
		}
		$startDate = $Year . '-' . $Month . '-01';
		$endDate = $Month == 12 ? ($Year + 1) . '-01-01' : $Year . '-' . ($Month + 1) . '-01';
		$TimeDetails = array();
		$report_Service = new Service_Report();
		if(!$this->isTeamLead)
			$TimeDetails = $report_Service->getReport($userId,$startDate,$endDate);
		else
			$TimeDetails = $report_Service->getReport($userId,$startDate,$endDate,$this->selectedUsersNameArr);

		if($sort_by=='NWH'){
			foreach ($TimeDetails as $key => $row) {
				$NetWorking[$key]  = $row['Net Working Hours'];
			}
			if($userSessionData->NWH_sort_order=='ASC'){
				array_multisort($NetWorking, SORT_DESC, $TimeDetails);
				$userSessionData->NWH_sort_order='DESC';
			}
			else {
				array_multisort($NetWorking, SORT_ASC, $TimeDetails);
				$userSessionData->NWH_sort_order='ASC';
			}
		}
		$this->view->NWH_sort_order = $userSessionData->NWH_sort_order;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->isAdmin = $userSessionData->isAdmin;
		$this->view->userId = $userId;
		$this->view->uName = $userName;
		$this->view->Year = $Year;
		$this->view->Month = $Month;
		$this->view->TimeDetails = $TimeDetails;

	}


	/**
	 * Action to View Timesheet report by date
	 * @author sadhana.dhande
	 */

	public function viewbydateAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$this->_helper->layout->disableLayout();
		$report_Service = new Service_Report();
		$date = json_decode($_POST["date"]);
		$sort_by='';
		if(isset($_POST["sort_by"]))
		$sort_by=json_decode($_POST["sort_by"]);
		$endDate =date('Y-m-d', strtotime('+1 day', strtotime($date)));
		$TimeDetails=array();
		if(!$this->isTeamLead)
			$TimeDetails=$report_Service->getReportByDate($date,$endDate);
		else
			$TimeDetails=$report_Service->getReportByDate($date,$endDate,$this->selectedUsersNameArr);

		if($sort_by=='UserName'){
			foreach ($TimeDetails as $key => $row) {
				$name[$key]  = $row['User Name'];
			}
			if($userSessionData->userName_sort_order=='ASC'){
				array_multisort($name, SORT_DESC, $TimeDetails);
				$userSessionData->userName_sort_order='DESC';
			}
			else {
				array_multisort($name, SORT_ASC, $TimeDetails);
				$userSessionData->userName_sort_order='ASC';
			}
		}
		if($sort_by=='ID'){
			foreach ($TimeDetails as $key => $row) {
				$ID[$key]  = $row['ID'];
			}
			if($userSessionData->ID_sort_order=='ASC'){
				array_multisort($ID, SORT_DESC, $TimeDetails);
				$userSessionData->ID_sort_order='DESC';
			}
			else {
				array_multisort($ID, SORT_ASC, $TimeDetails);
				$userSessionData->ID_sort_order='ASC';
			}
		}
		if($sort_by=='NWH'){
			foreach ($TimeDetails as $key => $row) {
				$NetWorking[$key]  = $row['Net Working Hours'];
			}
			if($userSessionData->NWH_sort_order=='ASC'){
				array_multisort($NetWorking, SORT_DESC, $TimeDetails);
				$userSessionData->NWH_sort_order='DESC';
			}
			else {
				array_multisort($NetWorking, SORT_ASC, $TimeDetails);
				$userSessionData->NWH_sort_order='ASC';
			}
		}
		$this->view->userName_sort_order = $userSessionData->userName_sort_order;
		$this->view->ID_sort_order = $userSessionData->ID_sort_order;
		$this->view->NWH_sort_order = $userSessionData->NWH_sort_order;
		$this->view->TimeDetails = $TimeDetails;
		$this->view->date=$date;

	}


	/**
	 * Action to get CSV file of timesheet report
	 * @author sadhana.dhande
	 */

	public function getcsvfileAction(){
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$report_Service = new Service_Report();
		$date=$this->_request->getParam('date');
		$Month=$this->_request->getParam('Month');
		if(strlen((string) $Month)!=2){
			$Month='0'.$Month;
		}
		$Year=$this->_request->getParam('Year');
		$userId=$this->_request->getParam('userId');
		$employee=$this->_request->getParam('employee');
		$fromDate=$this->_request->getParam('fromdate');
		$toDate=$this->_request->getParam('todate');
		if(isset($date)){
			$endDate =date('Y-m-d', strtotime('+1 day', strtotime($date)));
			if(!$this->isTeamLead)
				$csvdata=$report_Service->getReportByDate($date,$endDate);
			else
				$csvdata=$report_Service->getReportByDate($date,$endDate,$this->selectedUsersNameArr);
			$title="AllEmployees Report of ".$date;
			$filename=$title.".csv";
			$ReportHeadings=$this->reportByDateHeading;
		}elseif(isset($Month) && isset($Year) && isset($userId)){
			$userQuery=$sqlsrvEm->createQuery("select e.name from Entities\\Emp e where e.redbr=".$userId);
			$userArr = $userQuery->getResult();
			$uName =$userArr[0]['name'];
			$startDate = $Year . '-' . $Month . '-01';
			$endDate = $Month == 12 ? ($Year + 1) . '-01-01' : $Year . '-' . ($Month + 1) . '-01';
			if(!$this->isTeamLead)
				$csvdata = $report_Service->getReport($userId,$startDate,$endDate);
			else
				$csvdata = $report_Service->getReport($userId,$startDate,$endDate,$this->selectedUsersNameArr);
			$title=$uName." Report for ".date('F',mktime(0, 0, 0, $Month))." ".$Year;
			$filename=$title.".csv";
			$ReportHeadings=$this->userReportHeading;
		}elseif(isset($employee) && isset($fromDate) && isset($toDate)){
			$csvdata=$report_Service->searchReport($employee,$fromDate,$toDate);
			if($employee=='all'){
				$title='All Employees Report ';
			}
			else{
				$user = $sqlsrvEm->find('Entities\\Emp', $employee);
				$title=$user->getName().' Report ';
			}
			$title.=$fromDate." to ".$toDate;
			$filename=$title.".csv";
			$ReportHeadings=$this->DateRangeReportHeading;
		}
		elseif(isset($userId) && isset($fromDate) && isset($toDate)){
			$csvdata = $report_Service->getReport($userId,$fromDate,$toDate);
			$toDate = date('Y-m-d', strtotime($toDate .' -1 day'));
			$user = $sqlsrvEm->find('Entities\\Emp', $userId);
			$title=$user->getName().' Report '.$fromDate." to ".$toDate;
			$filename=$title.".csv";
			$ReportHeadings=$this->userReportHeading;
		}
		else{
			$csvdata=$this->getusersprofilestatusdata();
			$title= "AllEmployees Profile Status on ".date('Y-m-d');
			$filename=$title.".csv";
			$ReportHeadings=$this->profileStatusReportHeadings;
		}
		header('Content-Type: text/csv charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$out = fopen('php://output', 'w');
		fwrite($out, $title."\n");
		fputcsv($out, $ReportHeadings);
		foreach($csvdata as $row){
			$data="";
			foreach($row as $key=>$val){
				$data[] = $val;
			}
			fputcsv($out, $data);
		}
		fclose($out);

	}

	/**
	 * Action to view user roles and their permissions
	 * @author naveen.jaiswal
	 */

	public function managerolepermissionAction(){
		if($this->_getParam('add')=='Success'){
			$msg='Added Successfully';
		}else if($this->_getParam('edit')=='Success'){
			$msg='Edited Successfully';
		}else
			$msg='';
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userId = $userSessionData->userId;
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userId);

		$qb = $em->createQueryBuilder();
		$qb->select('r')->from('Entities\\Roles', 'r')->orderBy('r.roleId','ASC');
		$query = $qb->getQuery();
		$roles = $query->getResult();
		$rolePermissionArray = array();
		$permissionCount = 0;
		foreach ($roles as $role){
			$rolePermissionArray[$role->getRoleName()." : ".$role->getRoleId()] = array();
			foreach ($role->getRolePermission() as $rp){
				$rolePermissionArray[$role->getRoleName()." : ".$role->getRoleId()][$rp->getPermission()->getResource()][$rp->getPermission()->getPermissionId()] = $rp->getPermission()->getPrivilage();
			}
		}
		$this->view->msg=$msg;
		$this->view->rolePermission = $rolePermissionArray;
	}

	/**
	 * Action to  save and update user role permission
	 * @author naveen.jaiswal
	 */

	public function editrolepermissionAction(){
		$roleId = $this->_request->getParam('roleId');

		$em = Zend_Registry::get("em");
		$role = $em->find('Entities\\Roles', $roleId);

		$qb = $em->createQueryBuilder();
		$qb->select('rp')->from('Entities\\RolePermissions', 'rp')->andWhere('rp.role = ?1')->setParameter(1, $role);
		$query = $qb->getQuery();
		$rolePermission = $query->getResult();
		$selectedPermissionIdArr = array();
		foreach ($rolePermission as $rp){
			$selectedPermissionIdArr[] =  $rp->getPermission()->getPermissionId();
		}
		$em->beginTransaction();
		try{
			if($this->getRequest()->isPost()){
				$formData = $this->_request->getPost();
				$role->setRoleName($formData['roleName']);
				$em->persist($role);
				foreach ($rolePermission as $rPermission){
					$em->remove($rPermission);
				}
				if(count($formData['permission'])>0){
					foreach ($formData['permission'] as $permissionId){
						$permissionObj = $em->find('Entities\\Permissions', $permissionId);
						$rolePermissions = new \Entities\RolePermissions();
						$rolePermissions->setPermission($permissionObj);
						$rolePermissions->setRole($role);
						$rolePermissions->setAllow('Y');
						$em->persist($rolePermissions);
					}
				}
				$em->flush();
				$em->commit();
				$routeArgs = array('controller'=>'admin', 'action'=>'managerolepermission','edit'=>'Success');
				$this->_helper->redirector->gotoRoute($routeArgs);
			}
		}catch(Exception $ex){
			echo "<pre>";
			print_r($ex);
			$em->rollback();
		}
		$qb = $em->createQueryBuilder();
		$qb->select('p')->from('Entities\\Permissions', 'p');
		$query = $qb->getQuery();
		$permissions = $query->getResult();
		$permissionArr = array();
		foreach ($permissions as $permission){
			$permissionArr[$permission->getResource()][$permission->getPermissionId()]['privilage'] = $permission->getPrivilage();
			$permissionArr[$permission->getResource()][$permission->getPermissionId()]['description'] = $permission->getDescription();
		}
		$this->view->role = $role;
		$this->view->selectedPermissionIdArr = $selectedPermissionIdArr;
		$this->view->permissions = $permissionArr;
	}

	/**
	 * Action to view users and their roles
	 * @author naveen.jaiswal
	 */

	public function manageuserroleAction(){
		$em = Zend_Registry::get("em");
		if($this->_getParam('edit')=='Success'){
			$msg='Edited Successfully';
		}else
			$msg='';

		$qb = $em->createQueryBuilder();
		$qb->select('u')->from('Entities\\Users', 'u');
		$query = $qb->getQuery();
		$users = $query->getResult();
		$userRoleArray = array();

		foreach ($users as $user){
			$userRoleArray[$user->getUserId()]['name'] = $user->getFirstName()." ".$user->getLastName();
			$designation = '-';
			$userDetail = $user->getUserDetail();
			if(isset($userDetail))
				$designation = $userDetail->getPosition()->getPosition();
			$userRoleArray[$user->getUserId()]['designation'] = $designation;
			foreach ($user->getUserRole() as $userRole){
				$userRoleArray[$userRole->getUser()->getUserId()]['role'][] = $userRole->getRole()->getRoleName();
			}
		}
		asort($userRoleArray);
		$this->view->msg=$msg;
		$this->view->userRole = $userRoleArray;
	}

	/**
	 * Action to save and update user roles
	 * @author naveen.jaiswal
	 */

	public function edituserroleAction(){
		$userId = $this->_request->getParam('userId');
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userId);
		$em->beginTransaction();
		try{
			if($this->getRequest()->isPost()){
				$formData = $this->_request->getPost();
				$selectedRole = $formData['roles'];
				foreach ($user->getUserRole() as $uRole){
					if($uRole->getRole()->getRoleId()!=6)
						$em->remove($uRole);//Employee is default role
				}
				$em->flush();// removing this from here gives SQL error for duplicate value below because usre-role combination is unique.
				foreach ($selectedRole as $newRole){
					$roleObj = $em->find('Entities\\Roles',$newRole);
					$userRoles = new \Entities\UserRole();
					$userRoles->setRole($roleObj);
					$userRoles->setUser($user);
					$em->persist($userRoles);
				}
				$em->flush();
				$em->commit();
				$routeArgs = array('controller'=>'admin', 'action'=>'manageuserrole','edit'=>'Success');
				$this->_helper->redirector->gotoRoute($routeArgs);
			}
		}catch(Exception $ex){
			echo "<pre>";
			print_r($ex);
			$em->rollback();
		}
		$selectedRoles = array();
		foreach ($user->getUserRole() as $userRole){
			$selectedRoles[] = $userRole->getRole()->getRoleId();
		}
		$qb = $em->createQueryBuilder();
		$qb->select('r')->from('Entities\\Roles', 'r');
		$query = $qb->getQuery();
		$roles = $query->getResult();
		$this->view->selectedRoles = $selectedRoles;
		$this->view->roles = $roles;
		$this->view->user = $user;
	}

	public function addroleAction(){
		$em = Zend_Registry::get("em");
		$em->beginTransaction();
		try{
			if($this->getRequest()->isPost()){
				$formData = $this->_request->getPost();
				$role = new \Entities\Roles();
				$role->setRoleName($formData['roleName']);
				$em->persist($role);
				if(count($formData['permission'])>0){
					foreach ($formData['permission'] as $permissionId){
						$permissionObj = $em->find('Entities\\Permissions', $permissionId);
						$rolePermissions = new \Entities\RolePermissions();
						$rolePermissions->setPermission($permissionObj);
						$rolePermissions->setRole($role);
						$rolePermissions->setAllow('Y');
						$em->persist($rolePermissions);
					}
				}
				$em->flush();
				$em->commit();
				$routeArgs = array('controller'=>'admin', 'action'=>'managerolepermission', 'add'=>'Success');
				$this->_helper->redirector->gotoRoute($routeArgs);
			}
		}catch(Exception $ex){
			echo "<pre>";
			print_r($ex);
			$em->rollback();
		}
		$qb = $em->createQueryBuilder();
		$qb->select('p')->from('Entities\\Permissions', 'p');
		$query = $qb->getQuery();
		$permissions = $query->getResult();
		$permissionArr = array();
		foreach ($permissions as $permission){
			$permissionArr[$permission->getResource()][$permission->getPermissionId()]['privilage'] = $permission->getPrivilage();
			$permissionArr[$permission->getResource()][$permission->getPermissionId()]['description'] = $permission->getDescription();
		}
		$this->view->permissions = $permissionArr;
	}

	/**
	 * Validate role name
	 */

	public function validaterolenameAction(){
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNeverRender(true);
		if($this->getRequest()->isPost()){
			try{
				$data = json_decode($_POST["data"]);
				$em = Zend_Registry::get("em");
				$qb = $em->createQueryBuilder();
				$qb->select('r')->from('Entities\\Roles', 'r')->andWhere('r.roleName = ?1')->setParameter(1, trim($data->roleName));
				if($data->roleId!=0){
					$qb->andWhere('r.roleId != ?2')->setParameter(2, $data->roleId);
				}
				$query = $qb->getQuery();
				$result = $query->getResult();
				if(count($result) > 0){
					$this->_helper->json->sendJson(false);
					return;
				}
				$this->_helper->json->sendJson(true);
				return;
			}catch(Exception $e){
				$this->view->error = $e->getMessage();
			}
		}
	}

	/**
	 * Action to view teams	 *
	 * @author Sadhana Dhande
	 */

	public function manageteamAction(){
		if($this->_getParam('add')=='Success'){
			$msg='Added Successfully';
		}else if($this->_getParam('delete')=='Success'){
			$msg='Deleted Successfully';
		}else
			$msg='';
		$em = Zend_Registry::get("em");
		$qb = $em->createQueryBuilder();
		$qb->select('r')->from('Entities\\Roles', 'r')->where("r.roleName=?1")->setParameter(1, 'TL');
		$query = $qb->getQuery();
		$role = $query->getResult();
		$qb2=$em->createQueryBuilder();
		$qb2->select('ur')->from('Entities\\UserRole', 'ur')->where("ur.role=?1")->setParameter(1, $role);
		$query1 = $qb2->getQuery();
		$roleTeamleads = $query1->getResult();
		$this->view->msg=$msg;
		$this->view->TeamLeads=$roleTeamleads;


	}

	/**
	 * Add  team members
	 *
	 * @author Sadhana Dhande
	 */

	 public function  editteamusersAction(){
	 	$userSessionData = new Zend_Session_Namespace('resourceManagement');
	 	$teamleadId = $this->_request->getParam('teamleadId');
	 	$em = Zend_Registry::get("em");
	 	$qb = $em->createQueryBuilder();
	 	$qb->select('p')->from('Entities\\Position', 'p')->where("p.position IN ('Web Developer','Web Designer','Test Engineer','Sr. Software Engineer','Sr. Software Developer','Software Engineer')");
	 	$query = $qb->getQuery();
	 	$positions = $query->getResult();
	 	//$user= $em->find('Entities\\Users', $userSessionData->userId);
	 	$qb1 = $em->createQueryBuilder();
	 	$qb1->select('u')->from('Entities\\Users', 'u')->where("u.userId IN(?1)")->setParameter(1, array($teamleadId,$userSessionData->userId));
	 	$query = $qb1->getQuery();
	 	$user = $query->getResult();
	 	$qb = $em->createQueryBuilder();
	 	$qb->select('u')->from('Entities\\UserDetail', 'u') ->where("u.user NOT IN(?1)")->setParameter(1, $user) ;//->where("u.position IN(?1)")->setParameter(1, $positions);
	 	$query = $qb->getQuery();
	 	$users = $query->getResult();

	 	$userArr=array();
	 	foreach($users as $user){
	 		$userArr[$user->getUser()->getUserId()]=$user->getUser();
	 	}
	 	$teamleadId = $this->_request->getParam('teamleadId');

	 	$teamLead = $em->find('Entities\\Users', $teamleadId);
	 	$qb1 = $em->createQueryBuilder();
	 	$qb1->select('tu')->from('Entities\\TeamleadUsers', 'tu')->andWhere('tu.teamlead = ?1')->setParameter(1, $teamLead);
	 	$query = $qb1->getQuery();
	 	$teamleadusers = $query->getResult();
	 	$selectedUsersIdArr = array();
	 	foreach ($teamleadusers as $tu){
	 		$selectedUsersArr[$tu->getUser()->getUserId()] =  $tu->getUser();
	 	}
	 	$userArray=isset($selectedUsersArr)?array_diff_key($userArr,$selectedUsersArr):$userArr;
	 	$this->view->users=$userArray;
	 	$this->view->teamLead=$teamLead;
	 	$this->view->selectedUsersIdArr=$selectedUsersArr;

	 	$em->beginTransaction();
	 	try{
	 		if($this->getRequest()->isPost()){
	 			$formData = $this->_request->getPost();
	 			foreach ($teamleadusers as $tu){
	 				$em->remove($tu);
	 			}
	 			if(count($formData['selectedUser'])>0){
	 				foreach ($formData['selectedUser'] as $userId){
	 					$userObj = $em->find('Entities\\Users', $userId);
	 					$teamLeadusers = new \Entities\TeamleadUsers();
	 					$teamLeadusers->setUser($userObj);
	 					$teamLeadusers->setTeamlead($teamLead);
	 					$em->persist($teamLeadusers);
	 				}
	 			}
	 			$em->flush();
	 			$em->commit();
	 			$routeArgs = array('controller'=>'admin', 'action'=>'manageteam');
	 			$this->_helper->redirector->gotoRoute($routeArgs);
	 		}
	 	}catch(Exception $ex){
	 		echo "<pre>";
	 		print_r($ex);
	 		$em->rollback();
	 	}
	}

	/**
	 * Add new team
	 *
	 * @author Sadhana Dhande
	 */

	public function addteamleadAction(){
		$em = Zend_Registry::get("em");
		$qb = $em->createQueryBuilder();
		$qb->select('p')->from('Entities\\Position', 'p')->where("p.position NOT IN ('Web Developer','Web Designer','Test Engineer','Sr. Software Engineer','Sr. Software Developer','Software Engineer')");
		$query = $qb->getQuery();
		$positions = $query->getResult();
		$qb1 = $em->createQueryBuilder();
		$qb1->select('r')->from('Entities\\Roles', 'r')->where("r.roleName=?1")->setParameter(1, 'TL');
		$query1 = $qb1->getQuery();
		$role = $query1->getResult();
		$qb2=$em->createQueryBuilder();
		$qb2->select('ur')->from('Entities\\UserRole', 'ur')->where("ur.role=?1")->setParameter(1, $role);
		$query2 = $qb2->getQuery();
		$roleTeamleads = $query2->getResult();
		$roleusers=array();
		foreach($roleTeamleads as $roleTeamlead){
			$roleusers[]=$roleTeamlead->getUser();
		}
		$qb=$em->createQueryBuilder();
		if(!empty($roleusers))
			$qb->select('u')->from('Entities\\UserDetail', 'u')->where("u.position IN(?1)")->andwhere("u.user NOT IN(?2)")->setParameter(1, $positions)->setParameter(2, $roleusers);
		else
			$qb->select('u')->from('Entities\\UserDetail', 'u')->where("u.position IN(?1)")->setParameter(1, $positions);
		$query = $qb->getQuery();
		$users = $query->getResult();
		$this->view->users=$users;
		$em->beginTransaction();
		try{
		if($this->getRequest()->isPost()){
			$qb = $em->createQueryBuilder();

			$userIds=$this->getRequest()->getPost('TeamLead');
			foreach($userIds as $userId){
				$qb1 = $em->createQueryBuilder();
				$qb1->select('u')->from('Entities\\Users', 'u')->where("u.userId=?1")->setParameter(1, $userId);
				$query = $qb1->getQuery();
				$user = $query->getResult();
				$qb = $em->createQueryBuilder();
				$qb->select('r')->from('Entities\\Roles', 'r')->where("r.roleName=?1")->setParameter(1, 'TL');
				$query = $qb->getQuery();
				$role = $query->getResult();
				$userrole= new \Entities\UserRole();
				$userrole->setUser($user[0]);
				$userrole->setRole($role[0]);
				$em->persist($userrole);
			}
			$em->flush();
			$em->commit();
			$routeArgs = array('controller'=>'admin', 'action'=>'manageteam','add'=>'Success');
			$this->_helper->redirector->gotoRoute($routeArgs);
		}
		}
		catch(Exception $ex){
			echo "<pre>";
			print_r($ex);
			$em->rollback();
		}
	}

	/**
	 * Delete the team head and team member reference and role of team head
	 *
	 * @author Sadhana Dhande
	 */

	public function deleteteamleadAction(){
		$this->_helper->layout->disableLayout();
		$teamleadId = $this->_request->getParam('teamleadId');
		$em = Zend_Registry::get("em");
		$teamLead = $em->find('Entities\\Users', $teamleadId);
		$em->beginTransaction();
		$qb1 = $em->createQueryBuilder();
		$qb1->select('tu')->from('Entities\\TeamleadUsers', 'tu')->andWhere('tu.teamlead = ?1')->setParameter(1, $teamLead);
		$query = $qb1->getQuery();

		$teamleadusers = $query->getResult();

		foreach ($teamleadusers as $tu){
			$em->remove($tu);
		}

		$qb = $em->createQueryBuilder();
		$qb->select('r')->from('Entities\\Roles', 'r')->where("r.roleName=?1")->setParameter(1, 'TL');
		$query = $qb->getQuery();
		$role = $query->getResult();
		$qb2=$em->createQueryBuilder();
		$qb2->select('ur')->from('Entities\\UserRole', 'ur')->where("ur.role=?1")->andwhere("ur.user=?2")->setParameter(1, $role)->setParameter(2, $teamLead);
		$query1 = $qb2->getQuery();
		$userrole = $query1->getResult();
		$em->remove($userrole[0]);
		$em->flush();
		$em->commit();
		$routeArgs = array('controller'=>'admin', 'action'=>'manageteam','delete'=>'Success');
		$this->_helper->redirector->gotoRoute($routeArgs);

	}

	public function getusersprofilestatusAction(){
		$page = $this->_request->getParam('page', 1);
		$userProfileStatusArray=$this->getusersprofilestatusdata();
		$zend_paginator = Zend_Paginator::factory($userProfileStatusArray);
		$zend_paginator->setItemCountPerPage(20)->setCurrentPageNumber($page);
		$this->view->userProfileStatusArray = $zend_paginator;
	}
	public function getusersprofilestatusdata(){
		$em = Zend_Registry::get("em");
		$qb = $em->createQueryBuilder();
		$qb->select('u')->from('Entities\\Users', 'u');
		$query = $qb->getQuery();
		$users = $query->getResult();
		$userProfileStatusArray = array();
		$totalFieldsCount=count($this->userProfileFields)+count($this->userDetailProfileFields)-1;
		foreach ($users as $user){
			$userProfileStatusArray[$user->getUserId()]['ID']=$user->getUserId();
			$userProfileStatusArray[$user->getUserId()]['Name'] = $user->getFirstName()." ".$user->getLastName();
			$userDetail = $user->getUserDetail();
			$userSkillDetail = $user->getUserSkillDetail();
			$filledFieldsCount=0;
			$exp=false;
			foreach($this->userProfileFields as $fields){
				$getterMethod='get'.$fields;
				$fieldValue=$user->$getterMethod();
				if($fieldValue!='' && !empty($fieldValue) && $fieldValue!=Null){
					$filledFieldsCount++;
				}
			}
			if(isset($userDetail)){
				foreach($this->userDetailProfileFields as $fields){
					$getterMethod='get'.$fields;
					$fieldValue=$userDetail->$getterMethod();
					if($fields=='ExpYears'|| $fields=='ExpMonths'){
						if($fieldValue!='' && !empty($fieldValue) && $fieldValue!=Null){
							$exp=true;
						}
					}else if($fieldValue!='' && !empty($fieldValue) && $fieldValue!=Null){
						$filledFieldsCount++;
					}
				}
				if($exp){
					$filledFieldsCount++;
				}
			}
			$profilePercentage=round(($filledFieldsCount/$totalFieldsCount)*100);
			$userProfileStatusArray[$user->getUserId()]['Profile Percentage']=$profilePercentage;
			if(count($userSkillDetail)>0){
				$userProfileStatusArray[$user->getUserId()]['Skills']='Yes';
			}else{
				$userProfileStatusArray[$user->getUserId()]['Skills']='No';
			}
		}
		foreach ($userProfileStatusArray as $key => $row) {
			$sort[$key]  = $row['Name'];
		}
		array_multisort($sort, SORT_ASC, $userProfileStatusArray);
		return $userProfileStatusArray;
	}

	public function searchbydatesAction(){
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$qb = $sqlsrvEm->createQueryBuilder();
		$qb->select('e')->from('Entities\\Emp', 'e')->orderBy('e.name','ASC');
		$query = $qb->getQuery();
		$users = $query->getResult();
		$this->view->users=$users;
	}

	public function reportsearchAction(){
		$this->_helper->layout->disableLayout();
		$report_Service = new Service_Report();
		$data=$this->_request->getPost();
		$empId=json_decode($data['employeeId']);
		$fromDate=json_decode($data['fromdate']);
		$toDate=json_decode($data['todate']);

		$reportArray=$report_Service->searchReport($empId,$fromDate,$toDate);
		$this->view->reportArray=$reportArray;
		$this->view->fromDate=$fromDate;
		$this->view->toDate=$toDate;

	}

	public function viewbydaterangeAction(){
		$this->_helper->layout->disableLayout();
		$layout = $this->_helper->layout();
		$layout->setLayout('modallayout');
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$userId=$this->_request->getParam('userId');
		$fromDate=$this->_request->getParam('fromdate');
		$toDate=$this->_request->getParam('todate');
		$toDate = date('Y-m-d', strtotime($toDate .' +1 day'));
		$report_Service = new Service_Report();
		$TimeDetails = $report_Service->getReport($userId,$fromDate,$toDate);
		$user = $sqlsrvEm->find('Entities\\Emp', $userId);
		$this->view->TimeDetails = $TimeDetails;
		$this->view->fromDate=$fromDate;
		$this->view->toDate=$toDate;
		$this->view->userId=$userId;
		$this->view->uName=$user->getName();
	}

}