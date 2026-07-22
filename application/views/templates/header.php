<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Font Awesome -->
    <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css"
          rel="stylesheet"
          type="text/css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
          rel="stylesheet">

    <!-- SB Admin -->
    <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css"
          rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
          rel="stylesheet" />

    <style>

        html,
        body{
            height:100%;
            overflow:hidden;
        }

        /* Sidebar */
        #accordionSidebar{
            height:100vh;
            overflow-y:auto;
            flex-shrink:0;
        }

        /* Content */
        #content-wrapper{
            height:100vh;
            overflow-y:auto;
            width:100%;
        }

        /* Select2 agar mirip Bootstrap */
        .select2-container .select2-selection--single{
            height:38px !important;
            border:1px solid #d1d3e2 !important;
        }

        .select2-container--default
        .select2-selection--single
        .select2-selection__rendered{
            line-height:36px !important;
        }

        .select2-container--default
        .select2-selection--single
        .select2-selection__arrow{
            height:36px !important;
        }

    </style>

</head>

<body id="page-top">

<div id="wrapper">