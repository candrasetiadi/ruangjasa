<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		
			<!-- Start Sign In Form -->
			<form action="#" class="fh5co-form animate-box" data-animate-effect="fadeIn">
				<h2>Sign In</h2>
				<div class="form-group">
					<label for="username" class="sr-only">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Username" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password" class="sr-only">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="remember"><input type="checkbox" id="remember"> Remember Me</label>
				</div>
				<div class="form-group">
					<p>Not registered? <a href="{site_url('login/register')}">Sign Up</a> | <a href="{site_url('login/forgot')}">Forgot Password?</a></p>
				</div>
				<div class="form-group">
					<input type="submit" value="Sign In" class="btn btn-primary">
					<a href="{site_url()}"><input type="button" value="Cancel" class="btn btn-primary"></a>
				</div>
			</form>
			<!-- END Sign In Form -->

		</div>
	</div>
</div>