<br>
<!-- Begin Page Content -->
<div class="container-fluid">

	<div id="content-wrapper" class="d-flex flex-column"></div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Dosen</h3>
		</div>
		<div class="card-body">

			<a class="btn btn-outline-secondary mb-3" align="center" data-toggle="modal" data-target="#newDosen">Tambah Dosen</a>

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
						<th scope="col">NIP</th>
						<th scope="col">Nama Lengkap</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($dosen as $row) :
					?>

						<tr>
							<td><?= ++$start; ?></td>
							<td><?= $row->nip; ?></td>
							<td><?= $row->nama; ?></td>
							<td><?= $row->email; ?></td>
							<td>
								<a class="badge badge-success" data-toggle="modal" data-target="#editDsn<?= $row->id; ?>" href=""><i class="fas fa-fw fa-edit"></i></a>
								<a class="badge badge-danger" data-toggle="modal" data-target="#deleteDsn<?= $row->id; ?>"><i class="fas fa-fw fa-trash"></i></a>
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

<div class="modal fade" id="newDosen" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dosen/tambahdsn'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="number" class="form-control mb-2" id="nip" name="nip" placeholder="NIP" required>
						<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama Lengkap" required>
						<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" required>
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
<?php foreach ($dosen as $row) : ?>
	<div class="modal fade" id="editDsn<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Edit Data <?= $row->nama; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('dosen/editdsn'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" class="form-control mb-2" id="id" name="id" placeholder="id" value="<?= $row->id; ?>">
							<input type="number" class="form-control mb-2" id="nip" name="nip" placeholder="NIP" value="<?= $row->nip; ?>">
							<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $row->nama; ?>">
							<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" value="<?= $row->email; ?>">
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
<?php foreach ($dosen as $row) : ?>
	<div class="modal fade" id="deleteDsn<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
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
					<a class="btn btn-primary" href="<?= base_url('dosen/deletedsn'); ?>/<?= $row->id; ?>">Delete</a>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>
