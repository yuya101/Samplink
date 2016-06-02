<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['catName'] != "")
{
	$dFunc = new DateFunction();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$addMainTypeID = $mFunc->chgSpecialCharInputText($_REQUEST['addMainTypeID']);
	$catName = $mFunc->chgSpecialCharInputText($_REQUEST['catName']);
	$catDetail = $mFunc->chgSpecialCharInputText($_REQUEST['catDetail']);
	
	$sql = "select catName from product_category where catName='".$catName."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$strFileName = $mFunc->uploadOneFile($textFilePath, "catPic", "catPicture");
	
		$sql = "select catID from product_category order by catID desc";
		$catID = $mQuery->getNewPrimaryID($sql, "catID");
		
		$sql = "insert into product_category values(".$catID."";
		$sql = $sql.", ".$addMainTypeID."";
		$sql = $sql.", '".$catName."'";
		$sql = $sql.", '".$catDetail."'";
		$sql = $sql.", '".$strFileName."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		
		$sql = "insert into product_cat_header values(".$catID."";
		
		for($i=0; $i<20; $i++)
		{
			$catDesc[$i] = "";
			$catDesc[$i] = $mFunc->chgSpecialCharInputText($_REQUEST['catDesc'.$i]);
			$sql = $sql.", '".$catDesc[$i]."'";
		}
		
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		$_SESSION['formComplete'] = base64_encode($catName);
		session_write_close();

		header("location:../../admin.php?p=addCategory");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($catName);
		session_write_close();
		
		header("location:../../admin.php?p=addCategory");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>