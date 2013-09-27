<?php
  define('MPDF_PATH', 'c:/xampp/htdocs/CadeMeuHospital/Banco de Dados/');
  include(MPDF_PATH.'pdf.php');
  $mpdf=new mPDF();
  $mpdf->WriteHTML('Hello World');
  $mpdf->Output();
  exit();
  ?>