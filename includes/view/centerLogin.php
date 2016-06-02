<body style="background:#F7F7F7;">

<form action="includes/control/loginMember_Ctl.php" method="post">
  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    
    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form>
            <h1>Login to System</h1>
                <?php 
                    if(isset($_REQUEST['errLog']))
                    {
                ?>
                        <div class="alert alert-danger">
                            กรุณาตรวจสอบข้อมูลของท่านอีกครั้งค่ะ.
                        </div>
                <?php
                    }
                ?>

            <div class="input-group input-group-lg">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
              <input type="email" class="form-control" name="uname" placeholder="Your E-Mail" required>
            </div>

            <div class="input-group input-group-lg">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
              <input type="password" class="form-control" name="upass" placeholder="Your Password" required>
            </div>
            <div class="clearfix"></div><br>

            <div style="padding-bottom: 20px;">
              <button type="submit" class="btn btn-primary">&nbsp;&nbsp;Log In&nbsp;&nbsp;</button>
              <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> <?php echo $programName; ?></h1>

                <p>©2015 All Rights Reserved. Privacy and Terms</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>
</form>

</body>