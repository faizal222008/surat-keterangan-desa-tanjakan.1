<?php
date_default_timezone_set('Asia/Jakarta');
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_balai_desa_tanjakan';

$konek = mysqli_connect($hostname, $username, $password, $database);
$url_index = "http://localhost:surat-keterangan-desa-tanjakan";
