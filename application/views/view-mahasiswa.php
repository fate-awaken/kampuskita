<br>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Mahasiswa</h3>
		</div>
		<div class="card-body">

			<div class="row justify-content-center mt-4">
				<div class="col-md-5">
					<form action="<?= base_url('mahasiswa'); ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " name="keyword" autocomplete="off" autofocus>
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn btn-outline-secondary mb-3" align="center" data-toggle="modal" data-target="#newMahasiswa">Tambah Mahasiswa</a>

			<div class="row justify-content-center">
				<div class="col-4">
					<?= $this->session->flashdata('message'); ?>
					<?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<h5>Hasil : <?= $total_rows; ?></h5>

			<table class="table table-hover text-dark">
				<thead class="table-secondary">
					<tr>
						<th scope="col">No</th>
						<th scope="col">NIM</th>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Jurusan</th>
						<th scope="col">Role id</th>
						<th scope="col">Is active</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($mahasiswa)) : ?>
						<tr>
							<td colspan="6">
								<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>
							</td>
						</tr>
					<?php endif; ?>
					<?php
					foreach ($mahasiswa as $row) :
					?>

						<tr>
							<td><?= ++$start; ?></td>
							<td><?= $row->nim; ?></td>
							<td><?= $row->nama; ?></td>
							<td><?= $row->email; ?></td>
							<td><?= $row->jurusan; ?></td>
							<td><?= $row->role_id; ?></td>
							<td><?= $row->is_active; ?></td>
							<td>
								<a class="badge badge-success" data-toggle="modal" data-target="#editMhs<?= $row->id; ?>" href=""><i class="fas fa-fw fa-edit"></i></a>
								<a class="badge badge-danger" data-toggle="modal" data-target="#deleteMhs<?= $row->id; ?>"><i class="fas fa-fw fa-trash"></i></a>
							</td>

						</tr>
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
						<input type="number" class="form-control mb-2" id="nim" name="nim" placeholder="NIM" required>
						<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama Lengkap" required>
						<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" required>
						<input type="text" class="form-control mb-2" id="jurusan" name="jurusan" placeholder="Jurusan" required>
						<input type="text" class="form-control mb-2" id="password" name="password" placeholder="Password" required>
						<input type="number" class="form-control mb-2" id="role_id" name="role_id" value="2" readonly>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
							<label class="form-check-label" for="is_active">
								Active?
							</label>
						</div>
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
<?php foreach ($mahasiswa as $row) : ?>
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
							<input type="hidden" class="form-control mb-2" id="id" name="id" placeholder="id" value="<?= $row->id; ?>" required>
							<input type="number" class="form-control mb-2" id="nim" name="nim" placeholder="NIM" value="<?= $row->nim; ?>" required readonly>
							<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $row->nama; ?>" required>
							<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" value="<?= $row->email; ?>" required readonly>
							<input type="text" class="form-control mb-2" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $row->jurusan; ?>" required>
							<input type="text" class="form-control mb-2" id="password" name="password" placeholder="Password" value="<?= $row->password; ?>" required>
							<input type="number" class="form-control mb-2" id="role_id" name="role_id" value="2" readonly>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
								<label class="form-check-label" for="is_active">
									Active?
								</label>
							</div>
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
<?php foreach ($mahasiswa as $row) : ?>
	<div class="modal fade" id="deleteMhs<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Hapus <?= $row->nama; ?> ?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<a class="btn btn-primary" href="<?= base_url('mahasiswa/deleteMhs'); ?>/<?= $row->id; ?>">Delete</a>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>