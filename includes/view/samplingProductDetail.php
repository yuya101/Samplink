<div class="samplingMainDiv">
	<div class="samplingProductDiv">
    	<?php if($chkSearch == 0){ ?>
    		<?php include('searchBox.php'); ?>
            <?php $chkSearch = 1; ?>
        <?php } ?>
    	<hr class="lineProductSampling">
        	<label class="veryBigBlackBrown">&nbsp;:&nbsp;&nbsp;<?php echo $productName; ?>&nbsp;&nbsp;:</label>
    	<hr class="lineProductSampling">
        <img name="showProduct_r6_c2" src="images/showProduct_r6_c2.jpg" width="773" height="19" border="0" id="showProduct_r6_c2" alt="" style="margin-top:5px; margin-bottom: 5px;" />
        <div class="samplingShowPicture">
        	<div class="samplingProductDiv1">
            	<a href="upload/<?php echo $pictureProduct; ?>" rel="lightbox"><img src="upload/<?php echo $pictureProduct; ?>" class="samplingProductPicMain" alt="" /></a>
                &nbsp;&nbsp;&nbsp;
                <a href="index.php?flag=productDetail&pid=<?php echo $productID; ?>" class="linkBlueBlack12Bold" target="_top">View Product Detail</a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="middleSilver11">(&nbsp;<?php echo number_format($productClickCount, 0)."&nbsp;&nbsp;Views"; ?>&nbsp;)</label>
                <br>
                &nbsp;&nbsp;&nbsp;
               <label class="middlePurple11">Product Use Points&nbsp;:</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="middleSilver11"><?php echo $productPrice."&nbsp;&nbsp;Points"; ?></label>
            </div>
        	<div class="samplingProductDiv2">
            	<img name="showProduct_r7_c2_r1_c2" src="images/showProduct_r7_c2_r1_c2.jpg" width="7" height="291" id="showProduct_r7_c2_r1_c2" alt="" />
            </div>
        	<div class="samplingProductDiv3">
            	<ul class="ratingShowUL">
                <?php for($rt=0; $rt<5; $rt++){ ?>
                	<li><label><?php echo $ratingName[$rt]; ?>...</label></li>
                	<li>
                    	<div class="ratingStarLI">
                        	<?php for($z=1; $z<=5; $z++){ ?>
                            	<?php $starPicture = (($sumRating[$rt] >= $z) ? "starPink" : "starWhite");?>
                    				<img src="images/<?php echo $starPicture; ?>.jpg" class="pointStar" style="vertical-align:bottom;">
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
                    <?php if($reviewChkNum == 0){ ?>
                    	<a href="index.php?flag=productReview&pid=<?php echo $productID; ?>" target="_top"><img src="images/showProduct_r7_c22_r2_c4.jpg" width="104" height="28" class="pointStar"></a>
                    <?php } ?>
                </p>
            </div>
        </div>
        <img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" id="showProduct_r7_c2_r2_c1" alt="" />
        <br>&nbsp;
    </div>
</div>