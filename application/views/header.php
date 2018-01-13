<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iChech - check plugin -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <!-- DataTable - Table plugin -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables/dataTables.min.css">
  <!-- DataTable Buttons - Download Button -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables/Buttons-1.5.1/css/buttons.dataTables.min.css">
  <!-- DataTable Buttons - Download Button -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables/Buttons-1.5.1/css/buttons.bootstrap.min.css">
  <!-- Select2 - Selection -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  /*
   * Plugin: Select2
   * ---------------
   */
  .select2-container--default.select2-container--focus,
  .select2-selection.select2-container--focus,
  .select2-container--default:focus,
  .select2-selection:focus,
  .select2-container--default:active,
  .select2-selection:active {
    outline: none;
  }
  .select2-container--default .select2-selection--single,
  .select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px;
  }
  .select2-container--default.select2-container--open {
    border-color: #3c8dbc;
  }
  .select2-dropdown {
    border: 1px solid #d2d6de;
    border-radius: 0;
  }
  .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #3c8dbc;
    color: white;
  }
  .select2-results__option {
    padding: 6px 12px;
    user-select: none;
    -webkit-user-select: none;
  }
  .select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -4px;
  }
  .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
    padding-right: 6px;
    padding-left: 20px;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 28px;
    right: 3px;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 0;
  }
  .select2-dropdown .select2-search__field,
  .select2-search--inline .select2-search__field {
    border: 1px solid #d2d6de;
  }
  .select2-dropdown .select2-search__field:focus,
  .select2-search--inline .select2-search__field:focus {
    outline: none;
  }
  .select2-container--default.select2-container--focus .select2-selection--multiple,
  .select2-container--default .select2-search--dropdown .select2-search__field {
    border-color: #3c8dbc !important;
  }
  .select2-container--default .select2-results__option[aria-disabled=true] {
    color: #999;
  }
  .select2-container--default .select2-results__option[aria-selected=true] {
    background-color: #ddd;
  }
  .select2-container--default .select2-results__option[aria-selected=true],
  .select2-container--default .select2-results__option[aria-selected=true]:hover {
    color: #444;
  }
  .select2-container--default .select2-selection--multiple {
    border: 1px solid #d2d6de;
    border-radius: 0;
  }
  .select2-container--default .select2-selection--multiple:focus {
    border-color: #3c8dbc;
  }
  .select2-container--default.select2-container--focus .select2-selection--multiple {
    border-color: #d2d6de;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    margin-right: 5px;
    color: rgba(255, 255, 255, 0.7);
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #fff;
  }
  .select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px;
  }
  .box .datepicker-inline,
  .box .datepicker-inline .datepicker-days,
  .box .datepicker-inline > table,
  .box .datepicker-inline .datepicker-days > table {
    width: 100%;
  }
  .box .datepicker-inline td:hover,
  .box .datepicker-inline .datepicker-days td:hover,
  .box .datepicker-inline > table td:hover,
  .box .datepicker-inline .datepicker-days > table td:hover {
    background-color: rgba(255, 255, 255, 0.3);
  }
  .box .datepicker-inline td.day.old,
  .box .datepicker-inline .datepicker-days td.day.old,
  .box .datepicker-inline > table td.day.old,
  .box .datepicker-inline .datepicker-days > table td.day.old,
  .box .datepicker-inline td.day.new,
  .box .datepicker-inline .datepicker-days td.day.new,
  .box .datepicker-inline > table td.day.new,
  .box .datepicker-inline .datepicker-days > table td.day.new {
    color: #777;
  }
  </style>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p style="margin-bottom:0">
                  <?php echo $this->session->userdata['name'];?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>index.php/Login/Logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
