<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 

}
// SELECT * FROM employees JOIN orders  on employees.id = orders.salesid where id=1
// SELECT * FROM orders JOIN employees   on employees.id = orders.salesid JOIN parties on orders.partyid=parties.partyid
require_once"connection.php";
require_once"top.php";
$fetch="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid ";
$fetchresult=mysqli_query($con,$fetch);



?>
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order  List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="data-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12 col-md-4"><div id="example1_filter" class="dataTables_filter">
                      <label>Search:
                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                      </label>
                    </div>
                  </div>                    
                    <div class="col-sm-12 col-md-4 ">
                      <div class="dt-buttons btn-group flex-wrap">               
                        <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button">
                          <span>Import</span>
                        </button> 
                        <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                          <span>Export</span>
                        </button> 
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
                          <span>Print</span>
                        </button>
                         
                        </div> 
                      </div>
                     <div class="col-sm-12 col-md-4 ">
                       <a href="addorder.php" class="btn btn-primary pull-right" style="margin-left: 5px;"><i class="fa fa-plus"></i> Create New Order
                       </a>
            
                     </div>                      
                    </div>

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" id="data-table" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    #
                  </th>
                  <th class="sorting_dsc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                   Order no
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                   Order Date
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    Party Name
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    Sales Person
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    Amount
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    Order status
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="sort column descending" aria-sort="ascending">
                    Action
                  </th>

              </tr>

                  </thead>
                  <tbody>
                  <?php  while ($r= mysqli_fetch_array($fetchresult))
                             {

                          echo '<tr role="row" class="odd">';
                          echo'<td class="dtr-control sorting_1" tabindex="0">'.$r['id'].'</td>';

                        echo '<td>'.$r['orderid'].'</td>';
                          echo '<td>'.$r['date'].'</td>';
                            
                              echo '<td>'.$r['shopname'].'</td>';
                              echo '<td>'.$r['name'].'</td>';
                              echo '<td>'.$r['order_total_after_tax'].'</td>';
                              echo '<td>'.strtoupper($r['status']).'</td>';
                          
                         echo' <td>';
                            echo '<a href="profile.php?id='.$r['id'].'" class="btn btn-success btn-sm" style="padding: 3px 6px;">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="editemployees.php?id='.$r['id'].'" class="btn btn-warning btn-sm" style="padding: 3px 6px;">
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                        </tr>';


                              }
                        ?>

                 
                  </tbody>
                  
                </table>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                Showing 1 to 3 of 3 entries
              </div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example1_previous">
                    <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">
                    Previous
                  </a>
                </li>
                <li class="paginate_button page-item active">
                  <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">
                    1
                  </a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">
                  2
                </a>
              </li>
              <li class="paginate_button page-item ">
                <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">
                3
              </a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">
              4
            </a>
          </li>
          <li class="paginate_button page-item ">
            <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">
            5
          </a>
          </li>
          <li class="paginate_button page-item ">
            <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6
            </a>
          </li>
          <li class="paginate_button page-item next" id="example1_next">
            <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">
            Next
          </a>
        </li>
      </ul>
    </div>
  </div>
</div> -->
</div>
             
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once"footer.php"; ?>

  <!-- <script type="text/javascript">
  $(document).ready(function(){
    var table = $('#data-table').DataTable({
          "order":[],
          "columnDefs":[
          {
            "targets":[4, 5, 6],
            "orderable":false,
          },
        ],
        "pageLength": 25
        });

  });

</script> -->
<script>
  $(function () {
    $("#data-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
    $('#data-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>