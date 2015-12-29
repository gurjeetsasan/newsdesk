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

		<form action="" method="POST" role="form">
					<legend><h2><?php echo get_phrase('create_a_publication') ?></h2></legend>

					<input type="hidden" name="publish_uid" value="uteguiden@gmail.com">
					
					<div class="form-group">
						<label for=""><?php echo get_phrase('publication_title') ?></label>
						<input type="text" class="form-control" name="p_title" id="title" placeholder="Publication Title" required>
					</div>
					<div class="form-group">
						<label for=""><?php echo get_phrase('language') ?></label>
						<select name="p_lang" id="lang" class="form-control" placeholder="Choose language" required >
						 	<option value=""><?php echo get_phrase('select_language') ?></option>
						 	<option value="en"><?php echo get_phrase('english') ?></option>
						  	<option value="no"><?php echo get_phrase('norwegian') ?></option>
						  	<option value="se"><?php echo get_phrase('swedish') ?></option>
						</select>
						
						<span id="aw_loader"><i class="fa-li fa fa-spinner fa-spin"></i></span>
					</div>
					<div class="form-group">
						<label for=""><?php echo get_phrase('topics') ?></label>
						<select name="p_topic" id="topic" class="form-control" placeholder="Choose topic">
							<option value=""><?php echo get_phrase('select_topic') ?></option>						
						</select>
					</div>
					<button type="button" class="btn btn-primary" onclick="createPublication()"><?php echo get_phrase('create_publication') ?></button>
		</form>
	</div>
</div><!--/.row-->