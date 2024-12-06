<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authentification | App</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ekko Lightbox -->
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-warning navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="{{route('home')}}" class="nav-link">Profil utilisateur</a>
				</li>

			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">

				<!-- Paramètres de l'application -->

				<!-- Profil utilisateur -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="">
						{{ Auth::user()->name }}
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">Profile</span>
						<div class="dropdown-divider"></div>
						<form action="{{route('logout')}}" method="post">
							@csrf
							<button type="submit" class="btn btn-primary col-md-12">
								<i class="fas fa-key"></i> Se déconnecter
							</button>
						</form>

						<div class="dropdown-divider"></div>

					</div>
				</li>

			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="" class="brand-link">
				<span class="brand-text font-weight-light">Authentifcation App</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar Menu -->
				<!--nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Gestion des élèves
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{url('home')}}" class="nav-link">
										<i class="fa fa-plus"></i>
										<p>Enregistrer les classes</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{url('home')}}" class="nav-link">
										<i class="fa fa-plus"></i>
										<p>Enregistrer les Matières</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{url('home')}}" class="nav-link">
										<i class="fa fa-plus"></i>
										<p>Enregistrer les élèves</p>
									</a>
								</li>

							</ul>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Gestion des notes
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="{{route('home')}}" class="nav-link">
										<i class="fa fa-plus"></i>
										<p>Enregistrer les notes</p>
									</a>
								</li>

							</ul>
						</li>

					</ul>
				</nav-->
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">

			</div>
			<strong>Copyright &copy; <a target="_blank" href="http://pascalbitsa.000webhost.com">Pascal Bitsa.</a>.</strong>
			Tout droit reservé.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- Page specific script -->

</body>

</html>