<body class="bg-primary">
	<br>
	<div class="container-fluid">
		<div class="row justify-content-start">
			<div class="col-4">
				<button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
					</svg>
				</button>

				<div class="offcanvas offcanvas-start text-primary fs-5" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
					<div class="offcanvas-header">
						<img src="<?= base_url('assets/icon/banner-primary.png') ?>" width="250px" alt="">
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="<?php base_url('application/views/view-home') ?>">Mahasiswa</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Dosen</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-4">
				<img src="<?= base_url('assets/icon/banner-white.png') ?>" width="350px" alt="">
			</div>
		</div>
	</div>
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
					</table>
				</div>
				<a href="<?= ('home/tambah') ?>" class="btn btn-outline-primary" align="center">Tambah Mahasiswa</a>
			</div>
		</div>

	</div>
