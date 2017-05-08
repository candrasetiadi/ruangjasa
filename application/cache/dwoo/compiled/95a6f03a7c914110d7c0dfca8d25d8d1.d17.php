<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			
			<!-- Start Sign In Form -->
			<form action="#" class="fh5co-form animate-box" data-animate-effect="fadeIn">
				<h2>Sign Up</h2>
				<div class="form-group">
					<div class="alert alert-success" role="alert">Your info has been saved.</div>
				</div>
				<div class="form-group">
					<label for="name" class="sr-only">Name</label>
					<input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="email" class="sr-only">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password" class="sr-only">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="re-password" class="sr-only">Re-type Password</label>
					<input type="password" class="form-control" id="re-password" placeholder="Re-type Password" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="remember"><input type="checkbox" id="remember"> Remember Me</label>
				</div>
				<div class="form-group">
					<p>Already registered? <a href="index.html">Sign In</a></p>
				</div>
				<div class="form-group">
					<input type="submit" value="Sign Up" class="btn btn-primary">
				</div>
			</form>
			<!-- END Sign In Form -->

		</div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>