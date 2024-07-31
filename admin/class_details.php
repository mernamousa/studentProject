<?php 
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once 'includes/logged.php';
if (isset($_GET['id'])) {
      $sql = "SELECT * , classes.image AS classImage FROM `classes`INNER JOIN teachers ON classes.teacher_id = teachers.id WHERE classes.id =?";
      $stmt = $conn->prepare($sql);
      $id = $_GET['id'];
      $stmt->execute([$id]);
      $class = $stmt->fetch();
      if ($class === false) {
     
        header('location:classes.php');
        die();
    }

} else {
    header('location:classes.php');
    die();
  }

   /*    if (isset($_GET['id'])) {
        // $sqlclass = "SELECT * FROM `classes`INNER JOIN teachers ON classes.teacher_id = teachers.id WHERE classes.id =?";
         $sqlclass = "SELECT * FROM `classes` WHERE id =?";
         $stmtclass = $conn->prepare($sqlclass);
         $id = $_GET['id'];
         $stmtclass->execute([$id]);
         $class = $stmtclass->fetch();
         
         if ($class === false) {
     
             header('location:classes.php');
             die();
         }
     
     } else {
         header('location:classes.php');
         die();
     } */

      
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
          <div class="card bg-light border-0">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 col-10">
                <img src="../img/<?php echo $class['classImage'];?>" alt="" class="card-img" />
              </div>
              <div class="col-lg-8 col-md-6 col-12 card-body">
                <div class="mb-4 text-center py-2">
                  <h2 class="fw-semibold bg-light card-header"><?php echo $class['className'];?></h2>
                </div>
                <div class="mb-4">
                  <p class="card-text">
                    <span class="fw-bold">Teacher:</span> <?php echo $class['fullName'];?>
                  </p>
                </div>
                <div class="mb-4">
                  <p class="card-text">
                    <span class="fw-bold">Price:</span> <?php echo $class['price'];?>$
                  </p>
                </div>
                <div class="mb-4">
                  <p class="card-text">
                    <span class="fw-bold">Published:</span> <?php echo ($class['published'] === 1) ? "Yes" : "NO"; ?>
                  </p>
                </div>
                <div class="row">
                  <div class="col-md-4" style="border-top: 3px solid #198754">
                    <p class="text-success fs-5 fw-bold lh-1 pt-2">Age:</p>
                    <p class="lh-1 fw-bold"><?php echo $class['age_from'];?> - <?php echo $class['age_to'];?> Years</p>
                  </div>
                  <div class="col-md-4" style="border-top: 3px solid #fe5d37">
                    <p class="text-primary fs-5 fw-bold lh-1 pt-2">Time:</p>
                    <p class="lh-1 fw-bold"><?php echo $class['time_from'];?> - <?php echo $class['time_to'];?> </p>
                  </div>
                  <div class="col-md-4" style="border-top: 3px solid #ffc107">
                    <p class="text-warning fs-5 fw-bold lh-1 pt-2">Capacity:</p>
                    <p class="lh-1 fw-bold"><?php echo $class['capacity'];?> kids</p>
                  </div>
                </div>
                <div class="text-md-end">
                  <a href="classes.php"
                    class="btn mt-4 btn-primary text-white fs-5 fw-bold border-0 py-2 px-md-5"
                  >
                    Back to All classes
                </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
