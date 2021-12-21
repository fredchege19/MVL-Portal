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
                    @if(Auth::User()->permission_id == "0" || Auth::User()->permission_id == "1" ||Auth::User()->permission_id == "2")
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Ticket
                        </a><br><br>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">TICKETS LIST</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped example1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Created By</th>
                                                    <th>Subject</th>
                                                    <th>Priority</th>
                                                    <th>Description</th>
                                                    <th>Problem Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tickets as $ticket)
                                                <tr>
                                                    <td>{{$ticket->id}}</td>
                                                    <td>{{$ticket->username}}</td>
                                                    <td>{{$ticket->subject}}</td>
                                                    <td>{{$ticket->priority}}</td>
                                                    <td>{{$ticket->description}}</td>
                                                    <td>{{$ticket->problemType}}</td>
                                                    @if($ticket->status =="0")
                                                    <td><span class="badge badge-warning">OPEN</span></td>
                                                    @elseif($ticket->status =="1")
                                                    <td><span class="badge badge-danger">PENDING</span></td>
                                                    @elseif($ticket->status =="2")
                                                    <td><span class="badge badge-success">CLOSED</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="" data-toggle="dropdown">
                                                                <span style="width:5%"><i
                                                                        class="fa fa-plus-circle fa-1x "></i></span>
                                                            </a>
                                                            <div class="dropdown-menu" role="menu">
                                                                <a class="dropdown-item"
                                                                    href="/view_activity/{{$ticket->id}}">View
                                                                    Progress</a>
                                                                    @if(Auth::User()->permission_id == "3" || Auth::User()->permission_id == "0")
                                                                <a class="dropdown-item addUpdate"
                                                                    id="addUpdate">Update Status</a>
                                                                    <a class="dropdown-item addTechnician"
                                                                    id="addTechnician">Assign Technician</a>
                                                                    <a class="dropdown-item allowance"
                                                                    id="allowance">Allowance</a>
                                                                    @else
                                                                    <a class="dropdown-item"
                                                                    href="/wedding_form/{{$ticket->id}}">Delete</a>
                                                                    @endif
                                                               
                                                                
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
                    <h5 class="modal-title">Add Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_ticket" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="form-control " id="address" name="priority">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control " id="church_phone" name="subject"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Problem Type</label>
                                    <select class="form-control " id="address" name="probType">
                                        <option value="Flighting">Flighting</option>
                                        <option value="Deflighting">Deflighting</option>
                                        <option value="New Site Construction">New Site Construction</option>
                                        <option value="Site Relocation">Site Relocation</option>
                                        <option value="Electrical Works">Electrical Works </option>
                                        <option value="General Maintenance">General Maintenance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                                        rows="2"></textarea>
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
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
            console.log("Hit");
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
        'TICKET DATA UPDATED SUCCESSFULLY',
        'success'
    )
    @elseif(session() -> has('noupdate'))
    Swal.fire(
        'NOTIFICATION!',
        'NO UPDATE HAS BEEN MADE SO FAR',
        'warning'
    )
    @endif
    </script>
</body>

</html>