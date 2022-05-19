<?php session_start(); ?>


<!DOCTYPE html>

<html lang=”en”>

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/tab.css"/>
	<link href="css/ajax.css"rel="stylesheet" />
	<link href="css/technicianmain.css"rel="stylesheet" />

</head>

<style>
  
.status{
  float:none;
}



</style>
<body>

     <?php
//include connection file 
include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `job_register` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }
  
?>

<!-- FOR SUBMIT SERVICE REPORT DATE -->

<?php
// Return current date from the remote server
$date = date('d-m-y');

?>

  <div class="input-group-append">
    <button class="buttonbiru" type="submit" value="Submit" name="submit-date">SUBMIT</button>

<p class="controls"><b id="msgdate"></b></p>
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['jobregister_id'];?>">
        <td style="display:none;"></td>
            <td><label>Service Report Date :</label><?php echo $date; ?></td>
         <td><button class="userinfo btn btn-success" type="button" data-id='<?php echo $res['jobregister_id']; ?>'>VIEW</button></td>
      </tr>
	  <?php endforeach;?>
   </tbody>
</table>


<!-- FOR VIEW SERVICE REPORT-->	
	    <script type='text/javascript'>
        $(document).ready(function(){
        $('.userinfo').click(function(){
        var jobregister_id = $(this).data('id');
        $.ajax({
            url: 'servicereport.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('servicereport.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>



                    </div>
					<br>
</section>


</body>
</html>