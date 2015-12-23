<div class="row">
	<div class="col-xs-12">
  		<div class="table-responsive">
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
			
    		<table class="table table-bordered table-hover normal-text-wrap">          
      			<thead>
			    	<tr>
			      		<th class="mob-hide-section">User ID</th>
			      		<th>Email</th>
			      		<th class="mob-hide-section">Password</th>
			      		<th class="mob-hide-section">Language</th>
			      		<th>Actions</th>
			    	</tr>
			  	</thead>
		      	<tbody>
			      	<?php 
			      		$user_data = json_decode($userList);
			      		foreach ($user_data as $data ) {
			      			echo "<tr>";
			      				echo "<td class='mob-hide-section'>".$data->userId."</td>";
			      				
			      				echo "<td> <a href='".base_url()."index.php/admin/view_publication/".$data->userId."'>".$data->email."</a> </td>";

			      				echo "<td class='mob-hide-section'>".$data->password."</td>";
			      				echo "<td class='mob-hide-section'>".$data->language."</td>";
			      				echo '<td>			      				
			      							<a href="'.base_url().'index.php/admin/view_publication/'.$data->userId.'" class="edit-btn-ctm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
			      							<a href="'.base_url().'index.php/admin/update_user/'.$data->userId.'" class="edit-btn-ctm"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
			      							&nbsp;<a onclick="return confirm(\'Are you sure you want to Remove User?\');" href="'.base_url().'index.php/admin/user_list/delete/'.$data->userId.'" class="delete-btn-ctm"><i class="fa fa-trash"></i></a> &nbsp;
										</td>';
			      			echo "</tr>";
			      		}
			      	?>			      	 
		     	</tbody>

   			 </table>
  		</div><!--end of .table-responsive-->
	</div>
</div> <!-- .row ends here -->

				