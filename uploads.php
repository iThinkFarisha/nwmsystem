<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nwmsystem";

    $con = mysqli_connect($servername, $username,$password,$database);

    if ($con->connect_error) {
        die("Connection failed". $con->connect_error);
    }

        $response = array('success' => false);

    if (!empty($_FILES['multipleFile']['name'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $description = $_POST['description'];

        $multiplefile = $_FILES['multipleFile']['name'];

        foreach ($multiplefile as $name => $value) {
            
            $allowImg = array('png','jpeg','jpg','jfif','');   

            $fileExnt = explode('.', $multiplefile[$name]);

            if (in_array($fileExnt[1], $allowImg)) {

                if ($_FILES['multipleFile']['size'][$name] > 0 && $_FILES['multipleFile']['error'][$name]== 0) {
                    
                    $fileTmp = $_FILES['multipleFile']['tmp_name'][$name];
                    
                    $newFile =  rand(). '.'. $fileExnt[1];

                    $target_dir = 'image/'.$newFile; 

                    if (move_uploaded_file($fileTmp, $target_dir)) {

                         $query = "INSERT INTO `technician_photoupdate`(`jobregister_id`, `file_name`,`description`) VALUES ('$jobregister_id','$newFile','$description')";

                        // $query  = "INSERT INTO photo(file_name) VALUES('$newFile')";
                        mysqli_query($con, $query);
                    }
                }
            }
        }
    }   

      if($query)
{
    $response['success'] = true;
	
} 

echo json_encode($response);


?>