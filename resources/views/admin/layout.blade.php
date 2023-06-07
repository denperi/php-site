<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVP</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/front_admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/front_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/front_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/front_admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/front_admin/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/front_admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/front_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/front_admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/front_admin/plugins/summernote/summernote-bs4.min.css">

    <!-- jQuery -->
    <link rel="stylesheet" href="/front_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">

    <script src="/front_admin/plugins/jquery/jquery.min.js"></script>

    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin" class="nav-link">Главная</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" role="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Выход
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
            <img src="/front_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">CRM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->email}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/categories" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Категории мероприятий
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/events" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Мероприятия
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/eventregistrations" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Записи на мероприятия
                            </p>
                        </a>
                    </li>

                    @if (Auth::user()->role >= 100)
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Пользователи
                                </p>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; {{date('Y')}}</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="/front_admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/front_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/front_admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/front_admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/front_admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/front_admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/front_admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/front_admin/plugins/moment/moment.min.js"></script>
<script src="/front_admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/front_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/front_admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/front_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/front_admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/front_admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="/front_admin/dist/js/pages/dashboard.js"></script>--}}
<!-- Select2 -->
<script src="/front_admin/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="/front_admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/front_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="/front_admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/front_admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/front_admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/front_admin/plugins/jszip/jszip.min.js"></script>
<script src="/front_admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/front_admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/front_admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/front_admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/front_admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        $("#data_table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [[ 0, "desc" ]],
            "lengthMenu": [[25, 50, 100], [25, 50, 100]],
            "responsive": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Russian.json"
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function () {
        $('.select2').select2();

        $('.date-input').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            locale: {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "customRangeLabel": "Custom",
                "weekLabel": "Н",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                "firstDay": 1
            },
        });
    })
</script>

@yield('js')

</body>
</html>
