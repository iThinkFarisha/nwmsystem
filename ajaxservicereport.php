<!DOCTYPE html>
<html>

<head>



</head>


<style>
        #ajax {
            border: 1px solid #ddd;
            text-align: left;
        }

        #ajax td,
        #ajax th {
            border: 1px solid #ddd;
            text-align: left;
        }

        #ajax {
            border-collapse: collapse;
            width: 100%;
        }

        #ajax td,
        #ajax th {
            padding: 10px;
        }
    </style>

</html>
<?php
include "dbconnect.php";

$servicereport_id =$_POST['servicereport_id'];

$sql = "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id
                 WHERE  servicereport_id ='$servicereport_id'";
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";

while ($row = $result->fetch_assoc()) {
    $jobregister_id = $row['jobregister_id'];
    $job_name = $row['job_name'];
    $job_order_number = $row['job_order_number'];
    $job_status = $row['job_status'];
    $job_description = $row['job_description'];
    $requested_date = $row['requested_date'];
    $job_assign = $row['job_assign'];
    $customer_name = $row['customer_name'];
    $cust_phone1 = $row['cust_phone1'];
    $technician_arrival = $row['technician_arrival'];
    $technician_leaving = $row['technician_leaving'];    
    $serialnumber = $row['serialnumber'];
    $machine_name = $row['machine_name'];
    $jobregistercreated_by = $row['jobregistercreated_by'];
    $jobregistercreated_at = $row['jobregistercreated_at'];
    $jobregisterlastmodify_by = $row['jobregisterlastmodify_by'];
    $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];


    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $jobregister_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Order Number : </td><td>" .  $job_order_number . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer Name : </td><td>" .  $customer_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Contact No : </td><td>" .  $cust_phone1 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Service Type : </td><td>" .  $job_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Service Engineer : </td><td>" .  $job_assign . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Status : </td><td>" .  $job_status . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Time At Site : </td><td>" .  $technician_arrival . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Return Time : </td><td>" .  $technician_leaving . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Name : </td><td>" . $machine_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Serial Number : </td><td>" . $serialnumber . "</td>";
    $response .= "</tr>";

   
}
$response .= "</table>";



echo $response;
exit;
