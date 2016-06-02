<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['brandName'] != "")
{
	$dFunc = new DateFunction();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	//$timeStamp = $dFunc->changeTimeToHHMMSS($timeNow);
	
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$brandName = $mFunc->chgSpecialCharInputText($_REQUEST['brandName']);
	$brandAddress1 = $mFunc->chgSpecialCharInputText($_REQUEST['brandAddress1']);
	$brandAddress2 = $mFunc->chgSpecialCharInputText($_REQUEST['brandAddress2']);
	$brandTel = $mFunc->chgSpecialCharInputText($_REQUEST['brandTel']);
	$brandFax = $mFunc->chgSpecialCharInputText($_REQUEST['brandFax']);
	$brandWeb = $mFunc->chgSpecialCharInputText($_REQUEST['brandWeb']);
	
	$sql = "select brandName from product_brand where brandName='".$brandName."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$strFileName = $mFunc->uploadOneFile($textFilePath, "brandPic", "brandPicture");
	
		$sql = "select brandID from product_brand order by brandID desc";
		$brandID = $mQuery->getNewPrimaryID($sql, "brandID");
		
		$sql = "insert into product_brand values(".$brandID."";
		$sql = $sql.", '".$brandName."'";
		$sql = $sql.", '".$brandAddress1."'";
		$sql = $sql.", '".$brandAddress2."'";
		$sql = $sql.", '".$brandTel."'";
		$sql = $sql.", '".$brandFax."'";
		$sql = $sql.", '".$brandWeb."'";
		$sql = $sql.", '".$strFileName."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		
		$_SESSION['formComplete'] = base64_encode($brandName);
		session_write_close();

		header("location:../../admin.php?p=addBrand");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($brandName);
		session_write_close();
		
		header("location:../../admin.php?p=addBrand");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>