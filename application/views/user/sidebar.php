<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<!-- <form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form> -->	
	<ul class="nav menu">
		<li class="<?php echo ($page_name == 'dashboard') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/user"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
		<li class="<?php echo ($page_name == 'view_publication') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/user/view_publication"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> View Publication </a></li>
		<li class="<?php echo ($page_name == 'add_publication') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/user/add_publication"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Add Publication</a></li>
	</ul>

</div><!--/.sidebar-->