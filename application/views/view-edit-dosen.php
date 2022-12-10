<body>
	<div class="container">

		<div class="card border-0 shadow-lg my-5">
			<div class="card-body">
				<!-- Nested Row within Card Body -->
				<div class="p-3">
					<div class="text-center">
						<h1 class="h1 text-gray-900 mb-4">Edit Data Dosen</h1>
					</div>
					<form class="user" action="<?php echo site_url('dosen/editdsn') ?>" method="post">
						<div class="form-group row">
							<div class="col-sm-12 mb-3 mb-sm-0">
								<input type="number" class="form-control form-control-user" name="nip" placeholder="NIP" value="<?php echo $queryDsnDetail->nip ?>"><br>
							</div>
							<div class="col-sm-12">
								<input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" value="<?php echo $queryDsnDetail->nama ?>">
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="<?php echo $queryDsnDetail->email ?>">
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
								<a href="<?php echo site_url('dosen') ?>" class="btn btn-success btn-user btn-block">Kembali</a>
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
