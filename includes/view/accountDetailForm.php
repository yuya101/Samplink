<?php $picTD = "130px"; ?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" valign="top">
        <table align="center" cellpadding="2" cellspacing="2" width="90%">
        <tr>
        	<td align="center" height="5px">
            	<?php if(isset($_REQUEST['chgOK'])){ ?>
                	<br>
                	<label class="middlePurple11">::&nbsp;ดำเนินการปรับปรุงข้อมูลของท่านเรียบร้อยแล้วค่ะ&nbsp;::</label>
                    <br>&nbsp;
                <?php } ?>
            	<?php if(isset($_REQUEST['PErr'])){ ?>
                	<br>
                	<label class="middleRed11">::&nbsp;รหัสผ่านของท่านไม่ถูกต้อง กรุณากรอกให้ถูกต้องค่ะ&nbsp;::</label>
                    <br>&nbsp;
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td valign="top">
            	<table align="center" cellpadding="2" cellpadding="2" width="100%">
                <tr>
                	<td align="left" valign="top" rowspan="4" width="<?php echo $picTD; ?>">
                    	<font class="bigDarkOrange">Personal Profile</font>
                        <p align="center"><div style="width:119px; height:119px; background-color:#CCC;"><?php echo $memberPicture; ?></div></p>
                    </td>
                    <td align="left" valign="top">
                    	<font class="middleBlack">วัน&nbsp;เดือน&nbsp;ปี&nbsp;เกิด</font>
                        <br>
                        <font class="middleSilver">Date of Birth</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="date" name="dateOfBirthMem" id="dateOfBirthMem" size="10" maxlength="10" value="<?php echo $dateOfBirth; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">เพศ</font>
                        <br>
                        <font class="middleSilver">Gender</font>
                    </td>
                    <td align="left" valign="top">
                    	<select name="genderMem" id="genderMem">
                        	<option value="1" <?php if($bsex == 1){echo "selected";} ?>>ชาย</option>
                        	<option value="2" <?php if($bsex == 2){echo "selected";} ?>>หญิง</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">สถานภาพสมรส</font>
                        <br>
                        <font class="middleSilver">Marital Status</font>
                    </td>
                    <td align="left" valign="top">
                    	<select name="statusMem" id="statusMem">
                        	<option value="1" <?php if($marriedStatus == 1){echo "selected";} ?>>โสด</option>
                        	<option value="2" <?php if($marriedStatus == 2){echo "selected";} ?>>แต่งงาน</option>
                        	<option value="3" <?php if($marriedStatus == 3){echo "selected";} ?>>หย่าร้าง</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">อัปโหลดรูปของคุณ</font>
                        <br>
                        <font class="middleSilver">Upload your photo</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="file" name="pictureMem[]" id="pictureMem" size="30">
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td align="left" valign="middle" height="20px"><img src="images/AccountForm_r3_c3.jpg" width="100%"></td>
        </tr>
        <tr>
            <td valign="top">
            	<table align="center" cellpadding="2" cellpadding="2" width="100%">
                <tr>
                	<td align="left" valign="top" rowspan="2" width="<?php echo $picTD; ?>">
                    	<font class="bigDarkOrange">Security</font>
                    </td>
                    <td align="left" valign="top">
                    	<font class="middleBlack">รหัสผ่านใหม่</font>
                        <br>
                        <font class="middleSilver">New Password</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="password" name="newPassMem" id="newPassMem" maxlength="20" size="20">
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">พิมพ์รหัสผ่านใหม่อีกครั้ง</font>
                        <br>
                        <font class="middleSilver">Re-Type New Password</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="password" name="newPassMem2" id="newPassMem2" maxlength="20" size="20">
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td align="left" valign="middle" height="20px"><img src="images/AccountForm_r3_c3.jpg" width="100%"></td>
        </tr>
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
                    	<input type="text" name="memberName" id="memberName" maxlength="100" size="7" value="<?php echo $bname; ?>" >
                    </td>
                    <td align="left" valign="top">
                    	<font class="middleBlack">นามสกุล</font>
                        <br>
                        <font class="middleSilver">Surname</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="text" name="memberSurName" id="memberSurName" maxlength="100" size="7" value="<?php echo $blastname; ?>" >
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top" rowspan="6">
                    	<font class="middleBlack">ที่อยู่</font>
                        <br>
                        <font class="middleSilver">Address</font>
                    </td>
                    <td align="left" valign="top" colspan="4" style="padding-bottom:10px;">
                    	<input type="text" name="memberAddress" id="memberAddress" maxlength="100" size="30" value="<?php echo $gcaddress; ?>">
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
                    	<input type="text" name="memberStreet" id="memberStreet" maxlength="100" size="7" value="<?php echo $gcroad; ?>">
                    </td>
                </tr>
                <tr id="listMemberDetailTR3">
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
                <tr id="listMemberDetailTR2">
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
                    	<input type="text" name="memberPostalCode" id="memberPostalCode" maxlength="5" size="7" value="<?php echo $gcpostcode; ?>">
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
                    	<input type="text" name="memberMobile" id="memberMobile" maxlength="10" size="7" value="<?php echo $bmobile; ?>">
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td align="left" valign="middle" height="20px"><img src="images/AccountForm_r3_c3.jpg" width="100%"></td>
        </tr>
        <tr>
            <td valign="top">
            	<table align="center" cellpadding="2" cellpadding="2" width="100%">
                <tr>
                	<td align="left" valign="top" rowspan="3" width="<?php echo $picTD; ?>">
                    	<font class="bigDarkOrange">E-mail</font>
                    </td>
                    <td align="left" valign="top">
                    	<font class="middleBlack">อีเมล์</font>
                        <br>
                        <font class="middleSilver">E-mail</font>
                    </td>
                    <td align="left" valign="top">
                    	<label class="middleBlack"><?php echo $memberEmail; ?></label>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">เปลี่ยนอีเมล์</font>
                        <br>
                        <font class="middleSilver">New E-mail</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="text" name="memberNewEmail" id="memberNewEmail" size="25" maxlength="100">
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<font class="middleBlack">รหัสผ่านปัจจุบัน</font>
                        <br>
                        <font class="middleSilver">Password</font>
                    </td>
                    <td align="left" valign="top">
                    	<input type="password" name="memberPassword" id="memberPassword" size="25" maxlength="100">
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        </table>
    </td>
</tr>
</table>
<!-- <script>
    jDateP(function(){
        jDateP("#dateOfBirthMem").datepick({dateFormat: 'dd/mm/yyyy'});
    })();
</script> -->