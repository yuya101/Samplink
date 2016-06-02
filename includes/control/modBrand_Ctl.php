<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['modBrandID'] != "")
{
	$mFunc = new MainFunction();
	$modBrandID = $mFunc->chgSpecialCharInputText($_REQUEST['modBrandID']);
	
	if(true)
	{
		$dFunc = new DateFunction();
		
		$dateNow = $dFunc->getDateChris();
		$timeNow = $dFunc->getTimeNow();
		
		
		$mQuery = new MainQuery();
		
		$modbrandName = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandName']);

		$sql = "select brandID from product_brand where brandName='".$modbrandName."' and brandID!=".$modBrandID;
		$num = $mQuery->checkNumRows($sql);

		echo $sql;
		
		if($num == 0)
		{
			$modbrandAddress1 = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandAddress1']);
			$modbrandAddress2 = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandAddress2']);
			$modbrandTel = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandTel']);
			$modbrandFax = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandFax']);
			$modbrandWeb = $mFunc->chgSpecialCharInputText($_REQUEST['modbrandWeb']);
			$strFileName = $mFunc->uploadAndDeleteOneFile($textFilePath, "modbrandPic", "brandPicture", $_REQUEST['modBrandPicShow']);
			
			$sql = "update product_brand set brandName='".$modbrandName."'";
			$sql = $sql.", brandAddress1='".$modbrandAddress1."'";
			$sql = $sql.", brandAddress2='".$modbrandAddress2."'";
			$sql = $sql.", brandTel='".$modbrandTel."'";
			$sql = $sql.", brandFax='".$modbrandFax."'";
			$sql = $sql.", brandWebsite='".$modbrandWeb."'";
			
			if($strFileName != '-')
			{
				$sql = $sql.", brandPicture='".$strFileName."'";
			}
			
			$sql = $sql.", moddate='".$dateNow."'";
			$sql = $sql.", modtime='".$timeNow."'";
			$sql = $sql.", modid=".$_SESSION['memberID']."";
			$sql = $sql." where brandID=".$modBrandID;			
			$mQuery->querySQL($sql);
			
			unset($mQuery, $dFunc);

			$_SESSION['formComplete'] = base64_encode($modbrandName);
			$_SESSION['mainBrandID'] = base64_encode($modBrandID);
			session_write_close();

			header("location:../../admin.php?p=editProductBrand");
		}
		else
		{
			unset($mQuery, $dFunc);

			$_SESSION['formError'] = base64_encode($modbrandName);
			$_SESSION['mainBrandID'] = base64_encode($modBrandID);
			session_write_close();
			
			header("location:../../admin.php?p=editProductBrand");
		}		
	}
	
	unset($mFunc);
}
else
{
	header("location:../../admin.php");
}
?>