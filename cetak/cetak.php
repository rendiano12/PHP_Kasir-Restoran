<?php 
session_start();
require_once 'dompdf/autoload.inc.php';
if (!isset($_SESSION["akun-admin"])) {
    if (isset($_SESSION["akun-user"])) {
    	echo "<script>
            alert('Cetak data hanya berlaku untuk admin!');
            location.href = '../index.php';
        </script>";
        exit;
    } else {
        header("Location: ../login.php");
        exit;
    }
}

ob_start();
include "page.php";
$html = ob_get_clean();

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('pesan.pdf', array('Attachment' => 0)); //display pdf