<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('vendors/images/apple-touch-icon.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('vendors/images/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/core.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/icon-font.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('vendors/styles/style.css')}}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <!-- End Google Tag Manager -->
</head>

<body>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
            </div>
        </div>
        <div class="header-right">

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="" />
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                        <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>

    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="/">
                <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
                <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-textarea-resize"></span><span class="mtext">Forms</span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="list_keuangan">Persembahan</a>
                            </li>
                            <li><a href="list_kas">Arus Kas Tahunan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Formulir</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Form
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Formulir Persembahan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Formulir Persembahan</h4>
                            <br>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="form-group row" action="">
                            <label class="col-sm-12 col-md-2 col-form-label">Judul / Keterangan</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="judul" value="" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Minggu</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="minggu" type="text" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Tangal
                                dan Waktu</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control datetimepicker" name="tanggal" placeholder="Pilih tanggal" type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Total</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="total" placeholder="Rp. 850.000" type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="image_file" type="file" />
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label"><strong>Detail Persembahan</strong></label>
                            <textarea class="form-control tinymce-editor" name="detail_persembahan" placeholder="Masukkan detail persembahan..."></textarea>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                <!-- Default Basic Forms End -->
                </form>



                <!-- welcome modal end -->
                <!-- js -->
                <script src="{{url('vendors/scripts/core.js')}}"></script>
                <script src="{{url('vendors/scripts/script.min.js')}}"></script>
                <script src="{{url('vendors/scripts/process.js')}}"></script>
                <script src="{{url('vendors/scripts/layout-settings.js')}}"></script>
                <script src="{{url('assets/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
                <script src="{{url('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <script src="{{url('assets/assets/vendor/chart.js/chart.umd.js')}}"></script>
                <script src="{{url('assets/assets/vendor/echarts/echarts.min.js')}}"></script>
                <script src="{{url('assets/assets/vendor/quill/quill.min.js')}}"></script>
                <script src="{{url('assets/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
                <script src="{{url('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>
                <script src="{{url('assets/assets/vendor/php-email-form/validate.js')}}"></script>
                <script src="{{url('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>

                <!-- Template Main JS File -->
                <script src="{{url('assets/assets/js/backmain.js')}}"></script>
                <script src="{{url('assets/assets/tagsinput/bootstrap-tagsinput.js')}}"></script>
                <script type="text/javascript">
                    <!-- Google Tag Manager (noscript)
                    -->
                <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
</body>

</html>