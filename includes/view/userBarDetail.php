<?php include("includes/control/userBar_Ctl.php");?>
<?php
if(isset($_SESSION['mLoginID']))
{
?>
<div class="myBarDiv">
	<label class="middleBlue11Italic">Welcome&nbsp;<?php echo $myName; ?></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
    <a href="<?php echo $linkBasket; ?>" class="linkMiddleAlmostBlack11" target="_top">My&nbsp;Basket&nbsp;<?php echo $myBasket; ?></a>
    &nbsp;/&nbsp;
    <label class="middleBlack11">My&nbsp;Points&nbsp;<?php echo $myPoint; ?>&nbsp;points</label>
</div>
<?php
}
else
{
?>
<div class="myBarDiv">
	<label class="middleBlue11Italic">Welcome&nbsp;To&nbsp;The &nbsp;Sampling&nbsp;House</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
    <a href="index.php?flag=login" class="linkMiddleAlmostBlack11" style="font-style:italic;" target="_top">(&nbsp;Log&nbsp;In&nbsp;)</a>
</div>
<?php
}
?>