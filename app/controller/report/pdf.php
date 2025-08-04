<?
$select = new database();
$mpdf = new \Mpdf\Mpdf();

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'PhetsarathOT' => [
            'R' => 'PhersarathOT.ttf',
            //'I' => 'THSarabunNew Italic.ttf',
            //'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'PhetsarathOT',
    'mode' => 'utf-8', 'format' => [80, 200]
]);

$content = "
<html>
<head>
<style>
body {font-family: 'PhetsarathOT';
	font-size: 10pt;
	}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: \".\" center;
}
</style>
</head>
<body>

<div style=\"text-align: left\">ຮ້ານເກດມະນີໄອທີ</div>

<span style=\"font-size: 7pt; color: black; font-family: PhetsarathOT;\">ທີ່ຕັ້ງ: ບ້ານພູຫົວຊ້າງ, ເມືອງອານຸວົງ, ແຂວງໄຊສົມບູນ  </span> 
<br />
<span style=\"font-size: 7pt; color: black; font-family: PhetsarathOT;\">ໂທ: 020 5519-8678 ແລະ 020 5506-4442 </span>
<div style=\"font-size: 12pt; stroke: black; text-align: center; text-decoration: underline; font-family: PhetsarathOT;\">ໃບບິນ</div>

<table class=\"items\" width=\"100%\" style=\"font-size: 9pt; border-collapse: collapse; \" cellpadding=\"8\">
<thead>
<tr>
<td width=\"50%\">ສິນຄ້າ</td>
<td width=\"18%\">ຈ/ນ</td>
<td width=\"28%\">ລາຄາ</td>
<td width=\"28%\">ລວມ</td>
</tr>
</thead>
<tbody>";

$content .= "</tbody>
</table>
    <div style=\"font-size: 9pt; color: black; font-family: PhetsarathOT;text-align: right\">ລວມເງິນທັງໝົດ: </div>
    <div style=\"font-size: 7pt; color: black; font-family: PhetsarathOT;text-align: right\">ເງິນທີ່ໄດ້ຮັບ: </div>
    <div style=\"font-size: 7pt; color: black; font-family: PhetsarathOT;text-align: right\">ເງິນທອນ: </div>
<div style=\"text-align: center; font-style: italic;\">ຂອບໃຈທີ່ໃຊ້ບໍລິການ</div>
</body>
</html>
";


echo 555;

$mpdf->WriteHTML($content);
$mpdf->Output();