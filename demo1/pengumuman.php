<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Pengumuman</h4>
                        <a href="?halaman=add_pengumuman" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Pengumuman
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="table-responsive">
                                <table id="add" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Isi</th>
                                            <th>Poto</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $tampil = "SELECT * FROM pengumuman";
                                        $query = mysqli_query($konek, $tampil);
                                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $judul = $data['judul'];
                                            $isi = $data['isi'];
                                            $poto = $data['poto'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $judul; ?></td>
                                                <td><?php echo $isi; ?></td>
                                                <td><img src="../dataFoto/pengumuman/<?= $poto; ?>" width="100px" alt=""></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="?halaman=editpengumuman&id=<?= $data['id_pengumuman']; ?>" type="button" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="?halaman=pengumuman&id=<?= $data['id_pengumuman']; ?>" type="button" class="btn btn-link btn-danger btn-lg" data-original-title="Hapus">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "delete from pengumuman where id_pengumuman='$id'";
        $query = mysqli_query($konek, $sql);

        if ($query) {
            echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
            echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
        } else {
            echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
            echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
        }
    }
    ?>