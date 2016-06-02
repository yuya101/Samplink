<?php
require_once($classPath."mainquery.php");
require_once($classPath."mainfunction.php");
require_once($classPath."datefunction.php");

$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$bid = (!isset($_REQUEST['bid']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['bid']));

$sql = "select * from blog_detail where blogID=".$bid;
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
	$result = $mQuery->getResultAll($sql);
	$i = 0;
	
	foreach($result as $r)
	{
		$showMainImage[$i] = "-";
		
		$blogID[$i] = $r['blogID'];
		$blogTitle[$i] = $r['blogTitle'];
		$blogDetail[$i] = $r['blogDetail'];
		$blogStartDateShow[$i] = $r['blogStartDateShow'];		
		$blogPicture1[$i] = $r['blogPicture1'];
		
		if($blogPicture1[$i] != "-")
		{
			$blogPicture1Small[$i] = $mFunc->thumbImageName($blogPicture1[$i]);
			$showMainImage[$i] = $blogPicture1Small[$i];
		}
		
		$blogPicture2[$i] = $r['blogPicture2'];
		
		if($blogPicture2[$i] != "-")
		{
			$blogPicture2Small[$i] = $mFunc->thumbImageName($blogPicture2[$i]);
			
			if($showMainImage[$i] == '-')
			{
				$showMainImage[$i] = $blogPicture2Small[$i];
			}
		}
		
		$blogPicture3[$i] = $r['blogPicture3'];
		
		if($blogPicture3[$i] != "-")
		{
			$blogPicture3Small[$i] = $mFunc->thumbImageName($blogPicture3[$i]);
			$imageBlog3 = '<a href="upload/'.$blogPicture3[$i].'" rel="lightbox[picBlog]"><img src="upload/'.$blogPicture3Small[$i].'" class="samplingProductPicSmall" alt="" /></a>';
			
			if($showMainImage[$i] == '-')
			{
				$showMainImage[$i] = $blogPicture3Small[$i];
			}
		}
		
				
		$sql = "select ausername from admin where aid=".$r['addID'];
		$result2 = $mQuery->getResultAll($sql);
		
		foreach($result2 as $b)
		{
			$aName[$i] = $b['ausername'];
		}
		
		unset($result2, $b);
				
		$sql = "select * from blog_answer where blogID=".$r['blogID']." order by addDate desc, addTime desc";
		$numAnswer = $mQuery->checkNumRows($sql);
		
		if($numAnswer > 0)
		{
			$resultAnswer = $mQuery->getResultAll($sql);
		}
		
		$i = $i + 1;
	}
	
	if(isset($_SESSION['mLoginID']))
	{
		$logInFlag = 1;
		$sql = "select bname, blastname, bemail from member_detail where memberID=".$_SESSION['mLoginID'];
		$result2 = $mQuery->getResultAll($sql);
		
		foreach($result2 as $b)
		{
			$bname = $b['bname']." ".$b['blastname'];
			$bemail = $b['bemail'];
			
			if($bname == "-")
			{
				$bname = $b['bemail'];
			}
		}
		
		unset($result2, $b);
	}
	else
	{
		$logInFlag = 0;
	}	
?>
<div class="samplingMainDiv">
	<div class="samplingProductDiv">
	   	<label class="veryBigBlackBrown">&nbsp;&nbsp;The Sampling House Bloggers</label>
    	<hr class="lineProductSampling" style="margin-left:17px;">
            <div class="bloggerShowDiv">
                <div style="margin-left:2px; margin-bottom:0; margin-top:5px;"><label class="bigBlackBoldChak"><?php echo $blogTitle[0]; ?></label></div>
                <br>
                <label class="middleBlack11">&nbsp;Posted&nbsp;On&nbsp;:&nbsp;<u><?php echo $dFunc->changeDateToDDMMYYYY3($blogStartDateShow[0]); ?></u></label>
                <label class="middleBlack11" style="margin-left:15px;">&nbsp;Posted&nbsp;By&nbsp;:&nbsp;<u><?php echo $aName[0]; ?></u></label>
                <br><br>
                <img src="upload/<?php echo $showMainImage[0]; ?>" class="bloggerImageShowMain" rel="lightbox[picBlog]">
                <p align="center">
                <?php if($blogPicture1[0] != "-"){ ?>
                	<a href="upload/<?php echo $blogPicture1[0]; ?>" rel="lightbox[picBlog]"><img src="upload/<?php echo $blogPicture1Small[0]; ?>" class="bloggerImageSmall" alt="" /></a>
                <?php } ?>
                <?php if($blogPicture2[0] != "-"){ ?>
                	<a href="upload/<?php echo $blogPicture2[0]; ?>" rel="lightbox[picBlog]"><img src="upload/<?php echo $blogPicture2Small[0]; ?>" class="bloggerImageSmall" alt="" /></a>
                <?php } ?>
                <?php if($blogPicture3[0] != "-"){ ?>
                	<a href="upload/<?php echo $blogPicture3[0]; ?>" rel="lightbox[picBlog]"><img src="upload/<?php echo $blogPicture3Small[0]; ?>" class="bloggerImageSmall" alt="" /></a>
                <?php } ?>
                </p>
                <div style="margin-left:15px; margin-bottom:20px; margin-top:20px;"><label class="bigBlack"><?php echo $blogDetail[0]; ?></label></div>
            </div>
        <?php include("blogReplyUserByOne.php"); ?>
        <?php include("blogReplyForm.php"); ?>
    </div>
</div>
<?php
}

unset($mQuery, $mFunc, $dFunc);
?>