<?php
$menuArr = array("MyAccMenu_r5_c2", "MyAccMenu_Notify_Out", "MyAccMenu_r9_c2", "MyAccMenu_r11_c2", "MyAccMenu_r13_c2", "MyAccMenu_r15_c2");

switch($_REQUEST['flagMember'])
{
	case "accountinf" :
		$menuArr[0] = "MyAcc_Acc_Over";
		break;
	case "notification" :
		$menuArr[1] = "MyAccMenu_Notify_Over";
		break;
	case "order" :
		$menuArr[2] = "MyAccMenu_Order_Over";
		break;
	case "point" :
		$menuArr[3] = "MyAccMenu_Point_Over";
		break;
	case "watch" :
		$menuArr[4] = "MyAccMenu_Watch_Over";
		break;
	case "referral" :
		$menuArr[5] = "MyAccMenu_Ref_Over";
		break;
}
?>
<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="223">
  <tr>
   <td><img name="MyAccMenu_r1_c1" src="images/MyAccMenu_r1_c1.jpg" width="17" height="533" border="0" id="MyAccMenu_r1_c1" alt="" /></td>
   <td><table style="display: inline-table;" align="left" border="0" cellpadding="0" cellspacing="0" width="193">
	  <tr>
	   <td><img name="MyAccMenu_r1_c2" src="images/MyAccMenu_r1_c2.jpg" width="193" height="10" border="0" id="MyAccMenu_r1_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r2_c2" src="images/MyAccMenu_r2_c2.jpg" width="193" height="41" border="0" id="MyAccMenu_r2_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r3_c2" src="images/MyAccMenu_r3_c2.jpg" width="193" height="13" border="0" id="MyAccMenu_r3_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r4_c2" src="images/MyAccMenu_r4_c2.jpg" width="193" height="5" border="0" id="MyAccMenu_r4_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=accountinf" target="_top"><img name="MyAccMenu_r5_c2" src="images/<?php echo $menuArr[0]; ?>.jpg" width="193" height="44" border="0" id="MyAccMenu_r5_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r6_c2" src="images/MyAccMenu_r6_c2.jpg" width="193" height="5" border="0" id="MyAccMenu_r6_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=notification" target="_top"><img name="MyAccMenu_r7_c2" src="images/<?php echo $menuArr[1]; ?>.jpg" width="193" height="43" border="0" id="MyAccMenu_r7_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r8_c2" src="images/MyAccMenu_r8_c2.jpg" width="193" height="5" border="0" id="MyAccMenu_r8_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=order" target="_top"><img name="MyAccMenu_r9_c2" src="images/<?php echo $menuArr[2]; ?>.jpg" width="193" height="44" border="0" id="MyAccMenu_r9_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r10_c2" src="images/MyAccMenu_r10_c2.jpg" width="193" height="5" border="0" id="MyAccMenu_r10_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=point" target="_top"><img name="MyAccMenu_r11_c2" src="images/<?php echo $menuArr[3]; ?>.jpg" width="193" height="43" border="0" id="MyAccMenu_r11_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r12_c2" src="images/MyAccMenu_r12_c2.jpg" width="193" height="6" border="0" id="MyAccMenu_r12_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=watch" target="_top"><img name="MyAccMenu_r13_c2" src="images/<?php echo $menuArr[4]; ?>.jpg" width="193" height="42" border="0" id="MyAccMenu_r13_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r14_c2" src="images/MyAccMenu_r14_c2.jpg" width="193" height="6" border="0" id="MyAccMenu_r14_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><a href="index.php?flag=member&flagMember=referral" target="_top"><img name="MyAccMenu_r15_c2" src="images/<?php echo $menuArr[5]; ?>.jpg" width="193" height="43" border="0" id="MyAccMenu_r15_c2" alt="" /></a></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r16_c2" src="images/MyAccMenu_r16_c2.jpg" width="193" height="6" border="0" id="MyAccMenu_r16_c2" alt="" /></td>
	  </tr>
	  <tr>
	   <td><img name="MyAccMenu_r17_c2" src="images/MyAccMenu_r17_c2.jpg" width="193" height="172" border="0" id="MyAccMenu_r17_c2" alt="" /></td>
	  </tr>
	</table></td>
   <td><img name="MyAccMenu_r1_c3" src="images/MyAccMenu_r1_c3.jpg" width="13" height="533" border="0" id="MyAccMenu_r1_c3" alt="" /></td>
  </tr>
</table>