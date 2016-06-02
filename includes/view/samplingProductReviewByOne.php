<div class="samplingMainDiv">
	<div class="samplingProductDiv">
    	<?php if(isset($chkSearch) and ($chkSearch == 0)){ ?>
    		<?php include('searchBox.php'); ?>
            <?php $chkSearch = 1; ?>
        <?php } ?>
    	<hr class="lineProductSampling">
        	<label class="veryBigBlackBrown">&nbsp;:&nbsp;&nbsp;<?php echo $productName; ?>&nbsp;&nbsp;:</label>
    	<hr class="lineProductSampling">
        <img name="showProduct_r6_c2" src="images/showProduct_r6_c2.jpg" width="773" height="19" border="0" alt="" style="margin-top:5px; margin-bottom: 5px;" />
        <div class="samplingShowPicture">
        	<div class="samplingProductDiv1">
            	<a href="upload/<?php echo $pictureProduct[0]; ?>" rel="lightbox[picSmall]"><img src="upload/<?php echo $pictureProduct[0]; ?>" class="samplingProductPicMain" alt="" /></a>
                <p align="center">
                <?php 
					for($picSNum=1; $picSNum<=4; $picSNum++)
					{ 
						if($pictureProduct[$picSNum] != "-")
						{
							$pictureProductSmall = $mFunc->thumbImageName($pictureProduct[$picSNum]);
							echo '<a href="upload/'.$pictureProduct[$picSNum].'" rel="lightbox[picSmall]"><img src="upload/'.$pictureProduct[$picSNum].'" class="samplingProductPicSmall" alt="" /></a>';
						}
				 	} 
				?>
                </p>
            </div>
        	<div class="samplingProductDiv2">
            	<img name="showProduct_r7_c2_r1_c2" src="images/showProduct_r7_c2_r1_c2.jpg" width="7" height="320" alt="" />
            </div>
        	<div class="samplingProductDiv3">
            	<ul class="ratingShowUL">
                <?php for($rt=0; $rt<5; $rt++){ ?>
                	<li><label><?php echo $ratingName[$rt]; ?>...</label></li>
                	<li>
                    	<div class="ratingStarLI">
                        	<?php $starSize = 15; ?>
                        	<?php for($z=1; $z<=5; $z++){ ?>
                            	<?php $starPicture = (($sumRating[$rt] >= $z) ? "starPink" : "starWhite");?>
                    				<img src="images/<?php echo $starPicture; ?>.jpg" class="pointStar">
                                <?php $starSize = $starSize + 2; ?>
                            <?php } ?>
                        </div>
                   </li>
                <?php } ?>
                </ul>
                <hr class="lineProductSamplingDetail">
                <label class="middleSilver11" style="margin-left:10px; float:left;">What do you want to do?</label>
                <br>
                <p style="float:left;">
                    <a href="index.php?flag=grapSample&pid=<?php echo $productID; ?>" target="_top"><img src="images/showProduct_r7_c22_r2_c2.jpg" width="104" height="28" class="pointStar"></a>
                </p>
            </div>
        </div>
        <img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" alt="" />
        
        
        <div class="samplingProductDetailDiv" id="samplingProductReviewDivMain" <?php if($reviewChkNum == 1){ echo 'style="display:none;"';} ?>>
        	<label class="big14BigBrown">Review สินค้า&nbsp;(&nbsp;1 = ไม่พอใจที่สุด, 5 = พอใจที่สุด&nbsp;)&nbsp;&nbsp;:</label>
            <br>
            	<ul class="ratingShowUL">
                <?php for($rt=0; $rt<5; $rt++){ ?>
                	<li><label><?php echo $ratingName[$rt]; ?>...</label></li>
                	<li>
                    	<div class="ratingPointLI">
                            	<input type="radio" name="reviewRating<?php echo $rt+1; ?>" value="1" onChange="document.getElementById('reviewRatingValue<?php echo $rt+1; ?>').value=1;">&nbsp;<font class="middlePurple11">ไม่พอใจที่สุด</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="radio" name="reviewRating<?php echo $rt+1; ?>" value="2" onChange="document.getElementById('reviewRatingValue<?php echo $rt+1; ?>').value=2;">&nbsp;<font class="middlePurple11">ไม่พอใจ</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="radio" name="reviewRating<?php echo $rt+1; ?>" value="3" checked onChange="document.getElementById('reviewRatingValue<?php echo $rt+1; ?>').value=3;">&nbsp;<font class="middlePurple11">เฉยๆ</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="radio" name="reviewRating<?php echo $rt+1; ?>" value="4" onChange="document.getElementById('reviewRatingValue<?php echo $rt+1; ?>').value=4;">&nbsp;<font class="middlePurple11">พอใจ</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="radio" name="reviewRating<?php echo $rt+1; ?>" value="5" onChange="document.getElementById('reviewRatingValue<?php echo $rt+1; ?>').value=5;">&nbsp;<font class="middlePurple11">พอใจที่สุด</font>
                                <input type="hidden" value="3" id="reviewRatingValue<?php echo $rt+1; ?>">
                        </div>
                   </li>
                <?php } ?>
                </ul>
            <br>
            <label class="bigBlack" style="vertical-align:top;">ความคิดเห็นของผู้ใช้&nbsp;&nbsp;:&nbsp;&nbsp;</label>
            <br>
            <textarea name="reviewComment" cols="60" rows="3" id="reviewComment"></textarea>
            <input type="hidden" id="memberReviewID" value="<?php echo $_SESSION['mLoginID']; ?>">
            <input type="hidden" id="productReviewID" value="<?php echo $productID; ?>">
            <p align="right" style="margin-right:50px;"><input type="submit" value="&nbsp;แสดงความคิดเห็น&nbsp;" name="reviewAddBtn" onClick="javascript:addMemberReview();"></p>
        </div>
        
        
       <div id="addSamplingProductReviewDiv" <?php if($reviewChkNum == 0){ echo 'style="display:none;"';} ?>>
       		<br><br>
       		<p align="center"><label class="bigDarkBlue">ขอขอบคุณ<br>สำหรับการแสดงความคิดเห็นในสินค้าชิ้นนี้ค่ะ</label></p>
       </div>
       <div align="center" id="addSamplingProductReviewLoading" style="display:none;">
       		<br /><br />
                <img src="images/loading.gif" border="0" />
            <br /><br />
            <font class="middleRed">...กรุณารอสักครู่ค่ะ...</font>
       </div>
        
    </div>
</div>