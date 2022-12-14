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

				<?= $this->session->flashdata('message'); ?>
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>

				<!-- <div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead class="table-secondary">
							<tr>
								<th>NO</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Jurusan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
						$count = 0;
						foreach ($queryAllMhs as $row) {
							$count = $count + 1;
						?>
							<tbody>
								<tr>
									<td><?php echo $count ?></td>
									<td><?php echo $row->nim ?></td>
									<td><?php echo $row->nama ?></td>
									<td><?php echo $row->email ?></td>
									<td><?php echo $row->jurusan ?></td>
									<td class="">
										<a href="<?php echo site_url('home/edit') ?>/<?php echo $row->nim ?>" class="btn btn-outline-primary btn-user">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
												<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
											</svg>
										</a>
										<a href="<?php echo site_url('home/deletemhs') ?>/<?php echo $row->nim ?>" class="btn btn-outline-danger btn-user">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
												<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
											</svg>
										</a>
									</td>
								</tr>
							</tbody>
						<?php } ?>
					</table> -->

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
									<a class="badge badge-danger" href="<?php echo site_url('home/deletemhs') ?>/<?php echo $row->id ?>"><i class="fas fa-fw fa-trash" href=""></i></a>
								</td>

							</tr>
							<?php endforeach; ?>
							<?php $i++; ?>
				</table>

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
				<form action="<?= base_url('home/tambahmhs'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control mb-2" id="nim" name="nim" placeholder="NIM">
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
					<form action="<?= base_url('home/editmhs'); ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<input type="hidden" class="form-control mb-2" id="id" name="id" placeholder="id" value="<?= $row->id; ?>">
								<input type="text" class="form-control mb-2" id="nim" name="nim" placeholder="NIM" value="<?= $row->nim; ?>">
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
					<a class="btn btn-danger" href="<?= base_url('home/deletemhs'); ?>/<?= $row->id; ?>">Delete</a>
				</div>
			</div>
		</div>
	</div>
