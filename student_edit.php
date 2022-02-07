
<!DOCTYPE html>
<html lang="en">

<?php
$EDIT_ID_URL = $_REQUEST["edit_id"];

if( $EDIT_ID_URL == "" ){
  echo  "Id Does not exist";
  die();
}




require __DIR__ . '/connection.php';
// Subsjects
$sub="SELECT  *  FROM  `user_student`";
$result = $conn->query($sub);

if($result){
if($result->num_rows>0){
    while($sub_rows = $result->fetch_assoc()){
$id = $sub_rows["id"];
$name= $sub_rows["name"];
$age= $sub_rows["age"];
$class= $sub_rows["class"];

}
}
}else{
    echo mysqli_error($conn);
}


//Get Subject Name
// $subj_sql = "SELECT * FROM `subject_master` WHERE `subj_id`='$subject' ";

// $get_subject_details = mysqli_fetch_assoc(mysqli_query($conn,$subj_sql));
// $subj_current_name=$get_subject_details["subj_name"];








?>
<?php  include 'templates/head.php';?>

<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
                      

                          <div>
						  <h3 class="main_question"><strong></strong>StudentsRegistration</h3>
						  <form action="#"  method="post">
									<div class="form-group"><label>Name</label>
										<input type="text" name="name"  value="<?php echo "$name";?>"placeholder="Name" class="form-control required" >
									</div>
									<div class="form-group"><label>Age</label>
										<input type="text" name="age" value="<?php echo"$age";?>" placeholder="Age" class="form-control required" >
									</div>
									<div class="form-group"><label>Class</label>
										<input type="text" name="class" value="<?php echo"$class";?>"placeholder="Class" class="form-control required" >
									</div>
									
								  <div>
								  
									<div class="form-group">

									
									<input type="text" value="<?php echo"$id";?>" name="edit_id">
										
									<input type="submit" value="submit" name="submit">
                                          
                        									</div>
                        </div>
			
           
            <tbody id="customer_table_tbody" >
             </tbody>
			 
             
 
 
			
			<div class="row"> 
        <div class="col-3">
           
              
        </div>

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
	
	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
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
				<!-- <div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div> -->
				<!-- <div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div> -->
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
<?php
include __DIR__ . '/connection.php';

error_reporting(1);
if( isset($_REQUEST["submit"])){

	
   $errors=array(); 
 
 $id = $_REQUEST['edit_id'];
    

$name =$_REQUEST["name"];

$age= $_REQUEST["age"];
$class= $_REQUEST["class"];
    


        
     
 //$sql="UPDATE SQL";
$sql =("UPDATE `user_student` set `name`='$name',`age`='$age',`class`='$class' where `id`='$id' ");

 
    
    $qry =$conn->query($sql);
   
   
    
    
if($qry==true){
	?>
	
	<script >
		alert();
	window.location.href="student-wizard-version.php";
	
	</script>
	
	
<?php
}
else{
	echo "enter your details";
}

    
}  
 

?>


