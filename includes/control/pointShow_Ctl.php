<?php
$dFunc = new DateFunction();
$mFunc = new MainFunction();
$mQuery = new MainQuery();
	
$dateNow = $dFunc->getDateChris();
$timeNow = $dFunc->getTimeNow();

$numHistory = 0;

$sql = 'select point_1 from member_point where memberID='.$_SESSION['mLoginID'];
$result = $mQuery->getResultAll($sql);

foreach($result as $r)
{
	$pointRemain = number_format($r['point_1'], 0);
}

$sql = 'select * from member_point_history where memberID='.$_SESSION['mLoginID'].' order by addDate desc';
$result = $mQuery->getResultAll($sql);

foreach($result as $r)
{
	$pointDate[$numHistory] = $r['addDate'];
	$pointDate[$numHistory] = $dFunc->changeDateToDDMMYYYY3($pointDate[$numHistory]);
	
	if((int)$r['point_1'] > 0)
	{
		$point[$numHistory] = '+&nbsp;'.number_format($r['point_1'], 0);
	}
	
	if((int)$r['point_2'] > 0)
	{
		$point[$numHistory] = '-&nbsp;'.number_format($r['point_2'], 0);
	}
	
	$topic = (int)$r['getPointTopic'];
	
	if($topic == 0)
	{
		$topicText[$numHistory] = 'สั่งสินค้า';
	}
	else
	{
		$sql = 'select topicDeail from point_topic where topicID='.$topic;
		$result2 = $mQuery->getResultAll($sql);
		
		foreach($result2 as $z)
		{
			$topicText[$numHistory] = $z['topicDeail'];
		}
		
		unset($result2);
	}
	
	$numHistory = $numHistory + 1;
}


unset($dFunc, $mFunc, $mQuery, $result);
?>