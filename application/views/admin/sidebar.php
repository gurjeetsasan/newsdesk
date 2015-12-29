<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<!-- <form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form> -->	
	<ul class="nav menu">
		<li class="<?php echo ($page_name == 'dashboard') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> <?php echo $this->lang->line('dashboard') ?></a></li>
		<li class="<?php echo ($page_name == 'user_list') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/admin/user_list"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->lang->line('all_users') ?></a></li>
		<li class="<?php echo ($page_name == 'add_user') ? 'active' : '' ; ?>"><a href="<?php echo base_url();?>index.php/admin/add_user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->lang->line('add_user') ?></a></li>
	</ul>

</div><!--/.sidebar-->