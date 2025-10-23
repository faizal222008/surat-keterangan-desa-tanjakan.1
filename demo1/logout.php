<?php
include "../konek.php";
session_start();
session_destroy();
unset($_SESSION['username']);
header("Location:$url_index");
