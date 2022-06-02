<?php
session_start();
?>



<html lang="en">

<head>


	<title>Job Listing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
	<link href="css/technicianmain.css"rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="#"rel="shortcut icon" />
	

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	<script src="js/search.js" type="text/javascript"></script>



</head>

<style>

#notYetStatus{
	position: static;
}

</style>

<body>


	<nav class="nav">
		<a href="joblistnd.php" class="nav__link nav__link">
			<i class="material-icons">list_alt</i>
			<span class="nav__text">Job Listing</span>
		</a>
		
		<a href="pendingjoblistnd.php" class="nav__link">
			<i class="material-icons">pending_actions</i>
			<span class="nav__text">Pending</span>
		</a>
		
		<a href="technician.php" class="nav__link">
			<i class="material-icons">home</i>
			<span class="nav__text">Home</span>
		</a>
		
		<a href="completejoblistnd.php" class="nav__link">
			<i class="material-icons">check_circle</i>
			<span class="nav__text">Complete</span>
		</a>
		
		<a href="incompletejoblistnd.php" class="nav__link">
			<i class="material-icons">do_not_disturb_on</i>
			<span class="nav__text">Incomplete</span>
		</a>
		<a href="logout.php" class="nav__link">
			<i class="material-icons">logout</i>
			<span class="nav__text">Logout</span>
		</a>
	</nav>
	
	
<div class="container">	

<div class="example" style="text-align: end; padding-bottom: 10px;" >
    <input type="text" id="search">
    <input type="button"  id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
</div>	

    <div class="column">
        <p class="column-title" id="joblisting"><b>Incomplete</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM
                job_register WHERE
                (job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-light text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>
	
	
 <!--VIEW BUTTON MODAL AJAX-->
	

        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">	
					
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
	

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
						
						
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>				
						
						
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.card').click(function() {
							var jobregister_id = $(this).data('id');
        
							// AJAX request
        
							$.ajax({
							url: 'ajaxtechnonleader.php',
							type: 'post',
							data: {jobregister_id: jobregister_id},
							success: function(response) {
							// Add response in Modal body
							$('.tech-details').html(response);
							// Display Modal
							$('#myModal').modal('show');
							}
						});
					});
				});
							</script>	

							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>					

	
					
						</fieldset>
					</div>

					</div>
				</div>
			</div>
		</div>






 <!--VIEW COMPLETED BUTTON MODAL AJAX-->
	

        <div id="mymodalCompleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">	
					
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
	

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
						
						
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>				
						
						
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.completed').click(function() {
							var jobregister_id = $(this).data('id');
        
							// AJAX request
        
							$.ajax({
							url: 'ajaxtechnician.php',
							type: 'post',
							data: {jobregister_id: jobregister_id},
							success: function(response) {
							// Add response in Modal body
							$('.tech-details').html(response);
							// Display Modal
							$('#mymodalCompleted').modal('show');
							}
						});
					});
				});
							</script>	

							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>					

	
					
						</fieldset>
					</div>

					</div>
				</div>
			</div>
		</div>	
</div>	

	<script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	
</body>
</html>