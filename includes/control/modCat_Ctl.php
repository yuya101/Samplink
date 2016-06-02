<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['modCatID'] != "")
{
	$mFunc = new MainFunction();
	$modCatID = $mFunc->chgSpecialCharInputText($_REQUEST['modCatID']);
	
	if(true)
	{
		$dFunc = new DateFunction();
		
		$dateNow = $dFunc->getDateChris();
		$timeNow = $dFunc->getTimeNow();
		
		$mQuery = new MainQuery();
		
		$modMainTypeID = $mFunc->chgSpecialCharInputText($_REQUEST['modMainTypeID']);
		$modCatName = $mFunc->chgSpecialCharInputText($_REQUEST['modCatName']);		
		$sql = "select catID from product_category where catName='".$modCatName."' and catID!=".$modCatID;
		$num = $mQuery->checkNumRows($sql);
		
		if($num == 0)
		{
			$modCatDetail = $mFunc->chgSpecialCharInputText($_REQUEST['modCatDetail']);
			$strFileName = $mFunc->uploadAndDeleteOneFile($textFilePath, "modCatPic", "catPicture", $_REQUEST['modCatPicShow']);
			
			$sql = "update product_category set catName='".$modCatName."'";
			$sql = $sql.", catDetail='".$modCatDetail."'";
			$sql = $sql.", typeID='".$modMainTypeID."'";
			
			if($strFileName != '-')
			{
				$sql = $sql.", catPicture='".$strFileName."'";
			}
			
			$sql = $sql.", moddate='".$dateNow."'";
			$sql = $sql.", modtime='".$timeNow."'";
			$sql = $sql.", modid=".$_SESSION['memberID']."";
			$sql = $sql." where catID=".$modCatID;
			$mQuery->querySQL($sql);
			
			$modCatDesc = $mFunc->chgSpecialCharInputText($_REQUEST['modCatDesc1']);
			
			$sql = "update product_cat_header set header1='".$modCatDesc."'";
			
			for($i=2; $i<=20; $i++)
			{
				$modCatDesc = $mFunc->chgSpecialCharInputText($_REQUEST['modCatDesc'.$i]);
				$sql = $sql.", header".$i."='".$modCatDesc."'";	
			}
			
			$sql = $sql." where catID=".$modCatID;
			$mQuery->querySQL($sql);
			
			unset($mQuery, $dFunc);


			$_SESSION['formComplete'] = base64_encode($modCatName);
			$_SESSION['mainCatID'] = base64_encode($modCatID);
			session_write_close();

			header("location:../../admin.php?p=editCategory");
		}
		else
		{
			unset($mQuery, $dFunc);
			
			$_SESSION['formError'] = base64_encode($modCatName);
			$_SESSION['mainCatID'] = base64_encode($modCatID);
			session_write_close();
			
			header("location:../../admin.php?p=editCategory");
		}		
	}
	
	unset($mFunc);
}
else
{
	header("location:../../admin.php");
}
?>