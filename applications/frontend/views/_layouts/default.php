<?php $this->load->view('_partial/head'); ?>

	<div class="container">

		<?php $this->load->view('_partial/header'); ?>

		<div class="content-header">
			<h1>{title}</h1>
		</div>

		<section class="content">
			{body}
		</section>
		
	</div>

<?php $this->load->view('_partial/foot'); ?>