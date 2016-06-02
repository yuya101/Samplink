<?php 
if($numAnswer > 0)
{
?>
            <div class="samplingProductReviewDiv">
                &nbsp;
                <label class="big14BigBrown" style="margin-left:15px;">Member Replys&nbsp;&nbsp;:</label>
                <?php 
					foreach($resultAnswer as $ans)
					{ 
						$answerWebsite  = $ans['answerWebsite'];
						$answerComment  = $ans['answerComment'];
						$answerDate  = $dFunc->changeDateToDDMMYYYY3($ans['addDate']);
						$replyID = $ans['addID'];
						
						$sql = "select member_login from member_login where memberID=".$replyID;
						$resultMember = $mQuery->getResultAll($sql);
						
						foreach($resultMember as $mem)
						{
							$memberLogin = $mem['member_login'];
						}
						
						$sql = "select pictureName1 from member_picture where memberID=".$replyID;
						$resultMember = $mQuery->getResultAll($sql);
						
						foreach($resultMember as $mem)
						{
							$memberPicture = $mem['pictureName1'];
						}
						
						unset($resultMember, $mem);
				?>
                    <div class="reviewDetailDiv" style="margin-left:15px; margin-top: 30px;">
                        <table align="center" width="745" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="225" valign="top" align="center">
                            	<img src="upload/<?php echo $memberPicture; ?>" width="80" height="50" class="memberReviewImg">
                             	<p align="left" style="margin-left:10px;">
                                	<label class="middleAlmostBlack">User&nbsp;:&nbsp;</label>
                                    <label class="middlePurple"><?php echo $memberLogin; ?></label>
                                    <br>
                                	<label class="middleAlmostBlack">Review On&nbsp;:&nbsp;</label>
                                    <label class="middlePurple"><?php echo $answerDate; ?></label>
                                </p>
                            </td>
                            <td background="images/reviewProductVerticalLine.jpg" width="7" height="100%">&nbsp;</td>
                            <td align="center" valign="top" width="513">
                                <div class="samplingReviewDetailDiv">
                                	<label class="middleAlmostBlack"><u>ความคิดเห็น</u></label>
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo $answerComment; ?>
                                </div>
                                <?php if(($answerWebsite != '-') and ($answerWebsite != 'http://') and ($answerWebsite != '')){ ?>
                                    <p align="left" style="margin-left:10px;">
                                        <label class="middleAlmostBlack">WebSite&nbsp;:&nbsp;</label>
                                        <a href="<?php echo $answerWebsite; ?>" target="_blank" class="linkBlue"><?php echo $answerWebsite; ?></a>
                                    </p>
                                <?php } ?>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <br> 
    					<hr class="lineProductSampling" style="margin-left:17px;">
                <?php } ?>
            </div>
<?php } ?>