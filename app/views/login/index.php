<div class="navbar navbar-inverse navbar-fixed-top">
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

                <img src="<?= App::instance()->base_url; ?>assets/img/logo2.jpg" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
                <h2 style="margin: 15px 0 10px 0; color: #000;">E-Monitoring</h2>
                <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : Mojokerto</b></div>

            </div>

            <div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
                <?php echo $this->html->formOpen("login/authenticate", "post"); ?>
                <legend>Login</legend>	
                <table align="center" style="margin-bottom: 0" class="table-form" width="90%">
                    <tr>
                        <td width="40%">Username</td>
                        <td><?php echo $this->html->textField("username", "", "required style=\"width: 200px\" autofocus class=\"form-control\"") ?>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><?php echo $this->html->passwordField("password", "", "required style=\"width: 200px\" autofocus class=\"form-control\"") ?>
                    </tr>
                    <tr>
                        <td>Login Sebagai</td>
                        <td><?php
                            $option = array("Ibu" => "Ibu", "Bidan" => "Ibu PKK / Bidan", "Admin" => "Admin");
                            echo $this->html->dropDownList('role', $option, array(), "required style=\"width: 200px\" autofocus class=\"form-control\"")
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 11px">Ingat Saya</td>
                        <td><?php echo $this->html->checkBox("remember", "checked") ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo $this->html->submitButton("submit", "Login", "class=\"btn btn-success\"") ?>
                    </tr>
                </table>
                <?php
                echo App::instance()->session->flashData('error');
                ?>
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

</div>