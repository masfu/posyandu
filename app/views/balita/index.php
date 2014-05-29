
<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Daftar Balita</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-inverse-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>Balita/tambah"><i class="icon-plus-sign icon-white"> </i> Tambah Data Balita</a></li>
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
                            <th width="10%">Nama</th>
                            <th width="10%">Tanggal Lahir</th>
                            <th width="15%">Alamat</th>
                            <th width="10%">Ibu</th>
                            <th width="10%">Berat Lahir</th>
                            <th width="10%">Tinggi Lahir</th>
                            <th width="10%">Jenis Kelamin</th>
                            <th width="5%">Anak Ke</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($daftar_balita as $value) : ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['nama'] ?></td>
                                <td><?php echo $value['tgl_lahir'] ?></td>
                                <td><?php echo $value['alamat'] ?></td>
                                <td><?php echo $value['ibu'] ?></td>
                                <td><?php echo $value['berat_lahir'] ?></td>
                                <td><?php echo $value['tinggi_lahir'] ?></td>
                                <td><?php echo $value['jenis_kelamin'] ?></td>
                                <td><?php echo $value['anak_ke'] ?></td>
                                <td><a href="<?php echo App::instance()->base_url . 'Balita/edit/' . $value['id'] ?>"><i class="icon-pencil"></i></a>
                                    <a href="<?php echo App::instance()->base_url . 'Balita/hapus/' . $value['id'] ?>" class="hapus"><i class="icon-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($daftar_balita)) : ?>
                            <tr><td style="text-align: center; font-weight: bold" colspan="10">--Data tidak ditemukan--</td></tr>	</tbody>
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