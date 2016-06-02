<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(($_REQUEST['proQuan1'] != "") and isset($_SESSION['mLoginID']))
{
	$dFunc = new DateFunction();
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	if(!(isset($_SESSION['cart'])))
	{
		if((int)$_REQUEST['proQuan1'] > 0)
		{
			$_SESSION['cart'][0]['proID'] = $mFunc->chgSpecialCharInputNumber($_REQUEST['proID1']);
			$_SESSION['cart'][0]['proQuan'] = $mFunc->chgSpecialCharInputNumber($_REQUEST['proQuan1']);
			$_SESSION['cartSumQuan'] = $mFunc->chgSpecialCharInputNumber($_REQUEST['allProQuan']);
			$_SESSION['cartSumPrice'] = $mFunc->chgSpecialCharInputNumber($_REQUEST['allProPrice']);
			session_write_close();
		}
	}
	else
	{
		unset($_SESSION['cart'], $_SESSION['cartSumQuan'], $_SESSION['cartSumPrice']);
		
		$j = 0;
		
		$proShowCount = (int)($mFunc->chgSpecialCharInputNumber($_REQUEST['proShowCount']));
				
		for($i=0; $i<$proShowCount; $i++)
		{
			$proID = (int)($mFunc->chgSpecialCharInputNumber($_REQUEST['proID'.($i + 1)]));
			$proQuan = (int)($mFunc->chgSpecialCharInputNumber($_REQUEST['proQuan'.($i + 1)]));
			
			if($proQuan > 0)
			{
				$_SESSION['cart'][$j]['proID'] = $proID;
				$_SESSION['cart'][$j]['proQuan'] = $proQuan;
				$j++;
			}
		} //-----  for($i=1; $i<=$_REQUEST['']; $i++)		
		
		$allProQuan = (int)($mFunc->chgSpecialCharInputNumber($_REQUEST['allProQuan']));
		$allProPrice = (int)($mFunc->chgSpecialCharInputNumber($_REQUEST['allProPrice']));
		
		$_SESSION['cartSumQuan'] = $allProQuan;
		$_SESSION['cartSumPrice'] = $allProPrice;
		session_write_close();
	}  //-------  if(!(isset($_SESSION['cart'])))
	
	if($_REQUEST['selectProduct'] != "")
	{
		header("location:../../index.php?flag=sampling");
	}
	else
	{
		header("location:../../index.php?flag=orderMethod");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../index.php");
}
?>