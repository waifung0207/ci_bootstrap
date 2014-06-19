
<ol class="breadcrumb">
	<?php
		for ($i=0; $i<sizeof($breadcrumb); $i++)
		{
			$active = ($i==sizeof($breadcrumb)-1) ? 'active' : '';

			$icon = empty($breadcrumb[$i]['icon']) ? '' : '<i class="'.$breadcrumb[$i]['icon'].'"></i> ';
			$name = $icon.$breadcrumb[$i]['name'];

			if ($active)
			{
				echo "<li class='$active'>$name</li>";
			}
			else
			{
				$url = $breadcrumb[$i]['url'];
				echo "<li class='$active'><a href='$url'>$name</a></li>";
			}
		}
	?>
</ol>