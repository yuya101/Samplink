<?php
require_once($classPath."mainquery.php");
require_once($classPath."mainfunction.php");
require_once($classPath."datefunction.php");

$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$sql = "select * from blog_detail order by blogStartDateShow desc limit 20";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
	$result = $mQuery->getResultAll($sql);
	$i = 0;
	
	foreach($result as $r)
	{
		$blogID[$i] = $r['blogID'];
		$blogTitle[$i] = $r['blogTitle'];
		$blogDetail[$i] = $r['blogDetail'];
		$blogStartDateShow[$i] = $r['blogStartDateShow'];		
		$blogPicture1[$i] = $r['blogPicture1'];
		
		$sql = "select ausername from admin where aid=".$r['addID'];
		$result2 = $mQuery->getResultAll($sql);
		
		foreach($result2 as $b)
		{
			$aName[$i] = $b['ausername'];
		}
		
		unset($result2, $b);
				
		$sql = "select answerID from blog_answer where blogID=".$r['blogID'];
		$numAnswer[$i] = $mQuery->checkNumRows($sql);
		
		$i = $i + 1;
	}
	
	$lastUpdate = $dFunc->changeDateToDDMMYYYY3($blogStartDateShow[$i - 1]);	
?>
<div class="samplingMainDiv">
	<div class="samplingProductDiv">
	   	<label class="veryBigBlackBrown">&nbsp;&nbsp;The Sampling House Bloggers</label>
        &nbsp;&nbsp;
        <label class="middleBlue11Italic">(&nbsp;Last&nbsp;Update&nbsp;:&nbsp;<?php echo $lastUpdate; ?>&nbsp;)</label>
    	<hr class="lineProductSampling" style="margin-left:17px;">
        <?php for($j=0; $j<$i; $j++){ ?>
            <div class="bloggerShowDiv">
                <!--label class="bigBlackBold"><?php //echo $j+1; ?>.&nbsp;</label--><a href="index.php?flag=bloggerByOne&bid=<?php echo $blogID[$j]; ?>" class="linkBlack12Bold"><?php echo $blogTitle[$j]; ?></a>
                <br>
                <label class="middleBlack11">&nbsp;Posted&nbsp;On&nbsp;:&nbsp;<u><?php echo $dFunc->changeDateToDDMMYYYY3($blogStartDateShow[$j]); ?></u></label>
                <label class="middleBlack11" style="margin-left:15px;">&nbsp;Posted&nbsp;By&nbsp;:&nbsp;<u><?php echo $aName[$j]; ?></u></label>
                <br>
                <label class="middleBlack11">&nbsp;Answer&nbsp;:&nbsp;<u><?php echo number_format($numAnswer[$j], 0); ?></u>&nbsp;Replys.</label>
            </div>
        <?php } ?>
    </div>
</div>
<?php
}
else
{
	
}

unset($mQuery, $mFunc, $dFunc);
?>