<?php

class Service_Report {

	const In7 = '7 th in';
	const Out7 = '7 th out';
	const In3 = '3 rd in';
	const Out3 = '3 rd out';
	public function __construct($options = null){

	}
	public function getReportDetails_Repeat($userId,$date)
	{
		$TimeArr = array();
		$DetailsArr=array();
		$key=0;
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$DetailsQuery=$sqlsrvEm->createQuery("SELECT n.redbr,r.name, n.citac, n.vreme FROM Entities\\Nastani n INNER JOIN Entities\\Readers r with n.citac=r.redbr where n.korisnik=".$userId." and r.name in('".self::In7."','".self::Out7."','".self::In3."','".self::Out3."')  order by n.vreme ASC" );
		$DetailsQueryArr = $DetailsQuery->getArrayResult();
		foreach ($DetailsQueryArr as $row)
		{
			$cdate = $row['vreme']->format('d/m/Y');
			if ($cdate==$date)
			{
				$status=$row['name'];
				if($status== self::In7 || $status== self::In3 ){
					if(($oldkey==$key) && ($key != 0) && (!isset($TimeArr[$oldkey]['Exit']))){
						$TimeArr[$key]['Entry']=$row['vreme']->format('H:i:s');
						$TimeArr[$key++]['Exit']=$row['vreme']->format('H:i:s');
					}
					$TimeArr[$key]['Entry']=$row['vreme']->format('H:i:s');
					$oldkey=$key;
				}
				else if($status== self::Out7 || $status==self::Out3 ){
					if(!isset($TimeArr[$key]['Entry']))
						$TimeArr[$key]['Entry']=$row['vreme']->format('H:i:s');
					$TimeArr[$key++]['Exit']=$row['vreme']->format('H:i:s');
				}
			}
		}
		$key=0;
		foreach($TimeArr as $row){
			$DetailsArr[$key]['Entry']=$row['Entry'];
			$DetailsArr[$key]['Exit']=$row['Exit'];
			$DetailsArr[$key]['TimeSpent']=date("H:i:s",strtotime($row['Exit'])-strtotime($row['Entry']));
			if(isset($DetailsArr[$key-1]['Exit'])){
				$DetailsArr[$key]['TimeOut']=date("H:i:s",strtotime($row['Entry'])-strtotime($DetailsArr[$key-1]['Exit']));
			}
			$key++;
		}
		return $DetailsArr;
	}
	public function getReportDetails_Skip($userId,$date){
		$TimeArr = array();
		$DetailsArr=array();
		$key=0;
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$DetailsQuery=$sqlsrvEm->createQuery("SELECT n.redbr,r.name, n.citac, n.vreme FROM Entities\\Nastani n INNER JOIN Entities\\Readers r with n.citac=r.redbr where n.korisnik=".$userId." and r.name in('".self::In7."','".self::Out7."','".self::In3."','".self::Out3."')  order by n.vreme ASC" );
		$DetailsQueryArr = $DetailsQuery->getArrayResult();
		foreach ($DetailsQueryArr as $row)
		{
			$cdate = $row['vreme']->format('d/m/Y');
			if ($cdate==$date)
			{
				$status=$row['name'];
				if($status== self::In7 || $status== self::In3 ){
					$TimeArr[$key]['Entry']=$row['vreme']->format('H:i:s');
				}
				else if($status== self::Out7 || $status== self::Out3 ){
					$TimeArr[$key++]['Exit']=$row['vreme']->format('H:i:s');
				}
			}
		}
		$key=0;
		foreach($TimeArr as $row){
			if(empty($row['Entry']) || empty($row['Exit']) )
				continue;
			$DetailsArr[$key]['Entry']=$row['Entry'];
			$DetailsArr[$key]['Exit']=$row['Exit'];
			$DetailsArr[$key]['TimeSpent']=date("H:i:s",strtotime($row['Exit'])-strtotime($row['Entry']));
			if(isset($DetailsArr[$key-1]['Exit'])){
				$DetailsArr[$key]['TimeOut']=date("H:i:s",strtotime($row['Entry'])-strtotime($DetailsArr[$key-1]['Exit']));
			}
			$key++;
		}
		return $DetailsArr;

	}
	public function getReportDetails($userId,$date){
		$TimeArr = array();
		$DetailsArr=array();
		$key=0;
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$DetailsQuery=$sqlsrvEm->createQuery("SELECT n.redbr,r.name, n.citac, n.vreme FROM Entities\\Nastani n INNER JOIN Entities\\Readers r with n.citac=r.redbr where n.korisnik=".$userId." and r.name in('".self::In7."','".self::Out7."','".self::In3."','".self::Out3."')  order by n.vreme ASC" );
		$DetailsQueryArr = $DetailsQuery->getArrayResult();
		foreach ($DetailsQueryArr as $row)
		{
			$cdate = $row['vreme']->format('d/m/Y');
			if ($cdate==$date)
			{
				$status=$row['name'];
				if($status== self::In7 || $status== self::In3 ){
					if(empty($TimeArr[$key]['Entry']))
					$TimeArr[$key]['Entry']=$row['vreme']->format('H:i:s');
				}
				else if($status== self::Out7 || $status== self::Out3 ){
					if(empty($TimeArr[$key]['Entry']))
						$TimeArr[$key-1]['Exit']=$row['vreme']->format('H:i:s');
					else
					$TimeArr[$key++]['Exit']=$row['vreme']->format('H:i:s');
				}
			}
		}
		$key=0;
		foreach($TimeArr as $row){
			if(empty($row['Entry']) || empty($row['Exit']) )
				continue;
			$DetailsArr[$key]['Entry']=$row['Entry'];
			$DetailsArr[$key]['Exit']=$row['Exit'];
			$DetailsArr[$key]['TimeSpent']=date("H:i:s",strtotime($row['Exit'])-strtotime($row['Entry']));
			if(isset($DetailsArr[$key-1]['Exit'])){
				$DetailsArr[$key]['TimeOut']=date("H:i:s",strtotime($row['Entry'])-strtotime($DetailsArr[$key-1]['Exit']));
			}
			$key++;
		}
		return $DetailsArr;

	}
	public function getReport($userId,$startDate,$endDate,$selectedUsersNameArr=NULL){
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$selectedUsersIdArr= array();
		$access=true;
		if($selectedUsersNameArr != NULL){
			$access=false;
			foreach($selectedUsersNameArr as $selectedUsersName){
				$userQuery=$sqlsrvEm->createQuery("select e.redbr from Entities\\Emp e where e.name='".$selectedUsersName."'");
				$useridArr = $userQuery->getResult();
				if(isset($useridArr[0]['redbr'])){
					if($useridArr[0]['redbr']==$userId)
						$access=true;
					$selectedUsersIdArr[$useridArr[0]['redbr']]=$selectedUsersName;
				}
			}
		}
		$StatusQuery=$sqlsrvEm->createQuery("SELECT n.redbr,r.name, n.citac, n.vreme FROM Entities\\Nastani n INNER JOIN Entities\\Readers r with n.citac=r.redbr where n.korisnik=".$userId." and r.name in('".self::In7."','".self::Out7."','".self::In3."','".self::Out3."') and n.vreme >= '".$startDate."' and n.vreme < '".$endDate."'  order by n.vreme ASC" );
		$StatusArr = $StatusQuery->getArrayResult();
		$entryCountArr = array();
		$exitCountArr = array();
		$totalOutTimeArr=array();
		$dateArr= $this->getDatesFromRange($startDate, date('Y-m-d', strtotime($endDate.' -1 day')));
		$firstInTimeArr=array();
		$lastOutTimeArr=array();
		$cdate=0;
		foreach ($StatusArr as $row)
		{
			if($cdate != $row['vreme']->format('Y-m-d')){
				$entryCount=0;
				$exitCount=0;
				$firstInTime=0;
				$inTime=0;
				$outTime=0;
				$totalOutTime=0;
				$timeDiff=0;
			}
			$cdate = $row['vreme']->format('Y-m-d');
			//$dateArr[$cdate]=$cdate;
			$status=$row['name'];
			if($status== self::In7 || $status== self::In3 ){
				$firstInTimeArr[$cdate]=isset($firstInTimeArr[$cdate])?$firstInTimeArr[$cdate]:strtotime($row['vreme']->format('H:i:s'));
				$entryCountArr[$cdate] = ++$entryCount;
				if($outTime!=0)
				{
					$inTime=strtotime($row['vreme']->format('H:i:s'));
					if((isset($outtime_old) && ($outtime_old != $outTime))|| ($timeDiff==0) )
					{
						$timeDiff=$inTime-$outTime;
						$totalOutTime=$totalOutTime+$timeDiff;
					}
					$outtime_old=$outTime;
					$totalOutTimeArr[$cdate]=date('H:i:s',$totalOutTime);
				}
			}
			else if($status== self::Out7 || $status== self::Out3 ){
				$exitCountArr[$cdate] =++$exitCount;
				$outTime=strtotime($row['vreme']->format('H:i:s'));
				$lastOutTimeArr[$cdate]=$outTime;

			}
		}
		$TimeDetails=array();
		$key=0;
		foreach($dateArr as $key => $value)
		{
			$TimeDetails[$key]['Date']=$value;
			$TimeDetails[$key]['Day']=date('l',strtotime($value));
			$TimeDetails[$key]['First Event']=isset($firstInTimeArr[$value])?date("H:i:s",$firstInTimeArr[$value]):'';
			$TimeDetails[$key]['Last Event']=isset($lastOutTimeArr[$value])?date("H:i:s",$lastOutTimeArr[$value]):'';
			$TimeDetails[$key]['Entry']=isset($entryCountArr[$value])?$entryCountArr[$value]:'';
			if(!isset($firstInTimeArr[$value]) && !isset($lastOutTimeArr[$value])){
				$TimeDetails[$key]['Holiday']=$this->getHolidayType($value);
			}else{
				$TimeDetails[$key]['Exit']=isset($exitCountArr[$value])?$exitCountArr[$value]:'';
				$TimeDetails[$key]['Total Time']=isset($lastOutTimeArr[$value])  && isset($firstInTimeArr[$key]) ?(date("H:i:s",($lastOutTimeArr[$value]-$firstInTimeArr[$value]))):"00:00:00";
				$TimeDetails[$key]['Total Time Out']=isset($totalOutTimeArr[$value])?$totalOutTimeArr[$value]:'00:00:00';
				$TimeDetails[$key]['Net Working Hours']=(($TimeDetails[$key]['Total Time']<$TimeDetails[$key]['Total Time Out']) || $TimeDetails[$key]['Exit']==1) ?date("H:i:s",strtotime($TimeDetails[$key]['Total Time'])):date("H:i:s",strtotime($TimeDetails[$key]['Total Time'])-strtotime($TimeDetails[$key]['Total Time Out']));
			}
			$key++;
		}


		if($access)
			return $TimeDetails;
		else
			return "accessdenied";
	}

