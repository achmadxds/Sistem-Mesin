<?php
	if($this->session->userdata('level') == null) {
		redirect('action/Login');	
	}
?>

<div id="sidebar shadow" class="active" >
	<div class="sidebar-wrapper shadow" style="background-color: #769ECB;">
		<div class="sidebar-header">
			<div class="d-flex justify-content-between">
				<div class="logo">
					<a href="<?php echo site_url('dashboard') ?>">
						<h5 class="text-light">Sistem PKL Mesin</h5>
					</a>
				</div>
			</div>
			<hr class="text-white">
			<h3 class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ahjsdbv" id="infoplace"><b>Selamat Datang Di Sistem Mesin</b></h3>
		</div>

		<div class="sidebar-menu">
			<ul class="menu">
				<li class="sidebar-title text-white" >Menu</li>

				<li class="sidebar-item has-sub">
					<?php
						$level = $this->session->userdata('level');
 
						switch ($level) {
							case 'ADMIN':
								?>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/User/Leveluser') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Level User</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/User') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Pengguna</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Perawatan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Perawatan</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Keluhan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Keluhan</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Mesin') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Mesin</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Peralatan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Peralatan</span>
										</a>
									</li>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Laporan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Laporan</span>
										</a>
									</li>
								<?php
							break;

							case 'TEKNISI':
								?>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Perawatan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Perawatan</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="<?php echo site_url('action/Keluhan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="fas fa-list text-dark"></i>
											<span>Manajemen Keluhan</span>
										</a>
									</li>
								<?php
							break;

							case 'OPERATOR':
								?>
									<li class="sidebar-item ">
										<a href="<?php echo site_url('action/Keluhan') ?>" class='sidebar-link text-dark bg-light'>
										<i class="bi bi-clock-fill text-dark"></i>
											<span>Manajemen Keluhan</span>
										</a>
									</li>
								<?php
							break;
						}
					?>
				</li>

				<li class="sidebar-item">
					<a href="<?php echo site_url('action/Login/logout') ?>" class='sidebar-link text-light bg-danger'>
						<i class="bi bi-box-arrow-right text-light"></i>
						<span>Logout</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
</div>