<?php $picTD = "130px"; ?>
<?php if(isset($_SESSION['mLoginID'])){ ?>
	<?php include("includes/control/orderMethod_Ctl.php");?>
    <form action="includes/control/orderConfirmProcess.php" method="post" target="_top">
    <div class="buyProductFrameDiv" style="width:996px;">
        <h1>แบบฟอร์มสั่งสินค้า (Products Ordering)</h1>
        <hr align="left" color="#EFEFEF" width="100%" />
        <br />
        <fieldset>
            <legend class="bigBlack">ที่อยู่ในการจัดส่งสินค้า</legend>
            <table align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top">
                    <table align="center" cellpadding="2" cellspacing="2" width="98%">
                    <tr>
                        <td valign="top">
                            <table align="center" cellpadding="2" cellpadding="2" width="100%">
                            <tr>
                                <td align="left" valign="top" rowspan="9" width="<?php echo $picTD; ?>">
                                    <font class="bigDarkOrange">Postal Address</font>
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">ชื่อ - นามสกุล ผู้รับ</font>
                                    <br>
                                    <font class="middleSilver">Name - Surname</font>
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">ชื่อ</font>
                                    <br>
                                    <font class="middleSilver">Name</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberName" id="memberName" maxlength="100" size="7" value="<?php echo $bname; ?>" required>
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">นามสกุล</font>
                                    <br>
                                    <font class="middleSilver">Surname</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberSurName" id="memberSurName" maxlength="100" size="7" value="<?php echo $blastname; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" rowspan="6" style="padding-top:10px;">
                                    <font class="middleBlack">ที่อยู่</font>
                                    <br>
                                    <font class="middleSilver">Address</font>
                                </td>
                                <td align="left" valign="top" colspan="4" style="padding-bottom:10px; padding-top:10px;">
                                    <input type="text" name="memberAddress" id="memberAddress" maxlength="100" size="30" value="<?php echo $gcaddress; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    <font class="middleBlack">ซอย</font>
                                    <br>
                                    <font class="middleSilver">Soi</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberSoi" id="memberSoi" maxlength="50" size="7" value="<?php echo $gcsoi; ?>">
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">ถนน</font>
                                    <br>
                                    <font class="middleSilver">Street</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberStreet" id="memberStreet" maxlength="100" size="7" value="<?php echo $gcroad; ?>" required>
                                </td>
                            </tr>
                            <tr id="listMemberDetailTR3" style="display:none;">
                                <td align="left" valign="top">
                                    <font class="middleBlack">แขวง&nbsp;/&nbsp;ตำบล</font>
                                    <br>
                                    <font class="middleSilver">Sub-District</font>
                                </td>
                                <td align="left" valign="top" colspan="3">
                                    <select name="memberTumbon" id="memberTumbon">
                                        <option value="0">----- กรุณาเลือกแขวง/ตำบล -----</option>
                                        <?php if($numTumbon > 0){ ?>
                                            <?php for($i=0; $i<$numTumbon; $i++){ ?>
                                                <option value="<?php echo $tumbonID[$i] ?>" <?php if($gctumbon == $tumbonID[$i]){echo "selected";} ?>><?php echo $tumbonName[$i] ?></option>
                                            <?php } ?>
                                       <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="listMemberDetailTR2" style="display:none;">
                                <td align="left" valign="top">
                                    <font class="middleBlack">เขต&nbsp;/&nbsp;อำเภอ</font>
                                    <br>
                                    <font class="middleSilver">District</font>
                                </td>
                                <td align="left" valign="top" colspan="3">
                                    <select name="memberAmphor" id="memberAmphor" onchange="return refreshListBoxItem(2, this, 'memberTumbon', 'listTumbon', 'listMemberDetailTR', 3, '');">
                                        <option value="0">----- กรุณาเลือกเขต/อำเภอ -----</option>
                                        <?php if($numAmphor > 0){ ?>
                                            <?php for($i=0; $i<$numAmphor; $i++){ ?>
                                                <option value="<?php echo $amphorID[$i] ?>" <?php if($gcamphor == $amphorID[$i]){echo "selected";} ?>><?php echo $amphorName[$i] ?></option>
                                            <?php } ?>
                                       <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="listMemberDetailTR1">
                                <td align="left" valign="top">
                                    <font class="middleBlack">จังหวัด</font>
                                    <br>
                                    <font class="middleSilver">City</font>
                                </td>
                                <td align="left" valign="top" colspan="3">
                                    <select name="memberCity" id="memberCity" onchange="return refreshListBoxItem(1, this, 'memberAmphor', 'listAmphor', 'listMemberDetailTR', 3, '');">
                                        <option value="0">----- กรุณาเลือกจังหวัด -----</option>
                                        <?php for($i=0; $i<$numProvince; $i++){ ?>
                                            <option value="<?php echo $provinceID[$i] ?>" <?php if($gcprovince == $provinceID[$i]){echo "selected";} ?>><?php echo $provinceName[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    <font class="middleBlack">รหัสไปรษณีย์</font>
                                    <br>
                                    <font class="middleSilver">Postal Code</font>
                                </td>
                                <td align="left" valign="top" colspan="3">
                                    <input type="text" name="memberPostalCode" id="memberPostalCode" maxlength="5" size="7" value="<?php echo $gcpostcode; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" rowspan="4">
                                    <font class="middleBlack">เบอร์โทรศัพท์</font>
                                    <br>
                                    <font class="middleSilver">Tel.</font>
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">โทรศัพท์บ้าน</font>
                                    <br>
                                    <font class="middleSilver">Telephone</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberTel" id="memberTel" maxlength="10" size="7" value="<?php echo $btelephone; ?>">
                                </td>
                                <td align="left" valign="top">
                                    <font class="middleBlack">หมายเลขต่อ</font>
                                    <br>
                                    <font class="middleSilver">Ext.</font>
                                </td>
                                <td align="left" valign="top">
                                    <input type="text" name="memberExt" id="memberExt" maxlength="10" size="7" value="<?php echo $btelephoneext; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    <font class="middleBlack">โทรศัพท์มือถือ</font>
                                    <br>
                                    <font class="middleSilver">Mobile</font>
                                </td>
                                <td align="left" valign="top" colspan="3">
                                    <input type="text" name="memberMobile" id="memberMobile" maxlength="10" size="7" value="<?php echo $bmobile; ?>" required>
                                </td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
            </table>
        </fieldset>
    </div>
    <?php include('orderProductList.php'); ?>
    </form>
<?php } ?>