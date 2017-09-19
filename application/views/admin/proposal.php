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
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


         <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    HIFEST 2017
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?=base_url('admin/');?>">
                        <i class="pe-7s-user"></i>
                        <p>Manage Participants</p>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('admin/manage_team');?>">
                        <i class="pe-7s-user"></i>
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
                    <a href="proposal.html">
                        <p>LOGOUT</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Participant Management</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <div class="top">

                            </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>UNIVERSITY</th>
                                            <th>EMAIL</th>
                                            <th>PHONE NUM</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($participants as $participant):?>
                                        <tr>
                                            <td><?php echo $participant->participant_id;?></td>
                                            <td><?php echo $participant->participant_name;?></td>
                                            <td><?php echo $participant->participant_university;?></td>
                                            <td><?php echo $participant->participant_email;?></td>
                                            <td><?php echo $participant->participant_msisdn;?></td>
                                            <td><?php echo $participant->participant_type;?></td>
                                            <td><?php echo $participant->participant_status;?></td>
                                            <td>
                                                <button class="btn btn-warning" onclick="edit_book(<?php echo $participant->participant_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                    <button class="btn btn-danger" onclick="delete_book(<?php echo $participant->participant_id ;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                            </td>

                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://github.com/vousmeevoyez">Kelvin</a> Light Dashboard Theme. All Right Reserved
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?=base_url('assets/admin/js/jquery-1.10.2.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "dom": '<lf<t>ip>'
        });

    } );
</script>
</html>