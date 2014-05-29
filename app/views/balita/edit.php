<link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/datepicker.css" media="screen">


<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Tambah Balita</a>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row-fluid well" style="overflow: hidden">

                        <div class="col-lg-6">
                            <table width="100%" class="table-form">
                                <input type="hidden" name="ibu_id" value="<?php echo $ibu_id ?>" id="ibu_id">
                                <tr>
                                    <td width="20%">Nama Balita</td>
                                    <td><b><input type="text" name="nama" required value="<?php echo $nama ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('nama'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Ibu</td>
                                    <td><div class="dropdown">
                                            <input type="text" name="ibu" id="ibu" required value="<?php echo $ibu ?>" style="width: 400px" role="button" class="form-control dropdown-toggle" data-toggle="dropdown">
                                            <ul class="dropdown-menu" role="menu" id="daftar_ibu">

                                            </ul>
                                        </div>
                                        <?php echo $this->html->formError('ibu'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Tanggal Lahir</td>
                                    <td><b><input type="text" name="tgl_lahir" id="tgl_lahir" required data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($tgl_lahir)) ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('tgl_lahir'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Alamat</td>
                                    <td><b><textarea name="alamat" required style="width: 400px; height: 60px" class="form-control"><?php echo $alamat ?></textarea></b>
                                        <?php echo $this->html->formError('alamat'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Berat Lahir</td>
                                    <td><b><input type="text" name="berat_lahir" required value="<?php echo $berat_lahir ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('berat_lahir'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Tinggi Lahir</td>
                                    <td><b><input type="text" name="tinggi_lahir" required value="<?php echo $tinggi_lahir ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('tinggi_lahir'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Cacat Lahir</td>
                                    <td><b><input type="text" name="cacat_lahir" value="<?php echo $cacat_lahir ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('cacat_lahir'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Anak ke</td>
                                    <td><b><input type="text" name="anak_ke" value="<?php echo $anak_ke ?>" style="width: 400px" class="form-control"></b>
                                        <?php echo $this->html->formError('anak_ke'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Jenis Kelamin</td>
                                    <td>
                                        <?php echo $this->html->radioButton('jenis_kelamin', 'laki-laki', $jenis_kelamin); ?>Laki-Laki
                                        <?php echo $this->html->radioButton('jenis_kelamin', 'perempuan', $jenis_kelamin); ?>Perempuan
                                        <?php echo $this->html->formError('jenis_kelamin'); ?>
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
<script src="<?php echo App::instance()->base_url; ?>assets/js/bootstrap-typeahead.js"></script>
<script type="text/javascript">
    $('#tgl_lahir').datepicker()
    // Waiting for the DOM ready...
    $(function() {
        $('#ibu').keyup(function() {
            var nama = $(this).val();
            $.ajax({
                url: '<?php echo App::instance()->base_url; ?>Ibu/cari/?q=' + nama,
                type: 'GET',
                async: true,
                dataType: 'json',
                success: function(msg) {
                    var data = "";
                    for (a in msg) {
                        data += "<li><a href='#' onclick=\"isiDataIbu('" + msg[a].id + "','" + msg[a].nama + "')\">" + msg[a].nama + "</a></li>";
                    }
                    $('#daftar_ibu').html(data);
                }
            });
        })
    });

    function isiDataIbu(id, nama) {
        $('#ibu').val(nama);
        $('#ibu_id').val(id);
    }
</script>