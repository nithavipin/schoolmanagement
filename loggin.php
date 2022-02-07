<?php session_start();




if(isset($_REQUEST['loggin']))   // it checks whether the user clicked login button or not 
{
 
$errors = array();
require __DIR__ . '/connection.php';


     $username = $_REQUEST['username'];
     $password = $_REQUEST['password'];
 

     $sql = "SELECT * FROM `sms_user` WHERE `username` = '$username' AND `password`= '$password' " ;

  
     $result = $conn->query($sql);
    
     if($result==true){

      
        if($result->num_rows > 0){
            while($row= $result->fetch_assoc()){
                $id = $row["id"];
             
            }
        }else{
            $errors[]="Incorrect Username or Password";
            
        }
       
     
 
     if(empty($errors)){
 
       $_SESSION["id"]= $id;
       $_SESSION["isLoggedIn"]=true;
       $_SESSION["username"]=$username;
      header("Location: index.php");
	 
     }
    } else{
         
        $errors[] = "ERROR" . mysqli_error($conn);
       
    }
}else{
    $errors[]="incorrect details";

}
   

?>
<!DOCTYPE html>
<html lang="en">
	<?php
			include "templates/head.php";



	?>
		
			<dziv class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form action="#"  method="post">
							<!-- <input id="website" name="website" type="text" value=""> -->
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong></strong>Login</h3>
									<div class="form-group">
										<input type="text" name="username" class="form-control required" placeholder=" username">
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control required" placeholder=" Password">
									</div>
									<?php
								if(!empty($errors)){ 
										
											echo implode("<br>",$errors);
										
								   
									} ?>
							<div id="bottom-wizard">
								<input type = "submit" name="loggin" value="Log In"> 
							</div>
    
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<!-- <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a> -->
	<!-- /menu button -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
			
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/survey_func.js"></script>

</body>
</html>