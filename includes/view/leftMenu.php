      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="admin.php" class="site_title"><i class="fa fa-shopping-cart"></i> <span><?php echo $programName; ?></span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php">Dashboard</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-user"></i> Employees <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php?p=addEmployee">Add Employees</a>
                    </li>
                    <li><a href="admin.php?p=manageEmployee">Manage Employees</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-cubes"></i> Brand &amp; Types <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php?p=addBrand">Add Product Brand</a>
                    </li>
                    <li><a href="admin.php?p=manageBrand">Manage Product Brand</a>
                    </li>
                    <li><a href="admin.php?p=addTypes">Add Product Types</a>
                    </li>
                    <li><a href="admin.php?p=manageTypes">Manage Product Types</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-leaf"></i> Category <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php?p=addCategory">Add New Category</a>
                    </li>
                    <li><a href="admin.php?p=manageCategory">Manage Category</a>
                    </li>
                    <li><a href="admin.php?p=addSubCategory">Add New Sub Category</a>
                    </li>
                    <li><a href="admin.php?p=manageSubCategory">Manage Sub Category</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-gamepad"></i> Products <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php?p=addProduct">Add New Products</a>
                    </li>
                    <li><a href="admin.php?p=manageProduct">Manage Products</a>
                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-table"></i> Delivery <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="admin.php?p=addProduct">Waiting For Delivery</a>
                    </li>
                    <li><a href="admin.php?p=manageProduct">Manage Products</a>
                    </li>
                  </ul>
                </li>

                
              </ul>
            </div>


            <!-- <div class="menu_section">
              <h3>Live On</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="e_commerce.html">E-commerce</a>
                    </li>
                    <li><a href="projects.html">Projects</a>
                    </li>
                    <li><a href="project_detail.html">Project Detail</a>
                    </li>
                    <li><a href="contacts.html">Contacts</a>
                    </li>
                    <li><a href="profile.html">Profile</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div> -->

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php" target="_top">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>