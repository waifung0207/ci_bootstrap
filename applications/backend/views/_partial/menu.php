
<ul class="sidebar-menu">

	<?php // Section 1 ?>
	<li class="header">MAIN NAVIGATION</li>
	<?php
		foreach ($menu as $parent => $parent_params)
		{
			$name = $parent_params['name'];
			$url = $parent_params['url'];
			$icon = $parent_params['icon'];

			if ( empty($parent_params['children']) )
			{
				$active = ( current_url()==$url ) ? 'active' : '';
				echo "<li class='$active'><a href='$url'><i class='$icon'></i> $name</a></li>";
			}
			else
			{
				$parent_active = ( $ctrler==$parent ) ? 'active' : '';
				$parent_name = $parent_params['name'];
				$parent_url = $parent_params['url'];
				$parent_icon = $parent_params['icon'];

				// parent of child items
				$list_arrow = ($parent_active) ? 'fa-angle-down' : 'fa-angle-left';
				echo "<li class='treeview $parent_active'>
					<a href='#'>
						<i class='$parent_icon'></i> $parent_name <i class='fa $list_arrow pull-right'></i>
					</a>";

				// child items
				$list_display = ($parent_active) ? '' : 'display: none;';
				echo "<ul class='treeview-menu' style='$list_display'>";
				foreach ($parent_params['children'] as $name => $url)
				{
					$child_active = (current_url()==$url) ? "class='active'" : '';
					echo "<li $child_active><a href='$url'><i class='fa fa-circle-o'></i> $name</a></li>";
				}
				echo "</ul>";
				echo "</li>";
			}
		}
	?>

	<?php // Section 2 ?>
	<li class="header">USEFUL LINKS</li>
	<li><a href="<?php echo base_url(); ?>" target='_blank'><i class="fa fa-circle-o text-info"></i> Frontend Site</a></li>

</ul>
