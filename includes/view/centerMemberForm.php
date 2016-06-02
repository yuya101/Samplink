		<div class="row">

			<div class="col-sm-12">
				<?php if(isset($_SESSION['mLoginID'])){ ?>    
				    <div class="centerMain">
				        <table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="998">
				          <tr>
				           <td><img name="MyAcc_Noti_r2_c1" src="images/MyAcc_Noti_r2_c1.jpg" width="998" height="19" border="0" id="MyAcc_Noti_r2_c1" alt="" /></td>
				          </tr>
				          <tr>
				           <td bgcolor="#FFFFFF" width="998" height="38" valign="top"><?php include('userBarDetail.php'); ?></td>
				          </tr>
				          <tr>
				           <td><table style="display: inline-table;" align="left" border="0" cellpadding="0" cellspacing="0" width="998">
				              <tr>
				               <td valign="top"><?php include("myAcc_Menu.php"); ?></td>
				               <td><table style="display: inline-table;" align="left" border="0" cellpadding="0" cellspacing="0" width="775">
				                  <tr>
				                   <td><img name="MyAcc_Noti_r4_c2" src="images/MyAcc_Noti_r4_c2.jpg" width="775" height="58" border="0" id="MyAcc_Noti_r4_c2" alt="" /></td>
				                  </tr>
				                  <tr>
				                   <td valign="top"><?php include("myAcc_Center.php"); ?></td>
				                  </tr>
				                </table></td>
				              </tr>
				            </table></td>
				          </tr>
				          <tr>
				           <td><img name="MyAcc_Noti_r6_c1" src="images/MyAcc_Noti_r6_c1.jpg" width="998" height="13" border="0" id="MyAcc_Noti_r6_c1" alt="" /></td>
				          </tr>
				          <tr>
				           <td><img name="MyAcc_Noti_r7_c1" src="images/MyAcc_Noti_r7_c1.jpg" width="998" height="21" border="0" id="MyAcc_Noti_r7_c1" alt="" /></td>
				          </tr>
				        </table>
				    </div>
				<?php } ?>
			</div>

		</div>  <!-- <div class="row"> -->