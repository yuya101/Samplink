<?php
ob_start();
session_start();

require("../class/autoload.php");

$dFunc = new DateFunction();
$mFunc = new MainFunction();
$mQuery = new MainQuery();
	
$dateNow = $dFunc->getDateChris();
$timeNow = $dFunc->getTimeNow();

if(isset($_SESSION['cart']) and isset($_SESSION['mLoginID']))
{
	$memberName = $mFunc->chgSpecialCharInputText($_REQUEST['memberName']);
	$memberSurName = $mFunc->chgSpecialCharInputText($_REQUEST['memberSurName']);
	$memberAddress = $mFunc->chgSpecialCharInputText($_REQUEST['memberAddress']);
	$memberSoi = $mFunc->chgSpecialCharInputText($_REQUEST['memberSoi']);
	$memberStreet = $mFunc->chgSpecialCharInputText($_REQUEST['memberStreet']);
	$memberTumbon = $mFunc->chgSpecialCharInputText($_REQUEST['memberTumbon']);
	$memberAmphor = $mFunc->chgSpecialCharInputText($_REQUEST['memberAmphor']);
	$memberCity = $mFunc->chgSpecialCharInputText($_REQUEST['memberCity']);
	$memberPostalCode = $mFunc->chgSpecialCharInputText($_REQUEST['memberPostalCode']);
	$memberTel = $mFunc->chgSpecialCharInputText($_REQUEST['memberTel']);
	$memberExt = $mFunc->chgSpecialCharInputText($_REQUEST['memberExt']);
	$memberMobile = $mFunc->chgSpecialCharInputText($_REQUEST['memberMobile']);
	
	$sql = "select rid from ordering order by rid desc";
	$rid = $mQuery->getNewPrimaryID($sql, "rid");
	
	$sql = "select orderNumber from order_count_number order by orderNumber desc";
	$orderNumber = $mQuery->getNewPrimaryID($sql, "orderNumber");
	
	$orderID = "SP".$dateNow.substr("0000".$orderNumber, -4, 4);  //------------ จำนวน 14 หลัก
	
	if(intval($orderNumber) == 9999)  // ตรวจสอบสำหรับกรณีที่เลขของใบราคาสินค้าเกิน 9999 หากเกินให้กลับไปเริ่มที่ 1
	{
		$orderNumber = intval($orderNumber) - 1;
		$sql = "update order_count_number set orderNumber=1 where orderNumber=".$orderNumber;
		$mQuery->querySQL($sql);
	}
	else
	{
		$orderNumber = intval($orderNumber) - 1;
		$sql = "update order_count_number set orderNumber=orderNumber+1 where orderNumber=".$orderNumber;
		$mQuery->querySQL($sql);
	}
	
	
	$sql = "select memberID from member_detail where memberID=".$_SESSION['mLoginID']." and bname!='-' and blastname!='-'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		$sql = "update member_detail set bname='".$memberName."'";
		$sql = $sql.", blastname='".$memberSurName."'";
		$sql = $sql.", gcaddress='".$memberAddress."'";
		$sql = $sql.", gcsoi='".$memberSoi."'";
		$sql = $sql.", gcroad='".$memberStreet."'";
		$sql = $sql.", gctumbon='".$memberTumbon."'";
		$sql = $sql.", gcamphor='".$memberAmphor."'";
		$sql = $sql.", gcprovince=".$memberCity."";
		$sql = $sql.", gcpostcode='".$memberPostalCode."'";
		$sql = $sql.", btelephone='".$memberTel."'";
		$sql = $sql.", btelephoneext='".$memberExt."'";
		$sql = $sql.", bmobile='".$memberMobile."'";
		$sql = $sql." where memberID=".$_SESSION['mLoginID'];
		$mQuery->querySQL($sql);
	}
	
	$allProQuan = $mFunc->chgSpecialCharInputNumber($_REQUEST['allProQuan']);
	$allProPrice = $mFunc->chgSpecialCharInputNumber($_REQUEST['allProPrice']);
	
	$sql = "update member_point set point_1=point_1-".$allProPrice." where memberID=".$_SESSION['mLoginID'];
	$mQuery->querySQL($sql);
	
	$sql = "insert into member_point_history values(NULL";
	$sql = $sql.", ".$_SESSION['mLoginID']."";
	$sql = $sql.", 0";
	$sql = $sql.", ".$allProPrice."";
	$sql = $sql.", 0";
	$sql = $sql.", 0";
	$sql = $sql.", 0";
	$sql = $sql.", 0";
	$sql = $sql.", 0";
	$sql = $sql.", '".$orderID."'";
	$sql = $sql.", '".$dateNow."'";
	$sql = $sql.", '".$timeNow."'";
	$sql = $sql.", '".$_SESSION['mLoginID']."'";
	$sql = $sql.")";
	$mQuery->querySQL($sql);
	
		
	$sql = "insert into ordering values(".$rid."";
	$sql = $sql.", '".$orderID."'";
	$sql = $sql.", ".$_SESSION['mLoginID']."";
	$sql = $sql.", ".$allProQuan."";
	$sql = $sql.", '".$dateNow."'";
	$sql = $sql.", '".$timeNow."'";
	$sql = $sql.", '".$memberName."'";
	$sql = $sql.", '".$memberSurName."'";
	$sql = $sql.", '".$memberAddress."'";
	$sql = $sql.", '-'";
	$sql = $sql.", '".$memberSoi."'";
	$sql = $sql.", '".$memberStreet."'";
	$sql = $sql.", '".$memberTumbon."'";
	$sql = $sql.", '".$memberAmphor."'";
	$sql = $sql.", ".$memberCity."";
	$sql = $sql.", '".$memberPostalCode."'";
	$sql = $sql.", '".$memberTel."'";
	$sql = $sql.", '".$memberExt."'";
	$sql = $sql.", '".$memberMobile."'";
	$sql = $sql.", '-'";
	$sql = $sql.", 0";
	$sql = $sql.", '-'";
	$sql = $sql.")";
	$mQuery->querySQL($sql);
	
	for($i=0; $i<count($_SESSION['cart']); $i++)
	{
		$sql = "select productPrice from product_main where productID=".$_SESSION['cart'][$i]['proID'];
		$result = $mQuery->getResultAll($sql);
		
		foreach($result as $r)
		{
			$productPrice = $r['productPrice'];
		}
		
		$sql = "insert into ordering_product values(".$rid."";
		$sql = $sql.", '".$orderID."'";
		$sql = $sql.", ".$_SESSION['mLoginID']."";
		$sql = $sql.", ".$_SESSION['cart'][$i]['proID']."";
		$sql = $sql.", ".$productPrice."";
		$sql = $sql.", ".$_SESSION['cart'][$i]['proQuan']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", '".$_SESSION['mLoginID']."'";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
	}
	
	
	
	unset($_SESSION['cart'], $_SESSION['cartSumQuan'], $_SESSION['cartSumPrice']);
	
	header("location:../../index.php?flag=orderConfirm");	
}
else
{
	header("location:../../index.php");
}

unset($dFunc, $mFunc, $mQuery, $result);
?>