	public function getReportByDate($date,$endDate,$selectedUsersNameArr=NULL){
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$selectedUsersIdArr= array();

		if($selectedUsersNameArr != NULL){
		foreach($selectedUsersNameArr as $selectedUsersName){
			$userQuery=$sqlsrvEm->createQuery("select e.redbr from Entities\\Emp e where e.name='".$selectedUsersName."'");
			$useridArr = $userQuery->getResult();
			if(isset($useridArr[0]['redbr']))
			$selectedUsersIdArr[$useridArr[0]['redbr']]=$selectedUsersName;
		}
		}
		$StatusQuery = $sqlsrvEm->createQuery(
			"SELECT e.name as username, n.redbr,r.name, n.citac, n.korisnik,n.vreme FROM Entities\\Nastani n INNER JOIN Entities\\Readers r with n.citac=r.redbr INNER JOIN Entities\\Emp e with n.korisnik=e.redbr where  r.name in('".self::In7."','".self::Out7."','".self::In3."','".self::Out3."') and n.vreme >= '" .
			$date . "' and n.vreme < '" . $endDate . "'  order by n.korisnik ASC, n.vreme ASC");
		$StatusArr = $StatusQuery->getArrayResult();
		$qb = $sqlsrvEm->createQueryBuilder();
		$qb->select('e')->from('Entities\\Emp', 'e')->orderBy('e.name','ASC');
		$query = $qb->getQuery();
		$users = $query->getResult();
		$IDArr=array();
		foreach($users as $user){
			$IDArr[$user->getRedbr()]=$user->getName();
		}

		$entryCountArr = array();
		$exitCountArr = array();
		$totalOutTimeArr=array();
		$firstInTimeArr=array();
		$lastOutTimeArr=array();
		$ID=0;
		foreach ($StatusArr as $row)
		{

			if($ID != $row['korisnik']){
				$entryCount=0;
				$exitCount=0;
				$firstInTime=0;
				$inTime=0;
				$outTime=0;
				$totalOutTime=0;
				$timeDiff=0;
			}
			$ID = $row['korisnik'];
			//$IDArr[$row['korisnik']]=$row['username'];
			$status=$row['name'];
			if($status== self::In7 || $status== self::In3 ){
				$firstInTimeArr[$ID]=isset($firstInTimeArr[$ID])?$firstInTimeArr[$ID]:strtotime($row['vreme']->format('H:i:s'));
				$entryCountArr[$ID] = ++$entryCount;
				if($outTime!=0)
				{
					$inTime=strtotime($row['vreme']->format('H:i:s'));
					if((isset($outtime_old) && ($outtime_old != $outTime))|| ($timeDiff==0))
					{
						$timeDiff=$inTime-$outTime;
						$totalOutTime=$totalOutTime+$timeDiff;
					}
					$outtime_old=$outTime;
					$totalOutTimeArr[$ID]=date('H:i:s',$totalOutTime);
				}
			}
			else if($status== self::Out7 || $status== self::Out3 ){
				$exitCountArr[$ID] =++$exitCount;
				$outTime=strtotime($row['vreme']->format('H:i:s'));
				$lastOutTimeArr[$ID]=$outTime;

			}
		}
		$TimeDetails=array();
		$key=0;
		if($selectedUsersNameArr!=NULL)
		$IDArr=array_intersect_key($IDArr,$selectedUsersIdArr);

		asort($IDArr);
		foreach($IDArr as $key => $value)
		{
			$TimeDetails[$key]['User Name']=$value;
			$TimeDetails[$key]['ID']=$key;
			$TimeDetails[$key]['First Event']=isset($firstInTimeArr[$key])?date("H:i:s",$firstInTimeArr[$key]):'';
			$TimeDetails[$key]['Last Event']=isset($lastOutTimeArr[$key])?date("H:i:s",$lastOutTimeArr[$key]):'';
			$TimeDetails[$key]['Entry']=isset($entryCountArr[$key])?$entryCountArr[$key]:'';
			if(!isset($firstInTimeArr[$key]) && !isset($lastOutTimeArr[$key])){
				$TimeDetails[$key]['Holiday']=$this->getHolidayType($date);
			}else{
				$TimeDetails[$key]['Exit']=isset($exitCountArr[$key])?$exitCountArr[$key]:'';
				$TimeDetails[$key]['Total Time']=isset($lastOutTimeArr[$key]) && isset($firstInTimeArr[$key])?(date("H:i:s",($lastOutTimeArr[$key]-$firstInTimeArr[$key]))):"00:00:00";
				$TimeDetails[$key]['Total Time Out']=isset($totalOutTimeArr[$key])?$totalOutTimeArr[$key]:'00:00:00';
				$TimeDetails[$key]['Net Working Hours']=(($TimeDetails[$key]['Total Time']<$TimeDetails[$key]['Total Time Out']) || $TimeDetails[$key]['Exit']==1) ?date("H:i:s",strtotime($TimeDetails[$key]['Total Time'])):date("H:i:s",strtotime($TimeDetails[$key]['Total Time'])-strtotime($TimeDetails[$key]['Total Time Out']));
			}
			$key++;
		}
		return $TimeDetails;

	}

