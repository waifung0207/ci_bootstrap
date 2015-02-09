
<ul class="nav navbar-nav">
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
			echo "<li class='dropdown $parent_active'>
				<a data-toggle='dropdown' class='dropdown-toggle' href='#''>
					<i class='$icon'></i> $parent_name <span class='caret'></span>
				</a>";

			// child items
			echo "<ul role='menu' class='dropdown-menu'>";
			foreach ($parent_params['children'] as $name => $url)
			{
				echo "<li><a href='$url'>$name</a></li>";
			}
			echo "</ul>";
			echo "</li>";
		}
	}
?>
</ul>