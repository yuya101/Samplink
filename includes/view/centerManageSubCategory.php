<?php
$mQuery = new MainQuery();

$sql = "select * from product_subcategory order by subcatName";
$num = $mQuery->checkNumRows($sql);

if($num > 0)
{
    $result = $mQuery->getResultAll($sql);

    $i=0;

    foreach($result as $r)
    {
        $subcatID[$i] = $r['subcatID'];
        $subcatName[$i] = $r['subcatName'];
        $subcatDetail[$i] = $r['subcatDetail'];   

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
                  <h2>Manage Product Sub Category <small></small></h2>
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
                  
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Sub Category Name</th>
                        <th>Sub Category Detail</th>
                        <th>Action</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php if($num > 0){ ?>
                        <?php for($i=0; $i<$num; $i++){ ?>
                          <tr>
                            <td><?php echo $i+1; ?>.</td>
                            <td><?php echo $subcatName[$i]; ?></td>
                            <td><?php echo $subcatDetail[$i]; ?></td>
                            <td>                              
                              <a href="admin.php?p=editSubCategory&subcatID=<?php echo base64_encode($subcatID[$i]); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                              <a href="deleteSubCategory.php?subcatID=<?php echo base64_encode($subcatID[$i]); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete Product Sub Category Data?');"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>

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


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();

          TableManageButtons.init();
        </script>