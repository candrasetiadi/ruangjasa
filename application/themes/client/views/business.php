<style type="text/css">
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
									{foreach $category k val}
										<option value="{$val->services_category_id}"> {$val->services_category_name} </option>
									{/foreach}
								</select>
							</div>
						</div>

						<!-- <div class="row form-group">
							<div class="col-md-12">
								<label for="subcategory">Sub Kategori Jasa</label>
								<select id="subcategory" name="subcategory" class="form-control" placeholder="">
									<option value=""> </option>
								</select>
							</div>
						</div> -->

						<div class="row form-group">
							<div class="col-md-12">
								<label for="description">Deskripsi Usaha</label>
								<textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Jelaskan terhadap cutomer tentang usaha anda, misalnya Keunggulan jasa anda, Cara Kerja anda, Metode pembayaran"></textarea>
							</div>
						</div>

						<hr>
						<h3>Services & Portfolio</h3>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="service_name">Judul Jasa</label>
								<input type="text" id="service_name" name="service_name" class="form-control" placeholder="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="service_description">Deskripsi Jasa</label>
								<textarea name="service_description" id="service_description" cols="30" rows="10" class="form-control" placeholder="Jelaskan ditel pekerjaan yang anda lakukan"></textarea>
							</div>
						</div>

						<hr>
						<h3>Informasi Kontak</h3>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="user_email">Email</label>
								<input type="email" id="user_email" name="user_email" class="form-control" placeholder="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="user_phone">No. Telepon</label>
								<input type="text" id="user_phone" name="user_phone" class="form-control" placeholder="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="user_fax">Fax</label>
								<input type="text" id="user_fax" name="user_fax" class="form-control" placeholder="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="user_address">Alamat Lengkap</label>
								<textarea name="user_address" id="user_address" cols="30" rows="10" class="form-control" placeholder="Jelaskan ditel pekerjaan yang anda lakukan"></textarea>
							</div>
						</div>

						<hr>
						<h3>Jangkauan Layanan</h3>
						<p>Pilih lokasi di mana Anda beroperasi. Semakin spesifik lokasi Anda, semakin tepat customer yang Anda dapatkan.</p>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="business_province">Provinsi</label>
								<select id="business_province" name="business_province" class="form-control" placeholder="">
									<option value=""> </option>
									{foreach $province k val}
										<option value="{$val->id}"> {$val->name} </option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="business_city">Kota / Kabupaten</label>
								<select id="business_city" name="business_city" class="form-control" placeholder="">
									<option value=""> </option>
									<!-- {foreach $category k val}
										<option value="{$val->services_category_id}"> {$val->services_category_name} </option>
									{/foreach} -->
								</select>
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
	<!-- <div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
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
	</div> -->

	<script src="{base_url()}assets/js/jquery.js"></script>
	<script type="text/javascript">
        
        $(document).ready(function(){
            
        });

        $(document).on('change', '#business_province', function(){
			var user_province = $(this).val();

			$.postAjax(base_url + "business/get_city", {
				user_province:user_province
			},
				function(result){
					$.each(result.data, function(idx, val){
						$("#user_citybusiness_city").append($("<option></option>")
				            .attr("value", val.id)
				            .text(val.name)
				        );
				        $("#business_city").trigger("chosen:updated");
					});
				}
			);

		});


    </script>
