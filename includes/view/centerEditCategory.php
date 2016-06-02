<?php
$mQuery = new MainQuery();

if(isset($_REQUEST['catID']))
{
  $catID = base64_decode($_REQUEST['catID']);
}
else
{
  if(isset($_SESSION['mainCatID']))
  {
    $catID = base64_decode($_SESSION['mainCatID']);
  }
  else
  {
    $catID = 0;
  }  //------------  if(isset($_REQUEST['aid']))
}  //------------  if(isset($_REQUEST['aid']))

$sql = "select * from product_category where catID=".$catID." order by catName limit 1";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
    $result = $mQuery->getResultAll($sql);

    $i=0;

    foreach($result as $r)
    {
        $typeID = $r['typeID'];
        $catName = $r['catName'];
        $catDetail = $r['catDetail'];
        $catPicture = $r['catPicture'];

        $i++;
    }  //-----------  foreach($result as $r)

    unset($result, $r);


    $sql = "select * from product_cat_header where catID=".$catID." limit 1";
    $result = $mQuery->getResultAll($sql);

    foreach($result as $r)
    {
        for($i=0; $i<20; $i++)
        {
          $header[$i] = $r['header'.($i + 1)];
        }
    }  //-----------  foreach($result as $r)


    unset($result, $r);
}


$sql = "select typeID, typeName from product_types order by typeName";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
  $resultMan = $mQuery->getResultAll($sql);
}  //-----------  if($num > 0)

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
                  <h2>Manage Category <small>For edit product category.</small></h2>
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

                  <form action="includes/control/modCat_Ctl.php" method="post" target="_top" name="modCat" enctype="multipart/form-data" class="form-horizontal form-label-left">

                    
                    <span class="section">Product Category</span>


                    <?php if((isset($_SESSION['formComplete']) and ($_SESSION['formComplete']!=""))){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-success">
                            <strong><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;">Edit Product Category Name <?php echo base64_decode($_SESSION['formComplete']); ?> Complete.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formComplete']); ?>
                    <?php } ?>


                    <?php if(isset($_SESSION['formError']) and ($_SESSION['formError']!="")){ ?>
                      <div class="col-lg-12">
                        <div class="col-md-12">
                          <div class="alert alert-danger">
                            <strong><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<label style="font-size:14px; margin-top:5px !important;"> Product Category Name <?php echo base64_decode($_SESSION['formError']); ?> Already Exist.</label></strong>
                          </div>
                        </div>
                      </div>
                      <?php unset($_SESSION['formError']); ?>
                    <?php } ?>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">                        
                        <select name="modMainTypeID" id="modMainTypeID" class="form-control col-md-7 col-xs-12">
                          <?php foreach($resultMan as $r){ ?>
                            <option value="<?php echo $r['typeID']; ?>" <?php if($typeID == $r['typeID']){echo "selected";} ?>><?php echo $r['typeName']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="modCatName" id="modCatName" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="150" required placeholder="Category Name" value="<?php echo $catName; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category Detail <!-- <span class="required">*</span> -->
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="modCatDetail" id="modCatDetail" class="form-control col-md-7 col-xs-12" data-validate-length-range="255" placeholder="Category Detail" value="<?php echo $catDetail; ?>">
                      </div>
                    </div>

                    <?php for($i=0; $i<20; $i++){ ?>                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category Property (<?php echo $i + 1; ?>) <!-- <span class="required">*</span> -->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="modCatDesc<?php echo $i; ?>" id="modCatDesc<?php echo $i; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="255" placeholder="Category Header (<?php echo $i + 1; ?>)" value="<?php echo $header[$i]; ?>">
                        </div>
                      </div>
                    <?php } ?>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Category Picture</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="modCatPic[]" id="modCatPic" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <?php if($catPicture != "-"){ ?>
                      <div class="item form-group">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>                   
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <img src="<?php echo $uploadPath.$catPicture; ?>" width="200" alt="">
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
                    <input type="hidden" name="modCatID" value="<?php echo $catID; ?>">
                    <input type="hidden" name="modCatPicShow" value="<?php echo $catPicture; ?>">
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