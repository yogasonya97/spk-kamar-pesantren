<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
    <!-- Panggil Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Atur gaya untuk tabel */
        .container {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #000000;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #000000;
        }
        .table tbody + tbody {
            border-top: 2px solid #000000;
        }
        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }
        .table-bordered {
            border: 1px solid #000000;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
        }
        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .text-center {
            text-align: center !important;
        }
        .text-right {
            text-align: right !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Ranking Kamar Al-Fahd <br> <?= $jenisKamar;?> <br> <?= $tgl; ?></h2>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20%">
                                Rank
                            </th>
                            <th class="text-center">
                                Kamar
                            </th>
                            <th class="text-center">
                                Pembina
                            </th>
                            <th class="text-center">
                                Score
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataRank as $key => $value): ?>
                            <tr>
                                <td class="text-center">Juara <?= $key+1; ?></td>
                                <td class="text-left">
                                    <?= $value['jenisKamar'] == 'A' ? 'Akhwat':'Ikhwan'; ?><br>
                                    <strong><?= $value['namaKamar']; ?></strong><br>
                                    <?= $value['namaAsrama']; ?><br>
                                </td>
                                <td class="text-left"><?= $value['pembinaKamar']; ?></td>
                                <td class="text-center"><?= $value['jumlahNilai']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Panggil Bootstrap JS (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
