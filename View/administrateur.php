<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/">

    <title>Hello, world!</title>
</head>

<body>

    <!-- <a href="index.php" class="btn btn-primary" role="button" data-bs-toggle="button">Insertion</a>
    <a href="music.php" class="btn btn-dark active" role="button" data-bs-toggle="button" aria-pressed="true">List of
        artist</a> -->

<main role="main">
    <div class="container" style="font-family:poppins;">
        <div class="row">
            <div class="col-md-12 mt-5">
                    <h1 class="text-center">List of Reservation</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                
<?php

      // include '../model/model.php';
      // $model = new Model();
      // $insert = $model->insert();

      include '../Controller/controller.php';
      $controllers = new controllers();
      $controllers->fetch();
      $rows = $controllers->fetch();
              $i = 1;
              if (!empty($rows)) {
                foreach ($rows as $row)
?>
                <tr>
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo $row['fin_sejour']; ?>
                    </td>
                    <td>
                        <?php echo $row['debut_sejour']; ?>
                    </td>
                     <td>
                        <?php echo $row['phone_client']; ?>
                    </td>
                    <td>
                        <?php /*echo $row['fk_user'];*/ ?>
                    </td>
                    <td>
                        <a href="read.php?id=<?php echo $row['id_client']; ?>"
                            class="btn  btn-primary btn-sm">Read</a>
                    </td>
                </tr>

                <?php
                    }
                    } 
                    else {
                    echo "no data";
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery-->
    <script src="../js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap min js -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>