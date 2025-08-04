<html>
<head>

    <link rel="stylesheet" href="<?= asset('plugins/bootstrap-3.4.1/css/bootstrap.min.css') ?>">
    <style>
        @page {
            size: A4;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }
    </style>
</head>

<body style="font-family: 'Phetsarath OT';">
    <div class="container-fluid">
        <table class="table table-borderless">
            <tr>
                <td>
                    <h2>ຮ້ານຄ້າ: ...</h2>
                    <span>ທີຢູ່: ...</span>
                    <span>ເບີໂທ: ...</span>
                </td>
                <td class="text-right">
                    <h3>ໃບບິນ #12345</h3>
                    <h4>ວັນທີ: 12/01/2022</h4>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <h1>ໃບບິນຮັບເງິນ</h1>
                </td>
            </tr>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາຫົວໜ່ວຍ</th>
                    <th>ລາຄາລວມ</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
<script>
    //window.print()
</script>