<?php
session_start();

?>


 <?php
        $db = mysqli_connect("localhost","root","","nwmsystem");
        if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>


<!DOCTYPE html>
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
	<script src="js/popper.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/tab.css"/>
	<link href="css/ajaxtabtech.css"rel="stylesheet" />
</head>

<body>




<!-- Demo header-->


<form id="techacc_form" method="post">
<div class="input-boxAccessories" id="input_fields_wrapAccessories">
<div>

<form class="form-inline" id="frm-add-data" action="javascript:void(0)">


      <?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="model">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>


 <?php
//include connection file 
include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }
  
?>



                        <!-- Responsive table -->
                        <div class="table-responsive" style="width: 437px; margin-left: 1px; overflow-x: auto;">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">UOM</th>
										<th scope="col">Quantity</th>
										<th scope="col">Action</th>
                                    </tr>
                                </thead>
										<tbody id="_editable_table">
										<?php foreach($queryRecords as $res) :?>
										<tr data-row-id="<?php echo $res['id'];?>">
										<td></td>
										<td><label><a href="#" class="hover" id="<?php echo $res["accessories_id"]; ?>"><?php echo $res["accessories_code"]; ?></a></label></td>
										<td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
                                        <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['accessories_uom'];?>"><?php echo $res['accessories_uom'];?></td>
										<td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $res['accessories_quantity'];?>"><?php echo $res['accessories_quantity'];?></td>
										<td><span class='delete' style="color:red;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
										</tr>
										<?php endforeach;?>
  
									</tbody>
                            </table>
                        </div>
<a href="javascript:void(0);" class="add_button" title="Add field" type="button">Click Here to Add Accessories</a>
	
</form>

</div>  
<p class="control"><b id="acctechmessage"></b></p>
<div style="text-align: end;" class="updateBtn">
<button type="button" style="width: fit-content;" id="update_acc" name="update_acc" value="Update" class="buttonbiru"  >Update</button>
</div>
</form> 

<script>
    $(document).ready(function () {
        $('#update_acc').click(function () {
            var data = $('#techacc_form').serialize() + '&update_acc=update_acc';
            $.ajax({
                url: 'addaccessoriesindex.php',
                type: 'post',
                data: data,
                 success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#acctechmessage').html('<span style="color: green">Update Saved!</span>');
                        else
                          $('#acctechmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                      }
            });
        });
    });
</script>

<script>
  $(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete-ajax-acc.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});

</script>

<script>
 $(document).ready(function(){

  $('.hover').tooltip({
   title: fetchData,
   html: true,
   placement: 'right'
  });

  function fetchData()
  {
   var fetch_data = '';
   var element = $(this);
   var accessories_id = element.attr("id");
   $.ajax({
    url:"fetch-hover.php",
    method:"POST",
    async: false,
    data:{accessories_id:accessories_id},
    success:function(data)
    {
     fetch_data = data;
    }
   });   
   return fetch_data;
  }
 });
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['index'] = $(this).attr('col-index');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "server-tech.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#acctechmessage").removeClass('alerts-danger');
							$("#acctechmessage").addClass('alerts-success').html(response.acctechmessage);
						} else {
							$("#acctechmessage").removeClass('alerts-success');
							$("#acctechmessage").addClass('alerts-danger').html(response.acctechmessage);
						}
					}   
				});
	});
});

</script>

<script>

    $(document).on('change', '[name="accessoriesModel[]"]', function(){ 

  var accessories_id = $(this).val(); 
  var model = $(this).parent('.model');
if (accessories_id != '') {
        $.ajax({  
            url:"getcode.php",  
            method:"POST",  
            data: { accessories_id:accessories_id },
            dataType:"json",  
            success:function(result){  
              
                // $(this).parents('.model').find('[name="accessories_id[]"]').val(accessories_id);
                // $(this).parents('.model').find('[name="accessories_code[]"]').val(result.accessories_code);
                // $(this).parents('.model').find('[name="accessories_name[]"]').val(result.accessories_name);
                model.find(".accessories_id").val(accessories_id);
                model.find(".accessories_code").val(result.accessories_code);
                model.find(".accessories_name").val(result.accessories_name);
                 model.find(".accessories_uom").val(result.accessories_uom);
            }
        })
    }
    
    
});
	</script>

   <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 100; // Total 100 product fields we add

			var addButton = $('.add_button'); // Add more button selector

			var wrapper = $('.model'); // Input fields wrapper

			var fieldHTML = `

		<div class="field-element">
   
        <div class="model">
         <?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {

        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="model">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>
<select class="accessoriesModel" name="accessoriesModel[]"><option value=""> Select Accessories Code </option>
<?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT accessories_code, accessories_name, accessories_uom, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                         
                     echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                     }	
  ?>   
</select>
<input type="hidden" name="accessories_id[]" class="accessories_id">
<input type="text" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
<input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
<input type="text" class="accessories_uom" name="accessories_uom[]" placeholder="Unit of Measurement">
<input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">

					
<a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></div></div>

					
				`; //New input field html 

			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".field-element").remove();
				x--; //Decrement field counter
			});
		});
</script>						
                    </div>
</form>
</body>