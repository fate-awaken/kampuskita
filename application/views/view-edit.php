<body>
	<div class="container">

		<div class="card border-0 shadow-lg my-5">
			<div class="card-body">
				<!-- Nested Row within Card Body -->
				<div class="p-3">
					<div class="text-center">
						<h1 class="h1 text-gray-900 mb-4">Edit Data Siswa</h1>
					</div>
					<form class="user" action="<?php echo site_url('home/editmhs') ?>" method="post">
						<div class="form-group row">
							<div class="col-sm-12 mb-3 mb-sm-0">
								<input type="text" class="form-control form-control-user" name="nim" placeholder="NIM" value="<?php echo $queryMhsDetail->nim ?>"><br>
							</div>
							<div class="col-sm-12">
								<input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" value="<?php echo $queryMhsDetail->nama ?>">
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" name="email" placeholder="Email" value="<?php echo $queryMhsDetail->email ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" name="jurusan" placeholder="Jurusan" value="<?php echo $queryMhsDetail->jurusan ?>">
						</div>
						<hr>
						<div class="form-group row">
							<div class="col-sm-4 mb-3 mb-sm-0">
								<input type="submit" class="btn btn-outline-primary btn-user btn-block" value="Simpan Data">
							</div>
							<div class="col-sm-4">
								<input type="reset" class="btn btn-outline-danger btn-user btn-block" value="Hapus Data">
							</div>
							<div class="col-sm-4">
								<a href="<?php echo site_url('home') ?>" class="btn btn-outline-success btn-user btn-block">Kembali</a>
							</div>
						</div>
					</form>
					<hr>
				</div>
			</div>
		</div>
	</div>
	</div>

	</div>
