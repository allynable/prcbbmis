<?php 
	include 'login_success.php';
	require 'dbconnect.php';
        
        $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
     
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT SQL_CALC_FOUND_ROWS *  FROM inventory WHERE remarks LIKE 'Ok'";
        $q = $pdo->prepare($sql);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

        $username = $_SESSION['login_username'];
	$pdo = Database:: connect();
	$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $user = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $user->execute(array($username));
	$user = $user->fetch(PDO:: FETCH_ASSOC);

        $bloodbank = $pdo->prepare("SELECT * FROM bloodbank WHERE bankname = ? ");
        $bloodbank->execute(array($user['bankname']));
        $bloodbank = $bloodbank->fetch(PDO:: FETCH_ASSOC);
	Database:: disconnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <script src="./js/whenchecked_byCountry.js" type="text/javascript"></script>
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
			<!--Form Starts Here-->
		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
					<h2 style="text-align: center;">Blood Request</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Request Form</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/addRequisitionbyCountry.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="requester">Requester</label>
							  <div class="controls">
							  <input class="form-control" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" disabled>
                                                              <input id="requester" name="requester" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" type="hidden" placeholder="Fullname" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!--Table -->
                                                        <table>
                                                            <tr>
                                                            
                                                            <td>
                                                           <!-- Text input-->
                                                         <label class="control-label" for="ffpqty">Fresh Frozen Plasma(1 Year)</label>
                                                               <input class="form-control" name="ffpqty" type="number" style="width: 65px">
                                                        
                                                         <!-- Text input-->
							  <label class="control-label" for="pcqty">Platelet Concentrate(5 Days)</label>
                                                               <input class="form-control" name="pcqty" type="number" style="width: 65px">
                                                        
                                                         <!-- Text input-->
							  <label class="control-label" for="wbqty">Whole Blood(32 Days)</label>
                                                               <input class="form-control" name="wbqty" type="number" style="width: 65px">
                                                         <!-- Text input-->
							  <label class="control-label" for="cqty">Cryoprecipitate (1 Year)</label>
                                                               <input class="form-control" name="cqty" type="number" style="width: 65px">
                                                         </td> 
                                                         </tr>
                                                        </table>
                                                        <!-- End Table -->
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dateneeded">Date Needed</label>
							  <div class="controls">
							    <input id="dateneeded" name="dateneeded" type="date" class="form-control" required="">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#dateneeded').datepicker({
					                                                                                         format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankname">Blood Bank</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['bankname']?>" disabled></input>
                                                        <input id="bankname" name="bankname" type="hidden" placeholder="bank name" class="form-control" required="" value="<?php echo $bloodbank['bankname']?>">
                                                           </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['bankaddress']?>" disabled></input>
                                                        <input id="bankaddress" name="bankaddress" type="hidden" placeholder="Bank Address" class="form-control" required="" value="<?php echo $bloodbank['bankaddress']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['contactdetails']?>" disabled></input>
                                                        <input id="contactdetails" name="contactdetails" type="hidden" placeholder="contact number" class="form-control" required="" value="<?php echo $bloodbank['contactdetails']?>">
							    
							  </div>
							</div>
                                                        
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="reason">Reason</label>
							  <div class="controls">
                                                              <textarea id="reason" name="reason" placeholder="Enter text here..." class="form-control" required=""></textarea>
							    
							  </div>
							</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Request</button>
                                                                        <a class="btn" href="map.php">Cancel</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>


	<?php 
		include('footer.php');
	?>

</body>
</html>