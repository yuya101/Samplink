<?php 
require_once($classPath."mainquery.php");

$mQuery = new MainQuery();

//--------------------------- Query Blog Order by Date ------------------------------------------
$sql = "select blogID, blogTitle from blog_detail order by blogStartDateShow desc limit 10";
$numBlogOrderDate = $mQuery->checkNumRows($sql);

if($numBlogOrderDate > 0)
{
	$blogDateCount = 0;
	
	$resultBlogOrderDate = $mQuery->getResultAll($sql);
	
	foreach($resultBlogOrderDate as $r)
	{
		$blogIDOrderDate[$blogDateCount] = $r['blogID'];
		$blogTitleOrderDate[$blogDateCount] = substr($r['blogTitle'], 0, 60);
		
		$blogDateCount++;
	}
	
	unset($resultBlogOrderDate, $r);
}
//--------------------------- Query Blog Order by Date ------------------------------------------

//--------------------------- Query Blog Order by Answer ------------------------------------------
$sql = "select blogID, blogTitle from blog_detail order by blogAnswerCount desc limit 10";
$numBlogOrderAnswer = $mQuery->checkNumRows($sql);

if($numBlogOrderAnswer > 0)
{
	$blogAnswerCount = 0;
	
	$resultBlogOrderAnswer = $mQuery->getResultAll($sql);
	
	foreach($resultBlogOrderAnswer as $r)
	{
		$blogIDOrderAnswer[$blogAnswerCount] = $r['blogID'];
		$blogTitleOrderAnswer[$blogAnswerCount] = substr($r['blogTitle'], 0, 60);
		
		$blogAnswerCount++;
	}
	
	unset($resultBlogOrderAnswer, $r);
}
//--------------------------- Query Blog Order by Answer ------------------------------------------
?>
<div class="bloggerRightDiv">
	<label class="bigBlackBold"><b>Hot&nbsp;Reply...</b></label>
    <?php for($i=0; $i<$blogAnswerCount; $i++){ ?>
    	<br>
    	<a href="index.php?flag=bloggerByOne&bid=<?php echo $blogIDOrderAnswer[$i]; ?>" class="linkMiddleAlmostBlack11" target="_top">&bull;&nbsp;&nbsp;<?php echo $blogTitleOrderAnswer[$i]; ?></a>
    <?php } ?>
</div>
<br><br>
<div class="bloggerRightDiv">
	<label class="bigBlackBold"><b>Last&nbsp;Update...</b></label>
    <?php for($i=0; $i<$blogDateCount; $i++){ ?>
    	<br>
    	<a href="index.php?flag=bloggerByOne&bid=<?php echo $blogIDOrderDate[$i]; ?>" class="linkMiddleAlmostBlack11" target="_top">&bull;&nbsp;&nbsp;<?php echo $blogTitleOrderDate[$i]; ?></a>
    <?php } ?>
</div>
<?php
unset($numBlogOrderDate, $numBlogOrderAnswer);
unset($mQuery);
?>