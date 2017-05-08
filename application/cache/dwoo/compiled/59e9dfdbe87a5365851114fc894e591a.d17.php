<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="row login-container">
	<div class="col-md-4 hidden-xs"></div>
	<div class="col-md-4 col-xs-12 login-content">
		<div>
			<h2>Login</h2>
			<form action="http://localhost:8080/ra/admin/login" method="post" accept-charset="utf-8" class="parsley-validate"><div style="display:none">
<input type="hidden" name="ci3csrf" value="0591f1b953e0bb4e08eed5256fed87fe" />
</div>				<div class="mb20">
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
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>