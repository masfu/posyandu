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
                                <td width="20%">ID</td>
                                <td><input type="text" name="id_ibu" id="id" required value="" style="width: 400px" class="form-control">
                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#qrcode_modal">Baca Kartu</button>
                                    <?php echo $this->html->formError('ibu_id'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Nama</td>
                                <td><input type="text" id="nama" required value="" style="width: 400px" class="form-control">
                                    <?php 
                                    echo $this->html->formError('nama'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Usia Kandungan</td>
                                <td><input type="text" name="usia_kandungan" id="usia_kandungan" required value="" style="width: 400px" class="form-control">
                                    <?php echo $this->html->formError('usia_kandungan'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Berat Badan Sebelum</td>
                                <td><b><input type="text" name="berat_sebelum" required value="" id="berat_sebelum" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('berat_sebelum'); ?>
                                </td>
                            </tr>		
                            <tr>
                                <td width="20%">Berat Badan Sesudah</td>
                                <td><b><input type="text" name="berat_sesudah" required value="" id="dari" onchange="$('#perubahan_berat').val((parseFloat($('#berat_sebelum').val()) + parseFloat(this.value)))" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('berat_sesudah'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Perubahan Berat Badan</td>
                                <td><b><input type="text" value="" id="perubahan_berat" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('berat_sesudah'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Keluhan</td>
                                <td><b><textarea name="keluhan" required style="width: 400px; height: 60px" class="form-control"></textarea></b>
                                    <?php echo $this->html->formError('keluhan'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Asi</td>
                                <td><b><input type="text" name="asi" value="" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('asi'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Rencana Lahir</td>
                                <td><b><input type="text" name="rencana_lahir" value="" style="width: 400px" class="form-control"></b>
                                    <?php echo $this->html->formError('rencana_lahir'); ?>
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
                                    $('#start_webcam').click(function() {
                                        $('#reader').html5_qrcode(function(data) {
                                            $('#read').html('Qrcode ditemukan');
                                            kirimQrcode(data);
                                        },
                                                function(error) {
                                                    $('#read').html('Qrcode tidak ditemukan');
                                                }, function(videoError) {
                                            $('#read').html(videoError);
                                        }
                                        );
                                    });
                                    function kirimQrcode(qrcode) {

                                        $.ajax({
                                            url: "<?php echo App::instance()->base_url ?>MonitorIbu/parseQrcode",
                                            type: 'POST',
                                            async: true,
                                            data: {qrcode: qrcode},
                                            dataType: 'json',
                                            success: function(data) {
                                                $('#id').val(data.id);
                                                $('#nama').val(data.nama);
                                                $('#berat_sebelum').val(data.berat_sebelum);
                                                $('#qrcode_modal').modal('hide')
                                            }
                                        });
                                    }
</script>