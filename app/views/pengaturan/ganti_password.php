<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Ganti Password</a>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row-fluid well" style="overflow: hidden">

                        <div class="col-lg-6">
                            <input type="hidden" name="salt" value="<?php echo $salt ?>" id="salt">
                            <table width="100%" class="table-form">
                                <tr>
                                    <td width="40%">Password Lama</td>
                                    <td><b><input type="text" name="password_lama" required value="" style="width: 350px" class="form-control"></b>
                                        <?php echo $this->html->formError('password'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">Password Baru</td>
                                    <td><b><input type="text" name="password" required value="" style="width: 350px" class="form-control"></b>
                                        <?php echo $this->html->formError('password'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">Password Ulangi</td>
                                    <td><b><input type="text" name="password"  required value="" style="width: 350px" class="form-control"></b>
                                        <?php echo $this->html->formError('password'); ?>
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