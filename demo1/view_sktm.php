<?php
include '../konek.php';
date_default_timezone_set('Asia/Jakarta');

// --- Inisialisasi variabel default biar gak warning ---
$no_surat = $romawi = $format1 = $formatAcc = $nama = $tempat = $format2 = $jekel = $agama = $status_warga = $nik = $alamat = $keperluan = '';
$data_kades = ['nama' => ''];
$request = '';

// --- Ambil data berdasarkan ID request ---
if (isset($_GET['id_request_sktm'])) {
    $id = intval($_GET['id_request_sktm']);

    $sql = "SELECT * FROM data_request_sktm 
            NATURAL JOIN data_user 
            WHERE id_request_sktm='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($data) {
        $nik = $data['nik'] ?? '';
        $nama = $data['nama'] ?? '';
        $tempat = $data['tempat_lahir'] ?? '';
        $tgl1 = $data['tanggal_lahir'] ?? '';
        $tgl2 = $data['tanggal_request'] ?? '';
        $agama = $data['agama'] ?? '';
        $jekel = $data['jekel'] ?? '';
        $alamat = $data['alamat'] ?? '';
        $status_warga = $data['status_warga'] ?? '';
        $keperluan = $data['keperluan'] ?? '';
        $acc = $data['acc'] ?? 0;
        $no_surat = $data['no_surat'] ?? '';

        if ($no_surat == "") $no_surat = "Belum ada no surat!";

        // Format tanggal
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl1));
        $bulan = date('m', strtotime($tgl2));

        // Romawi bulan
        $romawiList = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
        $romawi = $romawiList[intval($bulan)-1] ?? '';

        // Data Kepala Desa
        $query_kades = mysqli_query($konek, "SELECT * FROM data_user WHERE hak_akses='Lurah' LIMIT 1");
        $data_kades = mysqli_fetch_array($query_kades, MYSQLI_ASSOC);

        // Format tanggal acc
        $formatAcc = date('d F Y', strtotime($tgl2));
    } else {
        echo "<script>alert('Data tidak ditemukan!');</script>";
    }
}
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div><h2 class="text-white pb-2 fw-bold"></h2></div>
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
                                <label>No Surat</label>
                                <input type="number" name="no_surat" class="form-control" placeholder="No Surat" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="ttd" value="Simpan" class="btn btn-success btn-sm">
                                <input type="submit" name="acc" value="ACC" class="btn btn-primary btn-sm">
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['ttd'])) {
                            $no_surat = $_POST['no_surat'];
                            if ($no_surat == "") {
                                echo "<script>swal('Gagal...', 'No surat tidak boleh kosong', 'error');</script>";
                            } else {
                                $update = mysqli_query($konek, "UPDATE data_request_sktm SET no_surat='$no_surat' WHERE id_request_sktm=$id");
                                echo $update
                                    ? "<script>swal('Berhasil', 'No surat berhasil disimpan', 'success');</script>"
                                    : "<script>swal('Gagal...', 'Update gagal', 'error');</script>";
                            }
                        }

                        if (isset($_POST['acc'])) {
                            $ket = "Surat sedang dalam proses cetak";
                            $tgl = date('Y-m-d');
                            if ($no_surat == "" || $no_surat == "Belum ada no surat!") {
                                echo "<script>swal('Gagal...', 'Belum ada no surat', 'error');</script>";
                            } else {
                                $update2 = mysqli_query($konek, "UPDATE data_request_sktm SET status=2, acc='$tgl', keterangan='$ket' WHERE id_request_sktm=$id");
                                echo $update2
                                    ? "<script>swal('Berhasil', 'ACC Berhasil', 'success');</script>"
                                    : "<script>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian cetak surat -->
    <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="0" align="center">
                        <tr>
                            <td><img src="../main/img/logo banten2.png" width="70" height="87" alt=""></td>
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

                    <p>Yang bertanda tangan di bawah ini Kepala Desa Tanjakan Kecamatan Rajeg Kabupaten Tangerang, menerangkan bahwa:</p>
                    <table>
                        <tr><td>Nama</td><td>:</td><td><?= $nama; ?></td></tr>
                        <tr><td>TTL</td><td>:</td><td><?= $tempat; ?>, <?= $format2; ?></td></tr>
                        <tr><td>Jenis Kelamin</td><td>:</td><td><?= $jekel; ?></td></tr>
                        <tr><td>Agama</td><td>:</td><td><?= $agama; ?></td></tr>
                        <tr><td>Status Warga</td><td>:</td><td><?= $status_warga; ?></td></tr>
                        <tr><td>No. NIK</td><td>:</td><td><?= $nik; ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?= $alamat; ?></td></tr>
                        <tr><td>Keperluan</td><td>:</td><td><?= $keperluan; ?></td></tr>
                        <tr><td>Keterangan</td><td>:</td><td>Surat Keterangan Tidak Mampu</td></tr>
                    </table>

                    <br><p>Demikian surat ini diberikan agar dapat dipergunakan sebagaimana mestinya.</p>
                    <br>

                    <table align="center">
                        <tr>
                            <td></td>
                            <td>saumin, <?= $formatAcc; ?></td>
                        </tr>
                        <tr>
                            <td>Tanda tangan yang bersangkutan</td>
                            <td>Kepala Desa Tanjakan</td>
                        </tr>
                        <tr><td height="70px"></td></tr>
                        <tr>
                            <td><b><u>(<?= $nama; ?>)</u></b></td>
                            <td><b><u>(<?= $data_kades['nama']; ?>)</u></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
