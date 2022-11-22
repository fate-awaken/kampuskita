<body>
	<br>
	<h1 align="center">Selamat datang di Website KampusKita</h1>
	<br>
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h3 class="m-0 font-weight-bold text-primary" align="center">Data Mahasiswa</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
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
									<td><a href="<?php echo site_url('home/edit') ?>/<?php echo $row->nim ?>" class="btn btn-warning btn-user">Edit</a> <a href="<?php echo site_url('home/deletemhs') ?>/<?php echo $row->nim ?>" class="btn btn-danger btn-user">Delete</a></td>
								</tr>
							</tbody>
						<?php } ?>
					</table>
				</div>
				<a href="<?= ('home/tambah') ?>" class="btn btn-secondary" align="center">Tambah Mahasiswa</a>
			</div>
		</div>

	</div>
