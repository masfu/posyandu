<?php include 'init.php'; ?>
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
                src: local('Cabin Regular'), local('Cabin-Regular'), url(http://hisyam-pc/posyandu/assets/font/satu.woff) format('woff');
            }
            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 700;
                src: local('Cabin Bold'), local('Cabin-Bold'), url(http://hisyam-pc/posyandu/assets/font/dua.woff) format('woff');
            }
            @font-face {
                font-family: 'Lobster';
                font-style: normal;
                font-weight: 400;
                src: local('Lobster'), url(http://hisyam-pc/posyandu/assets/font/tiga.woff) format('woff');
            }	

        </style>
        <link rel="stylesheet" href="http://hisyam-pc/posyandu/assets/css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="http://hisyam-pc/posyandu/assets/css/pace.css" media="screen">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
          <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
        <![endif]-->


        <script src="http://hisyam-pc/posyandu/assets/js/jquery.min.js"></script>
        <script src="http://hisyam-pc/posyandu/assets/js/pace.js"></script>
    <body style="">

        <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand"><strong style="font-family: verdana;">E-Monitoring</strong></span>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">	
                <li><a href="http://hisyam-pc/posyandu/beranda"><i class="icon-home icon-white"> </i> Beranda</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> Data Master <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/Ibu">Ibu</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/Balita">Balita</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/Pkk">Ibu PKK / Bidan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-file icon-white"> </i> Monitoring <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/MonitorIbu"> Monitoring Ibu</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/MonitorBalita"> Monitoring Balita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-briefcase icon-white"> </i> Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/LaporanIbu"> Laporan Ibu</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/LaporanBalita"> Laporan Balita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-wrench icon-white"> </i> Pengaturan <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/Pengaturan/gantiPassword">Ganti Password</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/Pengaturan/profil">Profil</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-user icon-white"></i> aku <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/logout">Logout</a></li>
                        <li><a tabindex="-1" href="http://hisyam-pc/posyandu/bantuan" target="_blank">Help</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div><div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand"><strong style="font-family: verdana; margin-left: -50px">E-Monitoring </strong></span>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

    </div>
</div>
<div class="container">

    <br><br>

    <div class="container-fluid" style="margin-top: 30px">

        <div class="row-fluid">
            <div style="width: 400px; margin: 0 auto">

                <img src="http://hisyam-pc/posyandu/assets/img/logo2.jpg" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
                <h2 style="margin: 15px 0 10px 0; color: #000;">E-Monitoring</h2>
                <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : Mojokerto</b></div>

            </div>

            <div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
                <form action='http://hisyam-pc/posyandu/login/authenticate' method='post' >                <legend>Login</legend>	
                <table align="center" style="margin-bottom: 0" class="table-form" width="90%">
                    <tr>
                        <td width="40%">Username</td>
                        <td><input type="text" name="username" value="" required style="width: 200px" autofocus class="form-control">                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value="" required style="width: 200px" autofocus class="form-control">                    </tr>
                    <tr>
                        <td>Login Sebagai</td>
                        <td><select name="role"required style="width: 200px" autofocus class="form-control">
<option value="Ibu">Ibu</option>
<option value="Bidan">Ibu PKK / Bidan</option>
<option value="Admin">Admin</option>
</select>                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 11px">Ingat Saya</td>
                        <td><input type="checkbox" name="remember" value="checked" >                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Login" class="btn btn-success">                    </tr>
                </table>
                                <center style="font-size: 11px"><a>Lupa password</a></center>
                </form>
            </div><!--/span-->
        </div><!--/row-->

    </div><!--/.fluid-container-->
   <!-- <center style="margin-top: -15px;">Versi 1.0 (09-13) &copy; 
        <a href="http://facebook.com/akhwan90">Fatima</a> | 
        <a href="http://nur-akhwan.blogspot.com/">Blog Fatima</a>
    </center> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(" #alert").fadeOut(6000);
        });
    </script>

</div>        <div class="span12 well well-sm">
            <h4 style="font-weight: bold">E-Monitoring {Aplikasi monitoring kesehatan Ibu dan Balita}</h4>
            <h6>&copy;  2013. eepis Surabaya </h6>
        </div>
        <script src="http://hisyam-pc/posyandu/assets/js/bootstrap.min.js"></script>
        <script src="http://hisyam-pc/posyandu/assets/js/bootswatch.js"></script>
        <script src="http://hisyam-pc/posyandu/assets/js/jquery.chained.js"></script>
        <script>
            Pace.start()
        </script>
    </body>
</html>
