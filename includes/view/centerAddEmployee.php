      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            
          </div>
          <div class="clearfix"></div>

          <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="includes/control/addEmployee_Ctl.php" method="post">

          <div class="row">

            <?php if((isset($_SESSION['formComplete']) and ($_SESSION['formComplete']!=""))){ ?>
              <div class="col-lg-12">
                <div class="col-md-12">
                  <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">Insert New Employee Use Email <?php echo base64_decode($_SESSION['formComplete']); ?> Complete.</label></strong>
                  </div>
                </div>
              </div>
              <?php unset($_SESSION['formComplete']); ?>
            <?php } ?>


            <?php if(isset($_SESSION['formError']) and ($_SESSION['formError']!="")){ ?>
              <div class="col-lg-12">
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <strong><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">New Employee Use Email <?php echo base64_decode($_SESSION['formError']); ?> Already Exist.</label></strong>
                  </div>
                </div>
              </div>
              <?php unset($_SESSION['formError']); ?>
            <?php } ?>


            <div class="col-md-6 col-xs-12">  <!-- Section Left -->
              <div class="x_panel">
                <div class="x_title">
                  <h2>New Employee <small>Personal Details</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="firstname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="firstname" placeholder="" required="required" type="text" maxlength="100">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="" required="required" type="text" maxlength="100">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dateOfBirth">Date Of Birth
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="dateOfBirth" name="dateOfBirth" placeholder="Date Of Birth" aria-describedby="inputSuccess2Status">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>                    

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea class="form-control" rows="3" placeholder='Enter Your Address' id="address" name="address"></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactNo1">Contact No.1
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="contactNo1" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="contactNo1" placeholder="" type="text" maxlength="100">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactNo2">Contact No.2
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="contactNo2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="contactNo2" placeholder="" type="text" maxlength="100">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photograph">Photograph
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="photograph" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="photograph" placeholder="" type="file">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="" required="required" type="email" maxlength="100">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="upassword" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="upassword" placeholder="" required="required" type="password" maxlength="20">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="repassword">Retype-Password <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="repassword" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="repassword" placeholder="" required="required" type="password" maxlength="20">
                      </div>
                    </div>

                    

                </div>
              </div>
            </div>



            
            <div class="col-md-6 col-xs-12">  <!-- Section Right -->
              <div class="x_panel">
                <div class="x_title">
                  <h2>New Employee <small>Official Details</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointmentDate">Appointment Date <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="appointmentDate" name="appointmentDate" placeholder="Appointment Date" aria-describedby="inputSuccess2Status" required="required">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="joiningDate">Joining Date <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="joiningDate" name="joiningDate" placeholder="Joining Date" aria-describedby="inputSuccess2Status" required="required">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empcode">Employee Code <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="empcode" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="empcode" placeholder="" required="required" type="text" maxlength="50">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Department <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" id="department" name="department">
                          <option value="1">Option one</option>
                          <option value="2">Option two</option>
                          <option value="3">Option three</option>
                          <option value="4">Option four</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empsalary">Employee Salary <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control has-feedback-left" name="empsalary" id="empsalary" placeholder="Employee Salary" required="required" min="1" max="1000000">
                        <span class="form-control-feedback left" aria-hidden="true">฿</span>
                      </div>
                    </div>

                    <?php for($i=1; $i<=5; $i++){ ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification<?php echo $i; ?>">Qualification(<?php echo $i; ?>)
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="qualification<?php echo $i; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="qualification<?php echo $i; ?>" placeholder="" type="file" maxlength="255">
                        </div>
                      </div>
                    <?php } ?>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressproof">Address Proof
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="addressproof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="addressproof" placeholder="" type="file">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idproof">ID Proof
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="idproof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="idproof" placeholder="" type="file">
                      </div>
                    </div>

                    

                </div>
              </div>
            </div>

          </div>  <!-- <div class="row"> -->




          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>New Employee <small>Bank Details</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bankaccountname">Name
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bankaccountname" name="bankaccountname" class="form-control col-md-7 col-xs-12" maxlength="100">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bankaccountnumber">Account Number
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bankaccountnumber" name="bankaccountnumber" class="form-control col-md-7 col-xs-12" maxlength="15">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bankbranch">Branch
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bankbranch" name="bankbranch" class="form-control col-md-7 col-xs-12" maxlength="100">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bankifsc">IFSC Code
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bankifsc" name="bankifsc" class="form-control col-md-7 col-xs-12" maxlength="100">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bankcity">City
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bankcity" name="bankcity" class="form-control col-md-7 col-xs-12" maxlength="100">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks
                      </label>                      
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder='rows="3"'></textarea>
                      </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="cancel" class="btn btn-danger col-md-12 col-sm-12 col-xs-12">Cancel</button>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="submit" class="btn btn-success col-md-12 col-sm-12 col-xs-12" onclick="return confirm('Confirm Add Employee ?');">Submit</button>
                      </div>
                    </div>

                </div>
              </div>
            </div>


          </div>  <!-- <div class="row"> -->


          </form>

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


      <!-- daterangepicker -->
      <script type="text/javascript" src="js/moment/moment.min.js"></script>
      <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>


      <!-- /datepicker -->
      <script type="text/javascript">
        $(document).ready(function() {
          $('#dateOfBirth').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });

          $('#appointmentDate').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });

          $('#joiningDate').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });
        });
      </script>