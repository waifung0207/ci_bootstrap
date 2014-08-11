<?php $this->load->view('_partial/head'); ?>

	<?php $this->load->view('_partial/header'); ?>

	<div class="wrapper row-offcanvas row-offcanvas-left">

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left info">
						<p>Hello, <?php echo $user['full_name']; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<?php $this->load->view('_partial/menu'); ?>
			</section>
		</aside>

		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<section class="content-header">
				<h1>{title}</h1>
				<?php $this->load->view('_partial/breadcrumb'); ?>
			</section>			
			<section class="content">
				{body}
				<?php $this->load->view('_partial/back'); ?>
			</section>
		</aside>

	</div>

<?php $this->load->view('_partial/foot'); ?>