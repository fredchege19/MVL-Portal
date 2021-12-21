<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
               
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                <tbody>
                                    <tr>
                                        <td><b id="show_name">Item: </b> {{$data->item}} </td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_phone">Amount: </b> {{$data->amount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_salutation">Edited Amount: </b>{{$data->edited}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_dob">Edited Reason: </b>{{$data->editedReason}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_gender">Payee: </b>{{$data->payee}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_email">Department:</b> {{$data->department}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_marital">Narration: </b>{{$data->narration}}</td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_marital">Rejected Reason: </b>{{$data->rejectReason}}</td>
                                    </tr>
                                    @if($data->approval1 =="0")
                                    <tr>
                                        <td><b id="show_marital">Approver 1: </b>Pending</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><b id="show_marital">Approver 1: </b>Approved</td>
                                    </tr>
                                    @endif

                                    @if($data->approval2 =="0")
                                    <tr>
                                        <td><b id="show_marital">Approver 2: </b>Pending</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><b id="show_marital">Approver 2: </b>Approved</td>
                                    </tr>
                                    @endif

                                    @if($data->approval3 =="0")
                                    <tr>
                                        <td><b id="show_marital">Approver 3: </b>Pending</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><b id="show_marital">Approver 3: </b>Approved</td>
                                    </tr>
                                    @endif
                                    
                                    <tr>
                                        <td><b id="show_marital">Created By: </b>{{$data->name}}</td>
                                    </tr>
                                    


                                </tbody>
                            </table>

                        </div>

                        <div class="row">
                                    <div class="col-12">
                                        <h4>Receipts</h4>
                                        <div class="post">
                                            <div class="user-block">
                                            
                                            @if(count($receipts)>0)
                                                <span class="username">
                                                    <a href="#">Amount Used: {{$receipts[0]->amount}}</a>
                                                </span>
                                            @else
                                            <span class="username">
                                                    <a href="#">Amount Used: not updated</a>
                                                </span>
                                            @endif
                                            </div>
                                            <!-- /.user-block -->

                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach($receipts as $image)
                                                    <div class="col-sm-2">
                                                        <a href="../uploads/{{$image->fileName}}"
                                                            data-toggle="lightbox" data-title="sample 1 - white"
                                                            data-gallery="gallery">
                                                            <img src="../uploads/{{$image->fileName}}"
                                                                class="img-fluid mb-2" alt="white sample" />
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </div>

                </div>

                <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>



    <!-- Main Footer -->
    <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">MVL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-pre
            </div>
        </footer>
    </div>


    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
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
</body>

</html>