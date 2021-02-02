<?php

$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Kartu Indeks');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('E-Arsip');
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

// <tr>
//         <td width="430"></td>
//         <th width="auto" align="center">
//             <div style="background-color: red; height: 50px">'.$dataArsip->indeks.'</div>
//         </th>
//     </tr>

$html = '

<table border="0" cellpadding="10">
    <tr>
        <th colspan="2" align="center" style="font-weight: bold; font-size: 1.5em; ">KARTU INDEKS</th>
    </tr>
</table>
<table border="0" cellpadding="0">
    <tr>
        <td width="430"></td>
        <th width="auto" style="background-color: #a4c4e3; line-height: 30px; border: 1px solid #7fa5ca" align="center">
            '.$dataArsip->indeks.'
        </th>
    </tr>
</table>

<table cellpadding="10" style="background-color: #a4c4e3; border: 3px solid #7fa5ca">
    <tr>
        <td width="100">Judul Surat</td>
        <td width="25">:</td>
        <td width="auto">'.$dataArsip->dari_kepada.'</td>
    </tr>
    <tr>
        <td width="100">No. Surat</td>
        <td width="25">:</td>
        <td width="auto">'.$dataArsip->no_surat.'</td>
    </tr>
    <tr>
        <td width="100">Tgl. Surat</td>
        <td width="25">:</td>
        <td width="auto">'.date("d-m-Y", strtotime($dataArsip->tgl_surat)).'</td>
    </tr>
    <tr>
        <td width="100">Kode Surat</td>
        <td width="25">:</td>
        <td width="auto">'.$dataArsip->perihal.'</td>
    </tr>
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('kartu-indeks-'.$dataArsip->id_arsip.'.pdf', 'I');