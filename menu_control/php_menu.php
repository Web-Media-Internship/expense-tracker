<?php
include '../koneksi.php';
session_start();
$idu = $_SESSION['id_user'];
if(!isset($_SESSION["login"])){
    header("location: ../login.php");
    exit;
}
?>