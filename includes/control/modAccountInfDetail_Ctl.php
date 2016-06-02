<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(($_REQUEST['dateOfBirthMem'] != "") and (isset($_SESSION['mLoginID'])))
{
	$mFunc = new MainFunction();
	$dFunc = new DateFunction();
	$mQuery = new MainQuery();
	
	$memberPassword = $mFunc->chgSpecialCharInputText($_REQUEST['memberPassword']);
	
	$sql = "select memberID from member_login where memberID=".$_SESSION['mLoginID']." and member_password='".$memberPassword."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num > 0)
	{		
		$dateOfBirthMem = $mFunc->chgSpecialCharInputText($_REQUEST['dateOfBirthMem']);
		$dateOfBirthMem = $dFunc->chgDateChrisStyle($dateOfBirthMem);
		$genderMem = $mFunc->chgSpecialCharInputNumber($_REQUEST['genderMem']);
		$statusMem = $mFunc->chgSpecialCharInputNumber($_REQUEST['statusMem']);
		$strFileName = $mFunc->uploadOneFile($textFilePath, "pictureMem", "memberPicture");
		$newPassMem = $mFunc->chgSpecialCharInputText($_REQUEST['newPassMem']);
		$memberName = $mFunc->chgSpecialCharInputText($_REQUEST['memberName']);
		$memberSurName = $mFunc->chgSpecialCharInputText($_REQUEST['memberSurName']);
		$memberAddress = $mFunc->chgSpecialCharInputText($_REQUEST['memberAddress']);
		$memberSoi = $mFunc->chgSpecialCharInputText($_REQUEST['memberSoi']);
		$memberStreet = $mFunc->chgSpecialCharInputText($_REQUEST['memberStreet']);
		$memberCity = $mFunc->chgSpecialCharInputNumber($_REQUEST['memberCity']);
		$memberAmphor = $mFunc->chgSpecialCharInputNumber($_REQUEST['memberAmphor']);
		$memberTumbon = $mFunc->chgSpecialCharInputNumber($_REQUEST['memberTumbon']);
		$memberPostalCode = $mFunc->chgSpecialCharInputText($_REQUEST['memberPostalCode']);
		$memberTel = $mFunc->chgSpecialCharInputText($_REQUEST['memberTel']);
		$memberExt = $mFunc->chgSpecialCharInputText($_REQUEST['memberExt']);
		$memberMobile = $mFunc->chgSpecialCharInputText($_REQUEST['memberMobile']);
		$memberNewEmail = $mFunc->chgSpecialCharInputText($_REQUEST['memberNewEmail']);
		
			
		$sql = "update member_detail set dateOfBirth='".$dateOfBirthMem."'";
		$sql = $sql.", bsex=".$genderMem."";
		$sql = $sql.", marriedStatus=".$statusMem."";
		$sql = $sql.", bname='".$memberName."'";
		$sql = $sql.", blastname='".$memberSurName."'";
		$sql = $sql.", gcaddress='".$memberAddress."'";
		$sql = $sql.", gcsoi='".$memberSoi."'";
		$sql = $sql.", gcroad='".$memberStreet."'";
		$sql = $sql.", gctumbon='".$memberTumbon."'";
		$sql = $sql.", gcamphor='".$memberAmphor."'";
		$sql = $sql.", gcprovince=".$memberCity."";
		$sql = $sql.", gcpostcode='".$memberPostalCode."'";
		$sql = $sql.", btelephone='".$memberTel."'";
		$sql = $sql.", btelephoneext='".$memberExt."'";
		$sql = $sql.", bmobile='".$memberMobile."'";
		
		if($memberNewEmail != '-')
		{
			$sql = $sql.", bemail='".$memberNewEmail."'";
		}
		
		$sql = $sql." where memberID=".$_SESSION['mLoginID'];
		$mQuery->querySQL($sql);
		
		
		if($strFileName != '-')
		{
			$sql = "update member_picture set pictureName1='".$strFileName."' where memberID=".$_SESSION['mLoginID'];
			$mQuery->querySQL($sql);
		}
		
		
		if($newPassMem != '-')
		{
			$sql = "update member_login set member_password='".$newPassMem."' where memberID=".$_SESSION['mLoginID'];
			$mQuery->querySQL($sql);
		}
		
		header("location:../../index.php?flag=member&flagMember=accountinf&chgOK=1");
	}
	else
	{
		header("location:../../index.php?flag=member&flagMember=accountinf&PErr=1");
	}
	
	unset($mFunc, $dFunc, $mQuery);
}
else
{
	header("location:../../index.php");
}
?>