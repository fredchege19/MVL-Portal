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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">DELIVERIES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>DocNum</th>
                                                    <th>DocDate</th>
                                                    <th>CardCode</th>
                                                    <th>CardName</th>
                                                    <th>NumAtCard</th>
                                                    <th>Billboard</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($deliveries as $request)
                                             <tr>
                                                <td>{{$request->DocNum}}</td>
                                                <td>{{$request->DocNum}}</td>
                                                <td>{{$request->DocDate}}</td>
                                                <td>{{$request->CardCode}}</td>
                                                <td>{{$request->CardName}}</td>
                                                <td>{{$request->NumAtCard}}</td>
                                                <td>{{$request->CogsOcrCod}}</td>
                                                @can('create activity')
                                                <td><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm">Create Activity</a></td>
                                                @endcan
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_action" method="POST">
                        @csrf
                        <div class="form-group">
                                    <label>Delivery Note Id</label>
                                    <input type="text" class="form-control deliveryId" id="deliveryId" name="deliveryId"
                                        required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Region</label>
                                    <select class="form-control " id="address" name="region">
                                        <option>-- Select Region --</option>
                                        <option value="Coast">Coast</option>
                                        <option value="Nairobi">Nairobi</option>
                                        <option value="Central & Eastern">Central & Eastern</option>
                                        <option value="Rift Valley">Rift Valley</option>
                                        <option value="Western & Nyanza">Western & Nyanza</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supervisor</label>
                                    <select class="form-control " id="address" name="supervisor">

                                        @foreach($supervisors as $tech)
                                        <option value="{{$tech->id}}">{{$tech->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Technician</label>
                                    <select class="form-control " id="address" name="technician">
                                        @foreach($technicians as $tech)
                                        <option value="{{$tech->id}}">{{$tech->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>County</label>
                                    <select class="form-control " id="county" name="county">
                                    <option value="">-- Select County --</option>
                                        @foreach($counties as $county)
                                        <option value="{{$county->id}}">{{$county->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Road</label>
                                    <select class="form-control " id="roadMap" name="road">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" class="form-control " id="church_phone" name="street"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control " id="church_phone" name="start_date"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" class="form-control " id="church_phone" name="end_date"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control " id="address" name="status">
                                        <option>-- Select Status --</option>
                                        <option value="Started">Started</option>
                                        <option value="In progress">In progress</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <input type="text" class="form-control " id="church_phone" name="reason">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comments</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comments"
                                rows="2"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Attachments</label>
                                        <input type="file" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Activity Type</label>
                                    <select class="form-control " id="address" name="activity_type">
                                        <option>-- Select Status --</option>
                                        <option value="Flighting">Flighting</option>
                                        <option value="Deflighting">Deflighting</option>
                                        <option value="New Site Construction">New Site Construction</option>
                                        <option value="Site Relocation">Site Relocation</option>
                                        <option value="Electrical Works">Electrical Works </option>
                                        <option value="General Maintenance">General Maintenance</option>
                                    </select>
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

<!--     <script>
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
    </script> -->

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#example1').DataTable();

        table.on('click', '.addActivity', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#deliveryId').val(data[0]);
            $('#exampleModal').modal('show');
        });
    });
</script>

<script>
    @if(session() -> has('savedPetty'))
    Swal.fire(
        'SUCCESS!',
        'PETTY CASH DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('pettyApproved'))
    Swal.fire(
        'NOTIFICATION!',
        'RECORD UPDATED SUCCESSFULLY & SYNCED',
        'success'
    )
    @elseif(session() -> has('pettyAccounted'))
    Swal.fire(
        'NOTIFICATION!',
        'RECORD UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('pettyApprovedError'))
    Swal.fire(
        'NOTIFICATION!',
        'APPROVAL FAILED DUE TO SAP INTEGRATION. CONTACT ADMIN',
        'error'
    )
    @endif
    </script>
</body>

</html>