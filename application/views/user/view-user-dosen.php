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
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dosen['nama']; ?></span>
						<img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_2.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('user/loadProfileDosen') ?>">
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

		<h2>Selamat Datang <?= $dosen['nama']; ?></h2>


		<div class="row">
			<div class="col-md-5">
				<form action="<?= base_url(''); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<table class="table">

								<tbody>
									<tr>
										<td>NIP</td>
										<td><input type="number" class="form-control mb-2" id="nip" name="nip" placeholder="NIP" value="<?= $dosen['nip']; ?>" readonly></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td><input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $dosen['nama']; ?>" readonly></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" value="<?= $dosen['email']; ?>" readonly></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>

		<p>Silahkan mengakses fitur dibawah ini</p>

		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<img src="<?= base_url('assets/') ?>img/class.jpg" class="card-img-top" alt="class">
					<div class="card-body">
						<h5 class="card-title">Daftar Kelas</h5>
						<p class="card-text">Halaman yang berisi kelas-kelas yang tersedia hari ini</p>
						<center>
							<a href="<?= base_url('user/loadKelasDosenPage'); ?>" class="btn btn-success">Lihat Kelas</a>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
