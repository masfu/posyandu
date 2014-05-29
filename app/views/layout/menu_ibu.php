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
                <li><a href="<?php echo App::instance()->base_url; ?>beranda"><i class="icon-home icon-white"> </i> Beranda</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> Data Master <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>Balita">Balita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-file icon-white"> </i> Monitoring <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>MonitorIbu"> Monitoring Ibu</a></li>
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>MonitorBalita"> Monitoring Balita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-briefcase icon-white"> </i> Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>LaporanIbu"> Laporan Ibu</a></li>
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>LaporanBalita"> Laporan Balita</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-wrench icon-white"> </i> Pengaturan <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>Pengaturan/gantiPassword">Ganti Password</a></li>
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>Pengaturan/profil">Profil</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-user icon-white"></i> <?php echo App::instance()->auth->getUser('username'); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>logout">Logout</a></li>
                        <li><a tabindex="-1" href="<?php echo App::instance()->base_url; ?>bantuan" target="_blank">Help</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>