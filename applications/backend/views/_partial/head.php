<!DOCTYPE html>
<html lang="en" class="{theme}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>My Website - {title}</title>

		<?php
			// Grocery CRUD scripts
			if ( !empty($crud_data) )
			{
				foreach ($crud_data->css_files as $file)
					echo link_tag($file).PHP_EOL;

				foreach ($crud_data->js_files as $file)
					echo "<script src='$file'></script>".PHP_EOL;
			}
		?>
		
		<link href="<?php echo base_url('assets/dist/backend.min.css'); ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
	</head>

	<body class="{theme}">
	