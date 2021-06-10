<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ticket Management | Neosoft Admin</title>
	<link href="http://localhost/neosoft/public/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://localhost/neosoft/public/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://localhost/neosoft/public/admin/css/datepicker3.css" rel="stylesheet">
	<link href="http://localhost/neosoft/public/admin/css/styles.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
<?php echo $__env->yieldContent('header_styles'); ?>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">3 mins ago</small>
									<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">1 hour ago</small>
									<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li><a href="#">
							<div><em class="fa fa-envelope"></em> 1 New Message
								<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span></div>
									</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<?php
						if(Sentinel::check()){
							$user = Sentinel::getUser();
						}
						?>
						<div class="profile-usertitle-name">Welcome <?php echo e($user->first_name); ?></div>
						<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="divider"></div>
				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<ul class="nav menu">
					<li class="<?php if(Request::is("administrator/dashboard")): ?> active <?php endif; ?> "><a href="<?php echo e(route("admin.dashboard")); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
					<?php if($user->user_type == "Admin"): ?>
					<li class="<?php if(Request::is("administrator/sub-admin-or-agent")): ?> active <?php endif; ?> " ><a href="<?php echo e(route('admin.subadmin')); ?>"><em class="fa fa-calendar">&nbsp;</em> Add Users</a></li>
					<li class="<?php if(Request::is("administrator/all-agent'")): ?> active <?php endif; ?> " ><a href="<?php echo e(route("admin.all-agent")); ?>"><em class="fa fa-users">&nbsp;</em> All Agent</a></li>
					<li class="<?php if(Request::is("administrator/all-subadmin")): ?> active <?php endif; ?> " ><a href="<?php echo e(route("admin.all-subadmin")); ?>"><em class="fa fa-users">&nbsp;</em> All Subadmin</a></li>
					<?php elseif($user->user_type == "Subadmin"): ?>
					<li class="<?php if(Request::is("administrator/sub-admin-or-agent")): ?> active <?php endif; ?> " ><a href="<?php echo e(route('admin.subadmin')); ?>"><em class="fa fa-bar-chart">&nbsp;</em> Add User or Agent</a></li>
					<li  ><a href="<?php echo e(route("admin.genrate-report")); ?>"><em class="fa fa-file">&nbsp;</em> Genrate Report </a></li>
					<li class=" <?php if(Request::is("subadmin/ticket")): ?> active <?php endif; ?>  " ><a href="<?php echo e(route("admin.ticket")); ?>"><em class="fa fa-ticket">&nbsp;</em> Create Ticket </a></li>
					<?php else: ?>
					<li class="<?php if(Request::is("agent/all-tickets")): ?> active <?php endif; ?>" ><a href="<?php echo e(route("admin.all-tickets")); ?>"><em class="fa fa-bar-chart">&nbsp;</em>  All Tickets </a></li>
					<?php endif; ?>

					<li><a href="<?php echo e(route("admin.logout")); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
				</ul>
			</div><!--/.sidebar-->

			<?php echo $__env->yieldContent('content'); ?>


			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="http://localhost/neosoft/public/admin/js/jquery-1.11.1.min.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/bootstrap.min.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/chart.min.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/chart-data.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/easypiechart.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/easypiechart-data.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/bootstrap-datepicker.js"></script>
	<script src="http://localhost/neosoft/public/admin/js/custom.js"></script>
	<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/jquery.form.js"></script>
	<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/formClass.js"></script>
    <script type="text/javascript" src="http://localhost/neosoft/public/admin/js/toastr.min.js"></script>

    <?php echo $__env->yieldContent('footer_scripts'); ?>

    <script>
      window.onload = function () {
         var chart1 = document.getElementById("line-chart").getContext("2d");
         window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
     };
 </script>

</body>
</html><?php /**PATH /opt/lampp/htdocs/neosoft/resources/views/admin/layouts/default.blade.php ENDPATH**/ ?>