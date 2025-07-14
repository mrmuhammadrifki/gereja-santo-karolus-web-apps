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
</head>

<body>