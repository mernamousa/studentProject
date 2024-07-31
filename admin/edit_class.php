<?php
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once "includes/logged.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
	$sql ='UPDATE `classes` SET `className`=?,`price`=?,`capacity`=?,`age_from`=?,`age_to`=?,`time_from`=?,`time_to`=?,`teacher_id`=?,`published`=? ,`image`=? WHERE `id`=?';
	$stmt = $conn->prepare($sql);
	$className= $_POST['className'];
    $price= $_POST['price'];
    $capacity= $_POST['capacity'];
    $age_from= $_POST['age_from'];
    $age_to= $_POST['age_to'];
    $time_from= $_POST['time_from'];
    $time_to= $_POST['time_to'];
    $teacher_id= $_POST['teacher_id'];
      
	if(isset($_POST['published'])){
		$published =1;
	}else{
		$published = 0;
	}
  $oldImage=$_POST['oldImage'];
	require_once "includes/UpdateImage.php";
  $id= $_POST['id'];
  
	$stmt->execute([$className, $price, $capacity, $age_from, $age_to, $time_from, $time_to, $teacher_id,$published, $image_name, $id]); 

  echo 'the class is updated';
  header('location:classes.php');
        die(); 
}  

if (isset($_GET['id'])) {
  $sqlclass='SELECT classes.id AS classId, teachers.id AS teacherID ,
  classes.regDate,
  classes.className,
  classes.published,
  classes.price,
  classes.capacity,
  classes.age_from,
  classes.age_to,
  classes.time_from,
  classes.time_to,
  classes.teacher_id,
  classes.image,
  teachers.fullName
   FROM classes INNER JOIN teachers On  teachers.id = classes.teacher_id WHERE classes.id =?';
   // $sqlclass = "SELECT * FROM `classes`INNER JOIN teachers ON classes.teacher_id = teachers.id WHERE classes.id =?";
    //$sqlclass = "SELECT * FROM `classes` LEFT JOIN teachers ON classes.teacher_id = teachers.id WHERE classes.id =?";
    $stmtclass = $conn->prepare($sqlclass);
    $id = $_GET['id'];
    $stmtclass->execute([$id]);
    $class = $stmtclass->fetch();
    


    $sqlteachers = " SELECT * FROM `teachers`";
    $stmtteacher= $conn->prepare($sqlteachers);
    $stmtteacher->execute();
    $teachers = $stmtteacher->fetchAll(); 
    
    if ($class === false) {

        header('location:classes.php');
        die();
    }

} else {
    header('location:classes.php');
    die();
}

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
          <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Class</h2>
          <form action="" method="POST" class="px-md-5" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $class['classId'] ?>">
          <input type="hidden" name="oldImage" value="<?php echo $class['image'] ?>">
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Class Name:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. Art & Design"
                  class="form-control py-2"
                  name='className'
                  value='<?php echo $class["className"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Teacher:</label
              >
              <div class="col-md-10">
            <select class="form-control py-1"  name="teacher_id">
              <option>Select teacher</option>
			          <?php  foreach($teachers as $teacher){ ?>
              <option value="<?php echo $teacher['id']; ?>"
              <?php echo ($teacher['id'] == $class['teacher_id']) ? "selected" :" "; ?> >
              <?php echo $teacher['fullName']; ?>
              </option>
			         <?php 
                }
                ?>
            
              </select>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Price:</label
              >
              <div class="col-md-10">
                <input
                  type="number"
                  step="0.1"
                  placeholder="Enter price"
                  class="form-control py-2"
                  name='price'
                  value='<?php echo $class["price"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Capacity:</label
              >
              <div class="col-md-10">
                <input
                  type="number"
                  step="1"
                  placeholder="Enter catpacity"
                  class="form-control py-2"
                  name='capacity'
                  value='<?php echo $class["capacity"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Age:</label
              >
              <div class="col-md-10">
                <label for="" class="form-label">From <input type="number" class="form-control"name='age_from'
                value='<?php echo $class["age_from"]; ?>'></label>
                <label for="" class="form-label">To <input type="number" class="form-control"name='age_to'
                value='<?php echo $class["age_to"]; ?>'></label>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Time:</label
              >
              <div class="col-md-10">
                <label for="" class="form-label">From <input type="time" class="form-control"name='time_from'
                value='<?php echo $class["time_from"]; ?>'></label>
                <label for="" class="form-label">To <input type="time" class="form-control"name='time_to'
                value='<?php echo $class["time_to"]; ?>'></label>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Published:</label
              >
              <div class="col-md-10">
                <input
                  type="checkbox"
                  class="form-check-input"
                  style="padding: 0.7rem;"
                  name='published'
                  <?php echo ($class['published'] === 1) ? "checked" : ""; ?>
                />
              </div>
            </div>
            <hr>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Image:</label
              >
              <div class="col-md-10">
                <input
                  type="file"
                  class="form-control"
                  style="padding: 0.7rem;"
                  name='image'
                />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-md-10">
                <img
                  src="../img/<?php echo $class['image'] ?>"
                  alt="class-image"
                  style="max-width: 150px"
                />
              </div>
            </div>
            <div class="text-md-end">
            <button
              class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5"
            >
              Edit Class
            </button>
          </div>
          </form>
        </div>
      </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
