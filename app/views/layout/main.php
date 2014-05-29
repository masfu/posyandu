
<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/amelia/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.:: E-Monitoring ::.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <style type="text/css">
            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 400;
                src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo App::instance()->base_url; ?>assets/font/satu.woff) format('woff');
            }
            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 700;
                src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo App::instance()->base_url; ?>assets/font/dua.woff) format('woff');
            }
            @font-face {
                font-family: 'Lobster';
                font-style: normal;
                font-weight: 400;
                src: local('Lobster'), url(<?php echo App::instance()->base_url; ?>assets/font/tiga.woff) format('woff');
            }	

        </style>
        <link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/pace.css" media="screen">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
          <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
        <![endif]-->


        <script src="<?php echo App::instance()->base_url; ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo App::instance()->base_url; ?>assets/js/pace.js"></script>
    <body style="">

        <?php
        if (App::instance()->auth->isGuest() == false) {
            $role = App::instance()->auth->getRole();
            switch ($role) {
                case 'Ibu':
                    include "menu_ibu.php";
                    break;
                case 'Bidan':
                    include "menu_bidan.php";
                    break;
                case 'Admin':
                    include "menu_admin.php";
                    break;
                default:
                    break;
            }
        }
        echo $content;
        ?>
        <div class="span12 well well-sm">
            <h4 style="font-weight: bold">E-Monitoring {Aplikasi monitoring kesehatan Ibu dan Balita}</h4>
            <h6>&copy;  2013. eepis Surabaya </h6>
        </div>
        <script src="<?php echo App::instance()->base_url; ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo App::instance()->base_url; ?>assets/js/bootswatch.js"></script>
        <script src="<?php echo App::instance()->base_url; ?>assets/js/jquery.chained.js"></script>
        <script>
            Pace.start()
        </script>
    </body>
</html>
