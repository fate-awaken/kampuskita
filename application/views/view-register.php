<body style="background-color: #395144;">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card o-hidden border-0 shadow-lg my-5 mb-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<img src="<?= base_url('assets/icon/banner.png'); ?>" class="mb-5" width="300px" alt="logo">
									</div>

									<form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
											<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class=" form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
												<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
											</div>
										</div>

										<div class="form-group ml-3">
											<label class="form-label">Tipe Akun :</label>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="accountType" id="type1" value="Admin">
												<label class="form-check-label" for="type1">
													Admin
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="accountType" id="type2" value="Mahasiswa">
												<label class="form-check-label" for="type2">
													Mahasiswa
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="accountType" id="type3" value="Dosen">
												<label class="form-check-label" for="type3">
													Dosen
												</label>
											</div>
										</div>

										<br>

										<center>
											<button type="submit" class="btn btn-dark btn-user btn-block col-6">
												Register Account
											</button>
										</center>
									</form>
									<hr>

									<div class="text-center">
										<a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun ? Login!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

</body>
