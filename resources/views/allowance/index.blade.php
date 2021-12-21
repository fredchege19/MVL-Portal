<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        @include('partials.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"><br>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <section class="content">
                    @can('create allowance')
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add
                            Application
                        </a><br><br>
                        @endcan
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">ALLOWANCE REQUEST LIST</h3>
                                    </div>

                                    <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                        href="#custom-content-below-home" role="tab"
                                        aria-controls="custom-content-below-home" aria-selected="true">ACTIVITY ALLOWANCES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                        href="#custom-content-below-profile" role="tab"
                                        aria-controls="custom-content-below-profile" aria-selected="false">ALLOWANCES</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                    aria-labelledby="custom-content-below-home-tab">

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <table id="example1" class="table table-bordered table-striped" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th>Requestor</th>
                                                    <th>Activity</th>
                                                    <th>Activity No</th>
                                                    <th>Region</th>
                                                    <th>County</th>
                                                    <th>Department</th>
                                                    <th>Amount</th>
                                                    <th>Reason</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($requests as $request)
                                                <tr>
                                                    <td>{{$request->name}}</td>
                                                    <td>{{$request->activity_type}}</td>
                                                    <td>{{$request->activity_id}}</td>
                                                    <td>{{$request->region}}</td>
                                                    <td>{{$request->county}}</td>
                                                    <td>{{$request->department}}</td>
                                                    <td>{{$request->amount}}</td>
                                                    <td>{{$request->reason}}</td>

                                                    @if($request->status=="0")
                                                    <td><span class="badge badge-warning">Pending Approval</span></td>
                                                    @elseif($request->status=="1")
                                                    <td><span class="badge badge-success">Approved</span></td>
                                                    @endif
                                                    <td>| <a href="/view_more_allowance/{{$request->id}}"><span
                                                                style="width:5%"><i class="fa fa-eye fa-1x "></i></span>
                                                        </a>|
                                                        
                                                        <div class="btn-group" style="font-size: 14px;">
                                                            <a href="" data-toggle="dropdown">
                                                                <span style="width:5%"><i
                                                                        class="fa fa-plus-circle fa-1x "></i></span>
                                                            </a>
                                                            <div class="dropdown-menu" role="menu">
                                                            @can('approve allowance')
                                                                <a class="dropdown-item"
                                                                    href="/approve_allowance/{{$request->id}}">Approve</a>
                                                            @endcan
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                   
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>

                                            </div>

                                        </div>

                                    </section>
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                    aria-labelledby="custom-content-below-profile-tab">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table id="example3"
                                                            class="table table-bordered table-striped example3">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Department</th>
                                                                    <th>Item</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($requestsNoAct as $rqa)
                                                                <tr>
                                                                    <td>{{$rqa->id}}</td>
                                                                    <td>{{$rqa->name}}</td>
                                                                    <td>{{$rqa->department}}</td>
                                                                    <td>{{$rqa->item}}</td>
                                                                    <td>{{$rqa->amount}}</td>
                                                                    @if($rqa->status=="0")
                                                                    <td><span class="badge badge-warning">Pending Approval</span></td>
                                                                    @elseif($rqa->status=="1")
                                                                    <td><span class="badge badge-success">Approved</span></td>
                                                                    @endif
                                                                    <td>| <a href="/view_more_allowance/{{$rqa->id}}"><span
                                                                            style="width:5%"><i class="fa fa-eye fa-1x "></i></span>
                                                                    </a>|
                                                                    
                                                                    <div class="btn-group" style="font-size: 14px;">
                                                                        <a href="" data-toggle="dropdown">
                                                                            <span style="width:5%"><i
                                                                                    class="fa fa-plus-circle fa-1x "></i></span>
                                                                        </a>
                                                                        <div class="dropdown-menu" role="menu">
                                                                        @can('approve allowance')
                                                                            <a class="dropdown-item"
                                                                                href="/approve_allowance/{{$rqa->id}}">Approve</a>

                                                                            <a class="dropdown-item addRejected"
                                                                                    href="#" id="addRejected">Reject</a>
                                                                        @endcan
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>

                                            </div>

                                        </div>

                                    </section>
                                </div>

                            </div>

                        </div>


                                    <!-- /.card-header -->
                                    <div class="card-body">

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </section>

                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">MVL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-pre
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="addRejectedModal">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REJECT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_petty_rejected" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                            <input type="text" class="form-control " id="idRej" name="id" hidden> 
                            
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Reason</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="rejectReason"
                                rows="2" required></textarea>
                             </div>
                        <input class="btn btn-primary" value="Submit" type="submit">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_allowance_new" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control " id="church_phone" name="itemName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control " id="address" name="department">
                                        <option>-- Select Department --</option>
                                        <option value="IT">IT</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Marketing">Marketing</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control " id="church_phone" name="amount" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payee</label>
                                    <input type="text" class="form-control " id="church_phone" name="payee" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payee Number</label>
                                    <input type="text" class="form-control " id="church_phone" name="phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Narration</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="ENTER THE DETAILS ABOUT THE ALLOWANCE" name="narration"
                                rows="2" required></textarea>
                        </div>
                            </div>

                        </div>

                        <input class="btn btn-primary" value="Submit" type="submit">
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>

    <script>
    $(function() {
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        table.on('click', '.addRejected', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#idRej').val(data[0]);
            $('#addRejectedModal').modal('show');
        });
    });
    </script>


<script>
    @if(session() -> has('approveAllowance'))
    Swal.fire(
        'SUCCESS!',
        'ALLOWANCE DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('noPermission'))
    Swal.fire(
        'NOTIFICATION!',
        'YOU DONT HAVE PERMISSION TO APPROVE',
        'error'
    )
    @endif
    
    </script>
</body>

</html>