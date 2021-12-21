<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('partials.menu')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{$activity->activity_type}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Project Detail</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Activity Detail</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Supervisor</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{$activity->supervisor}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Technician</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{$activity->technician}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Status</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{$activity->status}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Recent Activity</h4>
                                        <div class="post">
                                            <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../dist/img/user2-160x160.jpg" alt="user image">
                                                <span class="username">
                                                    <a href="#">Technician: {{$activity->technician}}</a>
                                                </span>
                                                <span class="description">{{$images[0]->created_at->diffForHumans()}}</span>
                                                <span class="badge badge-success">{{$activity->status}}</span>
                                            </div>
                                            <!-- /.user-block -->

                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach($images as $image)
                                                    <div class="col-sm-2">
                                                        <a href="../uploads/{{$image->file}}"
                                                            data-toggle="lightbox" data-title="sample 1 - white"
                                                            data-gallery="gallery">
                                                            <img src="../uploads/{{$image->file}}"
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
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

                            <div class="table-responsive">
                            <table id="example5" class="table table-striped table-bordered border-t0 text-nowrap w-100">
                                <tbody>
                                    <tr>
                                        <td><b id="show_name">Region: {{$activity->region}} </b> </td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_phone">County: {{$activity->county}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_salutation">Road: {{$activity->road}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_dob">Site: {{$activity->site}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_gender">Start Date: {{$activity->start_date}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_email">End Date: {{$activity->end_date}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_marital">Remarks: {{$activity->remarks}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_education">Status: {{$activity->status}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_profession">Status Reason: {{$activity->reason_status}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b id="show_county">Created Date:{{$activity->created_at}} </b></td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">MVL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-pre
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>