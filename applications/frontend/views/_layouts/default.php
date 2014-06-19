<?php $this->load->view('_partial/header'); ?>

    <div class="container">

        <div class="row">            
            <?php $this->load->view('_partial/navbar'); ?>
            <div class="col-lg-12">
                <h1 class="page-header">{title}</h1>
            </div>
        </div>

        <div class="row">
            {body}
        </div>

        <hr>

    </div>

<?php $this->load->view('_partial/footer'); ?>