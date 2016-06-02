<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");
require($classPath."authenticate.php");

if($_REQUEST['loginName'] != "")
{
	$mFunc = new MainFunction();
	
	$loginName = $mFunc->chgSpecialCharInputText($_REQUEST['loginName']);
	$loginPass = $mFunc->chgSpecialCharInputText($_REQUEST['loginPass']);
	
	
	$dbQuery = new Authenticate();
	
	//$sql = "select memberID from member_login where member_login='".$loginName."' and member_password='".$loginPass."' and member_activate=1";
	$sql = "select memberID from member_login where member_login='".$loginName."' and member_password='".$loginPass."'";
	$num = $dbQuery->activeLogin($sql, 'memberID');
	
	if($num > 0)
	{
		$_SESSION['mLoginID'] = $dbQuery->aid;
		session_write_close();
		
		unset($dbQuery, $mFunc, $loginName, $loginPass);
		header("location:../../index.php?flag=member&flagMember=notification");
	}
	else
	{
		unset($dbQuery, $mFunc, $loginName, $loginPass);
		header("location:../../index.php?flag=login&errLog=1");
	}
}
else
{
	header("location:../../index.php");
}
?>