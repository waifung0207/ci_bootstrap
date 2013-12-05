<?php $this->load->view('__partial/header'); ?>

    <div class="container">

        <div class="row">            
            <?php $this->load->view('__partial/navbar'); ?>
            <div class="col-lg-12">
                <h1 class="page-header">{title}</h1>
            </div>
        </div>

        <div class="row">
            {body}
        </div>

        <hr>

    </div>

<?php $this->load->view('__partial/footer'); ?>