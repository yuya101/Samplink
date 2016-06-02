<?php
$mQuery = new MainQuery();

if(isset($_REQUEST['brandID']))
{
  $brandID = base64_decode($_REQUEST['brandID']);
}
else
{
  if(isset($_SESSION['mainBrandID']))
  {
    $brandID = base64_decode($_SESSION['mainBrandID']);
  }
  else
  {
    $brandID = 0;
  }  //------------  if(isset($_REQUEST['aid']))
}  //------------  if(isset($_REQUEST['aid']))

$sql = "select * from product_brand where brandID=".$brandID." order by brandName limit 1";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
    $result = $mQuery->getResultAll($sql);

    $i=0;

    foreach($result as $r)
    {
        $brandID = $r['brandID'];
        $brandName = $r['brandName'];
        $brandAddress1 = $r['brandAddress1'];
        $brandAddress2 = $r['brandAddress2'];
        $brandTel = $r['brandTel'];
        $brandFax = $r['brandFax'];      
        $brandWebsite = $r['brandWebsite'];  
        $brandPicture = $r['brandPicture'];  

        $i++;
    }  //-----------  foreach($result as $r)

    unset($result, $r);
}

unset($mQuery);
?> 
      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Manage Product Brand <small>For Edit product brand.</small></h2>
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

                  <form action="includes/control/modBrand_Ctl.php" method="post" target="_top" name="modBrand" enctype="multipart/form-data" class="form-horizontal form-label-left">

                    
                    <span class="section">Product Brand</span>


                    <?php if((isset($_SESSION['formComplete']) and ($_SESSION['formComplete']!=""))){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-success">
                            <strong><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">Edit Product Brand Name <?php echo base64_decode($_SESSION['formComplete']); ?> Complete.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formComplete']); ?>
                    <?php } ?>


                    <?php if(isset($_SESSION['formError']) and ($_SESSION['formError']!="")){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-danger">
                            <strong><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">Product Brand Name <?php echo base64_decode($_SESSION['formError']); ?> Already Exist.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formError']); ?>
                    <?php } ?>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Brand Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="modbrandName" id="modbrandName" class="form-control col-md-7 col-xs-12" data-validate-length-range="255" placeholder="Product Brand" required="required" type="text" value="<?php echo $brandName; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Address (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="modbrandAddress1" id="modbrandAddress1" type="text" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $brandAddress1; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Address (2) <!-- <span class="required">*</span> -->
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="modbrandAddress2" id="modbrandAddress2" class="form-control col-md-7 col-xs-12" data-validate-length-range="255" value="<?php echo $brandAddress2; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telephone <!-- <span class="required">*</span> -->
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="modbrandTel" id="modbrandTel" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $brandTel; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Fax <!-- <span class="required">*</span> -->
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="modbrandFax" id="modbrandFax" placeholder="Brand Fax" data-validate-length-range="30" class="form-control col-md-7 col-xs-12" value="<?php echo $brandFax; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <!-- <span class="required">*</span> -->
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="url" id="modbrandWeb" name="modbrandWeb" placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="<?php echo $brandWebsite; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Product Picture</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="modbrandPic[]" id="modbrandPic" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <?php if($brandPicture != "-"){ ?>
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$brandPicture; ?>" width="200" alt="">
                        </div>
                      </div>
                    <?php } ?>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="cancel" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                    <input type="hidden" name="modBrandID" value="<?php echo $brandID; ?>">
                    <input type="hidden" name="modBrandPicShow" value="<?php echo $brandPicture; ?>">
                  </form>

                </div>
              </div>
            </div>
          </div>
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

      <script src="js/bootstrap.min.js"></script>

      <?php include("scriptMain.php"); ?>