<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<!-- Breadcrumb End -->

	<!-- Page Start -->
    <div class="page-inner mb120">
    	<div class="container">

            <!-- Content Start -->
            <div class="col-md-4 hidden-xs">
            </div>
						<div class="col-md-4 mt20">
							<h2 class="text-center">Contact us</h2>
							<div>
								<form role="form" class="parsley-validate ajax" action="http://localhost/ci2-dev-parser/contact/process" clearform >
					        <div class="form-group">
					            <label for="name">Name:</label>
					            <input type="text" id="name" name="name" class="form-control" required/>
					        </div>
					        <div class="form-group">
					            <label for="email">Email:</label>
					            <input type="text" id="email" name="email" class="form-control" required data-parsley-type="email"/>
					        </div>
					        <div class="form-group">
					            <label for="subject">Subject:</label>
					            <input type="text" id="subject" name="subject" class="form-control" required/>
					        </div>
					        <div class="form-group">
					            <label for="message">Message:</label>
					            <textarea id="message" name="message" required class="form-control contactbox"></textarea>
					        </div>
					        <div class="form-group">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
            <div class="col-md-4 hidden-xs">
            </div>
            <!-- Content End -->

        </div>
    </div>
    <!-- Index News End -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>