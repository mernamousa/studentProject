<?php
    require_once "admin/includes/conn.php";
  require_once "admin/includes/helpers.php";

  

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    try{
    $sql = "INSERT INTO `makeappoientment` (`gurdianName`, `gurdianEmail`, `childName`, `childAge`,`message`,`accept`) 
	VALUES (?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);
    $gurdianName= $_POST['gurdianName'];
    $gurdianEmail= $_POST['gurdianEmail'];
    $childName= $_POST['childName'];
    $childAge= $_POST['childAge'];
    $message= $_POST['message'];
    $accept=0;
	
    
	
    $stmt->execute([$gurdianName, $gurdianEmail, $childName, $childAge,$message,$accept]); 
    //header('Location: index.php');
   // die();
  }catch(PDOException $e){
    $error = "Connection failed: " . $e->getMessage();
}    
  }

?>


<!-- Appointment Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Make Appointment</h1>
                                <form action='' method='POST'>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" name='gurdianName' class="form-control border-0" id="gname" placeholder="Gurdian Name">
                                                <label for="gname" >Gurdian Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" name='gurdianEmail' class="form-control border-0" id="gmail" placeholder="Gurdian Email">
                                                <label for="gmail">Gurdian Email</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text"  name='childName' class="form-control border-0" id="cname" placeholder="Child Name">
                                                <label for="cname">Child Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text"  name='childAge' class="form-control border-0" id="cage" placeholder="Child Age">
                                                <label for="cage">Child Age</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" name='message' placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                        </div>
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
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->