<?php
$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$reqPID = ($_REQUEST['pid'] == "" ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['pid']));

$sql = "select * from product_main where productID=".$reqPID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
	$result = $mQuery->getResultAll($sql);
	
	foreach($result as $r)
	{
		$productID = $r['productID'];
		$productName = $r['productName'];
		$productClickCount = $r['productClickCount'];
		$productDetail = $r['productDetail'];
		$productStartDate = $dFunc->changeDateToDDMMYYYY3($r['productStartDate']);		
		$productCode = $r['productCode'];
		
		$sql = "select * from product_reviews where productID=".$reqPID." order by addDate desc";
		$numReview = $mQuery->checkNumRows($sql);
		
		if($numReview > 0)
		{
			$resultReview = $mQuery->getResultAll($sql);
			$rrID = 0;
			
			foreach($resultReview as $rr)
			{
				$memberID[$rrID] = $rr['memberID'];
				$reviewID[$rrID] = $rr['reviewID'];
				$reviewTopic[$rrID] = $rr['reviewTopic'];
				$reviewDetail[$rrID] = $rr['reviewDetail'];
				
				$sql = "select ratingTopicID, proRatingPoint from product_rating where productID=".$reqPID." and reviewID=".$reviewID[$rrID]." order by ratingTopicID";
				$resultRating = $mQuery->getResultAll($sql);
				
				$rateTopic = 1;
				
				foreach($resultRating as $rate)
				{
					$rating[$rateTopic][$rrID] = $rate['ratingTopicID'];
					$rateTopic++;
				}
				
				$rrID++;
				
				unset($resultRating, $rateTopic);
			}
			
			unset($resultReview, $rrID);
		}			
		
		$sql = "select * from product_picture where productID=".$productID;
		$resultProduct = $mQuery->getResultAll($sql);
		
		foreach($resultProduct as $p)
		{
			$pictureProduct[0] = $p['pictureName1'];
			$pictureProduct[1] = $p['pictureName2'];
			$pictureProduct[2] = $p['pictureName3'];
			$pictureProduct[3] = $p['pictureName4'];
			$pictureProduct[4] = $p['pictureName5'];
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
		
		include("samplingProductReviewByOne.php");
	}
}

unset($reqCatID, $reqBrandID, $reqSubCatID);
unset($mQuery, $mFunc, $dFunc);
?>