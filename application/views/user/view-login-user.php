<body style="background-color: #395144;">

	<div class="container">

		<!-- Outer Row -->
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

									<?= $this->session->flashdata('message'); ?>

									<form action="<?= base_url('auth/userLogin') ?>" method="post" class="user">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
											<?= form_error('email', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<center>
											<button type="submit" class="btn btn-dark btn-user btn-block col-6 ">
												Login
											</button>

										</center>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>