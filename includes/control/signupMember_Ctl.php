<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['signEmail'] != "")
{
	if(true) 
	{
		$dFunc = new DateFunction();
	
		$dateNow = $dFunc->getDateChris();
		$timeNow = $dFunc->getTimeNow();
		
		$mFunc = new MainFunction();
		$mQuery = new MainQuery();
		$mSample = new TheSampleFunction();
		
		$signEmail = $mFunc->chgSpecialCharInputText($_REQUEST['signEmail']);
		$signProvince = $mFunc->chgSpecialCharInputNumber($_REQUEST['signProvince']);
		$signPassword = $mFunc->chgSpecialCharInputText($_REQUEST['signPassword']);		
		
		
		$sql = "select bemail from member_detail where bemail='".$signEmail."'";
		$num = $mQuery->checkNumRows($sql);
		
		if($num == 0)
		{
			$startPoint = $mSample->getTopicPoint(1);
			
			$sql = "select memberID from member_detail order by memberID desc";
			$memberID = $mQuery->getNewPrimaryID($sql, "memberID");
			
			$sql = "insert into member_detail values(".$memberID."";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", 1";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", ".$signProvince."";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", ".$signProvince."";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '".$signEmail."'";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", 1";
			$sql = $sql.")";
			$mQuery->querySQL($sql);
			
			$sql = "insert into member_login values(".$memberID."";
			$sql = $sql.", '".$signEmail."'";
			$sql = $sql.", '".$signPassword."'";
			$sql = $sql.", 0";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", 1";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", 1";
			$sql = $sql.")";
			$mQuery->querySQL($sql);
			
			$sql = "insert into member_point values(".$memberID."";
			$sql = $sql.", ".$startPoint."";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", 1";
			$sql = $sql.")";
			$mQuery->querySQL($sql);
			
			$sql = "insert into member_point_history values(NULL";
			$sql = $sql.", ".$memberID."";
			$sql = $sql.", ".$startPoint."";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", 0";
			$sql = $sql.", 1";
			$sql = $sql.", 0";
			$sql = $sql.", '-'";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", 1";
			$sql = $sql.")";
			$mQuery->querySQL($sql);
			
			$sql = "insert into member_picture values(".$memberID."";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.", '-'";
			$sql = $sql.")";
			$mQuery->querySQL($sql);
			
			unset($mFunc, $mQuery, $dFunc);
			header("location:../../index.php?flag=signupOK");
		}
		else
		{
			unset($mFunc, $mQuery, $dFunc);
			header("location:../../index.php?flag=signup&errMail=1");
		}
	}
	else
	{
		header("location:../../index.php?flag=signup&errSec=1");
	}
}
else
{
	header("location:../../index.php");
}
?>