<div class="container-fluid mt-3">
	<div class="d-flex flex-column">
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
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $mahasiswa['nama']; ?></span>
						<img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_2.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>

		<h2><?= $title; ?></h2>




		<div class="content mt-5">
			<div class="row mt-5">
				<div class="col-md-3">
					<div class="row justify-content-center ml-5">
						<img src="<?= base_url('assets/'); ?>img/undraw_profile_2.svg" class="mx-auto" width="320px" alt="profile">
						<h2 class="text-center mt-2"><?= $mahasiswa['nama']; ?></h2>
					</div>
				</div>
				<div class="col mt-5">

					<form action="<?= base_url(''); ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<table class="table table-borderless">

									<tbody>
										<tr>
											<td>
												<h4 class="mt-1 text-center">NIM</h4>
											</td>
											<td><input type="number" class="form-control w-50 mr-5" id="nim" name="nim" placeholder="NIM" value="<?= $mahasiswa['nim']; ?>" readonly></td>
										</tr>
										<tr>
											<td>
												<h4 class="mt-1 text-center">Nama</h4>
											</td>
											<td><input type="text" class="form-control mb-2 w-50" id="nama" name="nama" placeholder="Nama" value="<?= $mahasiswa['nama']; ?>" readonly></td>
										</tr>
										<tr>
											<td>
												<h4 class="mt-1 text-center">email</h4>
											</td>
											<td><input type="email" class="form-control mb-2 w-50" id="email" name="email" placeholder="Email" value="<?= $mahasiswa['email']; ?>" readonly></td>
										</tr>
										<tr>
											<td>
												<h4 class="mt-1 text-center">jurusan</h4>
											</td>
											<td><input type="text" class="form-control mb-2 w-50" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $mahasiswa['jurusan']; ?>" readonly></td>
										</tr>

									</tbody>
								</table>

							</div>
						</div>
					</form>
				</div>

			</div>
			<br><br><br><br>
			<div class="content mt-5">
				<div class="row mt-5">
					<h3>Change Password</h3>
					<div class="col-lg-4 mt-5">
						<?= $this->session->flashdata('message'); ?>
						<form action="<?= base_url('user/changePassword'); ?>" method="post">
							<div class="form-group">
								<label for="current_password">Current Password</label>
								<input type="password" class="form-control" id="current_password" name="current_password">
								<?= form_error('current_password', '<small class="text-danger pl-3">', '</small> '); ?>
							</div>
							<div class="form-group">
								<label for="new_password1">New Password</label>
								<input type="password" class="form-control" id="new_password1" name="new_password1">
								<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small> '); ?>
							</div>
							<div class="form-group">
								<label for="new_password2">Repeat Password</label>
								<input type="password" class="form-control" id="new_password2" name="new_password2">
								<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small> '); ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
					</div>
				</div>
			</div>


			<br><br>



		</div>
	</div>
</div>