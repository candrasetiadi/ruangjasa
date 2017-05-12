<style type="text/css">
	.form-control {
		background: white;
	}

	.img-howto {
		border-radius: 50%;
		display: block;
	    margin-left: auto;
	    margin-right: auto ;
	}

	.top-category {
		display: block;
		background-size: 100%;
	    max-width: 100%;
	    height: 300px;
	}

	.search_box {
		margin-left: 0;
	    width: 100%;
	}

</style>
<!-- Breadcrumb End -->

<link rel="stylesheet" href="{base_url()}assets/client/css/custom.css">

	<!-- Page Start -->
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url('{base_url()}assets/client/images/jasa/headline.jpg');background-size:cover;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2 text-center search_box">
					
					<div class="display-t">

						<div class="display-tc animate-box" data-animate-effect="fadeIn">
						 <h1>Segala Kebutuhan Anda, Kami Ada..</h1>
							<!-- <h1>The Art of Teaching is the Art of Assisting Discovery</h1>
							<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
							<p><a class="btn btn-primary btn-lg btn-learn" href="#">Take A Course</a> <a class="btn btn-primary btn-lg popup-vimeo btn-video" href="https://vimeo.com/channels/staffpicks/93951774"><i class="icon-play"></i> Watch Video</a></p> -->
							<form action="#">
								<div class="row form-group">
									<div class="col-md-4">
										<!-- <label for="fname">First Name</label> -->
										<!-- <input type="text" id="fname" class="form-control" placeholder="Layanan apa yang anda butuhkan"> -->
										<select id="services_id" name="services_id" class="form-control" placeholder="Layanan apa yang anda butuhkan">
											<option value=""> </option>
											{foreach $services k val}
												<option value="{$val->services_id}"> {$val->services_name} </option>
											{/foreach}
										</select>
									</div>
									<div class="col-md-4">
										<!-- <label for="lname">Last Name</label> -->
										<input type="text" id="lname" class="form-control" placeholder="Dimana?">
									</div>
									<div class="col-md-4">
										<input type="submit" value="Cari" class="btn btn-primary">
									</div>
								</div>

							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- <div id="fh5co-counter" class="fh5co-counters">
		<div class="container">
			<div class="row">
				<div class="col-md-3 text-center animate-box">
					<span class="fh5co-counter js-counter" data-from="0" data-to="40356" data-speed="5000" data-refresh-interval="50"></span>
					<span class="fh5co-counter-label">Students</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="fh5co-counter js-counter" data-from="0" data-to="30290" data-speed="5000" data-refresh-interval="50"></span>
					<span class="fh5co-counter-label">Courses</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="fh5co-counter js-counter" data-from="0" data-to="2039" data-speed="5000" data-refresh-interval="50"></span>
					<span class="fh5co-counter-label">Instructor</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="fh5co-counter js-counter" data-from="0" data-to="997585" data-speed="5000" data-refresh-interval="50"></span>
					<span class="fh5co-counter-label">Earnings</span>
				</div>
			</div>
		</div>
	</div> -->

		<div id="fh5co-project">
		<!--<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h1 style="">TOP CATEGORY</h1>
				</div>
			</div>
		</div>-->
		<div class="container-fluid proj-bottom">
			<div class="row">
				<h1 style="text-align:center;">TOP CATEGORY</h1>
				<div class="col-md-2 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#">
						<img src="{base_url()}assets/client/images/jasa/serviceac.jpg" style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));background-size:cover;"   alt="" class="img-responsive top-category">
						<h3>Service AC</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
				<div class="col-md-2  col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="{base_url()}assets/client/images/jasa/kontraktor.jpg" alt="" class="img-responsive top-category">
						<h3>Kontraktor Bangunan</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
				<div class="col-md-2  col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="{base_url()}assets/client/images/jasa/interior.jpg" alt="" class="img-responsive top-category">
						<h3>Interior Design</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
				<div class="col-md-2  col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="{base_url()}assets/client/images/jasa/tukang.jpg" alt="" class="img-responsive top-category">
						<h3>Jasa Pertukangan</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
				<div class="col-md-2  col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="{base_url()}assets/client/images/jasa/perkakas.jpg" alt="" class="img-responsive top-category">
						<h3>Service Perkakas</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
				<div class="col-md-2 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="#"><img src="{base_url()}assets/client/images/jasa/pindahan.jpg" alt="" class="img-responsive top-category">
						<h3>Jasa Pindahan</h3>
						<span>Pesan Sekarang</span>
					</a>
				</div>
			</div>
		</div>
		<?php /*
		<div class="container">
			<div class="row">
				<div class="features">
					<div class="col-md-4 animate-box">
						<h4>We have coolest features of this course</h4>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
					</div>
					<div class="col-md-4 animate-box">
						<h4>Great teachers that we have</h4>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
					</div>
					<div class="col-md-4 animate-box">
						<h4>Steps by steps turorial session</h4>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
					</div>
				</div>
				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-lg btn-learn" href="#">Create A Free Course</a></p>
				</div>
			</div>
		</div>
		*/ ?>
	</div>

	<div id="fh5co-explore" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2 style="color:white;">Bagaimana Cara Kerjanya?</h2>
					<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p> -->
				</div>
			</div>
		</div>		

		<div class="fh5co-explore fh5co-explore1">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 howto">
						<img class="img-responsive img-howto" src="{base_url()}assets/client/images/1.jpg" alt="work">
						<div class="mt">
							<h3 style="color:white;">Jelaskan Kebutuhan Anda</h3>
							<p style="color:white;">Beritahu kami secara lengkap tentang layanan yang anda butuhkan</p>
						</div>
					</div>
					<div class="col-sm-4 howto">
						<img class="img-responsive img-howto" src="{base_url()}assets/client/images/2.jpg" alt="work">
						<div class="mt">
							<h3 style="color:white;">Dapatkan Penawaran Dalam Beberapa Jam</h3>
						<p style="color:white;">Kami akan mengirimkan beberapa penawaran melalui email anda</p>
						</div>
					</div>
					<div class="col-sm-4 howto">
						<img class="img-responsive img-howto" src="{base_url()}assets/client/images/3.jpg" alt="work">
						<div class="mt">
							<h3 style="color:white;">Pilih Yang Terbaik</h3>
							<p style="color:white;">Bandingkan harga, portfolio and review dari penyedia jasa</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Rekomendasi Penyedia Jasa Pilihan Customer Ruangjasa
						.com </h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>
			<div class="row" style="">

				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="{base_url()}assets/client/images/jasa/services.jpg" alt=""></a>
						<div class="blog-text">
							<h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="{base_url()}assets/client/images/jasa/services1.png" alt=""></a>
						<div class="blog-text">
							<h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="{base_url()}assets/client/images/jasa/services3.jpg" alt=""></a>
						<div class="blog-text">
							<h3><a href=""#>45 Minimal Workspace Rooms for Web Savvys</a></h3>
							<span class="posted_on">Nov. 15th</span>
							<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<a href="#" class="btn btn-primary">Read More</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2 style="color:white;">Testimonials</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="{base_url()}assets/client/images/person_1.jpg" alt="user">
									</figure>
									<span style="color:white; text-align:center;">Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p style="color:white;">&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="{base_url()}assets/client/images/person_1.jpg" alt="user">
									</figure>
									<span style="color:white; text-align:center;">Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p style="color:white;">&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="{base_url()}assets/client/images/person_1.jpg" alt="user">
									</figure>
									<span style="color:white; text-align:center;">Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p style="color:white;">&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	


	<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Anda penyedia jasa dan ingin mendapatkan lebih banyak customer?</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>

			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
				
					<p><a href="#" class="btn btn-default btn-lg">Daftarkan Usaha Saya</a></p>
				</div>
			</div>
		</div>
	</div>
    <!-- Index News End -->
