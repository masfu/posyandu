<link rel="stylesheet" href="<?php echo App::instance()->base_url; ?>assets/css/datepicker.css" media="screen">


<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Kartu Anggota Ibu</a>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row-fluid well" style="overflow: hidden">
                    <div class="col-lg-6">
                        <table width="100%" class="table-form">
                            <tr>
                                <td width="20%">Nama</td>
                                <td><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <td width="20%">Username</td>
                                <td><?php echo $username ?></td>
                            </tr>		
                            <tr>
                                <td width="20%">Tanggal Lahir</td>
                                <td><?php echo date('d-m-Y', strtotime($tgl_lahir)) ?></td>
                            </tr>
                            <tr>
                                <td width="20%">Alamat</td>
                                <td><?php echo $alamat ?></td>
                            </tr>
                            <tr>
                                <td width="20%">Foto</td>
                                <td><img alt="140x140" class="img-thumbnail" style="width: 140px; height: 140px;" src="<?php echo App::instance()->base_url . 'data/foto/' . $foto ?>">
                                    <br><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#foto_modal">ganti foto</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-thumbnail" src="<?php echo App::instance()->base_url . 'data/kartu/' . $id . '_' . $username . '.jpg' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="foto_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ambil Gambar</h4>
            </div>
            <div class="modal-body">
                <div class="content" style="overflow: hidden; height: 320px">
                    <video id="video" autoplay width="480" height="320"></video>
                    <canvas id="canvas" width="480" height="320"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" id="start_webcam">Nyalakan Webcam</button>
                <button class="btn btn-primary" id="snap">Capture</button>
                <button class="btn btn-primary" style="display: none" id="new">Ambil Baru</button>
                <button type="button" class="btn btn-primary" id="upload">Upload</button>
                <button type="button" class="btn btn-success" id="keluar_form">Keluar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Put event listeners into place
    $('#start_webcam').attr('disabled', false);
    
    $('#keluar_form').click(function(){
        $('#foto_modal').modal('hide');
    });
    
    $('#start_webcam').click(function() {
        $(this).attr('disabled', true);
        // Grab elements, create settings, etc.
        var canvas = document.getElementById("canvas"),
                context = canvas.getContext("2d"),
                video = document.getElementById("video"),
                videoObj = {"video": true},
        errBack = function(error) {
            console.log("Video capture error: ", error.code);
        };

        // Put video listeners into place
        if (navigator.getUserMedia) { // Standard
            navigator.getUserMedia(videoObj, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia(videoObj, function(stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        } else if (navigator.mozGetUserMedia) { // WebKit-prefixed
            navigator.mozGetUserMedia(videoObj, function(stream) {
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }, errBack);
        }

        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 480, 320);
            // Littel effects
            $('#video').fadeOut('fast');
            $('#canvas').fadeIn('fast');
            $('#snap').hide();
            $('#new').show();
            // Allso show upload button
            //$('#upload').show();
        });

        // Capture New Photo
        document.getElementById("new").addEventListener("click", function() {
            $('#video').fadeIn('fast');
            $('#canvas').fadeOut('fast');
            $('#snap').show();
            $('#new').hide();
        });
        // Upload image to sever 
        document.getElementById("upload").addEventListener("click", function() {
            var dataUrl = canvas.toDataURL();
            $.ajax({
                type: "POST",
                url: "<?php echo App::instance()->base_url ?>Ibu/uploadFoto",
                data: {
                    imgBase64: dataUrl,
                    username: '<?php echo $username ?>',
                    id: '<?php echo $id ?>'
                }
            }).done(function(msg) {
                $('#foto_modal').modal('hide')
                location.reload();
            });
        });
    });
</script>