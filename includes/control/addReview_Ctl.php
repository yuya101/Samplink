<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(($_REQUEST['memberID'] != "") and ($_REQUEST['productID'] != ""))
{
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	$dFunc = new DateFunction();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	$memberID = $mFunc->chgSpecialCharInputNumber($_REQUEST['memberID']);
	$productID = $mFunc->chgSpecialCharInputNumber($_REQUEST['productID']);
			
	$sql = "select reviewID from product_reviews where memberID=".$memberID." and productID=".$productID;
	$num = $mQuery->checkNumRows($sql);	
	
	if($num == 0)
	{
		$reviewRating[0] = $mFunc->chgSpecialCharInputNumber($_REQUEST['reviewRating1']);
		$reviewRating[1] = $mFunc->chgSpecialCharInputNumber($_REQUEST['reviewRating2']);
		$reviewRating[2] = $mFunc->chgSpecialCharInputNumber($_REQUEST['reviewRating3']);
		$reviewRating[3] = $mFunc->chgSpecialCharInputNumber($_REQUEST['reviewRating4']);
		$reviewRating[4] = $mFunc->chgSpecialCharInputNumber($_REQUEST['reviewRating5']);
		$reviewComment = $mFunc->chgSpecialCharInputText($_REQUEST['reviewComment']);
		
		$sql = "select reviewID from product_reviews order by reviewID desc";
		$reviewID = $mQuery->getNewPrimaryID($sql, "reviewID");
		
		$sql = "insert into product_reviews values(".$reviewID."";
		$sql = $sql.", ".$memberID."";
		$sql = $sql.", ".$productID."";
		$sql = $sql.", '-'";
		$sql = $sql.", '".$reviewComment."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['mLoginID']."";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['mLoginID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
		
		
		$sql = "select proRatingID from product_rating order by proRatingID desc";
		$proRatingID = $mQuery->getNewPrimaryID($sql, "proRatingID");
		$proRatingID = (int)$proRatingID;
		
		for($i=0; $i<5; $i++)
		{
			$sql = "insert into product_rating values(".($proRatingID+$i)."";
			$sql = $sql.", ".$productID."";
			$sql = $sql.", ".$reviewID."";
			$sql = $sql.", ".($i+1)."";
			$sql = $sql.", ".$reviewRating[$i]."";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", ".$_SESSION['mLoginID']."";
			$sql = $sql.", '".$dateNow."'";
			$sql = $sql.", '".$timeNow."'";
			$sql = $sql.", ".$_SESSION['mLoginID']."";
			$sql = $sql.")";
			$mQuery->querySQL($sql); 	
		}		
		
		$topicID = 2;		
		$topicPoint = $mQuery->getTopicPoint($topicID);
		
		$sql = "update member_point set point_1=point_1+".$topicPoint." where memberID=".$_SESSION['mLoginID'];
		$mQuery->querySQL($sql); 	
			
		$sql = "insert into member_point_history values(".$_SESSION['mLoginID']."";
		$sql = $sql.", ".$topicPoint."";
		$sql = $sql.", 0";
		$sql = $sql.", 0";
		$sql = $sql.", 0";
		$sql = $sql.", 0";
		$sql = $sql.", ".$topicID."";
		$sql = $sql.", ".$productID."";
		$sql = $sql.", '-'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", ".$_SESSION['mLoginID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
?>