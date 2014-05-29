<link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/datepicker.css" media="screen">


<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Tambah Ibu Pkk / Bidan</a>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row-fluid well" style="overflow: hidden">
                        <input type="hidden" name="salt" id="salt">
                        <div class="col-lg-6">
                            <table width="100%" class="table-form">
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td><b><input type="text" name="nama" required value="" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('nama'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Username</td>
                                    <td><b><input type="text" name="username" required value="" id="dari" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('username'); ?>

                                    </td>
                                </tr>		
                                <tr>
                                    <td width="20%">Password</td>
                                    <td><b><input type="text" name="password" id="password" required value="" style="width: 400px" class="form-control">
                                            <button type="button" onclick="isiRandom()" class="btn btn-primary btn-xs">Random</button></b>
                                        <?php echo $this->html->formError('password'); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Tanggal Lahir</td>
                                    <td><b><input type="text" name="tgl_lahir" id="tgl_lahir" required data-date-format="dd-mm-yyyy" value="" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('tgl_lahir'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Alamat</td>
                                    <td><b><textarea name="alamat" required style="width: 400px; height: 60px" class="form-control"></textarea></b>
                                        <?php echo $this->html->formError('alamat'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Jabatan</td>
                                    <td>
                                        <?php
                                        $option = array("Ibu PKK" => "Ibu PKK", "Bidan" => "Bidan");
                                        echo $this->html->dropDownList('jabatan', $option, array(), "required style=\"width: 400px\" autofocus class=\"form-control\"");
                                        echo $this->html->formError('jabatan');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br><button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="" class="btn btn-success">Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo App::instance()->base_url; ?>assets/js/bootstrap-datepicker.js"></script>
<script>
                                                $('#tgl_lahir').datepicker()
                                                function isiRandom()
                                                {
                                                    var min = 1000000;
                                                    var max = 9999999;
                                                    var random = Math.floor(Math.random() * (max - min + 1)) + min;
                                                    window.console.log(random);
                                                    $("#password").val(random);
                                                    $("#salt").val(random);
                                                }
</script>