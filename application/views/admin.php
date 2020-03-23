<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-fw fa-user"></i>
                        <?= $this->session->userdata('user') ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-fw fa-user mr-2"></i> Profile
                        </a>
                        <a href="<?= site_url('admin/logout') ?>" class="dropdown-item">
                            <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $this->session->userdata('user') ?></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="menu">
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper" id="show_data">
            <?= $view ?>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?></strong>
            Ferdy Barliansyah R.
            <div class="float-right d-none d-sm-inline-block">
                Contributed to Lombok Cyber Community
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?= site_url('admin/menu') ?>',
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    var menu = ''
                    for (var i = 0; i < data.length; i++) {
                        var sub = '';
                        for (var j = 0; j < data[i].submenu.length; j++) {
                            submenu = '<li class="nav-item" data-url="' + data[i].submenu[j].url + '">' +
                                '<a href="#" class="nav-link">' +
                                '<i class="' + data[i].submenu[j].icon + ' nav-icon"></i>' +
                                '<p>' + data[i].submenu[j].title + '</p>' +
                                '</a>' +
                                '</li>';
                            sub += submenu;
                        }
                        menu += '<li class="nav-item has-treeview">' +
                            '<a href="#" class="nav-link">' +
                            '<i class="nav-icon ' + data[i].icon + '"></i>' +
                            '<p>' +
                            data[i].title +
                            '<i class="right fas fa-angle-left"></i>' +
                            '</p>' +
                            '</a>' +
                            '<ul class="nav nav-treeview submenu" >' + sub + '</ul>' +
                            '</li>';
                    }
                    $('#menu').html(menu);
                    $('.nav-link').click(function() {
                        $('.nav-link').removeClass('active');
                        $(this).addClass('active');
                    });
                    $('.submenu').on('click', '.nav-item', function() {
                        url = $(this).data('url');
                        $('#show_data').load('<?= site_url() ?>' + '/' + url);
                    });
                }
            })
        });
    </script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
</body>

</html>