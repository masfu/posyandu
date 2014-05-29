<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Monitoring Balita</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-inverse-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>MonitorBalita/tambah"><i class="icon-plus-sign icon-white"> </i> Input Monitoring Balita</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <form action="<?php echo App::instance()->base_url; ?>MonitorBalita" method="get" class="navbar-form navbar-left">
                                <?php
                                $bulan = array('1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
                                echo $this->html->dropDownList('bulan', $bulan, $bln_selected, " style=\"width: 100px\" onchange=\"this.form.submit()\" class=\"form-control\"")
                                ?>
                                <?php
                                for ($i = 2010; $i < 2025; $i++) {
                                    $tahun[$i] = $i;
                                }
                                echo $this->html->dropDownList('tahun', $tahun, $thn_selected, " style=\"width: 100px\" onchange=\"this.form.submit()\" class=\"form-control\"")
                                ?>
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
                            <th width="15%">Nama</th>
                            <th width="5%">Umur</th>
                            <th width="10%">Berat Badan</th>
                            <th width="10%">Tinggi Badan</th>
                            <th width="10%">Komunikasi</th>
                            <th width="15%">Kondisi Balita</th>
                            <th width="10%">Tanggal</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($daftar_balita as $value) : ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['nama'] ?></td>
                                <td><?php echo $value['umur'] ?></td>
                                <td><?php echo $value['berat'] ?></td>
                                <td><?php echo $value['tinggi'] ?></td>
                                <td><?php echo $value['bicara'] ?></td>
                                <td><?php echo $value['kondisi_balita'] ?></td>
                                <td><?php echo $value['tanggal'] ?></td>
                                <td>
                                    <a href="<?php echo $this->base_url . 'MonitorBalita/edit/' . $value['id'] ?>"><i class="icon-pencil"></i></a>
                                    <a href="<?php echo $this->base_url . 'MonitorBalita/hapus/' . $value['id'] ?>" class="hapus"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($daftar_balita)) : ?>
                            <tr><td style="text-align: center; font-weight: bold" colspan="9">--Data tidak ditemukan--</td></tr>	</tbody>
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