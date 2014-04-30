
<ul class="sidebar-menu">
	<?php
		foreach ($menu as $parent => $parent_params)
		{
			$name = $parent_params['name'];
			$url = $parent_params['url'];
			$icon = $parent_params['icon'];

			if ( empty($parent_params['children']) )
			{
				$active = ( current_url()==$url ) ? 'active' : '';
				echo "<li class='$active'><a href='$url'><i class='$icon'></i> <span>$name</span></a></li>";
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
						<i class='$parent_icon'></i> <span>$parent_name</span><i class='fa pull-right $list_arrow'></i>
					</a>";

				// child items
				$list_display = ($parent_active) ? '' : 'display: none;';
				echo "<ul class='treeview-menu' style='$list_display'>";
				foreach ($parent_params['children'] as $name => $url)
				{
					$child_active = (current_url()==$url) ? "class='active'" : '';
					echo "<li $child_active><a href='$url' style='margin-left: 10px;'><i class='fa fa-angle-double-right'></i> $name</a></li>";
				}
				echo "</ul>";
				echo "</li>";
			}
		}
	?>
</ul>