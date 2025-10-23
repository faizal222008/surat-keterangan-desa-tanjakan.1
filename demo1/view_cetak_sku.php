<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
if (isset($_GET['id_request_sku'])) {
    $id = $_GET['id_request_sku'];
    $sql = "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE id_request_sku='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);

    if ($data) {
        $id = $data['id_request_sku'];
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = isset($data['tanggal_request']) && !empty($data['tanggal_request']) 
            ? $data['tanggal_request'] 
            : date('Y-m-d'); // default ke tanggal hari ini jika kosong

        // Format tanggal
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));

        // Data lainnya
        $agama = $data['agama'];
        $jekel = $data['jekel'];
        $alamat = $data['alamat'];
        $status_warga = $data['status_warga'];
        $request = $data['request'];
        $keterangan = $data['keterangan'];
        $status = $data['status'];
        $usaha = $data['usaha'];
        $keperluan = $data['keperluan'];
        $acc = $data['acc'];

        // Format tanggal ACC (jika ada)
        $format4 = !empty($acc) ? date('d F Y', strtotime($acc)) : "Belum ACC";

        // Update keterangan jika status = 3
        if ($status == 3) {
            $keterangan = "Sudah ACC Lurah, surat sedang dalam proses cetak oleh staf";
        }

        // Cek nomor surat
        $no_surat = isset($data['no_surat']) && $data['no_surat'] != '' 
            ? $data['no_surat'] 
            : "Belum ada no surat!";

        // Ubah bulan ke romawi (aman dari error)
        $format5 = date('m', strtotime($tgl2));
        $romawi = [
            "01" => "I", "02" => "II", "03" => "III", "04" => "IV",
            "05" => "V", "06" => "VI", "07" => "VII", "08" => "VIII",
            "09" => "IX", "10" => "X", "11" => "XI", "12" => "XII"
        ][$format5] ?? "-";

        // Ambil data lurah
        $wuery = mysqli_query($konek, "SELECT * FROM data_user WHERE hak_akses='Lurah'");
        $data_ = mysqli_fetch_array($wuery);
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
                                <label>Keterangan</label>
                                <select name="dicetak" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                                </select><br>
                                <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                                <a href="cetak_sku.php?id_request_sku=<?= $id; ?>" class="btn btn-primary btn-sm">Cetak</a>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['ttd'])) {
                            $cetak = $_POST['dicetak'];
                            $update = mysqli_query($konek, "UPDATE data_request_sku SET keterangan='$cetak', status=3 WHERE id_request_sku=$id");
                            if ($update) {
                                echo "<script>swal('Berhasil!', 'Kirim Berhasil', 'success');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=surat_dicetak">';
                            } else {
                                echo "<script>swal('Gagal!', 'Kirim Gagal', 'error');</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian tampilan surat -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="0" align="center">
                        <tr>
                            <td><img src="../main/img/logoku2.png" width="70" height="87" alt=""></td>
                            <td>
                                <center>
                                    <font size="4">PEMERINTAHAN KABUPATEN TANGERANG</font><br>
                                    <font size="4">KECAMATAN RAJEG</font><br>
                                    <font size="5"><b>DESA TANJAKAN</b></font><br>
                                    <font size="2"><i>VGXC+M4M, Jl. Tegal, Tanjakan, Kec. Rajeg, Kabupaten Tangerang, Banten 15540</i></font><br>
                                </center>
                            </td>
                        </tr>
                        <tr><td colspan="2"><hr color="black"></td></tr>
                    </table>

                    <center>
                        <font size="4"><b>SURAT KETERANGAN / PENGANTAR</b></font><br>
                        <hr style="margin:0px" color="black">
                        <span>Nomor : <?= $no_surat; ?> / <?= $romawi; ?> / <?= $format1; ?></span>
                    </center>
                    <br><br>

                    <p style="text-align: justify;">
                        Yang bertanda tangan di bawah ini Kepala Desa Tanjakan menerangkan bahwa:
                    </p>

                    <table border="0" align="center" width="80%">
                        <tr><td width="150">Nama</td><td>:</td><td><?= $nama; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?= $tempat . ", " . $format2; ?></td></tr>
                        <tr><td>Jenis Kelamin</td><td>:</td><td><?= $jekel; ?></td></tr>
                        <tr><td>Agama</td><td>:</td><td><?= $agama; ?></td></tr>
                        <tr><td>Status Warga</td><td>:</td><td><?= $status_warga; ?></td></tr>
                        <tr><td>No. NIK</td><td>:</td><td><?= $nik; ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?= $alamat; ?></td></tr>
                        <tr><td>Usaha</td><td>:</td><td><?= $usaha; ?></td></tr>
                        <tr><td>Keperluan</td><td>:</td><td><?= $keperluan; ?></td></tr>
                        <tr><td>Keterangan</td><td>:</td><td><?= $request == "USAHA" ? "Surat Keterangan Usaha" : $request; ?></td></tr>
                    </table>

                    <br><p>Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan sebagaimana mestinya.</p>

                    <table border="0" align="center" width="80%">
                        <tr>
                            <td width="50%"></td>
                            <td>
                                <center>
                                    Tangerang, <?= $format3; ?><br>
                                    Kepala Desa Tanjakan<br><br><br><br>
                                    <b><u>(<?= $data_['nama']; ?>)</u></b>
                                </center>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
