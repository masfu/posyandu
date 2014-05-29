<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="" style="padding: 15px 15px 0 15px;">
                <div class="well well-sm">
                    <?php
                    echo App::instance()->session->getData('role');
                    ?>
                    <img src="<?php echo App::instance()->base_url; ?>assets/img/logo2.jpg ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
                    <h2 style="margin: 15px 0 10px 0; color: #000;"> Posyandu</h2>
                    <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : Mojokerto</b></div>
                </div>
            </div>
        </div>
    </div>
</div>