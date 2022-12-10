<body style="background-color: #395144;">
	<div class="container">

		<div class="card border-0 shadow-lg my-5">
			<div class="card-body">
				<!-- Nested Row within Card Body -->
				<div class="p-3">
					<div class="text-center">
						<h1 class="h1 text-gray-900 mb-4">Tambah Data Dosen</h1>
					</div>
					<form class="user" action="<?php echo site_url('dosen/tambahdsn') ?>" method="post">
						<div class="form-group row">
							<div class="col-sm-12 mb-3 mb-sm-0">
								<input type="number" class="form-control form-control-user" name="nip" placeholder="NIP"><br>
							</div>
							<div class="col-sm-12">
								<input type="text" class="form-control form-control-user" name="nama" placeholder="Nama">
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control form-control-user" name="email" placeholder="Email">
						</div>
						<br>
						<hr>
						<div class="form-group row justify-content-around">
							<div class="col-sm-4 mb-3 mb-sm-0">
								<input type="submit" class="btn btn-primary btn-user btn-block" value="Simpan Data">
							</div>
							<div class="col-sm-4">
								<input type="reset" class="btn btn-danger btn-user btn-block" value="Hapus Data">
							</div>
							<div class="col-sm-4">
								<a href="<?php echo site_url('dosen') ?>" class="btn btn-success btn-block btn-user">Kembali</a>
							</div>
						</div>
					</form>
					<hr>
					<br>
				</div>
			</div>
		</div>
	</div>
	</div>

	</div>
