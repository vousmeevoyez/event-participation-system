<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>HIFEST BACKEND by Kelvin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url('assets/admin/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Animation library for notifications   -->
    <link href="<?=base_url('assets/admin/css//animate.min.css');?>" rel="stylesheet" type="text/css" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=base_url('assets/admin/css/light-bootstrap-dashboard.css');?>" rel="stylesheet" type="text/css" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url('assets/admin/css/pe-icon-7-stroke.css');?>" rel="stylesheet" type="text/css" /> 
    <link href="<?=base_url('assets/sweetalert/dist//sweetalert.css');?>" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


         <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?=base_url('/admin');?>" class="simple-text">
                    <img src="<?=base_url('assets/pages/img/logo_hifest.png');?>">
                    DASHBOARD 
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?=base_url('admin/');?>">
                        <i class="pe-7s-users"></i>
                        <p>Manage Participant</p>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('admin/manage_team');?>">
                        <i class="pe-7s-id"></i>
                        <p>Manage Team</p>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('admin/manage_proposal');?>">
                        <i class="pe-7s-note2"></i>
                        <p>Manage Proposal</p>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('admin/logout');?>">
                        <i class="pe-7s-close-circle"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>