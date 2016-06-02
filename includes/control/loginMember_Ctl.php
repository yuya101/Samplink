<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");
require($classPath."authenticate.php");

if(isset($_REQUEST['uname']) and isset($_REQUEST['upass']))
{
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$uemail = strtolower($mFunc->chgSpecialCharInputText($_REQUEST['uname']));
	$upass = base64_encode($mFunc->chgSpecialCharInputText($_REQUEST['upass']));
	//$groupid = $mFunc->chgSpecialCharInputNumber($_REQUEST['groupid']);
	
	
	$dbQuery = new Authenticate();
	
	$sql = "select aid, ausername, groupid from admin where email='".$uemail."' and apass='".$upass."'";
	$num = $dbQuery->activeLogin($sql, 'aid');
	
	if($num > 0)
	{
		$_SESSION['memberID'] = (int)$dbQuery->aid;
		$_SESSION['memberName'] = $mQuery->getResultOneRecord($sql, "ausername");
		$_SESSION['memberGroup'] = (int)$mQuery->getResultOneRecord($sql, "groupid");

		session_write_close();
		
		unset($dbQuery, $mFunc, $mQuery, $uname, $upass);
		header("location:../../admin.php");
	}
	else
	{
		unset($dbQuery, $mFunc, $mQuery, $uname, $upass);
		header("location:../../login.php?errLog=1");
	}
}
else
{
	header("location:../../login.php");
}
?>