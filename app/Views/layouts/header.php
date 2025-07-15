<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?? 'Gereja Santo Karolus' ?></title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
    WebFont.load({
        google: {
            families: ['Public Sans:300,400,500,600,700']
        },
        custom: {
            families: ['Font Awesome 5 Solid', 'Font Awesome 5 Regular', 'Font Awesome 5 Brands',
                'simple-line-icons'
            ],
            urls: ['assets/css/fonts.min.css'],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/kaiadmin/favicon.ico'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/kaiadmin.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

    <style>
    /* 1. Confine overlay to sidebar by positioning it */
    .sidebar[data-background-color="dark"] {
        background-image: url('<?= base_url('assets/img/bg-gereja.jpg') ?>') !important;
        background-size: cover !important;
        background-position: center center !important;
        background-repeat: no-repeat !important;
        color: #fff;
    }

    /* 2. Semi-transparent black overlay inside sidebar bounds */
    .sidebar[data-background-color="dark"]::before {
        content: "";
        position: absolute;
        inset: 0;
        /* top:0; right:0; bottom:0; left:0; */
        background: rgba(0, 0, 0, 0.6) !important;
        z-index: 1;
        pointer-events: none;
    }

    /* 3. Make sure the logo & nav are above the overlay */
    .sidebar[data-background-color="dark"]>.sidebar-logo,
    .sidebar[data-background-color="dark"]>.sidebar-wrapper {
        position: relative;
        z-index: 2;
    }

    /* 4. Force icons/text to white */
    .sidebar[data-background-color="dark"] .nav a,
    .sidebar[data-background-color="dark"] .logo,
    .sidebar[data-background-color="dark"] .logo p {
        color: #fff !important;
    }

    /* mobile: sembunyikan sidebar ke kiri */
    @media (max-width: 991.98px) {
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            /* sesuaikan lebar sidebar */
            transform: translateX(-100%);
            z-index: 1050;
        }

        /* saat class .open, tampilkan kembali */
        .sidebar.open {
            transform: translateX(0);
        }

        /* main-panel ambil full width di mobile */
        .main-panel {
            margin-left: 0 !important;
        }
    }
    </style>
</head>

<body>