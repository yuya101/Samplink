<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php include("leftMenu.php"); ?>

      <?php include("topNav.php"); ?>

      <?php  
        if(isset($_REQUEST['p']))
        {
          $pageName = $_REQUEST['p'];
        }
        else
        {
          $pageName = "";
        }  //-------------  if(isset($_REQUEST['p']))

        switch($pageName)
        {
          case "addEmployee" :
            include("centerAddEmployee.php");
            break;

          case "manageEmployee" :
            include("centerManageEmployee.php");
            break;

          case "displayEmployeeDetail" :
            include("centerDisplayEmployeeDetail.php");
            break;

          case "editEmployeeDetail" :
            include("centerEditEmployeeDetail.php");
            break;

          case "addBrand" :
            include("centerAddBrand.php");
            break;

          case "manageBrand" :
            include("centerManageBrand.php");
            break;

          case "editProductBrand" :
            include("centerEditBrand.php");
            break;

          case "addTypes" :
            include("centerAddTypes.php");
            break;

          case "manageTypes" :
            include("centerManageTypes.php");
            break;

          case "editProductTypes" :
            include("centerEditTypes.php");
            break;

          case "addCategory" :
            include("centerAddCategory.php");
            break;

          case "manageCategory" :
            include("centerManageCategory.php");
            break;

          case "editCategory" :
            include("centerEditCategory.php");
            break;

          case "addSubCategory" :
            include("centerAddSubCategory.php");
            break;

          case "manageSubCategory" :
            include("centerManageSubCategory.php");
            break;

          case "editSubCategory" :
            include("centerEditSubCategory.php");
            break;

          case "addProduct" :
            include("centerAddProduct.php");
            break;

          case "manageProduct" :
            include("centerManageProduct.php");
            break;

          case "editProduct" :
            include("centerEditProduct.php");
            break;

          default :
            include("centerContent.php");
            break;
        }  //-----------  switch($pageName)
      ?>
      
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  

</body>