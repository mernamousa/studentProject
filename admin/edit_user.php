<?php
require_once "includes/conn.php";
require_once "includes/helpers.php";
require_once "includes/logged.php";

 if($_SERVER['REQUEST_METHOD'] === "POST"){
	$sql ='UPDATE `users` SET `fullName`=?,`name`=?,`email`=?,`pwd`=?,`phone`=?,`active`=? WHERE `id`=?';
	$stmt = $conn->prepare($sql);
	$fullName= $_POST['fullName'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $pwd= $_POST['pwd'];
    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
    $phone= $_POST['phone'];
    $id= $_POST['id'];
    
	if(isset($_POST['active'])){
		$active =1;
	}else{
		$active = 0;
	}
	$stmt->execute([$fullName, $name, $email, $hashed_password, $phone, $active,$id]); 
	echo 'the user is updated';
} 

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `users` WHERE id =?";
    $stmt = $conn->prepare($sql);
    $id = $_GET['id'];
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    
    if ($user === false) {

        header('location:users.php');
        die();
    }

} else {
    header('location:users.php');
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
          <h2 class="fw-bold fs-2 mb-5 pb-2">Edit User</h2>
          <form action="" method="POST" class="px-md-5">
           <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Fullname:</label
              >
              <div class="col-md-10">
                <input type="text" name='fullName' value='<?php echo $user["fullName"]; ?>' placeholder="e.g. John Doe" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Username:</label>
              <div class="col-md-10">
                <input type="text" name='name' value='<?php echo $user["name"]; ?>' placeholder="Username" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Email:</label>
              <div class="col-md-10">
                <input type="email" name='email' value='<?php echo $user["email"]; ?>' placeholder="email@example.com" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Password:</label>
              <div class="col-md-10">
                <input type="password" name='pwd' placeholder="this is secret" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Phone:</label>
              <div class="col-md-10">
                <input type="text" name='phone' value='<?php echo $user["phone"]; ?>' placeholder="+20133332323" class="form-control py-2"/>
              </div>
            </div>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Active:</label>
              <div class="col-md-10">
              <input type="checkbox" name="active" id="" class="form-check-input" <?php echo ($user['active'] === 1) ? "checked" : ""; ?>>
              </div>
            </div>
            <div class="text-md-end">
            <button
              class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
              Update User
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
