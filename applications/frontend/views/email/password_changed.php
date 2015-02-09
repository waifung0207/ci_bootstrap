<?php $this->load->view('email/_header'); ?>

<p>Hi <?php echo $first_name; ?>,</p>

<p>Please visit <a href="<?php echo site_url('account/login'); ?>">this link</a> and login your account.</p>

<?php $this->load->view('email/_footer'); ?>