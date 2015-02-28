<?php $this->load->view('_partial/head'); ?>

	<div class="wrapper">

		<?php $this->load->view('_partial/header'); ?>

		<?php // Left side column. contains the logo and sidebar ?>
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left info">
						<p><?php echo $user['full_name']; ?></p>
						<a href="<?php echo site_url('account'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<?php $this->load->view('_partial/menu'); ?>
			</section>
		</aside>

		<?php // Right side column. Contains the navbar and content of the page ?>
		<div class="content-wrapper">

			<section class="content-header">
				<h1>{title}</h1>
				<?php $this->load->view('_partial/breadcrumb'); ?>
			</section>

			<section class="content">
				{body}
				<?php $this->load->view('_partial/back'); ?>
			</section>

		</div>

		<?php $this->load->view('_partial/footer'); ?>

	</div>

<?php $this->load->view('_partial/foot'); ?>