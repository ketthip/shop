<?php

$html = '
<html>
<head>
<style>
body,*{
font-family: "phetsarath";
}
table thead th {
	border-top: 0.1mm solid #000000;
	border-bottom: 0.1mm solid #000000;
}
.items td.cost {
	text-align: right;
}
.items td.toptotal {
	text-align: right;
	border-top: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
}
.items td.tdfooter {
    text-align: center;
	border-top: 0.1mm solid #000000;
    font-size: 12pt;
}

</style>
</head>
<body>
<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse;" cellpadding="4">
<thead>
<tr>
<th width="45%">ລາຍລະອຽດ</th>
<th width="15%">ຈ/ນ</th>
<th width="15%">ລາຄາ</th>
<th width="25%">ລາຄາ</th>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>
<td>Large pack Hoover bags</td>
<td align="center">1000</td>
<td class="cost">2.56</td>
<td class="cost">25.60</td>
</tr>
<tr>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="center">1</td>
<td class="cost">102.11</td>
<td class="cost">102.11</td>
</tr>
<tr>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="center">25</td>
<td class="cost">12.26</td>
<td class="cost">325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="toptotal" colspan="2"><b>ລາຄາທັງໝົດ:</b></td>
<td class="toptotal" colspan="2"><b>1882.56</b></td>
</tr>
<tr>
<td class="totals" colspan="2">ຮັບເງິນ:</td>
<td class="totals" colspan="2">100.00</td>
</tr>
<tr>
<td class="totals" colspan="2"><b>ເງິນຖອນ:</b></td>
<td class="totals" colspan="2"><b>1782.56</b></td>
</tr>
<tr>
<td class="tdfooter" colspan="4"><br><b>ຂອບໃຈທີ່ໃຊ້ບໍລິການ</b></td>
</tr>
</tbody>
</table>
</body>
</html>
';

$defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [80, 80],
    'margin_left' => 1,
	'margin_right' => 1,
	'margin_top' => 1,
	'margin_bottom' => 1,
	'margin_header' => 1,
	'margin_footer' => 1,
    'fontDir' => array_merge($fontDirs, [
        $_SERVER['DOCUMENT_ROOT'].$_ENV['HOST_FOLDER'] . '/assets/fonts'
    ]), 
    'fontdata' => $fontData + [
        "phetsarath" => [
            'R' => 'Phetsarath OT.ttf',
            'B' => 'Phetsarath OT Bold.ttf',
            'useOTL' => 0xFF,
        ]
    ],
    'default_font' => 'phetsarath'
]);

//$mpdf->SetProtection(array('print'));
/*$mpdf->SetTitle("Acme Trading Co. - Invoice");
$mpdf->SetAuthor("Acme Trading Co.");
$mpdf->SetWatermarkText("Paid");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;*/
//$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();