<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['modTypeID'] != "")
{
	$mFunc = new MainFunction();
	$modTypeID = $mFunc->chgSpecialCharInputText($_REQUEST['modTypeID']);
	
	if(true)
	{
		$dFunc = new DateFunction();
		
		$dateNow = $dFunc->getDateChris();
		$timeNow = $dFunc->getTimeNow();
		
		
		$mQuery = new MainQuery();
		
		
		$modTypeName = $mFunc->chgSpecialCharInputText($_REQUEST['modTypeName']);		
		$sql = "select typeID from product_types where typeName='".$modTypeName."' and typeID!=".$modTypeID;
		$num = $mQuery->checkNumRows($sql);
		
		if($num == 0)
		{
			$modTypeDetail = $mFunc->chgSpecialCharInputText($_REQUEST['modTypeDetail']);
			$strFileName = $mFunc->uploadAndDeleteOneFile($textFilePath, "modtypePic", "typePicture", $_REQUEST['modTypePicShow']);
			
			$sql = "update product_types set typeName='".$modTypeName."'";
			$sql = $sql.", typeDetail='".$modTypeDetail."'";
			
			if($strFileName != '-')
			{
				$sql = $sql.", typePicture='".$strFileName."'";
			}
			
			$sql = $sql.", moddate='".$dateNow."'";
			$sql = $sql.", modtime='".$timeNow."'";
			$sql = $sql.", modid=".$_SESSION['memberID']."";
			$sql = $sql." where typeID=".$modTypeID;
			
			$mQuery->querySQL($sql);
			
			unset($mQuery, $dFunc);

			$_SESSION['formComplete'] = base64_encode($modTypeName);
			$_SESSION['mainTypeID'] = base64_encode($modTypeID);
			session_write_close();

			header("location:../../admin.php?p=editProductTypes");
		}
		else
		{
			unset($mQuery, $dFunc);

			$_SESSION['formError'] = base64_encode($modTypeName);
			$_SESSION['mainTypeID'] = base64_encode($modTypeID);
			session_write_close();
			
			header("location:../../admin.php?p=editProductTypes");
		}		
	}
	
	unset($mFunc);
}
else
{
	header("location:../../admin.php");
}
?>