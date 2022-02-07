<!DOCTYPE html>
<html lang="en">
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
										<input type="text" name="name" placeholder="Name" class="form-control required" >
									</div>
									<div class="form-group"><label>Age</label>
										<input type="text" name="age" placeholder="Age" class="form-control required" >
									</div>
									<div class="form-group"><label>Class</label>
										<input type="text" name="class" placeholder="Class" class="form-control required" >
									</div>
									
								  <div>
								  
									<div class="form-group">
										<input type="submit" name="submit" class="form-control required" >
								</div>
                        </div>
						<div class="row">
            
            <div class="col-12" >
                       <table class="table table-bordered table-hover" id="customer_table">
    
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>age</th>
                    <th>class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="customer_table_tbody" >
             </tbody>
			 <?php
require __DIR__ . '/connection.php';
// Subsjects
$sub = "SELECT *   FROM `user_student` LEFT OUTER JOIN `class_master` ON user_student.class=class_master.class_id";
$result = $conn->query($sub);

if ($result) {
    if ($result->num_rows > 0) {
        while ($sub_rows = $result->fetch_assoc()) {
            $id = $sub_rows["id"];
            $name = $sub_rows["name"];
            $age = $sub_rows["age"];
            $class = $sub_rows["class"];
?>
<tr>
<td><?php echo"$id";?></td>
<td><?php echo"$name";?></td>
<td><?php echo"$age";?></td>
<td><?php echo"$class";?></td>
<td>
<a href="<?php  echo "?delete_id=$id";  ?>" class="btn btn-danger" name="delete" >Delete</a>

<a href="<?php  echo "student_edit.php?edit_id=$id";  ?>" class="btn btn-danger" name="edit" id="edit_teacher-form_submit">Edit  </a>

			 <?php
error_reporting(1);
$errors = array();

if(isset($_REQUEST['delete_id'])){
    $delete_id=$_REQUEST['delete_id'];
    
 
 


if (empty($errors)) {
  include __DIR__ . '/../connection.php';
    
 
  $customer_delete_sql ="delete from user_student where id=$delete_id";
  $delete_qry = $conn->query($customer_delete_sql);


  

if($delete_qry==false){
  $errors[]= "error deleting ".mysqli_error($conn);
  }
    
    
 
  ?>
  $response["status"]="ok";  
  $response["message"]="student Record Deleted";  
    
    <script >
		alert();
	window.location.href="student-wizard-version.php";
	
	</script>
	<?php
}else{
    
   $response["status"]="error";
   $response["message"]="Couldn't Fetch student ID";
    
    
}
}
$conn->close();
//echo json_encode($response);


?>
        </div>

    </div>

 </div>

</div>

</td>
</tr>



</td>
</tr>

<?php
        }
    }
} else {
    echo mysqli_error($conn);
}
?>

			</div>
                
                
            </div>
			
			</table>
			<div class="row"> 
        <div class="col-3">
             <button type="button" onclick="load_table()" class="btn btn-primary">Reload</button>
              
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
$update=false;
if(isset($_REQUEST['submit']))  
 
{
// die('huuu');
$errors = array();
require __DIR__ . '/connection.php';


     $name = $_REQUEST['name'];
     $age = $_REQUEST['age'];
     $class = $_REQUEST['class'];
     
     
     

     $sql =" INSERT INTO `user_student`( `name`, `age`,`class`) VALUES ('$name','$age','$class')";
     $result = $conn->query($sql);
    
     if($result==true){
    echo "success";
	?>
	?>
	<script >
		
		window.location.href="student-wizard-version.php";
		
		</script>
		<?php
    }
	
else{

    echo "enter details";
}
    
     
     
        
     
     
     
    }

     

     ?>
							