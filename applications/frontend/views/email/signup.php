<?php $this->load->view('email/_header'); ?>

<p>Hi <?php echo $first_name; ?>,</p>

<p>Please visit <a href="<?php echo site_url('account/activate/'.$activation_code); ?>">this link</a> to activate your account.</p>

<?php $this->load->view('email/_footer'); ?>