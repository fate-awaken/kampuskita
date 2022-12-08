<div id="wrapper">
	<!-- Sidebar -->
	<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #395144;" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
			<div class="sidebar-brand-icon">
				<i class="fas fa-fw fa-book"></i>
			</div>
			<div class="sidebar-brand-text mx-3">KampusKita</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>User</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="table-secondary py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?= base_url('home')?>">Mahasiswa</a>
					<a class="collapse-item" href="<?= base_url('dosen')?>">Dosen</a>
				</div>
			</div>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="#">
				<span>Log Out</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">


		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->
