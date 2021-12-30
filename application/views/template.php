<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta name="description" content="Sistem Pakar">
	<meta name="keywords" content="Sistem Pakar">
	<meta name="author" content="Yoseph Bernandus">
	<meta http-equiv="refresh" content="3200">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nprogress/nprogress.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/build/custom.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap-daterangepicker/daterangepicker.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/dropzone/css/dropzone.min.css');?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery/jquery.min.js');?>"></script>
	<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/dropzone/js/dropzone.min.js');?>"></script>
</head>
<body class="nav-md">
	<!-- header -->
	<?php echo $_header;?>
	<br/>
	
	<!-- sidebar -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<?php echo $_sidebar;?>
	</div>
	<!-- sidebar -->

	<!-- Content -->
	<div class="right_col" role="main">
		<?php echo $_content;?>
	</div>	
	<!-- content -->

	<footer>
		<div class="pull-right">
			Created By Yoseph Bernandus<a href=""></a>
		</div>
		<div class="clearfix"></div>
	</footer>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Confirmation</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idhapus" id="idhapus"></input>
					<p>Are You Sure To Delete This?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="konfirmasi">Yes</button>
				</div>
			</div>
		</div>
	</div>

	
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/fastclick/fastclick.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/nprogress/nprogress.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/build/custom.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/moment/moment.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
	
	<script type="text/javascript">
	$(function() {
        $('.date').daterangepicker({
          singleDatePicker: true,
          locale: {
      		format: 'YYYY/MM/DD'
    	  },
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
    });
	</script>
	<script type="text/javascript">
		tinymce.init({
    	selector: 'textarea.custom',
    	theme: 'modern',
    	width: 600,
    	height: 300,
    	plugins: [
      	'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      	'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      	'save table contextmenu directionality emoticons template paste textcolor'
    	],
    	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  		});
	</script>
</body>
</html>