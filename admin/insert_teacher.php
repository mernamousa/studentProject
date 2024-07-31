<?php
  require_once "includes/conn.php";
  require_once "includes/helpers.php";
  require_once 'includes/logged.php';
  

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    try{
    $sql = "INSERT INTO `teachers` (`fullName`, `jobTitle`, `published`, `image`) 
	VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $fullName= $_POST['fullName'];
    $jobTitle= $_POST['jobTitle'];
    if(isset($_POST['published'])){
		$published =1;
	}else{
		$published = 0;
	}
	
	require_once 'includes/addImage.php';
    
	
    $stmt->execute([$fullName, $jobTitle, $published, $image_name]); 
    header('Location: teachers.php');    
	die();
  }catch(PDOException $e){
    $error = "Connection failed: " . $e->getMessage();
}    
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
          <h2 class="fw-bold fs-2 mb-5 pb-2">Add Teacher</h2>
          <form action="" method="POST" class="px-md-5" enctype="multipart/form-data">
            
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Fullname:</label
              >
              <div class="col-md-10">
                <input type="text" name='fullName' placeholder="e.g. John Doe" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >JobTitle:</label>
              <div class="col-md-10">
                <input type="text" name='jobTitle' placeholder="jobTitle" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Published:</label>
              <div class="col-md-10">
                <input type="checkbox" name='published' class="form-check-input" style="padding: 0.7rem;"/>
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
                  id="image" 
                  name="image"
                />
              </div>
            </div>
            <div class="text-md-end">
            <button
              class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5"
            >
              Add Teacher
            </button>
          </div>
          <?php
            if(isset($error)) {
            ?>
            <div style="color: #ee0002; padding: 5px;">
              <?php echo $error ?>
            </div>
            <?php
            }
            ?>
          </form>
        </div>
      </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
