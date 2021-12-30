<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s12 m8">
				<div class="wrapper">
				<?php
					if ($pertanyaan['keterangan'] == "pertanyaan"):?>
						<h4>Diagnosa <?php echo $judul;?></h4>
						<form name="diagnosis" action="" method="POST">
							<div class="card">
								<div class="card-content">
									<p><?php echo $pertanyaan['pertanyaan'];?></p>
								</div>
								<div class="card-action">
									<p>
      									<input name="group1" value="<?php echo $pertanyaan['bila_benar'];?>" type="radio" id="test1" />
      									<label for="test1">Yes</label>
    								</p>
    								<p>
      									<input name="group1" value="<?php echo $pertanyaan['bila_salah'];?>" type="radio" id="test2" />
      									<label for="test2">No</label>
    								</p>
								</div>
								<div class="card-action">
									<button type="submit" class="btn waves-effect waves-light">Submit</button>
								</div>
							</div>
						</form>
					<?php else:?>
						<h4>Hasil Diagnosis</h4>
						<div class="card">
							<div class="card-content">
								<p><?php echo $pertanyaan['pertanyaan'];?></p>
							</div>
							<div class="card-action">
								<p><a href="<?php echo site_url('home');?>" class="waves-effect waves-light btn">back</a></p>
							</div>
						</div>
						<br/>
						<br/>
						<br/>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>