<?php $this->load->view('email/_header'); ?>

<p>Hi <?php echo $first_name; ?>,</p>

<p>Please visit <a href="<?php echo site_url('account/reset_password/'.$forgot_password_code); ?>">this link</a> to reset your account password.</p>

<?php $this->load->view('email/_footer'); ?>