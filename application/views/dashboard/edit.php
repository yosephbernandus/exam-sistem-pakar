<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Password</h3>
		</div>
	</div>



	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $title;?></h2>
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
					<?php echo validation_errors();?>
					<?php echo $message;?>
					<br/>
					<form data-parsley-validate class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="hidden" name="id" value="<?php echo $petugas['id_admin'];?>" class="form-control">
								<input type="text" name="user" class="form-control col-md-7 col-xs-12" value="<?php echo $petugas['user'];?>" required="required" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $petugas['user'];?>" required="required">
							</div>
						</div>

						<div class="form-group">
                        	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          		<a href="<?php echo site_url('dashboard');?>" class="btn btn-primary">Cancel</a>
                          		<button type="submit" class="btn btn-success">Submit</button>
                        	</div>
                      	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>