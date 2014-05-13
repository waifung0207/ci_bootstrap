
<?php
	switch ($result_type)
	{
		case 'success':		$icon = 'fa fa-check'; 		break;
		case 'danger':		$icon = 'fa fa-ban'; 		break;
		case 'info':		$icon = 'fa fa-info'; 		break;
		case 'warning':		$icon = 'fa fa-warning'; 	break;
	}
?>

<div class="alert alert-<?php echo $result_type; ?> alert-dismissable">

	<?php if (!empty($icon)) { ?>
		<i class="<?php echo $icon; ?>"></i>
	<?php } ?>
	
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

	<?php echo $result_msg; ?>

</div>