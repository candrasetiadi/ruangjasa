<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><style type="text/css">
	.form-control {
		/*background: white;*/
	}

	.fh5co-cover .overlay {
		height: 150px;
	}

	.fh5co-cover.fh5co-cover-sm {
	    height: 150px;
	}

</style>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Contact Us</h1>
							<h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</header>

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h3>Buat Profil Usaha Baru</h3>
					<form action="#">
						<!-- <div class="row form-group">
							<div class="col-md-6">
								<input type="text" id="fname" class="form-control" placeholder="Your firstname">
							</div>
							<div class="col-md-6">
								<input type="text" id="lname" class="form-control" placeholder="Your lastname">
							</div>
						</div> -->

						<div class="row form-group">
							<div class="col-md-12">
								<label for="business_name">Nama Usaha</label>
								<input type="text" id="business_name" name="business_name" class="form-control" placeholder="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="category">Kategori Jasa</label>
								<select id="category" name="category" class="form-control" placeholder="">
									<option value=""> </option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subcategory">Sub Kategori Jasa</label>
								<select id="subcategory" name="subcategory" class="form-control" placeholder="">
									<option value=""> </option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="description">Deskripsi Usaha</label>
								<textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Jelaskan terhadap cutomer tentang usaha anda"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Lets Get Started</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p><a href="#" class="btn btn-default btn-lg">Create A Free Course</a></p>
				</div>
			</div>
		</div>
	</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>