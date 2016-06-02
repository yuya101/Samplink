<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['addSubCatName'] != "")
{
	$dFunc = new DateFunction();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	//$timeStamp = $dFunc->changeTimeToHHMMSS($timeNow);
	
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$addMainCatID = $mFunc->chgSpecialCharInputNumber($_REQUEST['addMainCatID']);
	$addSubCatName = $mFunc->chgSpecialCharInputText($_REQUEST['addSubCatName']);
	$addSubCatDetail = $mFunc->chgSpecialCharInputText($_REQUEST['addSubCatDetail']);
	
	$sql = "select subcatID from product_subcategory where subcatName='".$addSubCatName."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$strFileName = $mFunc->uploadOneFile($textFilePath, "addSubCatPic", "subCatPicture");
	
		$sql = "select subcatID from product_subcategory order by subcatID desc";
		$subcatID = $mQuery->getNewPrimaryID($sql, "subcatID");
		
		$sql = "insert into product_subcategory values(".$subcatID."";
		$sql = $sql.", ".$addMainCatID."";
		$sql = $sql.", '".$addSubCatName."'";
		$sql = $sql.", '".$addSubCatDetail."'";
		$sql = $sql.", '".$strFileName."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		$_SESSION['formComplete'] = base64_encode($addSubCatName);
		session_write_close();

		header("location:../../admin.php?p=addSubCategory");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($addSubCatName);
		session_write_close();
		
		header("location:../../admin.php?p=addSubCategory");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>