	public function searchReport($userId,$fromDate,$toDate){
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$endDate = date('Y-m-d', strtotime('+1 day', strtotime($toDate)));
		$resultArray=array();
		if($userId=='all'){
			$qb = $sqlsrvEm->createQueryBuilder();
			$qb->select('e')->from('Entities\\Emp', 'e')->orderBy('e.name','ASC');
			$query = $qb->getQuery();
			$users = $query->getResult();
			foreach($users as $user){
				$userreportData=$this->getUserReportData($user->getRedbr(),$fromDate,$endDate);
				$resultArray=array_merge($resultArray,$userreportData);
			}
		}
		else{
			$resultArray=$this->getUserReportData($userId,$fromDate,$endDate);
		}
		return $resultArray;
	}

	public function getUserReportData($userId,$fromDate,$endDate){
		$sqlsrvEm = Zend_Registry::get("sqlsrvEm");
		$resultArray=array();
		$data=$this->getReport($userId,$fromDate,$endDate);
		$userQuery=$sqlsrvEm->createQuery("select e.name from Entities\\Emp e where e.redbr='".$userId."'");
		$userNameArr = $userQuery->getResult();
		if(isset($userNameArr[0]['name']))
			$userName=$userNameArr[0]['name'];
		$dateCount=0;		;
		foreach($data as $row){
			$resultArray[$userName]['Name']=$userName;
			$resultArray[$userName]['Id']=$userId;
			$resultArray[$userName]['Total Time']=isset($resultArray[$userName]['Total Time'])?$this->sumTime($resultArray[$userName]['Total Time'], $row['Total Time']):$row['Total Time'];
			$resultArray[$userName]['Entry']=isset($resultArray[$userName]['Entry'])?$resultArray[$userName]['Entry']+$row['Entry']:$row['Entry'];
			$resultArray[$userName]['Exit']=isset($resultArray[$userName]['Exit'])?$resultArray[$userName]['Exit']+$row['Exit']:$row['Exit'];
			$resultArray[$userName]['Total Time Out']=isset($resultArray[$userName]['Total Time Out'])?$this->sumTime($resultArray[$userName]['Total Time Out'], $row['Total Time Out']):$row['Total Time Out'];
			$resultArray[$userName]['Net Working Hours']=isset($resultArray[$userName]['Net Working Hours'])?$this->sumTime($resultArray[$userName]['Net Working Hours'],$row['Net Working Hours']):$row['Net Working Hours'];
			$resultArray[$userName]['DateCount']=($row['Entry']==0 || $row['Entry']== '')? $dateCount :++$dateCount;
		}
		if(!empty($resultArray[$userName]['Entry']) && $resultArray[$userName]['Entry']!=Null && $resultArray[$userName]['Entry']!=''){
			$resultArray[$userName]['Avg Total Time']= $this->divideTime($resultArray[$userName]['Total Time'],$resultArray[$userName]['DateCount']);
			$resultArray[$userName]['Avg Entry']= round($resultArray[$userName]['Entry'] / $resultArray[$userName]['DateCount']);
			$resultArray[$userName]['Avg Exit']= round($resultArray[$userName]['Exit'] / $resultArray[$userName]['DateCount']);
			$resultArray[$userName]['Avg Total Time Out']= $this->divideTime($resultArray[$userName]['Total Time Out'],$resultArray[$userName]['DateCount']);
			$resultArray[$userName]['Avg Net Working Hours']= $this->divideTime($resultArray[$userName]['Net Working Hours'],$resultArray[$userName]['DateCount']);
		}else{
			$resultArray[$userName]['NoRecords']='No Records';
		}
		unset($resultArray[$userName]['DateCount']);
		return $resultArray;
	}

