<div class="row">
	<div class="col-md-4 col-xs-12">
		<div>
			<h2>Change Password</h2>
			<?php
			$attribute = array('class'=>'parsley-validate');
			echo form_open('profile',$attribute);
			?>
				<div class="mb20">
					<label for="old_pass">Old Password</label>
					<input type="password" name="old_pass" id="old_pass" class="form-control" required />
				</div>
				<div class="mb20">
					<label for="new_pass">New Password</label>
					<input type="password" name="new_pass" id="new_pass" class="form-control" required />
				</div>
				<div class="mb20">
					<label for="conf_pass">Confirm Password</label>
					<input type="password" name="conf_pass" id="conf_pass" class="form-control" required data-parsley-equalto="#new_pass" />
				</div>
				<div class="mb20">
					<button class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>