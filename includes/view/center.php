    	<?php 
    		include("centerHeadNav.php");

    		$flag = (isset($_REQUEST['flag'])? $_REQUEST['flag'] : '');

    		if(($flag == 'login') and !(isset($_SESSION['mLoginID'])))
    		{
    			include("centerLoginForm.php");
    		}
    		else if(($flag == 'signup') and !(isset($_SESSION['mLoginID'])))
    		{
    			include("centerSignupForm.php");
    		}
    		else if(($flag == 'signupOK') and !(isset($_SESSION['mLoginID'])))
    		{
    			include("centerSignupSuccessForm.php");
    		}
    		else if(($flag == 'grapSample') and !(isset($_SESSION['mLoginID'])))
    		{
    			include("centerLoginForm.php");
    		}
    		else
    		{
    			if($flag == 'sampling')
    			{
    				include("centerSamplingForm.php");
    			}
    			else if($flag == 'promotion')
    			{
    				include("centerPromotionForm.php");
    			}
    			else if($flag == 'howto')
    			{
    				include("centerHowtoOrderForm.php");
    			}
    			else if($flag == 'blogger')
    			{
    				include("centerBloggerForm.php");
    			}
    			else if($flag == 'bloggerByOne')
    			{
    				include("centerBloggerByOneForm.php");
    			}
    			else if($flag == 'signup')
    			{
    				include("signupForm.php");
    			}
    			else if($flag == 'contactus')
    			{
    				include("centerContactUsForm.php");
    			}
    			else if($flag == 'member')
    			{
    				include("centerMemberForm.php");
    			}
    			else if($flag == 'productDetail')
    			{
    				include("centerProductDetailForm.php");
    			}
    			else if($flag == 'productReview')
    			{
    				include("centerProductReviewForm.php");
    			}
    			else if($flag == 'grapSample')
    			{
    				include("centerGrapSampleForm.php");
    			}
    			else if($flag == 'orderMethod')
    			{
    				include("centerOrderMethodForm.php");
    			}
    			else if($flag == 'orderConfirm')
    			{
    				include("centerOrderConfirmForm.php");
    			}
    			else if($flag == 'chkGrapProduct')
    			{
					include("centerChkGrapProductForm.php");
    			}
    			else
    			{
    				include("centerIndex.php");
    			}  //----------  if($flag == 'sampling')
    		}  //----------  if(($flag == 'login') and !(isset($_SESSION['mLoginID'])))
    	?>