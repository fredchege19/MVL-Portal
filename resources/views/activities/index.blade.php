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
                        @can('create activity')
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Activity
                       
                    </a><br><br>
                    @endcan
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">ACTIVITIES LIST</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped example1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Activity</th>
                                                    <th>Supervisor</th>
                                                    <th>Technician</th>
                                                    <th>Region</th>
                                                    <th>County</th>
                                                    <th>Road</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($activities as $activity)
                                                <tr>
                                                    <td>{{$activity->id}}</td>
                                                    <td>{{$activity->activity_type}}</td>
                                                    <td>{{$activity->supervisor}}</td>
                                                    <td>{{$activity->technician}}</td>
                                                    <td>{{$activity->region}}</td>
                                                    <td>{{$activity->county}}</td>
                                                    <td>{{$activity->road}}</td>
                                                    <td>{{$activity->start_date}}</td>
                                                    <td>{{$activity->end_date}}</td>
                                                    <td>{{$activity->status}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="" data-toggle="dropdown">
                                                                <span style="width:5%"><i
                                                                        class="fa fa-plus-circle fa-1x "></i></span>
                                                            </a>
                                                            <div class="dropdown-menu" role="menu">
                                                                <a class="dropdown-item"
                                                                    href="/view_activity/{{$activity->id}}">View
                                                                    Progress</a>
                                                                    @can('update activity status')
                                                                <a class="dropdown-item addUpdate"
                                                                    id="addUpdate">Update Status</a>
                                                                    @endcan
                                                                    @can('apply activity allowance')
                                                                    <a class="dropdown-item allowance"
                                                                    id="allowance">Allowance</a>
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
                                    <label>Delivery</label>
                                    <select class="form-control " id="address" name="region">
                                        <option value="">-- Select Delivery --</option>
                                        @foreach($deliveries as $deliv)
                                        <option value="{{$deliv->DocNum}}">{{$deliv->DocNum}} - {{$deliv->CardCode}} - {{$deliv->CardName}}</option>
                                        @endforeach
                                    </select>
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="allowanceModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Allowance Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_allowance" method="POST">
                        @csrf
                        <div class="row">
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
                                <input type="text" class="form-control " id="id" name="id" hidden>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control " id="church_phone" name="amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Reason</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="reason"
                                rows="2"></textarea>
                        </div>
                        <input class="btn btn-primary" value="Submit" type="submit">
                    </form>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="updateModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_status_activity" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control " id="idAct" name="id" hidden> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Attach Images</label>
                                    <input type="file" class="form-control " id="church_phone" name="images[]" multiple required>
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

    <script type="text/javascript">
    $(document).ready(function() {

        var table = $('#example1').DataTable();

        //start edit function
        table.on('click', '.allowance', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#id').val(data[0]);
            $('#allowanceModal').modal('show');
        });

        table.on('click', '.addUpdate', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#idAct').val(data[0]);
            $('#updateModal').modal('show');
        });
    });
    </script>

<script>
    @if(session() -> has('created'))
    Swal.fire(
        'SUCCESS!',
        'ACTIVITY DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('noupdate'))
    Swal.fire(
        'NOTIFICATION!',
        'NO UPDATE HAS BEEN MADE SO FAR',
        'warning'
    )
    @elseif(session() -> has('activityUpdated'))
    Swal.fire(
        'NOTIFICATION!',
        'ACTIVITY DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('savedAllowance'))
    Swal.fire(
        'NOTIFICATION!',
        'ALLOWANCE DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @endif
    </script>

<script>
        $("select[name='county']").change(function() {
            var address = $(this).val();
            console.log("Hiiiiiit");
            var token = $("input[name='_token']").val();
            $.ajax({
                url: 'get_roads/' + address,
                method: 'GET',
                dataType: "json",
                beforeSend: function() {
                    $('#loader').css("visibility", "visible");
                },
                success: function(data) {
                    console.log(data);
                    $('select[name="road"]').html("");

                    $.each(data, function(key, value) {
                        $('select[name="road"]').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                    $('#loaderBalance').css("visibility", "hidden");
                }
            });
        });
    </script>
</body>

</html>