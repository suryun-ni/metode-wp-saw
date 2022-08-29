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

    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>

<body>

    <div class="header-bar">
        
        <nav class="navbar navbar-expand-lg navbar-light " style="background:#2b4353 ">

            <div class="container">
                <a class="navbar-brand" style="color: #e8630a;" href="index.php">
                    <b>Jual Hp Bekas.com</b>
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

    <div class="container">
        <div class="col-lg-12">
            <div class="row">

           

            <div class="col-lg-4 col-md-4 col-sm-4" >
            
        <h3 style="margin-top:20px;">Data Alternatif</h3>
        <button type="button" class="btn btn-primary" style="background:#2b4353 "><a style="color: #ffffff;text-decoration:none;" href="dtalternatif.php">Detail</a></button>
        <button type="button" class="btn btn-primary" style="margin-left:10px;background:#2b4353"><a style="color: #ffffff;text-decoration:none;" href="formalternatif.php">Insert</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>ID Alternatif</td>
                <td>Nama Alternatif</td>
            </tr>

            <!-- dimulainya connection -->
            <?php
            include 'config.php';
            $no = 1;
            $query = "SELECT * FROM alternatif";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['nmalternatif']; ?></td>
                </tr>
            <?php } ?>
        </table>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            
        <h3 style="margin-top:20px;">Data Kriteria</h3>
        <button type="button" class="btn btn-primary"style="background:#2b4353 "><a style="color: #ffffff;text-decoration:none;" href="dtkriteria.php">Detail</a></button>
        <button type="button" class="btn btn-primary" style="margin-left:10px;background:#2b4353"><a style="color: #ffffff;text-decoration:none;" href="formkriteria.php">Insert</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>ID Kriteria</td>
                <td>Nama Kriteria</td>
            </tr>

            <!-- dimulainya connection -->
            <?php
            include 'config.php';
            $no = 1;
            $query = "SELECT * FROM kriteria";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['nmkriteria']; ?></td>
                </tr>
            <?php } ?>
        </table>
        
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
            
        <h3 style="margin-top:20px;">Data Bobot</h3>
        <button type="button" class="btn btn-primary"style="background:#2b4353 "><a style="color: #ffffff;text-decoration:none;" href="dtbobot.php">Detail</a></button>
        <button type="button" class="btn btn-primary" style="margin-left:10px;background:#2b4353"><a style="color: #ffffff;text-decoration:none;" href="formbobot.php">Insert</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>ID Bobot</td>
                <td>ID Kriteria</td>
                <td>Value</td>
            </tr>

            <!-- dimulainya connection -->
            <?php
            include 'config.php';
            $no = 1;
            $query = "SELECT * FROM bobot";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['idbobot']; ?></td>
                    <td><?php echo $row['idkriteria']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                </tr>
            <?php } ?>
        </table>
        
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
          
        <h3 style="margin-top:20px;">Data Skala</h3>
        <button type="button" class="btn btn-primary"style="background:#2b4353 "><a style="color: #ffffff;text-decoration:none;" href="dtskala.php">Detail</a></button>
        <button type="button" class="btn btn-primary" style="margin-left:10px;background:#2b4353"><a style="color: #ffffff;text-decoration:none;" href="formskala.php">Insert</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>ID Skala</td>
                <td>Value</td>
                <td>Keterangan</td>
            </tr>

            <!-- dimulainya connection -->
            <?php
            include 'config.php';
            $no = 1;
            $query = "SELECT * FROM skala";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['idskala']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                </tr>
            <?php } ?>
        </table>
        
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
            
        <h3 style="margin-top:20px;">Data Matrix Keputusan</h3>
        <button type="button" class="btn btn-primary"style="background:#2b4353 "><a style="color: #ffffff;text-decoration:none;" href="dtmatrix.php">Detail</a></button>
        <button type="button" class="btn btn-primary" style="margin-left:10px;background:#2b4353"><a style="color: #ffffff;text-decoration:none;" href="formmatrix.php">Insert</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No</td>
                <td>ID Matrix</td>
                <td>ID Alternatif</td>
                <td>ID Bobot</td>
                <td>ID Skala</td>
            </tr>

            <!-- dimulainya connection -->
            <?php
            include 'config.php';
            $no = 1;
            $query = "SELECT * FROM matrixkeputusan";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['idmatrix']; ?></td>
                    <td><?php echo $row['idalternatif']; ?></td>
                    <td><?php echo $row['idbobot']; ?></td>
                    <td><?php echo $row['idskala']; ?></td>
                </tr>
            <?php } ?>
        </table>
        
            </div>
        </div>
        </div>
    </div>
</body>

</html>