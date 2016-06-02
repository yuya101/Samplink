<?php for($divNo=1; $divNo < $pageAll; $divNo++){ ?>
    <div id="showMoreProductDiv<?php echo $divNo; ?>" class="samplingMainDiv" style="display:none;"></div>
    <div align="center" id="showMoreProductLoading<?php echo $divNo; ?>" style="display:none;">
        <br /><br />
        <img src="images/loading.gif" border="0" />
        <br /><br />
        <font class="middleRed">...กรุณารอสักครู่ค่ะ...</font>
    </div>
<?php } ?>

<div id="loadMoreButton" class="samplingMainDiv">
	<div class="samplingProductDiv">
        <a href="javascript:;" onClick="loadMoreProduct();"><img src="images/loadMore.png" width="200" height="54" style="margin-left:auto; margin-right:auto;"></a>
    </div>
</div>

<input type="hidden" name="divNo" id="divNo" value="1">
<input type="hidden" name="pageNo" id="pageNo" value="1">
<input type="hidden" name="pageSize" id="pageSize" value="<?php echo $pageSize; ?>">
<input type="hidden" name="pageAll" id="pageAll" value="<?php echo $pageAll; ?>">
<input type="hidden" name="reqCatID" id="reqCatID" value="<?php echo $reqCatID; ?>">
<input type="hidden" name="reqBrandID" id="reqBrandID" value="<?php echo $reqBrandID; ?>">
<input type="hidden" name="reqSubCatID" id="reqSubCatID" value="<?php echo $reqSubCatID; ?>">
<input type="hidden" name="reqSearchText" id="reqSearchText" value="<?php echo $reqSearchText; ?>">