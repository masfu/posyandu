
<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Laporan Monitoring Ibu</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-inverse-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>LaporanIbu"><i class="icon-plus-sign icon-white"> </i> Ibu</a></li>
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>LaporanIbu"><i class="icon-plus-sign icon-white"> </i> Semua</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <form action="<?php echo App::instance()->base_url; ?>Ibu" method="get" class="navbar-form navbar-left">
                                <input type="text" required="" placeholder="Kata kunci pencarian ..." value="<?php echo App::instance()->input->get('q') ?>" style="width: 200px" name="q" class="form-control">
                                <button class="btn btn-danger" type="submit"><i class="icon-search icon-white"> </i> Cari</button>
                            </form>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama</th>
                            <th width="15%">Tanggal Lahir</th>
                            <th width="30%">Alamat</th>
                            <th width="10%">Lihat Laporan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($daftar_ibu as $value) : ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['nama'] ?></td>
                                <td><?php echo $value['tgl_lahir'] ?></td>
                                <td><?php echo $value['alamat'] ?></td>
                                <td>
                                    <a href="<?php echo $this->base_url . 'LaporanIbu/ibu/' . $value['id'] ?>"><i class="icon-eye-close"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($daftar_ibu)) : ?>
                            <tr><td style="text-align: center; font-weight: bold" colspan="5">--Data tidak ditemukan--</td></tr>	</tbody>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <center><ul class="pagination"><?php echo $paging ?></ul></center>
    </div>
</div>
<script>
    $(".hapus").click(function(e) {
        var r = confirm("Apakah anda yakin ingin mengahapus user ini ");
        if (r == true)
        {
            window.location = this.href;
        }
        else
        {
            e.preventDefault();
        }

    })
</script>