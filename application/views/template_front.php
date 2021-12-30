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
  <link rel="icon" href="<?php echo base_url('');?>">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/materialize/css/materialize.css');?>" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/materialize/css/style.css');?>" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-4.7.0/css/font-awesome.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/materialize/css/sweetalert2.min.css');?>">
</head>
<body>

	<?php echo $_header;?>

	<?php echo $_content;?>

	<?php echo $_footer;?>

  <script src="<?php echo base_url('assets/main.js');?>"></script>
  <script src="<?php echo base_url('assets/sw.js');?>"></script>
  
	<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/sweetalert2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/jquery-2.2.2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/materialize/js/init.js');?>"></script>
  
	<script type="text/javascript">
	$(function(){
		$('select').material_select();
    $(".dropdown-button").dropdown();

		// var num = 800;

		// $(window).bind('scroll', function(){
		// 	if ($(window).scrollTop() > num) {
		// 		$('.reservasi-fixed').addClass('fixed');
		// 	} else {
		// 		$('.reservasi-fixed').removeClass('fixed');
		// 	}
		// });

		$('.datepicker').pickadate({
    		selectMonths: true, // Creates a dropdown to control month
    		selectYears: 15, // Creates a dropdown of 15 years to control year
    		formatSubmit : 'yyyy-mm-dd',
    		hiddenName : true
  		});
  		// var arrive = $('.arrive').val();
  		// var deprature = $('.deprature').val();

  		// var $arrive = $('.arrive').pickadate();
  		// var picker = $arrive.pickadate('picker');
  		// picker.set('min', arrive);

  		// var $deprature = $('.deprature').pickadate();
  		// var picker = $deprature.pickadate('picker');
  		// picker.set('min', deprature);

      $('body').on('submit', 'form[name="form-bukutamu"]',function(e){
        var tanggal_contact = $('input[name="tanggal_contact"]').val();
        var nama_contact = $('input[name="nama_contact"]').val();
        var email_contact = $('input[name="email_contact"]').val();
        var telp_contact = $('input[name="telp_contact"]').val();
        var alamat = $('textarea[name="alamat"]').val();
        var pesan = $('textarea[name="pesan"]').val();

        if (nama_contact == "") {
          swal(
            'Warning',
            'Name field required',
            'warning'
          );
          e.preventDefault();
        } else if (email_contact == "") {
          swal(
            'Warning',
            'Email field required',
            'warning'
          );
          e.preventDefault();
        } else if (telp_contact == "") {
          swal(
            'Warning',
            'Phone field required',
            'warning'
          );
          e.preventDefault();
        } else if (pesan == "") {
          swal(
            'Warning',
            'Message field required',
            'warning'
          );
          e.preventDefault();
        } else {
          e.preventDefault();
          swal({
            title : 'Are You Sure?',
            text : "Are you sure to send this ?",
            type : 'warning',
            showCancelButton : true,
            confirmButtonColor : '#3085d6',
            cancelButtonColor : '#d33',
            confirmButtonText : 'Yes, send it!',
            showLoaderOnConfirm: true,
            preConfirm: function(){
              return new Promise(function (){
                setTimeout(function(){
                  $.ajax({
                    url:"<?php echo site_url('home/contact_success');?>",
                    type:"POST",
                    data:"tanggal="+tanggal_contact+"&nama="+nama_contact+"&email="+email_contact+"&telp="+telp_contact+"&alamat="+alamat+"&pesan="+pesan,
                    cache:false,
                    success:function(html){
                      swal({
                        title: "Success",
                        text: "Your message has been send!",
                        type: "success"
                      }).then(function(){
                        location.reload();
                      })
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                      swal({
                        title: "Error",
                        text: "Cek Your connection",
                        type: "error"
                      }).then(function(){
                        location.reload();
                      })
                    }
                  })
                }, 2000)
              })
            }, allowOutsideClick: false
          })
        }
      })

  		$('body').on('submit', 'form[name="diagnosis"]',function(e){

  			var pertanyaan = $('input[name="group1"]').val();

  			if (pertanyaan == "") {
  				swal(
  					'Warning',
  					'Pilih pertanyaan lebih dahulu!!',
  					'warning'
  				);
  				e.preventDefault();
  			}
  		})


  		$('body').on('submit', 'form[name="reservasi-form"]',function(e){

  			var nama = $('input[name="nama"]').val();
  			var email = $('input[name="email"]').val();
  			var telp = $('input[name="telp"]').val();
  			var tanggal = $('input[name="tanggal"]').val();
  			var id_reservasi = $('input[name="id_reservasi"]').val();
  			var province = $('input[name="province"]').val();
  			var country = $('input[name="country"]').val();
  			var company = $('input[name="company"]').val();
  			
  			if (nama == "") {
  				swal(
  					'Warning',
  					'Name field required',
  					'warning'
  				);
  				e.preventDefault();
  			} else if (email == "") {
  				swal(
  					'Warning',
  					'Email field required',
  					'warning'
  				);
  				e.preventDefault();
  			} else if(telp == ""){
  				swal(
  					'Warning',
  					'Telp field required',
  					'warning'
  				);
  				e.preventDefault();
  			} else {
  				e.preventDefault();
  				swal({
  					title: 'Are You Sure ?',
  					text : "Are you sure to save this reservation?",
  					type : 'warning',
  					showCancelButton : true,
  					confirmButtonColor : '#3085d6',
  					cancelButtonColor : '#d33',
  					confirmButtonText : 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function(){
              return new Promise(function(){
                setTimeout(function(){
                  $.ajax({
                    url:"<?php echo site_url('home/reservasi_success');?>",
                    type:"POST",
                    data:"nama="+nama+"&email="+email+"&telp="+telp+"&tanggal="+tanggal+"&id_reservasi="+id_reservasi+"&province="+province+"&country="+country+"&company="+company,
                    cache:false,
                    success:function(html){
                      swal({
                        title: "Success",
                        text: "Your Reservation Success has been saved!",
                        type:"success"
                      }).then(function(){
                        location.reload();
                      });
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                      swal({
                        title: "Error",
                        text: "Cek Your Connection",
                        type: "error"
                      }).then(function(){
                        location.reload();
                      })
                    }
                  })
                }, 2000)
              })
            }, allowOutsideClick: false
  				})
  			}
  		})

		$('body').on('click', '.delete',function(e){
			e.preventDefault();
			var key = $(this).attr("key-sess");
			swal({
				title : 'Are you sure?',
				text : "Are you sure to delete this room from reservation?",
				type : 'warning',
				showCancelButton : true,
				confirmButtonColor : '#3085d6',
				cancelButtonColor : '#d33',
				confirmButtonText : 'Yes, delete it!'
			}).then(function() {
				
				$.ajax({
					url:"<?php echo site_url('home/reservasi_remove');?>",
					type:"POST",
					data:"key="+key,
					cache:false,
					success:function(html){
						swal({
							title : "Deleted",
							text : "Your Reservation Has Been Deleted!",
							type : "success"	
						}).then(function(){
							location.reload();
						});
					}, 
					error : function(xhr, ajaxOptions, thrownError){
						swal({
							title : "Error",
							text : "Cek Your Connection",
							type : "error"	
						}).then(function(){
							location.reload();
						});
					}
				})
			})
			// var key = $(this).attr("key-sess");

			// $.ajax({
			// 	url:"<?php echo site_url('home/reservasi_remove');?>",
			// 	type:"POST",
			// 	data:"key="+key,
			// 	cache:false,
			// 	success:function(html){
			// 		alert("Delete Success");
			// 		location.reload();
			// 	}
			// })
		})

	});
</script>
</body>
</html>