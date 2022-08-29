<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jual Hp Bekas.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</head>

<body>
<div class="header-bar">
        
        <nav class="navbar navbar-expand-lg navbar-light " style="background:#2b4353 ">

            <div class="container">
                <a class="navbar-brand" style="color: #e8630a;" href="index.php">
                    <b>Jual Hp Bekas.com </b>
                </a>
                <div class="collapse navbar-collapse" style="margin-left:700px;" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #e8630a;" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #e8630a;" href="result.php?metode=saw">SAW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #e8630a;" href="result.php?metode=wp">WP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #e8630a;" href="result.php?metode=topsis">TOPSIS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #e8630a;" href="result.php?metode=multimoora">MULTIMOORA</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <?php
    // include 'config.php';
    $url = $_GET['metode'];

    if ($url == 'saw') { ?>
        <div class="container">

            <h3 style="margin-top:20px;">Nilai MAX</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>Rangking</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT idalternatif,nmalternatif,SUM(prangking) AS rangking FROM vprangking GROUP BY idalternatif ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['rangking']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <h3 style="margin-top:20px;">Matrix Keputusan</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT matrixkeputusan.idmatrix,alternatif.*,kriteria.*,bobot.idbobot,bobot.value,skala.value AS nilai,skala.keterangan
                 FROM matrixkeputusan,skala,bobot,kriteria,alternatif 
                 WHERE matrixkeputusan.idalternatif=alternatif.idalternatif AND matrixkeputusan.idbobot=bobot.idbobot
                  AND matrixkeputusan.idskala=skala.idskala AND kriteria.idkriteria=bobot.idkriteria ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Normalisasi</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Normalisasi</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.`*`,
                CASE vmatrixkeputusan.idkriteria
                    WHEN 3 THEN
                    (nilaimax.maksimum/vmatrixkeputusan.nilai) 
                    ELSE
                    (vmatrixkeputusan.nilai/nilaimax.maksimum) 
                END AS normalisasi FROM vmatrixkeputusan,nilaimax WHERE nilaimax.idkriteria=vmatrixkeputusan.idkriteria 
                GROUP BY vmatrixkeputusan.idmatrix ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Prarangking</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Normalisasi</td>
                    <td>Prarangking</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vnormalisasi.*,(vnormalisasi.value*vnormalisasi.normalisasi) AS pranking FROM vnormalisasi 
                GROUP BY vnormalisasi.idmatrix";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                        <td><?php echo $row['pranking']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Rangking</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>Rangking</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT idalternatif,nmalternatif,SUM(prangking) AS ranking FROM vprangking GROUP BY idalternatif  ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['ranking']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else if ($url == 'wp') { ?>
        <div class="container">
            <h3 style="margin-top:20px;">WP Jumlah Bobot</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>Jumlah</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $query = "SELECT SUM(value) AS jumlah FROM bobot ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $row['jumlah']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">WP Nilai S</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>Nilai S</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT idalternatif,nmalternatif,EXP(SUM(LOG(wp_pangkat.pangkat))) AS nilaiS FROM wp_pangkat GROUP BY idalternatif; ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['nilaiS']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">WP Nilai V</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>Nilai V</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT wp_nilais.idalternatif,wp_nilais.nmalternatif,(nilaiS/jum) AS nilaiv FROM wp_nilais,wp_sums ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['nilaiv']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">WP Normalisasi Terbobot</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Bobot</td>
                    <td>ID Kriteria</td>
                    <td>Value</td>
                    <td>Jumlah</td>
                    <td>Normalisasi W</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT bobot.*,wp_jumbobot.jumlah,(bobot.value/wp_jumbobot.jumlah) AS normalisasi_w FROM bobot,wp_jumbobot ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td><?php echo $row['normalisasi_w']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">WP Pangkat</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Normalisasi W</td>
                    <td>Pangkat</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.*,wp_normalisasiterbobot.normalisasi_w,
                    CASE vmatrixkeputusan.idkriteria
                    WHEN 3 THEN
                    POW(vmatrixkeputusan.nilai,(wp_normalisasiterbobot.normalisasi_w*-1))
                    ELSE
                    POW(vmatrixkeputusan.nilai,wp_normalisasiterbobot.normalisasi_w)
                    END
                     AS pangkat FROM vmatrixkeputusan, 
                     wp_normalisasiterbobot WHERE wp_normalisasiterbobot.idkriteria=vmatrixkeputusan.idkriteria
                     GROUP BY vmatrixkeputusan.idmatrix;";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['normalisasi_w']; ?></td>
                        <td><?php echo $row['pangkat']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">WP SUMS</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>Jumlah</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $query = "SELECT SUM(wp_nilais.nilaiS) AS jum FROM wp_nilais ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $row['jum']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php } else if ($url == 'topsis') { ?>
        <div class="container">
            <h3 style="margin-top:20px;">Topsis Pembagi</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>Pangkat</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.idkriteria,vmatrixkeputusan.nmkriteria,SQRT(SUM(POW(vmatrixkeputusan.nilai,2)))
                 AS bagi FROM vmatrixkeputusan GROUP BY vmatrixkeputusan.idkriteria";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['bagi']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Topsis Normalisasi</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Normalisasi</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.*,(vmatrixkeputusan.nilai/topsis_pembagi.bagi) AS normalisasi 
                FROM vmatrixkeputusan,topsis_pembagi WHERE topsis_pembagi.idkriteria=vmatrixkeputusan.idkriteria GROUP BY vmatrixkeputusan.idmatrix ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Topsis Terbobot</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Normalisasi</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT topsis_normalisasi.*,(bobot.value*topsis_normalisasi.normalisasi) AS terbobot FROM topsis_normalisasi,bobot WHERE bobot.idkriteria=topsis_normalisasi.idkriteria ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Topsis MaxMin</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>Maximum</td>
                    <td>Minimum</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT topsis_terbobot.idmatrix,topsis_terbobot.idkriteria,topsis_terbobot.nmkriteria,

                CASE topsis_terbobot.idkriteria
                    WHEN 3 THEN
                    MIN(topsis_terbobot.terbobot) 
                    ELSE
                    MAX(topsis_terbobot.terbobot)
                END AS maximum,
                CASE topsis_terbobot.idkriteria
                    WHEN 3 THEN
                    MAX(topsis_terbobot.terbobot) 
                    ELSE
                    MIN(topsis_terbobot.terbobot)
                END AS minimum
                FROM topsis_terbobot GROUP BY
                topsis_terbobot.idkriteria  ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['maximum']; ?></td>
                        <td><?php echo $row['minimum']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Topsis SIP SIN</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Dplus</td>
                    <td>Dmin</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "
                SELECT topsis_terbobot.idalternatif, SQRT(SUM(POW((topsis_maxmin.maximum - topsis_terbobot.terbobot),2)))
                AS dplus, SQRT(SUM(POW((topsis_maxmin.minimum - topsis_terbobot.terbobot),2))) AS dmin FROM topsis_terbobot,topsis_maxmin WHERE
                topsis_terbobot.idkriteria GROUP BY topsis_terbobot.idalternatif 
                
                ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['dplus']; ?></td>
                        <td><?php echo $row['dmin']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Topsis Nilai Preferensi Alternatif ( V )</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Alternatif</td>
                    <td>Dplus</td>
                    <td>Dmin</td>
                    <td>Nilai V</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT topsis_sipsin.*,(topsis_sipsin.dmin/(topsis_sipsin.dplus+topsis_sipsin.dmin)) AS nilaiv FROM topsis_sipsin ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['dplus']; ?></td>
                        <td><?php echo $row['dmin']; ?></td>
                        <td><?php echo $row['nilaiv']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php } else if ($url == 'multimoora') { ?>
        <div class="container">
            <h3 style="margin-top:20px;">Multimoora 1</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Pra</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.`*`,SQRT(SUM(POW(vmatrixkeputusan.nilai,2))) AS pra 
                FROM 
                vmatrixkeputusan GROUP BY vmatrixkeputusan.idkriteria  ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['pra']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Multimoora 2</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Pra</td>
                    <td>Normalisasi</td>
                </tr>
                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT vmatrixkeputusan.*,multimoora_1.pra, (vmatrixkeputusan.nilai/multimoora_1.pra) AS normalisasi FROM 
                vmatrixkeputusan,multimoora_1 WHERE multimoora_1.idkriteria=vmatrixkeputusan.idkriteria ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['pra']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Multimoora 3</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>
                    <td>Nama Alternatif</td>
                    <td>ID Kriteria</td>
                    <td>Nama Kriteria</td>
                    <td>ID Bobot</td>
                    <td>Value</td>
                    <td>Nilai</td>
                    <td>Keterangan</td>
                    <td>Pra</td>
                    <td>Normalisasi</td>
                    <td>Normalisasi Bobot</td>
                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT multimoora_2.*,
                CASE multimoora_2.idkriteria
                    WHEN 3 THEN
                     (-1 * multimoora_2.normalisasi * multimoora_2.value)
                    ELSE
                 (multimoora_2.normalisasi * multimoora_2.value)
                END AS normalisasibobot FROM multimoora_2
                GROUP BY multimoora_2.idmatrix  ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idmatrix']; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['nmalternatif']; ?></td>
                        <td><?php echo $row['idkriteria']; ?></td>
                        <td><?php echo $row['nmkriteria']; ?></td>
                        <td><?php echo $row['idbobot']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['pra']; ?></td>
                        <td><?php echo $row['normalisasi']; ?></td>
                        <td><?php echo $row['normalisasibobot']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h3 style="margin-top:20px;">Multimoora 4</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>ID Matrix</td>
                    <td>ID Alternatif</td>

                </tr>

                <!-- dimulainya connection -->
                <?php
                include 'config.php';
                $no = 1;
                $query = "SELECT multimoora_3.idalternatif,SUM(multimoora_3.normalisasibobot) AS hasil FROM multimoora_3 GROUP BY multimoora_3.idalternatif ";
                $result = $conn->query($query);
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['idalternatif']; ?></td>
                        <td><?php echo $row['hasil']; ?></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="container">
            <h3>Anda belum memasukkan $_GET. Contoh seperti result.php?metode=saw</h3>
        </div>
    <?php } ?>
</body>


</html>