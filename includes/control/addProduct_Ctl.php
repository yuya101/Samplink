<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if($_REQUEST['addTypeProductID'] != "")
{
	$dFunc = new DateFunction();
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	$productName = $mFunc->chgSpecialCharInputText($_REQUEST['productName']);
	
	$sql = "select productID from product_main where productName='".$productName."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$sql = "select productID from product_main order by productID desc";
		$productID = $mQuery->getNewPrimaryID($sql, "productID");
				
		$addBrandProductID = $mFunc->chgSpecialCharInputNumber($_REQUEST['addBrandProductID']);
		$addTypeProductID = $mFunc->chgSpecialCharInputNumber($_REQUEST['addTypeProductID']);
		$addCatProductID = $mFunc->chgSpecialCharInputNumber($_REQUEST['addCatProductID']);
		$addSubCatProductID = $mFunc->chgSpecialCharInputNumber($_REQUEST['addSubCatProductID']);
		$productName = $mFunc->chgSpecialCharInputText($_REQUEST['productName']);
		$productCode = $mFunc->chgSpecialCharInputText($_REQUEST['productCode']);
		$productDetail = $mFunc->chgSpecialCharInputText($_REQUEST['productDetail']);
		$productPrice = $mFunc->chgSpecialCharInputText($_REQUEST['productPrice']);
		$productDiscount = $mFunc->chgSpecialCharInputText($_REQUEST['productDiscount']);
		$productQuantity = $mFunc->chgSpecialCharInputNumber($_REQUEST['productQuantity']);
		$productStatus = $mFunc->chgSpecialCharInputNumber($_REQUEST['productStatus']);
		$productStartDate = $mFunc->chgSpecialCharInputText($_REQUEST['productStartDate']);
		$productStartDate = $dFunc->chgDateChrisStyleNewStyle($productStartDate);	
		$productArrang = 1;
		$productState = 1;	
		
		$sql = "insert into product_main values(".$productID."";
		$sql = $sql.", ".$addBrandProductID."";
		$sql = $sql.", ".$addTypeProductID."";
		$sql = $sql.", ".$addCatProductID."";
		$sql = $sql.", ".$addSubCatProductID."";
		$sql = $sql.", '".$productName."'";
		$sql = $sql.", '".$productDetail."'";
		$sql = $sql.", ".$productPrice."";
		$sql = $sql.", '".$productDiscount."'";
		$sql = $sql.", ".$productQuantity."";
		$sql = $sql.", 0";
		$sql = $sql.", ".$productStatus."";
		$sql = $sql.", 0";
		$sql = $sql.", '".$productStartDate."'";
		$sql = $sql.", '-'";
		$sql = $sql.", '-'";
		$sql = $sql.", '".$productCode."'";
		$sql = $sql.", 1";
		$sql = $sql.", 1";
		$sql = $sql.", ".$productArrang."";
		$sql = $sql.", '-'";
		$sql = $sql.", 0";
		$sql = $sql.", ".$productState."";
		$sql = $sql.", 0";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		

		$sql = "insert into product_picture values(".$productID."";
		for($i=1; $i<=10; $i++)
		{			
			$strFileName = $mFunc->uploadMulitFile($textFilePath, "productPic", "productPicture", $i-1);
			$sql = $sql.", '".$strFileName."'";
		}
		$sql = $sql.")";
		$mQuery->querySQL($sql);

		echo $sql;
		
		
		$sql = "insert into product_cat_description values(".$productID."";
		for($i=1; $i<=20; $i++)
		{
			$productDesc = $mFunc->chgSpecialCharInputText($_REQUEST['catDetailDescLabel'.$i]);
			$sql = $sql.", '".$productDesc."'";
		}
		$sql = $sql.")";
		$mQuery->querySQL($sql);

		
		$_SESSION['formComplete'] = base64_encode($productName);
		session_write_close();

		header("location:../../admin.php?p=addProduct");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($productName);
		session_write_close();
		
		header("location:../../admin.php?p=addProduct");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>