<!-- <div class="menu_section">
	<h3>Menu</h3>

	<?php
		$main_menu = $this->db->get_where('masalah', array('is_main_menu' => 0));
		foreach ($main_menu->result() as $main):?>
			<?php $sub_menu = $this->db->get_where('masalah', array('is_main_menu' => $main->id_masalah));?>
			<?php if ($sub_menu->num_rows()>0):?>
				<ul class="nav side-menu">
					<li><a href="<?php echo $main->link;?>"><i class="fa fa-home"></i> <?php echo $main->judul_menu;?><span class="fa fa-chevron-down"></span></a>
					
					<ul class="nav child_menu">
						<?php foreach ($sub_menu->result() as $sub):?>
    						<li><a href="<?php echo $sub->link_back;?>"><?php echo $sub->judul_menu;?></a></li>
    					<?php endforeach;?>
  					</ul>
				</ul>
			<?php else:?>
			<ul class="nav side-menu">
				<li><a href="<?php $main->link;?>"><i class="fa fa-home"></i> <?php echo $main->judul_menu;?></a>
			</ul>
			<?php endif;?>
		<?php endforeach;?>
</div>

</div> -->
<div class="menu_section">
	<h3>Menu</h3>
	<ul class="nav side-menu">
		<li><a><i class="fa fa-home"></i> Konsultasi <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
				<li><a href="<?php echo site_url('powersupply');?>">Powersupply</a></li>
				<li><a href="<?php echo site_url('kerusakan_vga');?>">Kerusakan VGA</a></li>
				<li><a href="<?php echo site_url('kinerja_vga');?>">Kinerja VGA</a></li>
				<li><a href="<?php echo site_url('kerusakan_mb');?>">Kerusakan Motherboard,RAM,Processor</a></li>
				<li><a href="<?php echo site_url('kinerja_mb');?>">Kinerja Motherboard,RAM,Processor</a></li>
				<li><a href="<?php echo site_url('sata');?>">Kerusakan ATA/SATA</a></li>
				<li><a href="<?php echo site_url('booting');?>">Kerusakan Booting</a></li>
			</ul>
		</li>
		<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
				<li><a href="">General Form</a></li>
				<li><a href="">Advanced Components</a></li>
				<li><a href="">Form Validations</a></li>
				<li><a href="">Form Wizard</a></li>
				<li><a href="">Form Upload</a></li>
				<li><a href="">Form Buttons</a></li>
			</ul>
		</li>
		<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
				<li><a href="">General Elements</a></li>
				<li><a href="">Media Gallery</a></li>
				<li><a href="">Typography</a></li>
				<li><a href="">Icons</a></li>
				<li><a href="">Glyphicons</a></li>
				<li><a href="">Widgets</a></li>
				<li><a href="">Invoice</a></li>
				<li><a href="">Inbox</a></li>
				<li><a href="">Calendar</a></li>
			</ul>
		</li>
		<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
	</ul>
</div>

</div>

<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placemenet="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placemenet="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placemenet="top" title="Locak">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placemenet="top" title="Logout">
		<span class="glyphicon glyphicon-off"></span>
	</a>
</div>

</div>
</div>

<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?php $username = $this->session->userdata('username');
						echo $username;?>
						<span class="fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu pull-right">
						<li><a href="<?php echo site_url('dashboard/change_password/'.$username);?>">Change Password</a></li>
						<li><a href="<?php echo site_url('dashboard/logout');?>"><i class="fa fa-sign-out pull-right"></i> Logout</a></li>
					</ul>
				</li>

				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">1</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="<?php echo base_url('assets/img/administrator.png');?>" alt="Profile Image"></span>
								<span>
									<span>Test</span>
									<span class="time"> 3 mins ago</span>
								</span>
								<span class="message">
									Testing Testing Testing Testing.
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong>Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>