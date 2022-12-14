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
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
						<img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_2.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('home/viewProfile') ?>">
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

		<h2>Selamat Datang Admin</h2>

		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<img src="<?= base_url('assets/')?>img/mahasiswa.jpg" class="card-img-top" alt="mahasiswa">
					<div class="card-body">
						<h5 class="card-title">Data Mahasiswa</h5>
						<p class="card-text">Halaman yang berisi data mahasiswa seperti NIM, Nama Lengkap, Email dan Jurusan</p>
						<center>
							<a href="<?= base_url('mahasiswa'); ?>" class="btn btn-success">Kelola Data</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<img src="<?= base_url('assets/')?>img/dosen.jpg" class="card-img-top" alt="dosen">
					<div class="card-body">
						<h5 class="card-title">Data Dosen</h5>
						<p class="card-text"> Halaman yang berisi data dosen seperti NIP, Nama Lengkap dan Email</p>
						<center>
							<a href="<?= base_url('dosen'); ?>" class="btn btn-success">Kelola Data</a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

	</body>
