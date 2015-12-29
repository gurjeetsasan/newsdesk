<?php
	$user =  json_decode($userData);	
?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
		
		<?php if(isset( $message) ): ?>			
			<?php if( $message_type == 'success' ): ?>			
				<div class="alert bg-success alert-message" role="alert">
					<svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> <?php echo $message;?> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>				
			<?php endif; ?>
			<?php if( $message_type == 'error' ): ?>			
				<div class="alert bg-danger alert-message" role="alert">
					<svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> <?php echo $message;?> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<form role="form" method="POST" action="<?php echo base_url();?>index.php/admin/update_user/create">
			<div class="form-group">
				<label for="uid">User ID</label>
				<input type="text" required="" placeholder="User Id" name="uid" class="form-control" value="<?php echo $user->userId; ?>" readonly />
			</div>
			
			<div class="form-group">
				<label for="uid">email</label>
				<input type="text" required="" placeholder="email" name="email" class="form-control" value="<?php echo $user->email; ?>" />
			</div>	

	
			<div class="form-group">
				<label for="password">Password</label>
				<input type="text" required="" placeholder="password" name="password" class="form-control" value="<?php echo $user->password; ?>" >
			</div>
			<div class="form-group">
				<label for="lang">Language</label>
				<select required="" placeholder="Choose language" class="form-control" name="lang">
				 	<option value="">Select Language</option>
				 	<option value="en"  <?php echo ($user->language == 'en') ? 'selected' : '' ; ?> >English</option>
				  	<option value="no" <?php echo ($user->language == 'no') ? 'selected' : '' ; ?> >Norwegian</option>
				  	<option value="se" <?php echo ($user->language == 'se') ? 'selected' : '' ; ?> >Swedish</option>
				</select>
			</div>
			<input type="hidden" name="action" value="ACTION_UPDATE" >
			<input class="btn btn-primary" type="submit" value="Update User" />
		</form>
	</div>
</div><!--/.row-->