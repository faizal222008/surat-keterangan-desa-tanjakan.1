<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skd'])) {
    $id = $_GET['id_request_skd'];
    $id_ajuan = $_GET['id_request_skd'];
    $sql = "SELECT * FROM data_request_skd natural join data_user WHERE id_request_skd='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id = $data['id_request_skd'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $format4 = date('m', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
    $keperluan = $data['keperluan'];
    $acc = $data['acc'];

    $no_surat = $data['no_surat'];
    $no_suratdb = $data['no_surat'];
    if ($no_surat == "") {
        $no_surat = "Belum ada no surat!";
    }

    $acc = $data['acc'];
$no_surat = $data['no_surat'];
$no_suratdb = $data['no_surat'];

if ($no_surat == "") {
    $no_surat = "Belum ada no surat!";
}

if ($format4 == "1") {
    $romawi = "I";
} elseif ($format4 == "2") {
    $romawi = "II";
} elseif ($format4 == "3") {
    $romawi = "III";
} elseif ($format4 == "4") {
    $romawi = "IV";
} elseif ($format4 == "5") {
    $romawi = "V";
} elseif ($format4 == "6") {
    $romawi = "VI";
} elseif ($format4 == "7") {
    $romawi = "VII";
} elseif ($format4 == "8") {
    $romawi = "VIII";
} elseif ($format4 == "9") {
    $romawi = "IX";
} elseif ($format4 == "10") {
    $romawi = "X";
} elseif ($format4 == "11") {
    $romawi = "XI";
} elseif ($format4 == "12") {
    $romawi = "XII";
}

    // cek kepalada desa /lurah
    $wuery = mysqli_query($konek, "select * from data_user where hak_akses='Lurah'");
    $data_ = mysqli_fetch_array($wuery);

    $format4 = date('d F Y', strtotime($acc));
    if ($acc == 0) {
        $acc = "BELUM TTD";
    } elseif ($acc == 1) {
        $acc;
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
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">No Surat</label>
                                <input type="number" name="no_surat" class="form-control" placeholder="No Surat">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="ttd" value="simpan" class="btn btn-success btn-sm" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="acc" value="acc" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ttd'])) {
                            $no_surat = $_POST['no_surat'];
                            if ($no_surat == "") {
                                echo "<script language='javascript'>swal('Gagal...', 'No surat tidak boleh kosong', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd&id_request_skd=' . $id_ajuan . '">';
                            } else {
                                $update = mysqli_query($konek, "UPDATE data_request_skd SET no_surat='$no_surat' WHERE id_request_skd=$id");
                                if ($update) {
                                    echo "<script language='javascript'>swal('Selamat...', 'No surat berhasil disimpan', 'success');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd&id_request_skd=' . $id_ajuan . '">';
                                } else {
                                    echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd">';
                                }
                            }
                        } elseif (isset($_POST['acc'])) {
                            $ket = "Surat sedang dalam proses cetak";
                            $tgl = date('Y-m-d');
                            if ($no_suratdb == "") {
                                echo "<script language='javascript'>swal('Gagal...', 'Belum ada no surat', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd&id_request_skd=' . $id_ajuan . '">';
                            } else {
                                $update2 = mysqli_query($konek, "UPDATE data_request_skd SET status=2, acc='$tgl', keterangan='$ket' WHERE id_request_skd=$id");
                                if ($update2) {
                                    echo "<script language='javascript'>swal('Selamat...', 'ACC Berhasil', 'success');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_sktm">';
                                } else {
                                    echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skd">';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="1" align="center">
                        <table border="0" align="center">
                            <tr>
                                <td><img src="../main/img/logo banten2.png" width="70" height="87" alt=""></td>
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
                                        <span>Nomor : <?= $no_surat; ?>/ <?= $romawi; ?> / <?= $format1; ?></span>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Kepala desa tanjakan <br> Rakyat, Menerangkan bahwa :
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
                                <td><?php echo $tempat . ", " . $format2; ?></td>
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
                                if ($request == "DOMISILI") {
                                    $request = "Surat Keterangan Domisili";
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
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <th></th>
                                <th width="100px"></th>
                                <th>kab tangerang, <?php echo $acc; ?></th>
                            </tr>
                            <tr>
                                <td>Tanda tangan <br> Yang bersangkutan </td>
                                <td></td>
                                <td>Kepala Tanjakan</td>
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