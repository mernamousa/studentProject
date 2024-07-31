<?php 
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once 'includes/logged.php';
  
      $sql = " SELECT * FROM `makeappoientment`";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $appoientments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/main.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <main>
    <?php
      require_once "includes/nav.php";
    ?>

      <div class="container my-5">
        <div class="bg-light p-5 rounded">
          <h2 class="fw-bold fs-2 mb-5 pb-2">All Appointments</h2>
          <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Registration Date</th>
                <th scope="col">gurdian Name</th>
                <th scope="col">gurdianEmail</th>
                <th scope="col">childName</th>
                <th scope="col">childAge</th>
                <th scope="col">message</th>
                <th scope="col">accept</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php  foreach($appoientments as $app){ ?>
              <tr>
                <th scope="row"><?php echo date("d-m-Y", strtotime($app['regDate'])); ?></th>
                <td><?php echo $app['gurdianName']; ?></td>
                <td><?php echo $app['gurdianEmail']; ?></td>
                <td><?php echo $app['childName']; ?></td>
                <td><?php echo $app['childAge']; ?></td>
                <td><?php echo $app['message']; ?></td>
                <td><?php echo ($app['accept'] === 1) ? "Yes" : "NO"; ?></td>
                <td><a href="edit_appointment.php?id=<?php echo $app['id']; ?>" class="text-decoration-none"><i>✒️</i></a></td>
                <td><a href="includes/deleteAppointment.php?id=<?php echo $app['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="text-decoration-none"><img src="../img/trash-bin.png" alt="" style="max-width: 35px"></a></td>
              </tr>
              <?php  } ?>
              
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
