<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pengumuman</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Isi</label>
                                    <textarea name="isi" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="poto" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button name="simpan" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $isi = htmlspecialchars($_POST['isi']);
    $poto = $_FILES['poto']['name'];
    $filepoto = rand() . ".jpg";

    $sql = "INSERT INTO pengumuman (judul, isi, poto) VALUES ('$judul', '$isi', '$filepoto')";
    $query = mysqli_query($konek, $sql);

    if ($query) {
        // Pastikan folder "../dataFoto/pengumuman/" sudah ada
        move_uploaded_file($_FILES['poto']['tmp_name'], "../img/pengumuman/" . $filepoto);
        echo "<script>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
    } else {
        echo "<script>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
    }
}
?>
