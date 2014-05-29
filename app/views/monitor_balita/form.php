<link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/datepicker.css" media="screen">
<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Tambah Ibu</a>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $this->html->formOpen('', 'post', $param = '') ?>

                <div class="row-fluid well" style="overflow: hidden">

                    <div class="col-lg-10">
                        <table width="100%" class="table-form">
                            <tr>
                                <td width="20%">Id Balita</td>
                                <td><input type="text" name="id_balita" id="id_balita" required value="" style="width: 400px" class="form-control">
                                    <?php echo $this->html->formError('id_balita'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Nama Balita</td>
                                <td><div class="dropdown">
                                        <input type="text" id="nama" required value="" style="width: 400px" role="button" class="form-control dropdown-toggle" autocomplete="off" data-toggle="dropdown">
                                        <ul class="dropdown-menu" role="menu" id="daftar_balita">

                                        </ul>
                                    </div>
                                    <?php echo $this->html->formError('ibu'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Umur</td>
                                <td><input type="text" name="umur" id="umur" required value="" style="width: 400px" class="form-control">
                                    <?php echo $this->html->formError('umur'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Berat Badan</td>
                                <td><b><input type="text" name="berat" required value="" id="berat_sebelum" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('berat'); ?>
                                </td>
                            </tr>		
                            <tr>
                                <td width="20%">Tinggi Badan</td>
                                <td><b><input type="text" name="tinggi" required value="" id="dari" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('tinggi'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Bicara</td>
                                <td><b><input type="text" name="bicara" value="" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('bicara'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Kondisi Balita</td>
                                <td><b><textarea name="kondisi_balita" required style="width: 400px; height: 60px" class="form-control"></textarea></b>
                                    <?php echo $this->html->formError('kondisi_balita'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Tanggal</td>
                                <td><b><input type="text" name="tanggal" value="<?php echo date('d-m-Y', time()) ?>" id="tgl_lahir" required data-date-format="dd-mm-yyyy" value="" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('tanggal'); ?>
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

<!-- Modal -->
<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ambil Gambar</h4>
            </div>
            <div class="modal-body">
                <div class="content" style="overflow: hidden; height: 430px">
                    <div  class="center" id="reader" style="width:640px;height:400px;"></div>
                    <span id="read" class="center"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" id="start_webcam">Nyalakan Webcam</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo App::instance()->base_url; ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo App::instance()->base_url; ?>assets/js/qrcode/qrcode.js"></script>
<script>
    $('#tgl_lahir').datepicker()
    $(function() {
        $('#nama').keyup(function() {
            var nama = $(this).val();
            $.ajax({
                url: '<?php echo App::instance()->base_url; ?>Balita/cari/?q=' + nama,
                type: 'GET',
                async: true,
                dataType: 'json',
                success: function(msg) {
                    var data = "";
                    for (a in msg) {
                        data += "<li><a href='#' onclick=\"isiDataBalita('" + msg[a].id + "','" + msg[a].nama + "', '" + msg[a].tgl_lahir + "')\">" + msg[a].nama + "</a></li>";
                    }
                    $('#daftar_balita').html(data);
                }
            });
        })
    });

    function isiDataBalita(id, nama, umur) {
        $('#nama').val(nama);
        $('#id_balita').val(id);
        $('#umur').val(umur);
    }
</script>