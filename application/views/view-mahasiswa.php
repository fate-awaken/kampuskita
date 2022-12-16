	<br>
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<div id="content-wrapper" class="d-flex flex-column"></div>


		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Mahasiswa</h3>
			</div>
			<div class="card-body">
				<center>
					<form action="<?= base_url('') ?>">
						<div class="input-group mb-3 col-6">
							<input type="text" class="form-control" placeholder="Cari Mahasiswa" aria-label="Cari Mahasiswa" aria-describedby="button-addon2" autocomplete="off" autofocus>
							<button class="btn btn-outline-success" type="button" id="button-addon2">Cari</button>
						</div>
					</form>
				</center>

				<a class="btn btn-outline-secondary mb-3" align="center" data-toggle="modal" data-target="#newMahasiswa">Tambah Mahasiswa</a>

				<center>
					<div class="col-4">
						<?= $this->session->flashdata('message'); ?>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>
					</div>
				</center>

				<table class="table table-hover text-dark">
					<thead class="table-secondary">
						<tr>
							<th scope="col">No</th>
							<th scope="col">NIM</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">Jurusan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($queryAllMhs as $row) :
						?>

							<tr>
								<td><?= $i; ?></td>
								<td><?= $row->nim; ?></td>
								<td><?= $row->nama; ?></td>
								<td><?= $row->email; ?></td>
								<td><?= $row->jurusan; ?></td>
								<td>
									<a class="badge badge-success" data-toggle="modal" data-target="#editMhs<?= $row->id; ?>" href=""><i class="fas fa-fw fa-edit"></i></a>
									<a class="badge badge-danger" data-toggle="modal" data-target="#deleteMhs"><i class="fas fa-fw fa-trash" href=""></i></a>
								</td>

							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
				</table>

				<?= $this->pagination->create_links(); ?>

				<hr class="container-divider">

			</div>
		</div>
	</div>
	</div>
	</div>

	<div class="modal fade" id="newMahasiswa" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('mahasiswa/tambahmhs'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="number" class="form-control mb-2" id="nim" name="nim" placeholder="NIM">
							<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama Lengkap">
							<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email">
							<input type="text" class="form-control mb-2" id="jurusan" name="jurusan" placeholder="Jurusan">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- modal edit -->
	<?php foreach ($queryAllMhs as $row) : ?>
		<div class="modal fade" id="editMhs<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="newMenuModalLabel">Edit Data<?= $row->nama; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('mahasiswa/editmhs'); ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<input type="hidden" class="form-control mb-2" id="id" name="id" placeholder="id" value="<?= $row->id; ?>">
								<input type="number" class="form-control mb-2" id="nim" name="nim" placeholder="NIM" value="<?= $row->nim; ?>">
								<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $row->nama; ?>">
								<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" value="<?= $row->email; ?>">
								<input type="text" class="form-control mb-2" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $row->jurusan; ?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Ubah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<!-- delet data-->
	<div class="modal fade" id="deleteMhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger" href="<?= base_url('mahasiswa/deletemhs'); ?>/<?= $row->id; ?>">Delete</a>
				</div>
			</div>
		</div>
	</div>
