<?php
$dFunc = new DateFunction();
$mFunc = new MainFunction();
$mQuery = new MainQuery();
	
$dateNow = $dFunc->getDateChris();
$timeNow = $dFunc->getTimeNow();

$sql = "select point_1 from member_point where memberID=".$_SESSION['mLoginID'];
$resultPoint = $mQuery->getResultAll($sql);

foreach($resultPoint as $r)
{
	$memberPoint = (int)$r['point_1'];
}

unset($resultPoint);

$sql = "select PROVINCE_ID, PROVINCE_NAME from province order by PROVINCE_NAME";
$resultProvince = $mQuery->getResultAll($sql);

$numProvince = 0;
$numAmphor = 0;
$numTumbon = 0;

foreach($resultProvince as $r)
{
	$provinceID[$numProvince] = $r['PROVINCE_ID'];
	$provinceName[$numProvince] = $r['PROVINCE_NAME'];
	
	$numProvince++;
}

unset($resultProvince);

$sql = "select * from member_detail where memberID=".$_SESSION['mLoginID']." and bname!='-'";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
	$result = $mQuery->getResultAll($sql);
	
	foreach($result as $r)
	{
		$bname = $r['bname'];
		$blastname = $r['blastname'];
		$bsex = (int)$r['bsex'];
		$gcID = $r['gcID'];
		$dateOfBirth = $dFunc->changeDateToDDMMYYYY3($r['dateOfBirth']);
		$nationality = $r['nationality'];
		$marriedStatus = (int)$r['marriedStatus'];
		$gcaddress = $r['gcaddress'];
		$gcvillage = $r['gcvillage'];
		$gcsoi = $r['gcsoi'];
		$gcroad = $r['gcroad'];
		$gctumbon = (int)$r['gctumbon'];
		$gcamphor = (int)$r['gcamphor'];
		$gcprovince = (int)$r['gcprovince'];
		$gcpostcode = $r['gcpostcode'];
		$psaddress = $r['psaddress'];
		$psvillage = $r['psvillage'];
		$pssoi = $r['pssoi'];
		$psroad = $r['psroad'];
		$pstumbon = $r['pstumbon'];
		$psamphor = $r['psamphor'];
		$psprovince = $r['psprovince'];
		$pspostcode = $r['pspostcode'];
		$btelephone = $r['btelephone'];
		$btelephoneext = $r['btelephoneext'];
		$bfax = $r['bfax'];
		$bfaxext = $r['bfaxext'];
		$bmobile = $r['bmobile'];
		$bemail = $r['bemail'];
		$registerDate = $r['registerDate'];
		$registerTime = $r['registerTime'];
	}
	
	
	$sql = "select AMPHUR_ID, AMPHUR_NAME from amphur where PROVINCE_ID=".$gcprovince;
	$resultAmphor = $mQuery->getResultAll($sql);
	
	foreach($resultAmphor as $r)
	{
		$amphorID[$numAmphor] = $r['AMPHUR_ID'];
		$amphorName[$numAmphor] = $r['AMPHUR_NAME'];
		
		$numAmphor++;
	}
	
	unset($resultAmphor);
	
	
	$sql = "select DISTRICT_ID, DISTRICT_NAME from district where PROVINCE_ID=".$gcprovince." and AMPHUR_ID=".$gcamphor;
	$resultTumbon = $mQuery->getResultAll($sql);
	
	foreach($resultTumbon as $r)
	{
		$tumbonID[$numTumbon] = $r['DISTRICT_ID'];
		$tumbonName[$numTumbon] = $r['DISTRICT_NAME'];
		
		$numTumbon++;
	}
	
	unset($resultTumbon);
}
else
{
	$bname = "";
	$blastname = "";
	$bsex = 0;
	$gcID = "";
	$dateOfBirth = $dFunc->changeDateToDDMMYYYY3($dateNow);
	$nationality = "";
	$marriedStatus = 0;
	$gcaddress = "";
	$gcvillage = "";
	$gcsoi = "";
	$gcroad = "";
	$gctumbon = 0;
	$gcamphor = 0;
	$gcprovince = 0;
	$gcpostcode = "";
	$psaddress = "";
	$psvillage = "";
	$pssoi = "";
	$psroad = "";
	$pstumbon = "";
	$psamphor = "";
	$psprovince = "";
	$pspostcode = "";
	$btelephone = "";
	$btelephoneext = "";
	$bfax = "";
	$bfaxext = "";
	$bmobile = "";
	$bemail = "";
	$registerDate = "";
	$registerTime = "";
}

unset($dFunc, $mFunc, $mQuery, $result);
?>