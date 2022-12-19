<div class="container-fluid">
	<div class="d-flex flex-column">
		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<!-- Nav Item - Search Dropdown (Visible Only XS) -->
				<li class="nav-item dropdown no-arrow d-sm-none">
					<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-search fa-fw"></i>
					</a>
					<!-- Dropdown - Messages -->
					<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
						<form class="form-inline mr-auto w-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>


				<div class="topbar-divider d-none d-sm-block"></div>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">Dosen</span>
						<img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_2.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('user/viewProfileDosen') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->

		<center>
			<h2>Daftar Kelas</h2>
		</center>

		<br>
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col">
				<div class="card">
					<img src="<?= base_url('assets/') ?>img/information_system_class.jpg" class="card-img-top" alt="information system">
					<div class="card-body">
						<h5 class="card-title">Information System</h5>
						<p class="card-text">Kode Kelas : IS.08.01</p>
						<p class="card-text">Hari : Senin</p>
						<p class="card-text">Mulai : 08.00 WIB</p>
						<center>
							<a href="" class="btn btn-success">Masuk Kelas</a>
						</center>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<img src="<?= base_url('assets/') ?>img/information_system_class.jpg" class="card-img-top" alt="information system">
					<div class="card-body">
						<h5 class="card-title">Information System</h5>
						<p class="card-text">Kode Kelas : IS.03.01</p>
						<p class="card-text">Hari : Senin</p>
						<p class="card-text">Mulai : 12.00 WIB</p>
						<center>
							<a href="" class="btn btn-success">Masuk Kelas</a>
						</center>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<img src="<?= base_url('assets/') ?>img/information_system_class.jpg" class="card-img-top" alt="information system">
					<div class="card-body">
						<h5 class="card-title">Information System</h5>
						<p class="card-text">Kode Kelas : IS.34.03</p>
						<p class="card-text">Hari : Kamis</p>
						<p class="card-text">Mulai : 13.00 WIB</p>
						<center>
							<a href="" class="btn btn-success">Masuk Kelas</a>
						</center>
					</div>
				</div>
			</div>
	</div>
</div>
