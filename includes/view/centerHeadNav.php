		<div class="row">
			
			<div class="col-sm-12">

                <table style="margin-left:auto; margin-right:auto;">
                  <tr>
                   <td><a href="index.php" target="_top"><img name="index_r1_c1_fw_r1_c1" src="images/index_r1_c1_fw_r1_c1.png" width="119" height="123" border="0" id="index_r1_c1_fw_r1_c1" alt="" /></a></td>
                   <td><img name="index_r1_c1_fw_r1_c2" src="images/index_r1_c1_fw_r1_c2.png" width="742" height="123" border="0" id="index_r1_c1_fw_r1_c2" alt="" /></td>
                   <td><img name="index_r1_c1_fw_r1_c3" src="images/index_r1_c1_fw_r1_c3.png" width="6" height="123" border="0" id="index_r1_c1_fw_r1_c3" alt="" /></td>
                   <td><table>
                      <tr>
                       <td><img name="index_r1_c1_fw_r1_c4" src="images/index_r1_c1_fw_r1_c4.png" width="118" height="18" border="0" id="index_r1_c1_fw_r1_c4" alt="" /></td>
                      </tr>
                      <tr>
                       <td><table>
                          <tr>
                           <td><img name="index_r1_c1_fw_r2_c4" src="images/index_r1_c1_fw_r2_c4.png" width="39" height="17" border="0" id="index_r1_c1_fw_r2_c4" alt="" /></td>
                           <?php if(isset($_SESSION['mLoginID'])){ ?>
                                <td><a href="index.php?flag=logOut" class="linkBlack"><img name="index_r1_c1_fw_r2_c5" src="images/logOut.jpg" width="77" height="17" border="0" id="index_r1_c1_fw_r2_c5" alt="" /></a></td>
                           <?php } else { ?>
                                <td><a href="index.php?flag=login" class="linkBlack"><img name="index_r1_c1_fw_r2_c5" src="images/index_r1_c1_fw_r2_c5.png" width="77" height="17" border="0" id="index_r1_c1_fw_r2_c5" alt="" /></a></td>
                           <?php } ?>
                           <td><img name="index_r1_c1_fw_r2_c6" src="images/index_r1_c1_fw_r2_c6.png" width="2" height="17" border="0" id="index_r1_c1_fw_r2_c6" alt="" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                       <td><img name="index_r1_c1_fw_r3_c4" src="images/index_r1_c1_fw_r3_c4.png" width="118" height="3" border="0" id="index_r1_c1_fw_r3_c4" alt="" /></td>
                      </tr>
                      <tr>
                       <td><table>
                          <tr>
                           <td><img name="index_r1_c1_fw_r4_c4" src="images/index_r1_c1_fw_r4_c4.png" width="39" height="17" border="0" id="index_r1_c1_fw_r4_c4" alt="" /></td>
                           <?php if(isset($_SESSION['mLoginID'])){ ?>
                                <td bgcolor="#FFFFFF" width="77" height="17">&nbsp;</td>
                           <?php } else { ?>
                                <td><a href="index.php?flag=signup" class="linkBlack"><img name="index_r1_c1_fw_r4_c5" src="images/index_r1_c1_fw_r4_c5.png" width="77" height="17" border="0" id="index_r1_c1_fw_r4_c5" alt="" /></a></td>
                           <?php } ?>
                           <td><img name="index_r1_c1_fw_r4_c6" src="images/index_r1_c1_fw_r4_c6.png" width="2" height="17" border="0" id="index_r1_c1_fw_r4_c6" alt="" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                       <td><img name="index_r1_c1_fw_r5_c4" src="images/index_r1_c1_fw_r5_c4.png" width="118" height="6" border="0" id="index_r1_c1_fw_r5_c4" alt="" /></td>
                      </tr>
                      <tr>
                       <td width="118" height="24"></td>
                      </tr>
                      <tr>
                       <td><img name="index_r1_c1_fw_r7_c4" src="images/index_r1_c1_fw_r7_c4.png" width="118" height="6" border="0" id="index_r1_c1_fw_r7_c4" alt="" /></td>
                      </tr>
                      <tr>
                       <td><img name="index_r1_c1_fw_r8_c4" src="images/index_r1_c1_fw_r8_c4.png" width="118" height="29" border="0" id="index_r1_c1_fw_r8_c4" alt="" /></td>
                      </tr>
                      <tr>
                       <td><img name="index_r1_c1_fw_r9_c4" src="images/index_r1_c1_fw_r9_c4.png" width="118" height="3" border="0" id="index_r1_c1_fw_r9_c4" alt="" /></td>
                      </tr>
                    </table></td>
                   <td><img name="index_r1_c1_fw_r1_c7" src="images/index_r1_c1_fw_r1_c7.png" width="13" height="123" border="0" id="index_r1_c1_fw_r1_c7" alt="" /></td>
                  </tr>
                </table>

			</div>   <!-- <div class="col-sm-12"> -->

			<div class="col-sm-12">
				<?php include("includes/view/mainMenu.php"); ?>
			</div>

		</div>  <!-- <div class="row"> -->