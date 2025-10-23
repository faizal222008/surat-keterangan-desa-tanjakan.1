<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_sktm'])) {
    $id = $_GET['id_request_sktm'];
    $sql = "SELECT * FROM data_request_sktm natural join data_user WHERE id_request_sktm='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id = $data['id_request_sktm'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $keperluan = $data['keperluan'];
    $request = $data['request'];
    $keterangan = $data['keterangan'];
    $status = $data['status'];
    $acc = $data['acc'];
    $format4 = date('d F Y', strtotime($acc));
    $no_surat = $data['no_surat'];
    $format5 = date('m', strtotime($tgl2));
    if ($format5 == "1") {
        $romawi = "I";
    } elseif ($format5 == "2") {
        $romawi = "II";
    } elseif ($format5 == "2") {
        $romawi = "II";
    } elseif ($format5 == "3") {
        $romawi = "III";
    } elseif ($format5 == "4") {
        $romawi = "IV";
    } elseif ($format5 == "5") {
        $romawi = "V";
    } elseif ($format5 == "6") {
        $romawi = "VI";
    } elseif ($format5 == "7") {
        $romawi = "VII";
    } elseif ($format5 == "8") {
        $romawi = "VIII";
    } elseif ($format5 == "9") {
        $romawi = "IX";
    } elseif ($format5 == "10") {
        $romawi = "X";
    } elseif ($format5 == "11") {
        $romawi = "XII";
    } elseif ($format5 == "12") {
        $romawi = "XIII";
    }

    // cek kepalada desa /lurah
    $wuery = mysqli_query($konek, "select * from data_user where hak_akses='Lurah'");
    $data_ = mysqli_fetch_array($wuery);

    if ($format4 == 0) {
        $format4 = "kosong";
    } elseif ($format4 == 1) {
        $format4;
    }

    if ($status == 3) {
        $keterangan = "Sudah ACC Lurah, surat sedang dalam proses cetak oleh staf";
    }
}
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="card-tools">
        <form action="" method="POST">
            <!-- Input tersembunyi untuk ID -->
            <input type="hidden" name="id" value="<?= $id; ?>">

            <div class="form-group">
                <label>Keterangan</label>
                <select name="dicetak" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                </select>
                <br>

                <!-- Tombol Kirim dan Cetak -->
                <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                <a href="cetak_sktm.php?id_request_sktm=<?= $id; ?>" class="btn btn-success btn-sm">Cetak</a>
            </div>
        </form>

        <?php
        // --- PROSES SAAT TOMBOL KIRIM DIKLIK ---
        if (isset($_POST['ttd']) && isset($_POST['id']) && !empty($_POST['id'])) {
            // Ambil data dari form
            $cetak = mysqli_real_escape_string($konek, $_POST['dicetak']);
            $id = mysqli_real_escape_string($konek, $_POST['id']);

            // Update data ke database
            $update = mysqli_query($konek, "
                UPDATE data_request_sktm 
                SET keterangan='$cetak', status=3 
                WHERE id_request_sktm=$id
            ");

            // Cek hasil query
            if ($update) {
                echo "<script language='javascript'>
                        swal('Berhasil!', 'Keterangan berhasil dikirim.', 'success');
                      </script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
            } else {
                echo "<script language='javascript'>
                        swal('Gagal...', 'Update data gagal!', 'error');
                      </script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_sktm">';
            }
        } elseif (isset($_POST['ttd'])) {
            // Jika tombol diklik tapi ID kosong
            echo "<script language='javascript'>
                    swal('Gagal...', 'Data tidak lengkap. Pastikan ID dikirim.', 'error');
                  </script>";
        }
        ?>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="1" align="center">
                        <table border="0" align="center">
                            <tr>
                                <td><img src="../main/img/logoku2.png" width="70" height="87" alt=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <center>
                                        <font size="4">PEMERINTAHAN KABUPATEN TANGERANG</font><br>
                                        <font size="4">KECAMATAN RAJEG</font><br>
                                        <font size="5"><b>DESA TANJAKAN</b></font><br>
                                        <font size="2"><i>VGXC+M4M, Jl. Tegal, Tanjakan, Kec. Rajeg, Kabupaten Tangerang, Banten 15540</i></font><br>
                                    </center>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="45">
                                    <hr color="black">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    <center>
                                        <font size="4"><b>SURAT KETERANGAN / PENGANTAR</b></font><br>
                                        <hr style="margin:0px" color="black">
                                        <span>Nomor : <?= $no_surat; ?> / <?= $romawi; ?> / <?= $format1; ?></span>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Lurah Wergu Wetan Kabupaten Kota <br> Kudus, Menerangkan bahwa :
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>:</td>
                                <td><?php echo $tempat . ", " . $format1; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo $jekel; ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?php echo $agama; ?></td>
                            </tr>
                            <tr>
                                <td>Status Warga</td>
                                <td>:</td>
                                <td><?php echo $status_warga; ?></td>
                            </tr>
                            <tr>
                                <td>No. NIK</td>
                                <td>:</td>
                                <td><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Keperluan</td>
                                <td>:</td>
                                <td><?php echo $keperluan; ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <?php

                                if ($request == "TIDAK MAMPU") {
                                    $request = "Surat Keterangan Tidak Mampu";
                                }

                                ?>
                                <td><?php echo $request; ?></td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan<br>&nbsp;&nbsp;&nbsp;&nbsp;untuk sebagaimana mestinya.
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <th></th>
                                <th width="100px"></th>
                                <th>Tangerang, <?php echo $format4; ?></th>
                            </tr>
                            <tr>
                                <td>Tanda tangan <br> Yang bersangkutan </td>
                                <td></td>
                                <td>Kepala Desa Tanjakan</td>
                            </tr>
                            <tr>
                                <td rowspan="15"></td>
                                <td></td>
                                <td rowspan="15"></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b style="text-transform:uppercase"><u>(<?php echo $nama; ?>)</u></b></td>
                                <td></td>
                                <td><b><u>(<?= $data_['nama']; ?>)</u></b></td>
                            </tr>
                        </table>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>