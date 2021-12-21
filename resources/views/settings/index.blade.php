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

                        <div class="card-body">
                            <h4>CONFIGURATION</h4>
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                            href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                            aria-selected="true">Appprovers</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                            href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                            aria-selected="false">Counties</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                            href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                            aria-selected="false">Roads</a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false">API</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content " id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home"
                                            role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <form action="save_approvers" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Level 1</label>
                                                        <select class="form-control " id="address" name="app1">
                                                            @foreach($managers as $man)
                                                            <option value="{{$man->id}}">{{$man->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label>Level 2</label>
                                                    <select class="form-control " id="address" name="app2">
                                                            @foreach($managers as $man)
                                                            <option value="{{$man->id}}">{{$man->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>  
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label>Level 3</label>
                                                    <select class="form-control " id="address" name="app3">
                                                           @foreach($managers as $man)
                                                            <option value="{{$man->id}}">{{$man->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                    </div>
                                                </div>

                                                <input class="btn btn-primary" value="Submit" type="submit">
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-profile-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-primary">ADD CATEGORY</a>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Category Id</th>
                                                                <th>Category Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                      
                                        </div>
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

    </div>
    <!-- ./wrapper -->

    <div class="modal fade " tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_category" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control " id="category" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Attach Cover Image</label>
                            <input type="file" class="form-control " id="church_phone" name="image" accept="image/*"
                                required>
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
    });
    </script>

    <script>
    @if(session() -> has('savedApprover'))
    Swal.fire(
        'SUCCESS!',
        'APPROVERS DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('savedCounty'))
    Swal.fire(
        'NOTIFICATION!',
        'COUNTY DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('savedRoad'))
    Swal.fire(
        'NOTIFICATION!',
        'ROAD DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @endif
    </script>
</body>

</html>