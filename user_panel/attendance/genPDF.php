<?php

require_once "C:/xampp/htdocs/php/IFS/user_panel/membership/PDF/vendor/autoload.php";

use Dompdf\Dompdf;

$pdf = new Dompdf();

include("C:/xampp/htdocs/php/IFS/user_panel/attendance/PDF.php");

$pdf->load_html($html);
$pdf->set_option("isRemoteEnabled", true);
$pdf->setPaper("A4", "landscape");
$pdf->render();
ob_end_clean();
$pdf->stream("Attendance.pdf", array("Attachment" => false));
