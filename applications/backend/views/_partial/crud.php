
<?php if ( !empty($crud_note) ) echo $crud_note; ?>

<?php if ( !empty($crud_data) ) echo $crud_data->output; ?>

<?php if ( !empty($back_url) ) { ?>
	<a href="<?php echo $back_url; ?>" class="btn btn-primary">
		<i class="fa fa-reply"></i> Back
	</a>
<?php } ?>