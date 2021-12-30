<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0">
					<a href="index.html" class="site_title"><i class="fa fa-bed"></i> <span> Sistem Pakar</span></a>
				</div>

				<div class="clearfix"></div>

				<!-- Menu Profil -->
				<div class="profile">
					<div class="profile_pic">
						<img src="<?php echo base_url('assets/img/administrator.png');?>" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2><?php echo $this->session->userdata('username');?></h2>
					</div>
				</div>