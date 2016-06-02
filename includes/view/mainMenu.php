<?php
$menuPic = array("BlackMenu1_r2_c2.jpg", "BlackMenu1_r2_c3.jpg", "BlackMenu1_r2_c4.jpg", "BlackMenu2_r2_c5.jpg", "BlackMenu2_r2_c6.jpg", "BlackMenu2_r2_c7.jpg");

if(isset($_SESSION['mLoginID']))
{
	$menuPic[4] = "mainMenu_Member_Black.jpg";
}
else
{
	$menuPic[4] = "BlackMenu2_r2_c6.jpg";
}

switch(@$_REQUEST['flag'])
{
	case "sampling":
		$menuPic[0] = "PinkMenu_r2_c2.jpg";
		break;
	case "promotion":
		$menuPic[1] = "PinkMenu_r2_c3.jpg";
		break;
	case "howto":
		$menuPic[2] = "PinkMenu_r2_c4.jpg";
		break;
	case "blogger":
		$menuPic[3] = "PinkMenu_r2_c5.jpg";
		break;
	case "signup":
		$menuPic[4] = "PinkMenu_r2_c6.jpg";
		break;
	case "member":
		$menuPic[4] = "mainMenu_Member_Over.jpg";
		break;
	case "contactus":
		$menuPic[5] = "PinkMenu_r2_c7.jpg";
		break;
}

if(isset($_SESSION['mLoginID']))
{
	$mainMenuMem = '<a href="index.php?flag=member&flagMember=accountinf" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c6" src="images/'.$menuPic[4].'" width="98" height="34" border="0" id="PinkMenu_r2_c6" alt="" /></a>';
}
else
{
	$mainMenuMem = '<a href="index.php?flag=signup" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c6" src="images/'.$menuPic[4].'" width="98" height="34" border="0" id="PinkMenu_r2_c6" alt="" /></a>';
}
?>
            <table style="margin-left:auto; margin-right:auto;">
              <tr>
               <td colspan="3"><img name="PinkMenu_r1_c1" src="images/PinkMenu_r1_c1.jpg" width="998" height="4" border="0" id="PinkMenu_r1_c1" alt="" /></td>
              </tr>
              <tr>
               <td rowspan="2"><img name="PinkMenu_r2_c1" src="images/PinkMenu_r2_c1.jpg" width="127" height="43" border="0" id="PinkMenu_r2_c1" alt="" /></td>
               <td><table>
                  <tr>
                   <td><a href="index.php?flag=sampling" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c2" src="images/<?php echo $menuPic[0]; ?>" width="104" height="34" border="0" id="PinkMenu_r2_c2" alt="" /></a></td>
                   <td><a href="index.php?flag=promotion" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c3" src="images/<?php echo $menuPic[1]; ?>" width="117" height="34" border="0" id="PinkMenu_r2_c3" alt="" /></a></td>
                   <td><a href="index.php?flag=howto" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c4" src="images/<?php echo $menuPic[2]; ?>" width="188" height="34" border="0" id="PinkMenu_r2_c4" alt="" /></a></td>
                   <td><a href="index.php?flag=blogger" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c5" src="images/<?php echo $menuPic[3]; ?>" width="104" height="34" border="0" id="PinkMenu_r2_c5" alt="" /></a></td>
                   <td><?php echo $mainMenuMem; ?></td>
                   <td><a href="index.php?flag=contactus" class="linkSmallPigBlood" target="_top"><img name="PinkMenu_r2_c7" src="images/<?php echo $menuPic[5]; ?>" width="127" height="34" border="0" id="PinkMenu_r2_c7" alt="" /></a></td>
                  </tr>
                </table></td>
               <td rowspan="2"><img name="PinkMenu_r2_c8" src="images/PinkMenu_r2_c8.jpg" width="133" height="43" border="0" id="PinkMenu_r2_c8" alt="" /></td>
              </tr>
              <tr>
               <td><img name="PinkMenu_r3_c2" src="images/PinkMenu_r3_c2.jpg" width="738" height="9" border="0" id="PinkMenu_r3_c2" alt="" /></td>
              </tr>
            </table>