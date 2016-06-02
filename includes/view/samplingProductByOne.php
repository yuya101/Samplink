<?php
require_once($classPath."mainquery.php");
require_once($classPath."mainfunction.php");
require_once($classPath."datefunction.php");

$mqFunc = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$reqPID = ($_REQUEST['pid'] == "" ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['pid']));

$sql = "select * from product_main where productID=".$reqPID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc";
$num = $mqFunc->checkNumRows($sql);

if($num > 0)
{
	$result = $mqFunc->getResultAll($sql);
	
	$sql = "update product_main set productClickCount=productClickCount+1 where productID=".$reqPID;
	$mqFunc->querySQL($sql);
	
	foreach($result as $r)
	{
		$productID = $r['productID'];
		$productName = $r['productName'];
		$productClickCount = $r['productClickCount'];
		$productDetail = $r['productDetail'];
		$productStartDate = $dFunc->changeDateToDDMMYYYY3($r['productStartDate']);		
		$productCode = $r['productCode'];
		
		$sql = "select * from product_reviews where productID=".$reqPID." order by addDate desc";
		$numReview = $mqFunc->checkNumRows($sql);
		
		if($numReview > 0)
		{
			$resultReview = $mqFunc->getResultAll($sql);
			$rrID = 0;
			
			foreach($resultReview as $rr)
			{
				$memberID[$rrID] = $rr['memberID'];
				$reviewID[$rrID] = $rr['reviewID'];
				$reviewTopic[$rrID] = $rr['reviewTopic'];
				$reviewDetail[$rrID] = $rr['reviewDetail'];
				$reviewAddDate[$rrID] = $dFunc->changeDateToDDMMYYYY3($rr['addDate']);
				
				$sql = "select reviewID from product_reviews where memberID=".$memberID[$rrID];
				$memberReviewNum[$rrID] = $mqFunc->checkNumRows($sql);
				
				$sql = "select member_login from member_login where memberID=".$memberID[$rrID];
				$resultMember = $mqFunc->getResultAll($sql);
				
				foreach($resultMember as $rm)
				{
					$memberLogin[$rrID] = $rm['member_login'];
				}
				
				$sql = "select pictureName1 from member_picture where memberID=".$memberID[$rrID];
				$numMember = $mqFunc->checkNumRows($sql);
				
				if($numMember > 0)
				{
					$resultMember = $mqFunc->getResultAll($sql);
					
					foreach($resultMember as $rm)
					{
						$memberPicture[$rrID] = $rm['pictureName1'];
					}
				}
				else
				{
					$memberPicture[$rrID] = "default.jpg";
				}
				
				unset($resultMember, $rm, $numMember);
				
				$sql = "select ratingTopicID, proRatingPoint from product_rating where productID=".$reqPID." and reviewID=".$reviewID[$rrID]." order by ratingTopicID";
				$resultRating = $mqFunc->getResultAll($sql);
				
				$rateTopic = 0;
				
				foreach($resultRating as $rate)
				{
					$rating[$rrID][$rateTopic] = $rate['proRatingPoint'];
					$rateTopic++;
				}
				
				$rrID++;
				
				unset($resultRating, $rateTopic);
			}
			
			unset($resultReview, $rrID);
		}			
		
		$sql = "select * from product_picture where productID=".$productID;
		$resultProduct = $mqFunc->getResultAll($sql);
		
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
		$resultRating = $mqFunc->getResultAll($sql);
		
		$i = 0;
		
		foreach($resultRating as $p)
		{
			$ratingTopicID[$i] = $p['ratingTopicID'];
			$ratingName[$i] = $p['ratingName'];
			
			$sql = "select proRatingPoint from product_rating where productID=".$productID." and ratingTopicID=".$ratingTopicID[$i];
			$num = $mqFunc->checkNumRows($sql);
			
			if($num > 0)
			{
				$resultPointRating = $mqFunc->getResultAll($sql);
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
			$reviewChkNum = $mqFunc->checkNumRows($sql);
			$reviewChkNum = (int)$reviewChkNum;
		}
		else
		{
			$reviewChkNum = 1;
		}
		
		include("samplingProductDetailByOne.php");
	}
}

unset($reqCatID, $reqBrandID, $reqSubCatID);
unset($mqFunc, $mFunc, $dFunc);
?>