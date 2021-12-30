<!-- <nav class="white" role="navigation">
	<div class="nav-wrapper container">
		<a id="logo-container" href="#" class="brand-logo">Sistem Pakar</a>
		<?php
		$main_menu = $this->db->get_where('masalah', array('is_main_menu' => 0));
		foreach ($main_menu->result() as $main):?>
			<?php $sub_menu = $this->db->get_where('masalah', array('is_main_menu' => $main->id_masalah));?>
			<?php if ($sub_menu->num_rows()>0):?>
				<ul class="right hide-on-med-and-down">
					<a class='dropdown-button' href='<?php $main->link;?>' data-activates='dropdown1'><?php echo $main->judul_menu;?></a>
					<ul id='dropdown1' class='dropdown-content'>
						<?php foreach ($sub_menu->result() as $sub):?>
    						<li><a href="<?php echo $sub->link;?>"><?php echo $sub->judul_menu;?></a></li>
    					<?php endforeach;?>
  					</ul>
				</ul>
			<?php else:?>
			<ul class="right hide-on-med-and-down">
				<li><a href="<?php echo $main->link;?>"><?php echo $main->judul_menu;?></a></li>
			</ul>
			<?php endif;?>
		<?php endforeach;?>


		<ul id="nav-mobile" class="side-nav">
		<?php
		$main_menu = $this->db->get_where('masalah', array('is_main_menu' => 0));
		foreach ($main_menu->result() as $main):?>
			<?php $sub_menu = $this->db->get_where('masalah', array('is_main_menu' => $main->id_masalah));?>
			<?php if ($sub_menu->num_rows()>0):?>

					<a class='dropdown-button' href='<?php $main->link;?>' data-activates='dropdown2'><?php echo $main->judul_menu;?></a>
					<ul id='dropdown2' class='dropdown-content'>
						<?php foreach ($sub_menu->result() as $sub):?>
    						<li><a href="<?php echo $sub->link;?>"><?php echo $sub->judul_menu;?></a></li>
    					<?php endforeach;?>
  					</ul>
			<?php else:?>
				<li><a href="<?php echo $main->link;?>"><?php echo $main->judul_menu;?></a></li>
			<?php endif;?>
		<?php endforeach;?>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav>
 -->
 <nav class="white" role="navigation">
	<div class="nav-wrapper container">
		<a id="logo-container" href="#" class="brand-logo">Sistem Pakar</a>
		<ul class="right hide-on-med-and-down">
			<li><a href="<?php echo site_url('home');?>">Home</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Konsultasi<i class="material-icons right">arrow_drop_down</i></a></li>
			<ul id="dropdown1" class="dropdown-content">
  				<li><a href="<?php echo site_url('home/powersupply');?>">Powersupply</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/vga');?>">Kerusakan VGA</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/booting');?>">Masalah Booting</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/ata_sata');?>">Kerusakan Drive ATA/SATA</a></li>
				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/kerusakan_motherboard');?>">Kerusakan Motherboard(dll)</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/kerusakan_motherboard');?>">Kinerja Motherboard(dll)</a></li>
			</ul>
		</ul>



		<ul id="nav-mobile" class="side-nav">
			<li><a href="<?php echo site_url('home');?>">Home</a></li>
			<li><a class="dropdown-button" href="#!" data-activates="dropdown2">Konsultasi<i class="material-icons right">arrow_drop_down</i></a></li>
			<ul id="dropdown2" class="dropdown-content">
  				<li><a href="<?php echo site_url('home/powersupply');?>">Powersupply</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/vga');?>">Kerusakan VGA</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/booting');?>">Masalah Booting</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/ata_sata');?>">Kerusakan Drive ATA/SATA</a></li>
				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/kerusakan_motherboard');?>">Kerusakan Motherboard(dll)</a></li>
  				<li class="divider"></li>
  				<li><a href="<?php echo base_url('home/kerusakan_motherboard');?>">Kinerja Motherboard(dll)</a></li>
			</ul>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav>
	
</div>