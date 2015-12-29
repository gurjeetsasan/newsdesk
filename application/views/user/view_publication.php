<div class="row">
	<div class="col-xs-12">
  		<div class="table-responsive">
    		<table class="table table-bordered table-hover normal-text-wrap">          
      			<thead>
			    	<tr>
			      		<th class="mob-hide-section">ID</th>
			      		<th><?php echo get_phrase('publication_title') ?></th>
			      		<th class="mob-hide-section"><?php echo get_phrase('language') ?></th>
			      		<th><?php echo get_phrase('actions') ?></th>
			    	</tr>
			  	</thead>			  	
		      	<tbody>
		      		<?php 
			      		$userPublication 	= json_decode( $userPublication);
			      		$user_data  		= $userPublication->listPublications ;
			      		if( !empty($user_data ) ){
				      		foreach ($user_data as $data ) {
				      			echo "<tr>";
				      				echo "<td class='mob-hide-section'>".$data->id."</td>";
				      				echo "<td>".$data->title."</td>";			      				
				      				echo "<td class='mob-hide-section'>".$data->lang."</td>";
      				echo "<td>
      							<div class='btn-group'>
							      <a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href='#'>".
							        get_phrase('action')."
							        <span class='caret'></span>
							      </a>
							      <ul aria-labelledby='drop3' class='dropdown-menu' style='margin-left:-80px;'> 

										<li><a href='#'>".get_phrase('edit_publication')."</a></li> 
										<li><a href='#'>".get_phrase('media_intelligence')."</a></li> 
										<li><a href='#'>".get_phrase('news_site')."</a></li> 
										<li><a href='#'>".get_phrase('newsletter')."</a></li> 
										<li><a href='#'>".get_phrase('rss_feed')."</a></li> 
										<li><a href='#'>".get_phrase('sales_leads')."</a></li> 
										<li class='divider' role='separator'></li> 
										<li><a href='#'>".get_phrase('delete_publication')."</a></li> 
									</ul> 
							    </div>
      						</td>";
				      			echo "</tr>";
				      		}
				      	}else{
				      		echo "<tr><th colspan='4'> <h3 style='text-align: center;'>".get_phrase('no_publications_found') ."</h3></th></tr>";
				      	}
			      	?>
		     	</tbody>

   			 </table>
  		</div><!--end of .table-responsive-->
	</div>
</div> <!-- .row ends here -->