<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/build/custom.min.css');?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script>
</head>
<body class="login">
<div>
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>

	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<form action="<?php echo site_url('login/proses');?>" method="post">
					<h1>Login</h1>
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('message');?>
						</div>

					<?php } ?>
					<div>
						<input type="text" name="username" class="form-control" placeholder="username" required="required">
					</div>
					<div>
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div>
					<div>
						<?php echo $widget;?>
						<?php echo $script;?>
					</div><br>
					<div>
						<button type="submit" class="btn btn-default submit">Log In</button>
						<a class="reset_pass" href="#"></a>
					</div>

					<div class="clearfix">
						<div class="separator">
							<p class="change_link">Sistem Pakar Login</p>
							<div class="clearfix"></div>
							<br/>
							<div>
								<h1><i class="fa fa-desktop"> Sistem Pakar</i></h1>
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>
</body>
</html>