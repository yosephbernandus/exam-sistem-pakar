<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Solui & Pertanyaan Kinerja Motherboard, Processor, RAM</h3>
		</div>

		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			<form role="search" action="" method="POST">
				<div class="input-group">
				
					<input type="text" name="cari" class="form-control" placeholder="Search Name">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</form>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>List Pertanyaan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
				<a href="<?php echo site_url('sata/tambah_pertanyaan');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
					<div class="table-responsive">
					<?php echo $message_pertanyaan;?>
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">
										ID
									</th>
									<th class="column-title">
										Pertanyaan
									</th>
									<th class="column-title">
										Bila Benar
									</th>
									<th class="column-title">
										Bila Salah
									</th>
									<th class="column-title no-link last"><span class="nobr">Action</span>
                            		</th>
								</tr>
							</thead>
							<?php if (empty($view_all)) { ?>
								<tr>
									<td colspan="10">Data is empty</td>
								</tr>
							<?php
							} else {
								$no=1; foreach($view_pertanyaan as $row) {
							?>
							<tbody>
								<tr class="even pointer">
									<td><?php echo $row->id_pertanyaan?></td>
									<td><?php echo $row->pertanyaan;?></td>
									<td><?php echo $row->bila_benar;?></td>
									<td><?php echo $row->bila_salah;?></td>
									<td><a href="<?php echo site_url('sata/edit/'.$row->id_pertanyaan);?>"><i class="glyphicon glyphicon-edit"></i></a>
										|
										<a href="#" class="hapus_pertanyaan" kode="<?php echo $row->id_pertanyaan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
									</td>
								</tr>
							</tbody>
							<?php
								}
							}
							?>
						</table>
						<div class="panel-footer" style="height:40px;">
							<!-- <?php echo $pagination;?> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>List Solusi</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
				<a href="<?php echo site_url('sata/tambah_solusi');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
					<div class="table-responsive">
					<?php echo $message_solusi;?>
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">
										ID
									</th>
									<th class="column-title">
										Solusi
									</th>
									<th class="column-title no-link last"><span class="nobr">Action</span>
                            		</th>
								</tr>
							</thead>
							<?php if (empty($view_solusi)) { ?>
								<tr>
									<td colspan="10">Data is empty</td>
								</tr>
							<?php
							} else {
								$no=1; foreach($view_solusi as $row) {
							?>
							<tbody>
								<tr class="even pointer">
									<td><?php echo $row->id_pertanyaan;?></td>
									<td><?php echo $row->pertanyaan;?></td>
									<td><a href="<?php echo site_url('sata/edit_solusi/'.$row->id_pertanyaan);?>"><i class="glyphicon glyphicon-edit"></i></a>
									| 
									<a href="#" class="hapus_solusi" kode="<?php echo $row->id_pertanyaan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
								</tr>
							</tbody>
							<?php
								}
							}
							?>
						</table>
						<div class="panel-footer" style="height:40px;">
							<!-- <?php echo $pagination;?> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$(".hapus_pertanyaan").click(function(){
			var kode=$(this).attr("kode");

			$("#idhapus").val(kode);
			$("#myModal").modal("show");
		});

		$("#konfirmasi").click(function(){
			var kode=$("#idhapus").val();

			$.ajax({
				url:"<?php echo site_url('sata/hapus');?>",
				type:"POST",
				data:"kode="+kode,
				cache:false,
				success:function(html){
					location.href="<?php echo site_url('sata/index/delete_success_pertanyaan');?>";
				}
			});
		});

		$(".hapus_solusi").click(function(){
			var kode=$(this).attr("kode");

			$("#idhapus").val(kode);
			$("#myModal").modal("show");
		});

		$("#konfirmasi").click(function(){
			var kode=$("#idhapus").val();

			$.ajax({
				url:"<?php echo site_url('sata/hapus');?>",
				type:"POST",
				data:"kode="+kode,
				cache:false,
				success:function(html){
					location.href="<?php echo site_url('sata/index/delete_success_solusi');?>";
				}
			});
		});
	});
</script>
