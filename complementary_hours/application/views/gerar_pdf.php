<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
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
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CODE SYSTEM');
$pdf->SetTitle('CONTROLE DAS ATIVIDADES COMPLEMENTARES');
$pdf->SetSubject('CODE SYSTEM');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
foreach($query->result() as $q){
    $titulo = <<< OED
    <h1>CONTROLE DAS ATIVIDADES COMPLEMENTARES</h1>
    OED;

    //nome do curso
    $subtitulo = <<< OED
    <h3>$q->curso_descricao</h3>
    OED;
    
}
$pdf->WriteHTMLCell(0, 0, '', '', $titulo, 0, 1, 0, TRUE, 'C', TRUE);
$pdf->WriteHTMLCell(0, 0, '', '', $subtitulo, 0, 1, 0, TRUE, 'C', TRUE);
//Primeira parte tabela
foreach($query->result() as $q){
    $tabela1 = '<table style="border: 1px solid #000; padding:6px; ">';
        $tabela1 .= '<tr>
                        <th align="left">NOME DO ACADEMICO: '.$q->pessoa_nome.' '.$q->pessoa_sobrenome.'<br><br>SEMESTRE DE INGRESSO: '.$q->aluno_ati_semestre.'/'.$q->aluno_ati_ano.'

                        </th>
                   </tr>';

    $tabela1 .= '</table><br><br>';
}

$pdf->WriteHTMLCell(0, 0, '', '', $tabela1, 0, 1, 0, TRUE, 'C', TRUE);

foreach($query->result() as $q){
    //Segunda parte tabela
    $tabela = '<table style="border: 1px solid #000; padding:6px; ">';
    $tabela .= '<tr>
                    <th style="border: 1px solid #000; width:523px;" align="left">AS ATIVIDADES ABAIXO LISTADAS FORAM REALIZADAS NO SEMESTRE: '.$q->aluno_ati_semestre.'</th>
                    <th style="border: 1px solid #000; width:100px;" align="left">Uso exclusivo da coordenação</th>

               </tr>';
    $tabela .= '<tr style="background-color:#ccc;">
                    <th style="border: 1px solid #000; width:40px;" align="left">N°</th>
                    <th style="border: 1px solid #000; width:220px;" align="left">Descrição das atividades realizadas</th>
                    <th style="border: 1px solid #000; width:50px;" align="left">Qtde horas</th>
                    <th style="border: 1px solid #000; width:70px;" align="left">Comprovado? Sim/Não (*)</th>
                    <th style="border: 1px solid #000; width:143px;" align="left">Justificativa para atividades sem documentação comprobatória</th>
                    <th style="border: 1px solid #000; width:50px;" align="left">Horas aprov.</th>
                    <th style="border: 1px solid #000; width:50px;" align="left">Visto Coord.</th>
                </tr>';
    foreach($query->result() as $q){
        $tabela .= '<tr>
                        <td style="border: 1px solid #000; width:40px;" align="left">'.$q->aluno_ati_id.'</td>
                        <td style="border: 1px solid #000; width:220px;" align="left">'.$q->aluno_ati_descricao.'</td>
                        <td style="border: 1px solid #000; width:50px;" align="left">'.$q->aluno_ati_qtd_horas.'</td>
                        <td style="border: 1px solid #000; width:70px;" align="left">'.$q->aluno_ati_comprovado.'</td>
                        <td style="border: 1px solid #000; width:143px;" align="left">'.$q->aluno_ati_justificativa.'</td>
                        <td style="border: 1px solid #000; width:50px;" align="left">'.$q->aluno_ati_qtd_horas_aprovadas.'</td>
                        <td style="border: 1px solid #000; width:50px;" align="left">'.$q->aluno_ati_visto.'</td>
                    </tr>';
    }
    //$soma_horas = $q->aluno_ati_qtd_horas;
    $tabela .= '<tr>
                    <td style="border: 1px solid #000; width:260px;" align="left">TOTAL DE HORAS DE ATIVIDADES NO SEMESTRE</td>
                    <td style="border: 1px solid #000; width:50px;" align="left"></td>
                    <td style="border: 1px solid #000; width:213px;" align="left">TOTAL DE HORAS APROVADAS PELA COORDENAÇÃO</td>
                    <td style="border: 1px solid #000; width:50px;" align="left"></td>
                    <td style="border: 1px solid #000; width:50px;" align="left"></td>
                </tr>';
}

$tabela .= '</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $tabela, 0, 1, 0, TRUE, 'C', TRUE);


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('atividades_complementares.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>