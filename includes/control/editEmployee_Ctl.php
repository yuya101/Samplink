<?php
ob_start();
session_start();

header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(isset($_REQUEST['editaid']) and $_REQUEST['editaid'] != "" and isset($_SESSION['memberID']) and  $_SESSION['memberID'] != "")
{
	$dFunc = new DateFunction();
	$mFunc = new MainFunction();
	$mQuery = new MainQuery();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();

	$stampTime = str_replace(":", "", $timeNow);

	$editaid = base64_decode($_REQUEST['editaid']);
	
	$groupid = 1;

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



	$sql = "update admin_detail set firstname='".$firstname."'";
	$sql = $sql.", lastname='".$lastname."'";
	$sql = $sql.", dateOfBirth='".$dateOfBirth."'";
	$sql = $sql.", address='".$address."'";
	$sql = $sql.", contactNo1='".$contactNo1."'";
	$sql = $sql.", contactNo2='".$contactNo2."'";
	$sql = $sql.", appointmentDate='".$appointmentDate."'";
	$sql = $sql.", joiningDate='".$joiningDate."'";
	$sql = $sql.", empcode='".$empcode."'";
	$sql = $sql.", department=".$department."";
	$sql = $sql.", empsalary=".$empsalary."";
	$sql = $sql.", bankaccountname='".$bankaccountname."'";
	$sql = $sql.", bankaccountnumber='".$bankaccountnumber."'";
	$sql = $sql.", bankbranch='".$bankbranch."'";
	$sql = $sql.", bankifsc='".$bankifsc."'";
	$sql = $sql.", bankcity='".$bankcity."'";
	$sql = $sql.", remarks='".$remarks."'";
	$sql = $sql." where aid=".$editaid;
	$mQuery->querySQL($sql);



	$sql = "update admin set aname='".$firstname."'";
	$sql = $sql.", alastname='".$lastname."'";
	$sql = $sql." where aid=".$editaid;
	$mQuery->querySQL($sql);



	if(isset($_REQUEST['upassword']) and $_REQUEST['upassword'] != "")
	{
		$upassword = base64_encode($mFunc->chgSpecialCharInputText($_REQUEST['upassword']));

		$sql = "update admin_detail set upassword='".$upassword."' where aid=".$editaid;
		$mQuery->querySQL($sql);

		$sql = "update admin set apass='".$upassword."' where aid=".$editaid;
		$mQuery->querySQL($sql);
	}  //-------------  if(isset($_REQUEST['upassword']) and $_REQUEST['upassword'] != "")




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

				    	$sql = "update admin_detail set photograph='".$strPhotoGraphName."' where aid=".$editaid;
				    	$mQuery->querySQL($sql);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["photograph"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
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

					    	$sql = "update admin_detail set qualification".$i."='".$strQualificationName[$i - 1]."' where aid=".$editaid;
					    	$mQuery->querySQL($sql);
					    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
					}  //---------  if($_FILES["photograph"]["size"] < $fileUploadSizeLimit) 
				}  //---------  if($check !== false)
			} //-----------  if($_FILES["textFile"]["name"][0] != "")
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

				    	$sql = "update admin_detail set addressproof='".$strAddressProofName."' where aid=".$editaid;
				    	$mQuery->querySQL($sql);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["addressproof"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
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

				    	$sql = "update admin_detail set idproof='".$strIDProofName."' where aid=".$editaid;
				    	$mQuery->querySQL($sql);
				    }  //----------  if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" )
				}  //---------  if($_FILES["idproof"]["size"] < $fileUploadSizeLimit) 
			}  //---------  if($check !== false)
		}  //-----------  if($_FILES["textFile"]["name"][0] != "")

		//------------------------- Upload File End -------------------------------------------
	

		$_SESSION['formComplete'] = base64_encode($firstname." ".$lastname);
		session_write_close();

		header("location:../../admin.php?p=editEmployeeDetail&aid=".$_REQUEST['editaid']);
	
	
	unset($mFunc, $mQuery, $dFunc);
}
else
{
	header("location:../../admin.php");
}
?>