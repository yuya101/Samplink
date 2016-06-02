<?php
if($logInFlag == 1)
{
?>
    <br>
    <form action="includes/control/addCusAnswer_Ctl.php" method="post" name="answerCForm">
        <fieldset style=" width: 730px; margin-left: 17px; margin-top: 30px;">
            <legend class="veryBigBlackBrown">&bull;&bull;&nbsp;&nbsp;Leave a Reply&nbsp;&nbsp;&bull;&bull;</legend>
            <label class="middleBlack" style="margin-left:15px;">Leave your reply in the form below.</label>
            <!--label class="middleRed" style="margin-left:15px;">(&nbsp;Your email address will not be published. Required fields are marked *&nbsp;)</label-->
            <br>
            
            <div class="bloggerReplyFormClass">
                <p align="center">
                    <ul class="blogUL">
                        <li>
                            <label>Name&nbsp;:&nbsp;</label><input type="text" name="answerNameTemp" id="answerNameTemp" size="30" maxlength="100" value="<?php echo $bname; ?>" readonly>
                        </li>
                        <li>
                            <label>E-Mail&nbsp;:&nbsp;</label><input type="text" name="answerEmailTemp" id="answerEmailTemp" size="30" maxlength="100" value="<?php echo $bemail; ?>" readonly>
                        </li>
                        <li>
                            <label>Website&nbsp;:&nbsp;</label><input type="text" name="answerWebsite" id="answerWebsite" size="40" maxlength="200" value="http://" required placeholder="Your Website">
                        </li>
                        <li>
                            <label>Comment&nbsp;:&nbsp;</label><textarea name="answerComment" id="answerComment" rows="2" cols="60" required></textarea>
                        </li>
                    </ul>
                </p>
                <p align="center">
                    <br><br>
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="answerName" value="<?php echo $bname; ?>">
                    <input type="hidden" name="answerEmail" value="<?php echo $bemail; ?>">
                    <input type="submit" name="answerSubmit" id="answerSubmit" value="&nbsp;&nbsp;Post Comment&nbsp;&nbsp;" onClick="return confirm('Confirm Post Comment?');">
                </p>
            </div>
        </fieldset>
    </form>
<?php 
}
else
{
?>
    <br>
    <form action="includes/control/addCusAnswer_Ctl.php" method="post" name="answerCForm">
        <fieldset style=" width: 730px; margin-left: 17px;">
            <legend class="veryBigBlackBrown">&bull;&bull;&nbsp;&nbsp;Leave a Reply&nbsp;&nbsp;&bull;&bull;</legend>
            <p align="center">
            	<label class="middlePurple11">กรุณา&nbsp;<a href="index.php?flag=login" class="linkBlueBlack12Bold" target="_top">เข้าสู่ระบบ</a>&nbsp;ก่อนค่ะ</label>
            </p>
        </fieldset>
    </form>
<?php 
}
?>