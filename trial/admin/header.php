<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Check if the user is logged in or not
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css" />
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">

</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				<span class="logo-lg">TransWay</span>
			</a>

			<nav class="navbar navbar-static-top">

				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin
					Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../assets/uploads/<?php echo $_SESSION['user']['photo']; ?>"
									class="user-image" alt="User Image">
								<span class="hidden-xs">
									<!-- <?php echo $_SESSION['user']['full_name']; ?> -->
								</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>

		<aside class="main-sidebar">
			<section class="sidebar">

				<ul class="sidebar-menu">

					<li class="treeview <?php if ($cur_page == 'index.php') {
						echo 'active';
					} ?>">
						<a href="index.php">
							<i class="fa fa-hand-o-right"></i> <span>Dashboard</span>
						</a>
					</li>

					<li class="treeview <?php if (($cur_page == 'slider.php')) {
						echo 'active';
					} ?>">
						<a href="slider.php">
							<i class="fa fa-hand-o-right"></i> <span>Slider</span>
						</a>
					</li>
					
					<li class="treeview <?php if (($cur_page == 'sliderone.php')) {
						echo 'active';
					} ?>">
						<a href="sliderone.php">
							<i class="fa fa-hand-o-right"></i> <span>Slider One</span>
						</a>
					</li>
					
					<li class="treeview <?php if (($cur_page == 'community.php')) {
						echo 'active';
					} ?>">
						<a href="community.php">
							<i class="fa fa-hand-o-right"></i> <span>Community chat banner</span>
						</a>
					</li>
					
					<li class="treeview <?php if ($cur_page == 'homeevent.php') { echo 'active'; } ?>">
						<a href="homeevent.php">
							<i class="fa fa-hand-o-right"></i> <span>homeevents</span>
						</a>
					</li>
					
					<li class="treeview <?php if ($cur_page == 'home-community.php') { echo 'active'; } ?>">
						<a href="home-community.php">
							<i class="fa fa-hand-o-right"></i> <span>home-community</span>
						</a>
					</li>
					
					<li class="treeview <?php if ($cur_page == 'experience.php') { echo 'active'; } ?>">
						<a href="experience.php">
							<i class="fa fa-hand-o-right"></i> <span>experience section</span>
						</a>
					</li>



					<li class="treeview <?php if ($cur_page == 'events.php') { echo 'active'; } ?>">
						<a href="events.php">
							<i class="fa fa-hand-o-right"></i> <span>events</span>
						</a>
					</li>

					<li class="treeview <?php if ($cur_page == 'evetdetails.php') { echo 'active'; } ?>">
						<a href="eventdetails.php">
							<i class="fa fa-hand-o-right"></i> <span>eventdetails </span>
						</a>
					</li>
					
					<li class="treeview <?php if ($cur_page == 'communities.php') { echo 'active'; } ?>">
						<a href="communities.php">
							<i class="fa fa-hand-o-right"></i> <span> Communities </span>
						</a>
					</li>

					
				
					<li class="treeview <?php if ($cur_page == 'store.php') { echo 'active'; } ?>">
						<a href="store.php">
							<i class="fa fa-hand-o-right"></i> <span>store </span>
						</a>
					</li>

					<li class="treeview <?php if ($cur_page == 'blogs.php') { echo 'active'; } ?>">
						<a href="blogs.php">
							<i class="fa fa-hand-o-right"></i> <span>blogs </span>
						</a>
					</li>

				</ul>
			</section>
		</aside>

		<div class="content-wrapper">