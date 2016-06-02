<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['modSubCatID'] != "")
{
	$mFunc = new MainFunction();
	$modSubCatID = $mFunc->chgSpecialCharInputText($_REQUEST['modSubCatID']);
	
	if(true)
	{
		$dFunc = new DateFunction();
		
		$dateNow = $dFunc->getDateChris();
		$timeNow = $dFunc->getTimeNow();
		
		$mQuery = new MainQuery();
		
		$modSubCatName = $mFunc->chgSpecialCharInputText($_REQUEST['modSubCatName']);		
		$sql = "select subcatID from product_subcategory where subcatName='".$modSubCatName."' and subcatID!=".$modSubCatID;
		$num = $mQuery->checkNumRows($sql);
		
		if($num == 0)
		{
			$modMainCatID = $mFunc->chgSpecialCharInputText($_REQUEST['modMainCatID']);
			$modSubCatDetail = $mFunc->chgSpecialCharInputText($_REQUEST['modSubCatDetail']);
			$strFileName = $mFunc->uploadAndDeleteOneFile($textFilePath, "modSubCatPic", "subCatPicture", $_REQUEST['modSubCatPicShow']);
			
			$sql = "update product_subcategory set catID=".$modMainCatID."";
			$sql = $sql.", subcatName='".$modSubCatName."'";
			$sql = $sql.", subcatDetail='".$modSubCatDetail."'";
			
			if($strFileName != '-')
			{
				$sql = $sql.", subcatPicture='".$strFileName."'";
			}
			
			$sql = $sql.", moddate='".$dateNow."'";
			$sql = $sql.", modtime='".$timeNow."'";
			$sql = $sql.", modid=".$_SESSION['memberID']."";
			$sql = $sql." where subcatID=".$modSubCatID;
			$mQuery->querySQL($sql);
			
			unset($mQuery, $dFunc);
			
			$_SESSION['formComplete'] = base64_encode($modSubCatName);
			$_SESSION['mainSubCatID'] = base64_encode($modSubCatID);
			session_write_close();

			header("location:../../admin.php?p=editSubCategory");
		}
		else
		{
			unset($mQuery, $dFunc);
			
			$_SESSION['formError'] = base64_encode($modSubCatName);
			$_SESSION['mainSubCatID'] = base64_encode($modSubCatID);
			session_write_close();
			
			header("location:../../admin.php?p=editSubCategory");
		}		
	}
	
	unset($mFunc);
}
else
{
	header("location:../../admin.php");
}
?>