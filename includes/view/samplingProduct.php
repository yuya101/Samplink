<?php
$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$reqCatID = (!isset($_REQUEST['catID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['catID']));
$reqBrandID = (!isset($_REQUEST['brandID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['brandID']));
$reqSubCatID = (!isset($_REQUEST['subcatID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['subcatID']));
$reqSearchText = (!isset($_REQUEST['searchText']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['searchText']));

$pageSize = (isset($_SESSION['pageSize']) ? (int)$_SESSION['pageSize'] : 20);
$pageNo = (isset($_REQUEST['pageNo']) ? (int)$_REQUEST['pageNo'] : 1);

if($pageNo == 1)
{
	$startRecord = 0;
}
else
{
	$startRecord = $pageSize * ($pageNo - 1);
}

$chkSearch = 0;

if(($reqBrandID != "-") and ($reqSubCatID != "-"))
{
	$sql = "select * from product_main where brandID=".$reqBrandID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	$sqlAllRecord = "select * from product_main where brandID=".$reqBrandID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc";
}
else if(($reqCatID != "-") and ($reqSubCatID != "-"))
{
	$sql = "select * from product_main where catID=".$reqCatID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	$sqlAllRecord = "select * from product_main where catID=".$reqCatID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc";
}
else if($reqSearchText != "-")
{
	$sql = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 and (productName like '%".$reqSearchText."%') order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	$sqlAllRecord = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 and (productName like '%".$reqSearchText."%') order by productStartDate desc";
}
else
{
	$sql = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	$sqlAllRecord = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc";
}

$num = $mQuery->checkNumRows($sql);
$numAllRecord = $mQuery->checkNumRows($sqlAllRecord);

if($num > 0)
{	
	$pageAll = ceil($numAllRecord / $pageSize);  //------------ หารได้เท่าไหร่ปัดขึ้น

	$result = $mQuery->getResultAll($sql);
	
	foreach($result as $r)
	{
		$productID = $r['productID'];
		$productName = $r['productName'];
		$productClickCount = $r['productClickCount'];
		$productPrice = number_format($r['productPrice'], 0);
		
		$sql = "select pictureName1 from product_picture where productID=".$productID;
		$resultProduct = $mQuery->getResultAll($sql);
		
		foreach($resultProduct as $p)
		{
			$pictureProduct = $p['pictureName1'];
			//$pictureProductSmall = $mFunc->thumbImageName($p['pictureName1']);
		}
		
		unset($resultProduct);
		
		$sql = "select ratingTopicID, ratingName from rating_topic order by ratingTopicID";
		$resultRating = $mQuery->getResultAll($sql);
		
		$i = 0;
		
		foreach($resultRating as $p)
		{
			$ratingTopicID[$i] = $p['ratingTopicID'];
			$ratingName[$i] = $p['ratingName'];
			
			$sql = "select proRatingPoint from product_rating where productID=".$productID." and ratingTopicID=".$ratingTopicID[$i];
			$num = $mQuery->checkNumRows($sql);
			
			if($num > 0)
			{
				$resultPointRating = $mQuery->getResultAll($sql);
				$sumRating[$i] = 0;
				
				foreach($resultPointRating as $pr)
				{
					$sumRating[$i] = round($sumRating[$i] + (int)$pr['proRatingPoint']);
				}
				
				$sumRating[$i] = $sumRating[$i] / $num;
				
				unset($resultPointRating);
			}
			else
			{
				$sumRating[$i] = 1;
			}
		 	
			$i++;
		}
		
		unset($resultRating);
		
		if(isset($_SESSION['mLoginID']))
		{
			$sql = "select reviewID from product_reviews where productID=".$productID." and memberID=".$_SESSION['mLoginID'];
			$reviewChkNum = $mQuery->checkNumRows($sql);
			$reviewChkNum = (int)$reviewChkNum;
		}
		else
		{
			$reviewChkNum = 1;
		}
		
		include("samplingProductDetail.php");
	}
	
	if($pageAll > 1)
	{
		include("loadMoreProduct.php");
	}
}

unset($reqCatID, $reqBrandID, $reqSubCatID);
unset($mQuery, $mFunc, $dFunc);
?>