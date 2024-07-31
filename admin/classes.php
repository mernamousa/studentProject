<?php 
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once 'includes/logged.php';
  
      //$sql = " SELECT * FROM `classes`INNER JOIN teachers ON classes.teacher_id = teachers.id";
      //$sql ="SELECT * FROM `classes` INNER JOIN teachers ON teachers.id * classes.teacher_id ";
     //$sql='SELECT classes.id AS classId, teachers.id AS teacherID  FROM classes LEFT JOIN teachers On  teachers.id = classes.teacher_id ';
      $sql='SELECT classes.id AS classId, teachers.id AS teacherID ,classes.regDate,classes.className,classes.published,teachers.fullName FROM classes INNER JOIN teachers On  teachers.id = classes.teacher_id ';
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $classes = $stmt->fetchAll(); 

      
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
          <h2 class="fw-bold fs-2 mb-5 pb-2">All Classes</h2>
          <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Registration Date</th>
                <th scope="col">Class Name</th>
                <th scope="col">Teacher</th>
                <th scope="col">Published</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($classes as $class){?>
              <tr>
                <th scope="row"><?php echo date("d-m-Y", strtotime($class['regDate']));?></th>
                <td><a href="class_details.php?id=<?php echo $class['classId']; ?>"><?php echo $class['className'];?></a></td>

                <td><?php echo $class['fullName']; ?></td> 
                <td><?php echo ($class['published'] === 1) ? "Yes" : "NO"; ?></td>
                <td><a href="edit_class.php?id=<?php echo $class['classId']; ?>" class="text-decoration-none"><i>✒️</i></a></td>
                <td><a href="includes/deleteClass.php?id=<?php echo $class['classId']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="text-decoration-none"><img src="../img/trash-bin.png" alt="" style="max-width: 35px"></a></td>
              </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
