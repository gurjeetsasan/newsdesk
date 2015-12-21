<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
		<form role="form" method="POST" action="">
		
			<input type="hidden" value="demouser@test.com" name="publish_uid">

			<input type="hidden" value="admin" name="referer">
			
			<div class="form-group">
				<label for="uid">Username</label>
				<input type="text" required="" placeholder="username" name="uid" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" required="" placeholder="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="lang">Language</label>
				<select required="" placeholder="Choose language" class="form-control" name="lang">
				 	<option value="">Select Language</option>
				 	<option value="en">English</option>
				  	<option value="no">Norwegian</option>
				  	<option value="se">Swedish</option>
				</select>
			</div>
			<button onclick="createUser()" class="btn btn-primary" type="button">Sign Up</button>
		</form>
	</div>
</div><!--/.row-->