	function sumTime($time1, $time2) {
		$times = array($time1, $time2);
		$seconds = 0;
		foreach ($times as $time)
		{
			list($hour,$minute,$second) = explode(':', $time);
			$seconds += $hour*3600;
			$seconds += $minute*60;
			$seconds += $second;
		}
		$hours = floor($seconds/3600);
		$seconds -= $hours*3600;
		$minutes  = floor($seconds/60);
		$seconds -= $minutes*60;
		if($seconds < 9)
		{
			$seconds = "0".$seconds;
		}
		if($minutes < 9)
		{
			$minutes = "0".$minutes;
		}
		if($hours < 9)
		{
			$hours = "0".$hours;
		}
		return "{$hours}:{$minutes}:{$seconds}";
		}
	function divideTime($time1, $count) {
			$time_array = explode(':', $time1);
			$hours = (int)$time_array[0];
			$minutes = (int)$time_array[1];
			$seconds = (int)$time_array[2];

			$total_seconds = ($hours * 3600) + ($minutes * 60) + $seconds;

			$seconds = floor($total_seconds / $count);
			$hours = floor($seconds/3600);
			$seconds -= $hours*3600;
			$minutes  = floor($seconds/60);
			$seconds -= $minutes*60;
			if($seconds < 9)
			{
				$seconds = "0".$seconds;
			}
			if($minutes < 9)
			{
				$minutes = "0".$minutes;
			}
			if($hours < 9)
			{
				$hours = "0".$hours;
			}
			return "{$hours}:{$minutes}:{$seconds}";
		}
	function getDatesFromRange($start, $end){
			$dates = array();
			$dates[$start]=$start;
			while(end($dates) < $end){
				$nextdate=date('Y-m-d', strtotime(end($dates).' +1 day'));
				$dates[$nextdate] =$nextdate;
			}
			return $dates;
		}
	function getHolidayType($date){
		$em = Zend_Registry::get("em");
		$day=date('l',strtotime($date));
		$qb = $em->createQueryBuilder();
		$qb->select('h')->from('Entities\\Holiday', 'h');
		$query = $qb->getQuery();
		$holidays = $query->getResult();
		$dateObj=new DateTime($date);
		foreach($holidays as $key=>$value){
			if($dateObj==$value->getHolidayDate()){
				$description="Synergy Holiday - ".$value->getDescription();
			}
		}
		if($description!=null){
			return $description;
		}
		if($day=='Saturday' || $day=='Sunday'){
			return "Weekly off";
		}
		return "No Records";
	}

}