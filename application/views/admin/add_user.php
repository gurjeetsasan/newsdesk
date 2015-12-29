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

		<form role="form" method="POST" action="<?php echo base_url();?>index.php/admin/add_user/create">
			<!-- <div class="form-group">
				<label for="uid">User ID</label>
				<input type="text" required="" placeholder="User Id" name="uid" class="form-control" />
			</div> -->
			
			<div class="form-group">
				<label for="uid"><?php echo get_phrase('email') ?></label>
				<input type="email" required="" placeholder="<?php echo get_phrase('email') ?>" name="email" class="form-control" required />
			</div>	

	
			<div class="form-group">
				<label for="password"><?php echo get_phrase('password') ?></label>
				<input type="text" required="" placeholder="<?php echo get_phrase('password') ?>" name="password" class="form-control" required />
			</div>
			<div class="form-group">
				<label for="lang"><?php echo get_phrase('language') ?></label>
				<select required="" placeholder="Choose language" class="form-control" name="lang" required>
				 	<option value=""><?php echo get_phrase('select_language') ?></option>
				 	<option value="en"><?php echo get_phrase('english') ?></option>
				  	<option value="no"><?php echo get_phrase('norwegian') ?></option>
				  	<option value="se"><?php echo get_phrase('swedish') ?></option>
				</select>
			</div>
			<input type="hidden" name="action" value="ACTION_CREATE" >
			<input class="btn btn-primary" type="submit" value="<?php echo get_phrase('add_new_user') ?>" />
		</form>
	</div>
</div><!--/.row-->