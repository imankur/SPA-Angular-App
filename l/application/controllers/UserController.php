<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
class UserController extends Zend_Controller_Action{

	public $months = array(1=>'Jan', 2=>'Feb', 3=>'Mar', 4=>'Apr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Aug', 9=>'Sept', 10=>'Oct', 11=>'Nov',
		12=>'Dec');

	/**
	 * Index action
	 */
	public function indexAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userSessionData->userId);

		$this->view->user = $user;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->userId = $userSessionData->userId;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	/**
	 * Show profile details of a user
	 *
	 * @author njaiswal
	 */
	public function viewdetailsAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userSessionData->userId);

		$this->view->user = $user;
		$this->view->userName = $userSessionData->userName;
		$this->view->firstName = $userSessionData->firstName;
		$this->view->lastName = $userSessionData->lastName;
		$this->view->userId = $userSessionData->userId;
		$this->view->isAdmin = $userSessionData->isAdmin;
	}

	/**
	 * To save and update user skill
	 *
	 * @author njaiswal
	 */
	public function updateskillAction(){
		$userId = $this->getRequest()->getParam('userId');
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$configObj = Zend_Registry::get("config");
		$em = Zend_Registry::get("em");
		$skillForm = new Form_SkillForm();
		$user = $em->find('Entities\\Users', $userSessionData->userId);

		$skldtlIdArr = array();
		$sklArr = array();
		$lvlArr = array();
		$mnthArr = array();
		$yrArr = array();
		$expArr = array();
		$prjtArr = array();
		$prjtArrOld = array();
		$val = array();
		$sklArrVal = '';
		foreach($user->getUserSkillDetail() as $sklDtl){
			$skldtlIdArr[] = $sklDtl->getUserSkillsDetailId();
			$sklArr[] = $sklDtl->getSkill()->getSkillId();
			$i = array_search($sklDtl->getSkill()->getSkillId(), $sklArr);
			$lvlArr[] = $sklDtl->getLevel()->getLevelId();
			$mnthArr[] = $key = array_search($sklDtl->getLastUsedMonth(), $this->months);
			$yrArr[] = $sklDtl->getLastUsedYear();
			$expArr[] = $sklDtl->getExpMonths();
			$prjtArrOld[$i] = array();
			foreach($sklDtl->getProjectDetail() as $pd){
				$prjtArr[$sklDtl->getSkill()->getSkillId()][] = $pd->getProject()->getProjectId();
				$prjtArrOld[$i][] = $pd->getProject()->getProjectId();
			}
			if(isset($prjtArr[$sklDtl->getSkill()->getSkillId()]) && count($prjtArr[$sklDtl->getSkill()->getSkillId()]) > 0){
				$lastElement = end($prjtArr[$sklDtl->getSkill()->getSkillId()]);
				$lastElementkey = array_search($lastElement, $prjtArr[$sklDtl->getSkill()->getSkillId()]);
				$prjtArr[$sklDtl->getSkill()->getSkillId()][$lastElementkey] = $prjtArr[$sklDtl->getSkill()->getSkillId()][$lastElementkey] . "#";
				$val[] = implode(',', $prjtArr[$sklDtl->getSkill()->getSkillId()]);
			}
		}

		$this->view->skillVal = implode(',', $sklArr);
		$this->view->lvlVal = implode(',', $lvlArr);

		$this->view->mnthVal = implode(',', $mnthArr);
		$this->view->yrVal = implode(',', $yrArr);

		$this->view->expVal = implode(',', $expArr);
		$this->view->prjtVal = implode(',', $val);

		$skillQuery = $em->createQuery('select s.skillName,s.skillId from Entities\\Skills s order by s.skillName asc');
		$skills = $skillQuery->getResult();

		$levelQuery = $em->createQuery('select l.levelName,l.levelId from Entities\\Level l');
		$level = $levelQuery->getResult();

		$projectQuery = $em->createQuery('select pr.projectName,pr.projectId from Entities\\Projects pr order by pr.projectName asc');
		$project = $projectQuery->getResult();

		$em->beginTransaction();
		try{
			if($this->getRequest()->isPost()){
				$formData = $this->_request->getPost();
				$postSkillDetailIdArr = array();
				if($skillForm->isValid($formData)){
					$skillAssocArray = json_decode($formData['assocArr']);
					foreach($skillAssocArray as $a){
						$postSkillDetailIdArr[] = $a->userSkillDetailId;
					}

					// deleted skills
					$toDeleteSkill = array_diff($skldtlIdArr, $postSkillDetailIdArr);

					// new added skills
					$toAddSkill = array_diff($postSkillDetailIdArr, $skldtlIdArr);

					// updated skills
					$updatedSkill = array_intersect($skldtlIdArr, $postSkillDetailIdArr);

					$changedData = array();
					// update existing skills
					foreach($postSkillDetailIdArr as $key => $updateSkill){
						$oldkey = array_search($updateSkill, $skldtlIdArr);
						$skillAssocArray[$key]->projects = ($skillAssocArray[$key]->projects == '' || $skillAssocArray[$key]->projects == NULL) ? array() : $skillAssocArray[$key]->projects;
						if(in_array($updateSkill, $updatedSkill) && $skillAssocArray[$key]->skillId != 0){
							if($skillAssocArray[$key]->skillId != $sklArr[$oldkey] || $skillAssocArray[$key]->levelId != $lvlArr[$oldkey] ||
								 $skillAssocArray[$key]->experience != $expArr[$oldkey] || $skillAssocArray[$key]->lastMonth != $mnthArr[$oldkey] ||
								 $skillAssocArray[$key]->lastYear != $yrArr[$oldkey] ||
								 implode(',', $skillAssocArray[$key]->projects) != implode(',', $prjtArrOld[$oldkey])){

								$userSkillDetail = $em->find('Entities\\UserSkillsDetail', $updateSkill);
								$skillObj = $em->find('Entities\\Skills', $skillAssocArray[$key]->skillId);
								$levelObj = $em->find('Entities\\Level', $skillAssocArray[$key]->levelId);

								$userSkillDetail->setSkill($skillObj);
								$userSkillDetail->setExpMonths($skillAssocArray[$key]->experience);
								$userSkillDetail->setDateUpdated(new DateTime());
								$userSkillDetail->setLevel($levelObj);
								$userSkillDetail->setLastUsedMonth($this->months[$skillAssocArray[$key]->lastMonth]);
								$userSkillDetail->setLastUsedYear($skillAssocArray[$key]->lastYear);
								$userSkillDetail->setDateCreated(new DateTime());
								$userSkillDetail->setDateUpdated(new DateTime());
								$userSkillDetail->setUser($user);
								$userSkillDetail->setIsVerified(0);
								$em->persist($userSkillDetail);

								if(count($userSkillDetail->getProjectDetail()) > 0){
									foreach($userSkillDetail->getProjectDetail() as $deleteProject){
										$em->remove($deleteProject);
									}
								}

								if(count($skillAssocArray[$key]->projects) > 0){
									foreach($skillAssocArray[$key]->projects as $addProject){
										$projectDetail = new \Entities\ProjectDetail();
										$projectDetail->setUserSkillDetail($userSkillDetail);
										$projectDetail->setProject($em->find('Entities\\Projects', $addProject));
										$em->persist($projectDetail);
									}
								}
								$changedData['skill'][] = $updateSkill;
							}
						}
					}
					if($formData['userId'] != 0)
						$user = $em->find('Entities\\Users', $formData['userId']);

					// delete skills
					foreach($user->getUserSkillDetail() as $userSkillDetail){
						if(in_array($userSkillDetail->getUserSkillsDetailId(), $toDeleteSkill)){
							$projectDetails = $userSkillDetail->getProjectDetail();
							foreach($projectDetails as $prjtDetails){
								$em->remove($prjtDetails);
							}
							$em->remove($userSkillDetail);
						}
					}

					foreach($user->getEmployeeActivity() as $empActivity){
						if($empActivity->getActivityType() == 'update'){
							$employeeActivity = $empActivity;
							$existingChangedfield = unserialize($empActivity->getField());
							if(isset($existingChangedfield['contactDetails']))
								$changedData['contactDetails'] = $existingChangedfield['contactDetails'];
							// $em->remove($empActivity);
						}
					}

					// add new skills
					foreach($toAddSkill as $key => $newSkill){
						$userSkilDetail = new \Entities\UserSkillsDetail();
						if($skillAssocArray[$key]->skillId != 0 && $skillAssocArray[$key]->experience != 0 && $skillAssocArray[$key]->lastMonth != 0 &&
							 $skillAssocArray[$key]->lastYear != 0 && $skillAssocArray[$key]->levelId != 0){
								$skillObj = $em->find('Entities\\Skills', $skillAssocArray[$key]->skillId);
								$levelObj = $em->find('Entities\\Level', $skillAssocArray[$key]->levelId);

								$userSkilDetail->setSkill($skillObj);
								$userSkilDetail->setExpMonths($skillAssocArray[$key]->experience);
								$userSkilDetail->setDateUpdated(new DateTime());
								$userSkilDetail->setLevel($levelObj);
								$userSkilDetail->setLastUsedMonth($this->months[$skillAssocArray[$key]->lastMonth]);
								$userSkilDetail->setLastUsedYear($skillAssocArray[$key]->lastYear);
								$userSkilDetail->setDateCreated(new DateTime());
								$userSkilDetail->setDateUpdated(new DateTime());
								$userSkilDetail->setUser($user);
								$userSkilDetail->setIsVerified(0);
								$em->persist($userSkilDetail);
								foreach($skillAssocArray[$key]->projects as $v){
									if($v != '' && $v != 0){
										$projectDetail = new \Entities\ProjectDetail();
										$projectDetail->setUserSkillDetail($userSkilDetail);
										$projectDetail->setProject($em->find('Entities\\Projects', $v));
										$em->persist($projectDetail);
									}
								}
								//$em->flush();
								//$changedData['skill'][] = $userSkilDetail->getUserSkillsDetailId();
							}
						}
						$changedArr = array_filter(explode(",", $formData['changedVal']));

						if(count($changedArr) > 0){
							if(!isset($employeeActivity) || $employeeActivity == null){
								$employeeActivity = new \Entities\EmployeeActivity();
								$employeeActivity->setDateCreated(new DateTime());
							}
							$employeeActivity->setActivityType('update');
							if($employeeActivity->getIsOpened() == 0){
								if(isset($existingChangedfield['skill']))
									$changedData['skill'] = array_merge($existingChangedfield['skill'],$changedData['skill']);
								$employeeActivity->setField(serialize($changedData));
							}
							else{
								$employeeActivity->setField(serialize($changedData));
							}
							$employeeActivity->setIsOpened(0);
							$employeeActivity->setUser($user);
							$employeeActivity->setDateUpdated(new DateTime());
							$em->persist($employeeActivity);
						}
						$em->flush();
						$em->commit();
						$this->_helper->redirector('viewdetails', 'user');
					}
				}else{
					// $this->_helper->layout->disableLayout();
				}
			}catch(Exception $ex){
				echo "<pre>";
				print_r($ex);
				$em->rollback();
			}

			$this->view->user = $user;
			$this->view->userId = $userId;
			$this->view->isAdmin = $userSessionData->isAdmin;
			$this->view->userName = $userSessionData->userName;
			$this->view->firstName = $userSessionData->firstName;
			$this->view->lastName = $userSessionData->lastName;
			$this->view->skills = $skills;
			$this->view->skillRowCount = count($user->getUserSkillDetail()) > 0 ? count($user->getUserSkillDetail()) : 5;
			$this->view->experience = $configObj->experience->months;
			$this->view->month = $this->months;
			$this->view->year = $configObj->used->year;
			$this->view->level = $level;
			$this->view->project = $project;
			$this->view->skillForm = $skillForm;
		}

		/**
		 * To save and update user profile
		 *
		 * @author njaiswal
		 */
		public function updateprofileAction(){
			$userId = $this->getRequest()->getParam('userId');
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			$configObj = Zend_Registry::get("config");
			$em = Zend_Registry::get("em");
			$profileForm = new Form_ProfileForm();
			$user = $em->find('Entities\\Users', $userSessionData->userId);

			$profileForm->firstName->setValue($user->getFirstName());
			$profileForm->lastName->setValue($user->getLastName());
			$profileForm->empId->setValue($user->getEmpId());
			$profileForm->tel->setValue($user->getPhoneNumber());
			if(count($user->getUserDetail()) > 0){
				$profileForm->totalYears->setValue($user->getUserDetail()->getExpYears());
				$profileForm->totalMonths->setValue($user->getUserDetail()->getExpMonths());
				$profileForm->position->setValue($user->getUserDetail()->getPosition()->getPositionId());
				$profileForm->presentaddress->setValue($user->getUserDetail()->getPresentAddress());
				$profileForm->presentcity->setValue($user->getUserDetail()->getPresentCity());
				$profileForm->presentpincode->setValue($user->getUserDetail()->getPresentPincode());
				$profileForm->permanentaddress->setValue($user->getUserDetail()->getPermanentAddress());
				$profileForm->permanentcity->setValue($user->getUserDetail()->getPermanentCity());
				$profileForm->permanentpincode->setValue($user->getUserDetail()->getPermanentPincode());
			}
			if(count($user->getUserDetail())>0 &&  count($user->getUserDetail()->getMainTechnology())>0)
				$profileForm->mainTechnology->setValue($user->getUserDetail()->getMainTechnology()->getId());
			if(count($user->getUserDetail())>0 && count($user->getUserDetail()->getCareerStarted())>0)
				$profileForm->careerStarted->setValue($user->getUserDetail()->getCareerStarted()->format('Y-m-d'));
			if(count($user->getUserDetail())>0 &&  count($user->getUserDetail()->getCareerSynergy())>0)
				$profileForm->careerSynergy->setValue($user->getUserDetail()->getCareerSynergy()->format('Y-m-d'));
			if(count($user->getUserDetail())>0 && count($user->getUserDetail()->getBirthday())>0)
				$profileForm->birthday->setValue($user->getUserDetail()->getBirthday()->format('Y-m-d'));
			if(count($user->getUserDetail())>0 &&  count($user->getUserDetail()->getPresentState())>0)
				$profileForm->presentstate->setValue($user->getUserDetail()->getPresentState()->getId());
			if(count($user->getUserDetail())>0 &&  count($user->getUserDetail()->getPermanentState())>0)
				$profileForm->permanentstate->setValue($user->getUserDetail()->getPermanentState()->getId());

			$positionQuery = $em->createQuery('select p.position,p.positionId from Entities\\Position p order by p.position asc');
			$position = $positionQuery->getResult();

			$mainTechnologyQuery = $em->createQuery('select mt.technology,mt.id from Entities\\Technology mt order by mt.technology asc');
			$mainTechnology = $mainTechnologyQuery->getResult();

			$state = $em->createQuery('select s.state,s.id from Entities\\State s order by s.state asc');
			$state = $state->getResult();

			$em->beginTransaction();
			try{
				if($this->getRequest()->isPost()){
					$formData = $this->_request->getPost();
					/*
					 * if(!empty($formData['email'])) $formData['email'] =
					 * $formData['email'].'@synergytechservices.com';
					 */
					if($profileForm->isValid($formData)){

						if($formData['userId'] != 0)
							$user = $em->find('Entities\\Users', $formData['userId']);

						$user->setFirstName(ucfirst($formData['firstName']));
						$user->setlastName(ucfirst($formData['lastName']));
						$user->setEmpId($formData['empId']);
						$user->setPhoneNumber($formData['tel']);
						$changedFields = array();
						$existingChangedfield = array();
						foreach($user->getEmployeeActivity() as $empActivity){
							if($empActivity->getActivityType() == 'update'){
								$employeeActivity = $empActivity;
								$existingChangedfield = unserialize($empActivity->getField());
								if(isset($existingChangedfield['skill']))
									$changedFields['skill'] = $existingChangedfield['skill'];
								//$existingChangedfield = $existingChangedfield['contactDetails'];
							}
						}

						$userDetail = $user->getUserDetail();
						if(count($userDetail) == 0){
							$userDetail = new \Entities\UserDetail();
							$userDetail->setDateCreated(new DateTime());
						}else{
							$userDetail->setDateUpdated(new DateTime());
						}
						$technologyObj=$em->find('Entities\\Technology', $formData['mainTechnology']);
						$presentstate=$em->find('Entities\\State', $formData['presentstate']);
						$permanentstate=$em->find('Entities\\State', $formData['permanentstate']);
						$positionObj = $em->find('Entities\\Position', $formData['position']);
						$userDetail->setExpMonths($formData['totalMonths']);
						$userDetail->setExpYears($formData['totalYears']);
						$userDetail->setPosition($positionObj);
						$userDetail->setUser($user);
						$userDetail->setCareerSynergy(new DateTime($formData['careerSynergy']));
						$userDetail->setCareerStarted(new DateTime($formData['careerStarted']));
						$userDetail->setBirthday(new DateTime($formData['birthday']));
						$userDetail->setMainTechnology($technologyObj);
						$userDetail->setUser($user);
						$userDetail->setPresentAddress($formData['presentaddress']);
						$userDetail->setPresentCity($formData['presentcity']);
						$userDetail->setPresentState($presentstate);
						$userDetail->setPresentPincode($formData['presentpincode']);
						$userDetail->setPermanentAddress($formData['permanentaddress']);
						$userDetail->setPermanentCity($formData['permanentcity']);
						$userDetail->setPermanentState($permanentstate);
						$userDetail->setPermanentPincode($formData['permanentpincode']);

						if($formData['changedVal'] != ''){
							$changedFields['contactDetails'] = explode(',', $formData['changedVal']);
							if(!isset($employeeActivity) || $employeeActivity == null){
								$employeeActivity = new \Entities\EmployeeActivity();
								$employeeActivity->setDateCreated(new DateTime());
							}
							$employeeActivity->setActivityType('update');
							if($employeeActivity->getIsOpened() == 0){
								if(isset($existingChangedfield['contactDetails']))
									$changedFields['contactDetails'] = array_merge($existingChangedfield['contactDetails'],$changedFields['contactDetails']);
								$employeeActivity->setField(serialize($changedFields));
							}
							else{
								$employeeActivity->setField(serialize($changedFields));
							}
							$employeeActivity->setIsOpened(0);
							$employeeActivity->setUser($user);
							$employeeActivity->setDateUpdated(new DateTime());
							$em->persist($employeeActivity);
						}
						$em->persist($userDetail);
						$user->setUserDetail($userDetail);
						$em->persist($user);
						$em->flush();
						$em->commit();
						$userSessionData->firstName = $user->getFirstName();
						$this->_helper->redirector('viewdetails', 'user');
					}
				}else{
					// $this->_helper->layout->disableLayout();
				}
			}catch(Exception $ex){
				echo "<pre>";
				print_r($ex);
				$em->rollback();
			}

			$this->view->user = $user;
			$this->view->userId = $userId;
			$this->view->isAdmin = $userSessionData->isAdmin;
			$this->view->userName = $userSessionData->userName;
			$this->view->firstName = $userSessionData->firstName;
			$this->view->lastName = $userSessionData->lastName;
			$this->view->position = $position;
			$this->view->mainTechnology =$mainTechnology;
			$this->view->state=$state;
			$this->view->experience = $configObj->experience->year;
			$this->view->month = $this->months;
			$this->view->year = $configObj->used->year;
			$this->view->profileForm = $profileForm;
		}

		/**
		 * Validates for existing email id
		 *
		 * @author njaiswal
		 */
		public function validateemailAction(){
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			if($this->getRequest()->isPost()){
				try{
					$data = json_decode($_POST["data"]);
					$data->email = $data->email . '@synergytechservices.com';

					$em = Zend_Registry::get("em");
					$qb = $em->createQueryBuilder();
					$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.email = ?1')->setParameter(1, $data->email);
					if(isset($userSessionData->userId)){
						$qb->andWhere('u.userId != ?2')->setParameter(2, $userSessionData->userId);
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
		 * Validates for existing employee id
		 *
		 * @author njaiswal
		 */
		public function validateempidAction(){
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			if($this->getRequest()->isPost()){
				try{
					$data = json_decode($_POST["data"]);
					$em = Zend_Registry::get("em");
					$qb = $em->createQueryBuilder();
					$qb->select('u')->from('Entities\\Users', 'u')->andWhere('u.empId = ?1')->setParameter(1, $data->empId);
					if(isset($userSessionData->userId)){
						$qb->andWhere('u.userId != ?2')->setParameter(2, $userSessionData->userId);
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

		public function forgotpasswordAction(){
			// @todo forgot password screen
		}

		public function applyforaleaveAction(){
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			$this->view->userId = $userSessionData->userId;
			$this->view->isAdmin = $userSessionData->isAdmin;
			$this->view->userName = $userSessionData->userName;
			$this->view->firstName = $userSessionData->firstName;
			$this->view->lastName = $userSessionData->lastName;
		}

		public function reportAction(){
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
			$report_Service= new Service_Report();
			$UName=$userSessionData->firstName.' '.$userSessionData->lastName;
			$userQuery=$sqlsrvEm->createQuery("select e.redbr from Entities\\Emp e where e.name='".$UName."'");
			$userArr = $userQuery->getResult();
			$Month = $this->getRequest()->getParam('Month',date('m'));
			$Year = $this->getRequest()->getParam('Year',date('Y'));
			$sort_by = $this->getRequest()->getParam('sort_by');
			if(strlen((string) $Month)!=2){
				$Month='0'.$Month;
			}
			$startDate=$Year.'-'.$Month.'-01';
			$endDate=$Month==12?($Year+1).'-01-01':$Year.'-'.($Month+1).'-01';
			$userId =$userArr[0]['redbr'];
			$TimeDetails=array();
			$TimeDetails=$report_Service->getReport($userId,$startDate,$endDate);
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
			$this->view->userId = $userId;
			$this->view->uName= $UName;
			$this->view->Year=$Year;
			$this->view->Month=$Month;
			$userSessionData->uName=isset($this->view->uName)?$this->view->uName:'';
			$this->view->isAdmin = $userSessionData->isAdmin;
			$this->view->userName = $userSessionData->userName;
			$this->view->firstName = $userSessionData->firstName;
			$this->view->TimeDetails = $TimeDetails;
		}

		public function reportdetailAction()
		{
			$this->_helper->layout->disableLayout();
			$layout = $this->_helper->layout();
			$layout->setLayout('modallayout');
			$report_Service= new Service_Report();
			$userId = $this->getRequest()->getParam('userId');
			$date = $this->getRequest()->getParam('Date');
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			$DetailsArr=array();
			$DetailsArr=$report_Service->getReportDetails($userId,$date);
			$this->view->uName=	$userSessionData->uName;
			$this->view->date=$date;
			$this->view->userId = $userId;
			$this->view->isAdmin = $userSessionData->isAdmin;
			$this->view->userName = $userSessionData->userName;
			$this->view->firstName = $userSessionData->firstName;
			$this->view->DetailsArr=$DetailsArr;
		}
	}