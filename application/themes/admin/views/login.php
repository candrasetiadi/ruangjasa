<div class="row login-container">
	<div class="col-md-4 hidden-xs"></div>
	<div class="col-md-4 col-xs-12 login-content">
		<div>
			<h2>Login</h2>
			<?php
			$attribute = array('class'=>'parsley-validate');
			echo form_open('admin/login',$attribute);
			?>
				<div class="mb20">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" required data-parsley-type="email" />
				</div>
				<div class="mb20">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required />
				</div>
				<div class="mb20 text-center">
					<input type="checkbox" name="remember" id="remember" />
					<label for="remember">Remember me</label>
				</div>
				<div class="mb20">
					<button class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4 hidden-xs"></div>
</div>
