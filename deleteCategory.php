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

	if(isset($_REQUEST['catID']))
	{
		$mQuery = new MainQuery();

		$catID = base64_decode($_REQUEST['catID']);

		$sql = "select catPicture from product_category where catID=".$catID;
		$num = $mQuery->checkNumRows($sql);

		if($num > 0)
		{
			$result = $mQuery->getResultAll($sql);

			foreach($result as $r)
    		{
				if($r['catPicture'] != "-"){unlink($textFilePath.$r['catPicture']);}
    		}
		}  //-----------  if($num > 0)
		
		
		$sql = "delete from product_category where catID=".$catID;
		$mQuery->querySQL($sql);

		$sql = "delete from product_cat_header where catID=".$catID;
		$mQuery->querySQL($sql);


		unset($mQuery);

		header('location:admin.php?p=manageCategory');
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
