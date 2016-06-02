<?php
$mQuery = new MainQuery();
$dFunc = new DateFunction();

if(isset($_REQUEST['aid']))
{
  $aid = base64_decode($_REQUEST['aid']);
}
else
{
  $aid = $_SESSION['memberID'];
}  //------------  if(isset($_REQUEST['aid']))


$sql = "select * from admin_detail where aid=".$aid;
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
    $result = $mQuery->getResultAll($sql);

    $i=0;

    foreach($result as $r)
    {
        $firstname = $r['firstname'];
        $lastname = $r['lastname'];
        $dateOfBirth = $r['dateOfBirth'];
        $address = $r['address'];
        $contactNo1 = $r['contactNo1'];
        $contactNo2 = $r['contactNo2'];
        $photograph = $r['photograph'];
        $email = $r['email'];
        $upassword = $r['upassword'];
        $appointmentDate = $r['appointmentDate'];
        $joiningDate = $r['joiningDate'];
        $empcode = $r['empcode'];
        $department = $r['department'];
        $empsalary = $r['empsalary'];
        $qualification[0] = $r['qualification1'];
        $qualification[1] = $r['qualification2'];
        $qualification[2] = $r['qualification3'];
        $qualification[3] = $r['qualification4'];
        $qualification[4] = $r['qualification5'];
        $addressproof = $r['addressproof'];
        $idproof = $r['idproof'];
        $bankaccountname = $r['bankaccountname'];
        $bankaccountnumber = $r['bankaccountnumber'];
        $bankbranch = $r['bankbranch'];
        $bankifsc = $r['bankifsc'];
        $bankcity = $r['bankcity'];
        $remarks = $r['remarks'];


        if($dateOfBirth == "-")
        {
            $dateOfBirth = "";
        }
        else
        {
            $dateOfBirth = $dFunc->changeDateToDDMMYYYY3($dateOfBirth);
        }  //-----------  if($r['certified_expire_date'] == "-")


        if($appointmentDate == "-")
        {
            $appointmentDate = "";
        }
        else
        {
            $appointmentDate = $dFunc->changeDateToDDMMYYYY3($appointmentDate);
        }  //-----------  if($r['certified_expire_date'] == "-")


        if($joiningDate == "-")
        {
            $joiningDate = "";
        }
        else
        {
            $joiningDate = $dFunc->changeDateToDDMMYYYY3($joiningDate);
        }  //-----------  if($r['certified_expire_date'] == "-")
    }  //---------  foreach($result as $r)

    unset($result, $r);
}

unset($mQuery, $dFunc);
?>


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Profile Picture <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                    <?php if($photograph != "-"){ ?>
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$photograph; ?>" width="200" alt="">
                        </div>
                      </div>
                    <?php }else{ ?>                      
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$photograph; ?>" width="200" alt="">
                        </div>
                      </div>
                    <?php } ?>
                  

                </div>
              </div>
            </div> <!-- <div class="col-md-3 col-sm-3 col-xs-3"> -->




            <div class="col-md-5 col-sm-5 col-xs-5">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Personal Details <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                    
                  

                </div>
              </div>
            </div>  <!-- <div class="col-md-5 col-sm-5 col-xs-5"> -->




            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Profile Picture <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                    <?php if($photograph != "-"){ ?>
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$photograph; ?>" width="100" alt="">
                        </div>
                      </div>
                    <?php }else{ ?>                      
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$photograph; ?>" width="100" alt="">
                        </div>
                      </div>
                    <?php } ?>
                  

                </div>
              </div>
            </div>  <!-- <div class="col-md-4 col-sm-4 col-xs-4"> -->


          </div>    <!-- <div class="row"> -->


        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right"><?php echo $designBy; ?></p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
        

        <?php include("scriptMain.php"); ?>


        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        