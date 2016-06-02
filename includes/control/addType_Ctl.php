<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['typeName'] != "")
{
	$dFunc = new DateFunction();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$typeName = $mFunc->chgSpecialCharInputText($_REQUEST['typeName']);
	$typeDetail = $mFunc->chgSpecialCharInputText($_REQUEST['typeDetail']);
	
	$sql = "select typeName from product_types where typeName='".$typeName."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$strFileName = $mFunc->uploadOneFile($textFilePath, "typePic", "typePicture");
	
		$sql = "select typeID from product_types order by typeID desc";
		$typeID = $mQuery->getNewPrimaryID($sql, "typeID");
		
		$sql = "insert into product_types values(".$typeID."";
		$sql = $sql.", '".$typeName."'";
		$sql = $sql.", '".$typeDetail."'";
		$sql = $sql.", '".$strFileName."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);

		
		$_SESSION['formComplete'] = base64_encode($typeName);
		session_write_close();

		header("location:../../admin.php?p=addTypes");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($typeName);
		session_write_close();
		
		header("location:../../admin.php?p=addTypes");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>