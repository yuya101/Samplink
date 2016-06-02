<?php
$mQuery = new MainQuery();
$dFunc = new DateFunction();

$dateShow = $dFunc->getDateChrisFormatWithDetch();

$sqlBrand = "select brandID, brandName from product_brand order by brandName";
$numBrand = $mQuery->checkNumRows($sqlBrand);

$sqlType = "select typeID, typeName from product_types order by typeName";
$numType = $mQuery->checkNumRows($sqlType);

$sqlCat = "select catID, catName from product_category order by catName";
$numCat = $mQuery->checkNumRows($sqlCat);

$sqlSubCat = "select subcatID, subcatName from product_subcategory order by subcatName";
$numSubCat = $mQuery->checkNumRows($sqlSubCat);

if(($numType > 0) and ($numCat > 0) and ($numSubCat > 0))
{
  $resultBrand = $mQuery->getResultAll($sqlBrand);
  $resultType = $mQuery->getResultAll($sqlType);
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
                  <h2>Form validation <small>sub title</small></h2>
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

                  <form action="includes/control/addProduct_Ctl.php" method="post" target="_top" name="addProduct" enctype="multipart/form-data" class="form-horizontal form-label-left">

                    
                    <span class="section">Product</span>


                    <?php if((isset($_SESSION['formComplete']) and ($_SESSION['formComplete']!=""))){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-success">
                            <strong><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">Insert Product Name <?php echo base64_decode($_SESSION['formComplete']); ?> Complete.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formComplete']); ?>
                    <?php } ?>


                    <?php if(isset($_SESSION['formError']) and ($_SESSION['formError']!="")){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-danger">
                            <strong><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;"> Product Name <?php echo base64_decode($_SESSION['formError']); ?> Already Exist.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formError']); ?>
                    <?php } ?>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Brand Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="addBrandProductID" id="addBrandProductID" class="form-control col-md-7 col-xs-12">
                            <option value="0" selected="selected">---- Please Select Your Product Brand Name ----</option>
                            <?php foreach($resultBrand as $r){ ?>
                              <option value="<?php echo $r['brandID']; ?>"><?php echo $r['brandName']; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group" id="listProductLI1">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Types Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="addTypeProductID" id="addTypeProductID" onchange="refreshListBoxItem(1, this, 'addCatProductID', 'listCategory', 'listProductLI', 3, 'addProductDetailDiv');" class="form-control col-md-7 col-xs-12">
                            <option value="0" selected="selected">---- Please Select Your Product Types Name ----</option>
                            <?php foreach($resultType as $r){ ?>
                              <option value="<?php echo $r['typeID']; ?>"><?php echo $r['typeName']; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group" id="listProductLI2" style="display:none;">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="addCatProductID" id="addCatProductID" onchange="refreshListBoxItem(2, this, 'addSubCatProductID', 'listSubCategory', 'listProductLI', 3, 'addProductDetailDiv');" class="form-control col-md-7 col-xs-12">
                        </select>
                      </div>
                    </div>

                    <div class="item form-group" id="listProductLI3" style="display:none;">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Sub Category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="addSubCatProductID" id="addSubCatProductID" class="form-control col-md-7 col-xs-12">
                        </select>
                      </div>
                    </div>



                    <div class="item form-group" id="addProductDetailDiv" style="display:none;">

                      <hr align="center" width="80%" color="#CCCCCC">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productName" id="productName" class="form-control col-md-7 col-xs-12" data-validate-length-range="255" placeholder="Product Name" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productCode" id="productCode" class="form-control col-md-7 col-xs-12" data-validate-length-range="50" placeholder="Product Code" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Detail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="productDetail" id="productDetail" class="form-control col-md-7 col-xs-12" cols="35" rows="4"></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productPrice" id="productPrice" class="form-control col-md-7 col-xs-12" placeholder="Product Price" type="number" min="0" max="99999">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Discount Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productDiscount" id="productDiscount" class="form-control col-md-7 col-xs-12" placeholder="Ex : 500" type="number" min="0" max="99999">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productQuantity" id="productQuantity" class="form-control col-md-7 col-xs-12" placeholder="Ex : 10" type="number" min="0" max="99999">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="productStatus" id="productStatus" class="form-control col-md-7 col-xs-12">
                            <option value="1" selected>Enable</option>
                            <option value="0">Disable</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Start Show Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="productStartDate" id="productStartDate" class="form-control col-md-7 col-xs-12" type="date" value="<?php echo $dateShow; ?>">
                        </div>
                      </div>

                      <?php for($i=1; $i<=5; $i++){ ?>
                        <div class="item form-group">
                          <label for="password" class="control-label col-md-3">Product Picture (<?php echo $i; ?>)</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="productPic[]" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      <?php } ?>


                      <?php for($i=1; $i<=20; $i++){ ?>
                        <div class="item form-group" id="catTopicDescLI<?php echo $i; ?>">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Header Detail <?php echo $i; ?> <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left;" id="catTopicDescLabel<?php echo $i; ?>"></label>
                          </div>
                        </div>
                        <div class="item form-group" id="catDetailDescLI<?php echo $i; ?>">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Detail <?php echo $i; ?> <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="catDetailDescLabel<?php echo $i; ?>" id="catDetailDescLabel<?php echo $i; ?>" size="35" maxlength="255" value="" placeholder="Description <?php echo $i; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      <?php } ?>


                    </div>  <!--div class="item form-group" id="addProductDetailDiv" style="display:none;"-->


                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="cancel" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
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
<?php
  unset($resultMan);
}
else
{
  if($numSubCat == 0)
  {
    $warningTopic = "&nbsp;Sub Category&nbsp;";
  }
  
  if($numCat == 0)
  {
    $warningTopic = "&nbsp;Category&nbsp;";
  }
  
  if($numType == 0)
  {
    $warningTopic = "&nbsp;Types&nbsp;";
  }
  
  if($numBrand == 0)
  {
    $warningTopic = "&nbsp;Brand&nbsp;";
  }
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
                  <h2>Add Sub Category <small>For add new product sub category.</small></h2>
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

                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-danger">
                            <strong><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;"> !!!&nbsp;&nbsp;Please Add <?php echo $warningTopic; ?> First.&nbsp;&nbsp;!!!</label></strong>
                          </div>
                        </div>
                      </div>

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
<?php
}

unset($mQuery);
?>