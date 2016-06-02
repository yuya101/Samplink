<?php
$dFunc = new DateFunction();
$mFunc = new MainFunction();
$mQuery = new MainQuery();
	
$dateNow = $dFunc->getDateChris();
$timeNow = $dFunc->getTimeNow();

$numOrder = 0;
$numOrderByOne = 0;

$sql = 'select * from ordering where memberID='.$_SESSION['mLoginID']." order by orderDate desc";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
	$result = $mQuery->getResultAll($sql);

	foreach($result as $r)
	{
		$rid[$numOrder] = $r['rid'];
		$orderDate[$numOrder] = $r['orderDate'];
		$orderDate[$numOrder] = $dFunc->changeDateToDDMMYYYY3($orderDate[$numOrder]);
		$sendOrderFlag[$numOrder] = $r['sendOrderFlag'];
		
		if((int)$sendOrderFlag[$numOrder] == 0)
		{
			$sendOrderFlag[$numOrder] = 'Received Order';
		}
		else
		{
			$sendOrderFlag[$numOrder] = 'Delivered';
		}
		
		$trackingNO[$numOrder] = $r['trackingNO'];
		
		if($trackingNO[$numOrder] == '-')
		{
			$trackingNO[$numOrder] = 'N/A';
		}
		
		
		$sql = 'select product_id, productPricePerUnit, orderQuantity from ordering_product where rid='.$rid[$numOrder];
		$resultByOne = $mQuery->getResultAll($sql);
		
		foreach($resultByOne as $z)
		{		
			$sql = 'select productName from product_main where productID='.$z['product_id'];
			$resultProduct = $mQuery->getResultAll($sql);
			
			foreach($resultProduct as $g)
			{
				$productName[$numOrder][$numOrderByOne] = $g['productName'];
			}
			
			unset($resultProduct);
			
			$numOrderByOne = $numOrderByOne + 1;
		}
		
		unset($resultByOne);	
		
		$numOrder = $numOrder + 1;
	}
}

unset($dFunc, $mFunc, $mQuery, $result);
?>