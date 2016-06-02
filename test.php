<html>
	<body>
		<form class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="test.php" method="post">
			<input id="photograph" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="photograph" placeholder="" type="file">
			<input type="submit" value="submit">
		</form>
	</body>
</html>

<?php 
if(isset($_FILES["photograph"]["name"]) and ($_FILES["photograph"]["name"] != ""))
{
	$textFilePath = "/upload/";
	$target_file = $textFilePath.basename($_FILES["photograph"]["name"]);	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	$check = getimagesize($_FILES["photograph"]["tmp_name"]);

	echo $imageFileType;
}
 ?>