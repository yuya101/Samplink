<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(isset($_REQUEST['email']) and $_REQUEST['email'] != "" and isset($_SESSION['memberID']) and  $_SESSION['memberID'] != "")
{
	$dFunc = new DateFunction();
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();

	$stampTime = str_replace(":", "", $timeNow);
	

	
	$firstname = $mFunc->chgSpecialCharInputText($_REQUEST['firstname']);
	$lastname = $mFunc->chgSpecialCharInputText($_REQUEST['lastname']);
	$address = $mFunc->chgSpecialCharInputText($_REQUEST['address']);
	$contactNo1 = $mFunc->chgSpecialCharInputText($_REQUEST['contactNo1']);
	$contactNo2 = $mFunc->chgSpecialCharInputText($_REQUEST['contactNo2']);
	$empcode = $mFunc->chgSpecialCharInputText($_REQUEST['empcode']);
	$department = $mFunc->chgSpecialCharInputNumber($_REQUEST['department']);
	$empsalary = $mFunc->chgSpecialCharInputNumber($_REQUEST['empsalary']);
	$bankaccountname = $mFunc->chgSpecialCharInputText($_REQUEST['bankaccountname']);
	$bankaccountnumber = $mFunc->chgSpecialCharInputText($_REQUEST['bankaccountnumber']);
	$bankbranch = $mFunc->chgSpecialCharInputText($_REQUEST['bankbranch']);
	$bankifsc = $mFunc->chgSpecialCharInputText($_REQUEST['bankifsc']);
	$bankcity = $mFunc->chgSpecialCharInputText($_REQUEST['bankcity']);
	$remarks = $mFunc->chgSpecialCharInputText($_REQUEST['remarks']);
	$uLogin = strtoupper($mFunc->chgSpecialCharInputText($_REQUEST['email']));
	$upassword = base64_encode($mFunc->chgSpecialCharInputText($_REQUEST['upassword']));
	$email = strtolower($mFunc->chgSpecialCharInputText($_REQUEST['email']));



	$dateOfBirth = $mFunc->chgSpecialCharInputText($_REQUEST['dateOfBirth']);

	if($dateOfBirth != '-')
	{
		$dateOfBirth = $dFunc->chgDateChrisStyle($dateOfBirth);
	}  //----------  if($dateOfBirth != '-')



	$appointmentDate = $mFunc->chgSpecialCharInputText($_REQUEST['appointmentDate']);

	if($appointmentDate != '-')
	{
		$appointmentDate = $dFunc->chgDateChrisStyle($appointmentDate);
	}  //----------  if($licenceExpire != '-')



	$joiningDate = $mFunc->chgSpecialCharInputText($_REQUEST['joiningDate']);

	if($joiningDate != '-')
	{
		$joiningDate = $dFunc->chgDateChrisStyle($joiningDate);
	}  //----------  if($licenceExpire != '-')




	
	$sql = "select aid from admin where email='".$email."'";
	$num = $mQuery->checkNumRows($sql);
	
	if($num == 0)
	{
		//------------------------- Upload File Start -------------------------------------------
		if(isset($_FILES["photograph"]["name"]) and ($_FILES["photograph"]["name"] != ""))
		{
			$checkPhotographIsImage = 0;
			$checkPhotographIsSize = 0;
			$checkPhotographIsImageType = 0;		

			$target_file = $textFilePath.basename($_FILES["photograph"]["name"]);	
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$strPhotoGraphName = "photograph".$dateNow.$stampTime.".".$imageFileType;

			$check = getimagesize($_FILES["photograph"]["tmp_name"]);

			if($check !== false) 
			{
				$checkPhotographIsImage = 1;

				if($_FILES["photograph"]["size"] < $fileUploadSizeLimit) 
				{
				    $checkPhotographIsSize = 1;

				    if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif") 
				    {
				    	$checkPhotographIsImageType = 1;
				    	move_uploaded_file($_FILES["photograph"]["tmp_name"], $textFilePath.$strPhotoGraphName);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["photograph"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
		}
		else
		{
			$checkPhotographIsImage = 1;
			$checkPhotographIsSize = 1;
			$checkPhotographIsImageType = 1;
			$strPhotoGraphName = "-";
		}  //-----------  if($_FILES["textFile"]["name"][0] != "")




		for($i=1; $i<=5; $i++)
		{
			if(isset($_FILES["qualification".$i]["name"]) and ($_FILES["qualification".$i]["name"] != ""))
			{
				$checkQualificationIsImage[$i - 1] = 0;
				$checkQualificationIsSize[$i - 1] = 0;
				$checkQualificationIsImageType[$i - 1] = 0;		

				$target_file = $textFilePath.basename($_FILES["qualification".$i]["name"]);	
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				$strQualificationName[$i - 1] = "qualification".$i.$dateNow.$stampTime.".".$imageFileType;

				$check = getimagesize($_FILES["qualification".$i]["tmp_name"]);

				if($check !== false) 
				{
					$checkQualificationIsImage[$i - 1] = 1;

					if($_FILES["qualification".$i]["size"] < $fileUploadSizeLimit) 
					{
					    $checkQualificationIsSize[$i - 1] = 1;

					    if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif") 
					    {
					    	$checkQualificationIsImageType[$i - 1] = 1;
				    		move_uploaded_file($_FILES["qualification".$i]["tmp_name"], $textFilePath.$strQualificationName[$i - 1]);
					    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
					}  //---------  if($_FILES["photograph"]["size"] < $fileUploadSizeLimit) 
				}  //---------  if($check !== false)
			}
			else
			{
				$checkQualificationIsImage[$i - 1] = 1;
				$checkQualificationIsSize[$i - 1] = 1;
				$checkQualificationIsImageType[$i - 1] = 1;		
				$strQualificationName[$i - 1] = "-";
			}  //-----------  if($_FILES["textFile"]["name"][0] != "")
		}  //------------  for($i=1; $i<=5; $i++)




		if(isset($_FILES["addressproof"]["name"]) and ($_FILES["addressproof"]["name"] != ""))
		{
			$checkAddressProofIsImage = 0;
			$checkAddressProofIsSize = 0;
			$checkAddressProofIsImageType = 0;		

			$target_file = $textFilePath.basename($_FILES["addressproof"]["name"]);	
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$strAddressProofName = "addressproof".$dateNow.$stampTime.".".$imageFileType;

			$check = getimagesize($_FILES["addressproof"]["tmp_name"]);

			if($check !== false) 
			{
				$checkAddressProofIsImage = 1;

				if($_FILES["addressproof"]["size"] < $fileUploadSizeLimit) 
				{
				    $checkAddressProofIsSize = 1;

				    if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif") 
				    {
				    	$checkAddressProofIsImageType = 1;
				    	move_uploaded_file($_FILES["addressproof"]["tmp_name"], $textFilePath.$strAddressProofName);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["addressproof"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
		}
		else
		{
			$checkAddressProofIsImage = 1;
			$checkAddressProofIsSize = 1;
			$checkAddressProofIsImageType = 1;
			$strAddressProofName = "-";
		}  //-----------  if($_FILES["textFile"]["name"][0] != "")




		if(isset($_FILES["idproof"]["name"]) and ($_FILES["idproof"]["name"] != ""))
		{
			$checkIDProofIsImage = 0;
			$checkIDProofIsSize = 0;
			$checkIDProofIsImageType = 0;		

			$target_file = $textFilePath.basename($_FILES["idproof"]["name"]);	
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$strIDProofName = "idproof".$dateNow.$stampTime.".".$imageFileType;

			$check = getimagesize($_FILES["idproof"]["tmp_name"]);

			if($check !== false) 
			{
				$checkIDProofIsImage = 1;

				if($_FILES["idproof"]["size"] < $fileUploadSizeLimit) 
				{
				    $checkIDProofIsSize = 1;

				    if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif") 
				    {
				    	$checkIDProofIsImageType = 1;
				    	move_uploaded_file($_FILES["idproof"]["tmp_name"], $textFilePath.$strIDProofName);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["idproof"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
		}
		else
		{
			$checkIDProofIsImage = 1;
			$checkIDProofIsSize = 1;
			$checkIDProofIsImageType = 1;
			$strIDProofName = "-";
		}  //-----------  if($_FILES["textFile"]["name"][0] != "")

		//------------------------- Upload File End -------------------------------------------



		$groupid = 1;


		$sql = "select aid from admin order by aid desc";
		$aid = $mQuery->getNewPrimaryID($sql, "aid");
		
		$sql = "insert into admin values(".$aid."";
		$sql = $sql.", '".$uLogin."'";
		$sql = $sql.", '".$upassword."'";
		$sql = $sql.", '".$firstname."'";
		$sql = $sql.", '".$lastname."'";
		$sql = $sql.", '-'";
		$sql = $sql.", ".$groupid.""; 
		$sql = $sql.", '".$email."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", '".$dateNow."'";
		$sql = $sql.", '".$timeNow."'";
		$sql = $sql.", '".$_SERVER['REMOTE_ADDR']."'";
		$sql = $sql.", '".$_SERVER['REMOTE_ADDR']."'";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.", ".$_SESSION['memberID']."";
		$sql = $sql.")";
		$mQuery->querySQL($sql);



		$sql = "insert into admin_detail values(".$aid."";
		$sql = $sql.", '".$firstname."'";
		$sql = $sql.", '".$lastname."'";
		$sql = $sql.", '".$dateOfBirth."'";
		$sql = $sql.", '".$address."'";
		$sql = $sql.", '".$contactNo1."'";
		$sql = $sql.", '".$contactNo2."'";
		$sql = $sql.", '".$strPhotoGraphName."'";
		$sql = $sql.", '".$email."'";
		$sql = $sql.", '".$upassword."'";
		$sql = $sql.", '".$appointmentDate."'";
		$sql = $sql.", '".$joiningDate."'";
		$sql = $sql.", '".$empcode."'";
		$sql = $sql.", ".$department."";
		$sql = $sql.", ".$empsalary."";
		$sql = $sql.", '".$strQualificationName[0]."'";
		$sql = $sql.", '".$strQualificationName[1]."'";
		$sql = $sql.", '".$strQualificationName[2]."'";
		$sql = $sql.", '".$strQualificationName[3]."'";
		$sql = $sql.", '".$strQualificationName[4]."'";
		$sql = $sql.", '".$strAddressProofName."'";
		$sql = $sql.", '".$strIDProofName."'";
		$sql = $sql.", '".$bankaccountname."'";
		$sql = $sql.", '".$bankaccountnumber."'";
		$sql = $sql.", '".$bankbranch."'";
		$sql = $sql.", '".$bankifsc."'";
		$sql = $sql.", '".$bankcity."'";
		$sql = $sql.", '".$remarks."'";
		$sql = $sql.")";
		$mQuery->querySQL($sql);



		$_SESSION['formComplete'] = base64_encode($email);
		session_write_close();

		header("location:../../admin.php?p=addEmployee");
	}
	else
	{
		$_SESSION['formError'] = base64_encode($email);
		session_write_close();

		header("location:../../admin.php?p=addEmployee");
	}
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>