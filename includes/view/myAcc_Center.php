<?php
switch($_REQUEST['flagMember'])
{
	case "accountinf" :
		include("accountInfForm.php");
		break;
	case "notification" :
		echo '<img name="MyAcc_Noti_r5_c2" src="images/MyAcc_Noti_r5_c2.jpg" width="775" height="475" border="0" id="MyAcc_Noti_r5_c2" alt="" />';
		break;
	case "order" :
		include("orderStatusForm.php");
		break;
	case "point" :
		include("pointShowForm.php");
		break;
	case "watch" :
		echo '<img name="MyAcc_Noti_r5_c2" src="images/MyAcc_Watch_r5_c2.jpg" width="775" height="475" border="0" id="MyAcc_Noti_r5_c2" alt="" />';
		break;
	case "referral" :
		echo '<img name="MyAcc_Noti_r5_c2" src="images/MyAcc_Ref_r5_c2.jpg" width="775" height="475" border="0" id="MyAcc_Noti_r5_c2" alt="" />';
		break;
}
?>