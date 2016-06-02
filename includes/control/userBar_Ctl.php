<?php
$dFunc = new DateFunction();
$mFunc = new MainFunction();
$mQuery = new MainQuery();

if(isset($_SESSION['mLoginID']))
{
	$sql = "select bname, blastname, bemail from member_detail where memberID=".$_SESSION['mLoginID'];
	$result = $mQuery->getResultAll($sql);
	
	foreach($result as $r)
	{
		if($r['bname'] == '-')
		{
			$myName = $r['bemail'];
		}
		else
		{
			$myName = 'คุณ'.$r['bname'].' '.$r['blastname'];
		}
	}
	
	if(isset($_SESSION['cartSumQuan']))
	{
		$myBasket = $_SESSION['cartSumQuan'];
		$linkBasket = 'index.php?flag=chkGrapProduct';
	}
	else
	{
		$myBasket = 0;		
		$linkBasket = 'javascript:;';
	}
	
	$sql = "select point_1 from member_point where memberID=".$_SESSION['mLoginID'];
	$result = $mQuery->getResultAll($sql);
	
	foreach($result as $r)
	{
		$myPoint = number_format($r['point_1'], 0);
	}
}

unset($dFunc, $mFunc, $mQuery, $result);
?>