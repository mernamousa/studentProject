<?php
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once "includes/logged.php";

 if($_SERVER['REQUEST_METHOD'] === "POST"){
	$sql ='UPDATE `makeappoientment` SET `gurdianName`=?,`gurdianEmail`=?, `accept`=? ,`childName`=?, `childAge`=?, `message`=? WHERE `id`=?';
	$stmt = $conn->prepare($sql);
	$gurdianName= $_POST['gurdianName'];
    $gurdianEmail= $_POST['gurdianEmail'];
    $childName= $_POST['childName'];
    $childAge= $_POST['childAge'];
    $message= $_POST['message'];
    $id= $_POST['id'];
    
	if(isset($_POST['accept'])){
		$accept =1;
	}else{
		$accept = 0;
	}
  
	$stmt->execute([$gurdianName, $gurdianEmail, $accept, $childName,$childAge,$message, $id]); 
	echo 'the appointment is updated';
    header('location:appointment.php');
        die();
} 

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `makeappoientment` WHERE id =?";
    $stmt = $conn->prepare($sql);
    $id = $_GET['id'];
    $stmt->execute([$id]);
    $app = $stmt->fetch();
    
    if ($app === false) {

        header('location:appointment.php');
        die();
    }

} else {
    header('location:appointment.php');
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
          <h2 class="fw-bold fs-2 mb-5 pb-2">Edit appointment</h2>
          <form action="" method="POST" class="px-md-5" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >gurdian Name:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. John Doe"
                  class="form-control py-2"
                  name='gurdianName'
                  value='<?php echo $app["gurdianName"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >gurdian Email:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. Content Creator"
                  class="form-control py-2"
                  name='gurdianEmail'
                  value='<?php echo $app["gurdianEmail"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >child Name:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. Content Creator"
                  class="form-control py-2"
                  name='childName'
                  value='<?php echo $app["childName"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >child Age:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. Content Creator"
                  class="form-control py-2"
                  name='childAge'
                  value='<?php echo $app["childAge"]; ?>'
                />
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >message:</label
              >
              <div class="col-md-10">
                <input
                  type="text"
                  placeholder="e.g. Content Creator"
                  class="form-control py-2"
                  name='message'
                  value='<?php echo $app["message"]; ?>'
                />
              </div>
            </div>
            
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Accept:</label
              >
              <div class="col-md-10">
                <input
                  type="checkbox"
                  class="form-check-input"
                  style="padding: 0.7rem;"
                  name='accept'
                  <?php echo ($app['accept'] === 1) ? "checked" : ""; ?>
                />
              </div>
            </div>
            <hr>
            
            <div class="text-md-end">
            <button
              class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5"
            >
             update appointement
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
