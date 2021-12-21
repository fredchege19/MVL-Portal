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
                    @can('create petty')
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add
                            Application
                        </a><br><br>
                        @endcan
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">PETTY CASH REQUEST LIST</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped table-sm" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                   <th>#</th>
                                                    <th>Item</th>
                                                    <th>Project</th>
                                                    <th>Department</th>
                                                    <th>Amount</th>
                                                    <th style="background-color:yellow">Edited Amount</th>
                                                    <th>Requestor</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($requests as $request)
                                             <tr>
                                                <td>{{$request->id}}</td>
                                                <td>{{$request->item}}</td>
                                                <td>{{$request->project}}</td>
                                                <td>{{$request->department}}</td>
                                                <td>{{$request->amount}}</td>
                                                <td style="background-color:yellow">{{$request->edited}}</td>
                                                <td>{{$request->name}}</td>
                                                @if($request->status=="0")
                                                <td><span class="badge badge-danger">Pending Approval</span></td>
                                                @elseif($request->status=="1")
                                                <td><span class="badge badge-warning">Approved</span></td>
                                                @elseif($request->status=="2")
                                                <td><span class="badge badge-success">Accounted For</span></td>
                                                @elseif($request->status=="3")
                                                <td><span class="badge badge-danger">Rejected</span></td>
                                                @elseif($request->status=="4")
                                                <td><span class="badge badge-warning">Disbersed & Synced</span></td>
                                                @endif
                                                <td>| <a href="/view_more_petty/{{$request->id}}"><span style="width:5%"><i
                                                                class="fa fa-eye fa-1x "></i></span> </a>|
                                                    <div class="btn-group">
                                                        <a href="" data-toggle="dropdown">
                                                            <span style="width:5%"><i
                                                                    class="fa fa-plus-circle fa-1x "></i></span>
                                                        </a>
                                                        <div class="dropdown-menu" role="menu" style="font-size: 14px;"> 
                                                                @can('edit approve petty')
                                                                <a class="dropdown-item editApprove"
                                                                href="#" id="editApprove">Edit & Approve</a>
                                                                @endcan
                                                                @can('approve petty')
                                                                <a class="dropdown-item addApprove"
                                                                href="approve_petty/{{$request->id}}">Approve</a>
                                                                @endcan
                                                                @can('reject petty')
                                                                <a class="dropdown-item addRejected"
                                                                href="#" id="addRejected">Reject</a>
                                                                @endcan
                                                                @can('disburse petty')
                                                                <a class="dropdown-item"
                                                                href="disburse/{{$request->id}}" >Disburse</a>
                                                                @endcan
                                                                @can('add petty receipts')
                                                                <a class="dropdown-item addReceipt"
                                                                href="#" id="addReceipt">Add Receipts</a>
                                                                @endcan
                                                                @can('account petty')
                                                                <a class="dropdown-item"
                                                                href="acknowledge_petty/{{$request->id}}" >Account for</a>
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
                    <h5 class="modal-title">Add Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_petty" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control " id="church_phone" name="item" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project</label>
                                    <input type="text" class="form-control " id="church_phone" name="project" required>
                                </div>
                            </div>
                        </div>

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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control " id="church_phone" name="amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payee</label>
                                    <input type="text" class="form-control " id="church_phone" name="payee" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Payee Phone</label>
                                    <input type="text" class="form-control " id="church_phone" name="payeePhone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Attach Receipts</label>
                                    <input type="file" class="form-control " id="church_phone" name="images[]" multiple>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Narration</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter purpose of request & other details eg No Plate" name="narration"
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addReceiptModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Receipts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="save_petty_receipts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Spent Amount</label>
                                    <input type="number" class="form-control " id="church_phone" name="amount" required>
                                </div>
                                <input type="text" class="form-control " id="idRece" name="id" hidden> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Attach Receipts</label>
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


    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="editApproveModal">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_petty_amount" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control " id="idAct" name="amount"> 
                            </div>
                            <input type="text" class="form-control " id="idPett" name="id" hidden> 
                            
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Reason</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="reason"
                                rows="2" required></textarea>
                             </div>
                        <input class="btn btn-primary" value="Submit" type="submit">
                    </form>

                </div>

            </div>
        </div>
    </div>

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
        table.on('click', '.addApprove', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#idAct').val(data[0]);
            $('#updateModal').modal('show');
        });

        table.on('click', '.editApprove', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#idPett').val(data[0]);
            $('#editApproveModal').modal('show');
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

        table.on('click', '.addReceipt', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parant');
            }
            var data = table.row($tr).data();
            $('#idRece').val(data[0]);
            $('#addReceiptModal').modal('show');
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
        'RECORD UPDATED SUCCESSFULLY',
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
        'DISBERSE FAILED DUE TO SAP INTEGRATION. CONTACT ADMIN',
        'error'
    )
    @elseif(session() -> has('noPermission'))
    Swal.fire(
        'NOTIFICATION!',
        'YOU DONT HAVE PERMISSION TO APPROVE',
        'error'
    )
    @elseif(session() -> has('approvalPending'))
    Swal.fire(
        'NOTIFICATION!',
        'APPROVAL IS STILL PENDING',
        'error'
    )
    @elseif(session() -> has('pettyDisbersedSynced'))
    Swal.fire(
        'NOTIFICATION!',
        'RECORD UPDATED SUCCESSFULLY & SYNCED',
        'success'
    )
    @endif
    </script>
</body>

</html>