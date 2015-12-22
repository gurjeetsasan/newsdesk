<div class="row">
	<div class="col-xs-12">
  		<div class="table-responsive">
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
			      				echo "<td>".$data->email."</td>";
			      				echo "<td class='mob-hide-section'>".$data->password."</td>";
			      				echo "<td class='mob-hide-section'>".$data->language."</td>";
			      				echo '<td>
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

				