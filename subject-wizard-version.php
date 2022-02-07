<!DOCTYPE html>
<html lang="en">
<?php 
require __DIR__ . '/connection.php';

 
if (isset($_REQUEST["submit"]))
 {
   $subj_name=$_REQUEST['subj_name'];
   

       $sql="INSERT INTO subject_master( subj_name) VALUES ('$subj_name')";

    // die("hai");
      $result=$conn->query($sql);
       if ($result==true) {
           echo "success";
       }else{
           echo "enter your details";
       }

}

 ?>
							
	<?php  include 'templates/head.php';?>
			

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
                      

                          <div>
						  <h3 class="main_question"><strong></strong>SubjectRegistration</h3>
						  <form action="#"  method="post">
									<div class="form-group"><label>SubjectName</label>
										<input type="text" name="subj_name" placeholder="SubjectName" class="form-control required" >
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
                    
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="customer_table_tbody" >
             </tbody>
			 <?php
require __DIR__ . '/connection.php';
// Subsjects
$sub="SELECT *   FROM `subject_master` ";
$result = $conn->query($sub);


if($result){
if($result->num_rows>0){
    while($sub_rows = $result->fetch_assoc()){
$subj_id = $sub_rows["subj_id"];
$subj_name= $sub_rows["subj_name"];

?>

<tr>
<td><?php echo"$subj_id"?></td>
<td><?php echo"$subj_name"?></td>
<td><a href="<?php  echo "?delete_id=$subj_id";  ?>" class="btn btn-danger" name="delete" >Delete</a>
	
<?php
error_reporting(1);
$errors = array();

if(isset($_REQUEST['delete_id'])){
    $delete_id=$_REQUEST['delete_id'];
    
 
 


if (empty($errors)) {
  include __DIR__ . '/../connection.php';
    
 
  $customer_delete_sql ="delete from subject_master where subj_id=$delete_id";
  $delete_qry = $conn->query($customer_delete_sql);
  header("Location:teacher-wizard-version.php");


  

if($delete_qry==false){
  $errors[]= "error deleting ".mysqli_error($conn);
  }
    
    
 
  
  $response["status"]="ok";  
  $response["message"]="Teacher Record Deleted";  
    
    
}else{
    
   $response["status"]="error";
   $response["message"]="Couldn't Fetch Teacher ID";
    
    
}
}
$conn->close();
//echo json_encode($response);


?>
<?php

    }
}

}else{
    echo mysqli_error($conn);
}


?>
</td></tr>

        </table>
			</div>
                
                
            </div>
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
