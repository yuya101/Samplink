<?php
ob_start();
session_start();
session_cache_expire(20);  // TimeOut in scale of minutes.
// error_reporting(E_ALL);
// ini_set( 'display_errors','1');
$cache_expire = session_cache_expire();

if(isset($_SESSION['memberID']))
{
	include("includes/class/autoload.php");

	if(isset($_REQUEST['typeID']))
	{
		$mQuery = new MainQuery();

		$typeID = base64_decode($_REQUEST['typeID']);

		$sql = "select typePicture from product_types where typeID=".$typeID;
		$num = $mQuery->checkNumRows($sql);

		if($num > 0)
		{
			$result = $mQuery->getResultAll($sql);

			foreach($result as $r)
    		{
				if($r['typePicture'] != "-"){unlink($textFilePath.$r['typePicture']);}
    		}
		}  //-----------  if($num > 0)
		
		
		$sql = "delete from product_types where typeID=".$typeID;
		$mQuery->querySQL($sql);


		unset($mQuery);

		header('location:admin.php?p=manageTypes');
	}
	else
	{
		header('location:admin.php');
	}   //------------  if(isset($_REQUEST['aid']))
}
else
{
	header('location:login.php');
}
?>
