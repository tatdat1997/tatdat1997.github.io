<?php
    include"../../connect/connectDB.php"; 
    session_start();
    header('Content-Type: text/html; charset=utf-8');
//============================================================+
// File name   : example_039.php
// Begin       : 2008-10-16
// Last Update : 2014-01-13
//
// Description : Example 039 for TCPDF class
//               HTML justification
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML justification
 * @author Nicola Asuni
 * @since 2008-10-18
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tên tác giả');
$pdf->SetTitle('Tiêu đề ');
$pdf->SetSubject('Chủ đề ');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, 'UTF-8');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
// set kiểu font cho file
$pdf->SetFont('dejavuserif', '', 12);
// ghi nội dung vao file PDF
$pdf->Write(0, 'Kiểm tra môn', '', 0, 'L', true, 0, false, false, 0);
// create some HTML content
    $html= '<div>';
if(isset($_POST['return'])){
    header('location: /create-quest/user/view/chooseSub.php');
}
if(isset($_POST['add_other'])){
    header('location: /create-quest/user/view/createExam.php');
}
if(isset($_POST['print'])){
    $array = array();
    $array  = $_SESSION['random'];
    $No = 1;   
    $array_ans = array();
    $a = 0;
    $A = array('A','B','C','D','E','F','G','H','I','J','K','L');
	if(isset($_SESSION['answer'])){
		$answer_json = array();
		$answer_json = $_SESSION['answer'];
		$array_json = json_decode($answer_json);
	}
    for ($i=0; $i < sizeof($array); $i++) { 
        $sql = mysqli_query($con,"SELECT * FROM tb_question WHERE id_question = '$array[$i]'");
        $row = mysqli_fetch_assoc($sql);
        $j=0;
        $html.=	'<p><b>Câu ' .$No.'. '.$row['content'].'</b></p>';
 		// for ($j=0; $j < sizeof($array_json); $j++) { 
 		$html .='<p>'.$array_json[$i].'</p>';
 		$No++;
 	}
 }
 if(isset($_POST['print_answer'])){
    $array = array();
    $array  = $_SESSION['random'];
    $No = 1;   
    $a = 0;
    $A = array('A','B','C','D','E','F','G','H','I','J','K','L');
    for ($i=0; $i < sizeof($array); $i++) { 
        $sql = mysqli_query($con,"SELECT * FROM tb_question WHERE id_question = '$array[$i]'");
        $row = mysqli_fetch_assoc($sql);
        $html.= '<p><b>Câu ' .$No.'. '.$row['content'].'</b></p>';
        $id  = $row['id_question']; 
        $sql_ans = mysqli_query($con,"SELECT * FROM tb_answer WHERE id_question = '$id'");
        $j=0;
       while ($row_ans = mysqli_fetch_assoc($sql_ans)) {
        if($row_ans['type'] == 1){
          $html .='<p><b>'.$A[$j].'. '.$row_ans['answer'].'</b></p>';
        }else{
            $html .='<p>'.$A[$j].'. '.$row_ans['answer'].'</p>';
        }
        $j++;
       }
       $No++;
    }
 }
 	
 	$html.="</div>";
$pdf->Ln();

// set UTF-8 Unicode font
$pdf->SetFont('dejavusans', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_end_clean();
$pdf->Output('dethi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
