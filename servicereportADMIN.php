<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

    <title>SERVICE REPORT</title>
</head>
<style>

:root {
  --body-bg: rgb(204, 204, 204);
  --white: #ffffff;
  --darkWhite: rgb(0, 0, 0);
  --themeColor: #ffffff;
}

/* Font Include */
@import url("https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap");

.page {
  /* background: var(--white); */
  display: block;
  margin: 0 auto;
  position: relative;
}

.page[size="A4"] {
  width: 21cm;
  height: 59.4cm;
  overflow: hidden;
}

.bb {
  border-bottom: 2px solid var(--darkWhite);
  margin-left: 12px;
  margin-right: 14px;
  /* width: 100px; */
}

/* Top Section */
.top-content {
  padding-bottom: 15px;
}

.top-left p {
  margin: 0;
}

.top-left .graphic-path {
  /* height: 40px; */
  position: relative;
}

.top-left .graphic-path::before {
  content: "";
  height: 20px;
  background-color: var(--dark);
  position: absolute;
  left: 15px;
  right: 0;
  top: -15px;
  z-index: 2;
}

.SR {
  /* width: 120px;
  height: 20px; */
  float: left;
  font-weight: bold;
  font-size: 22px;
  text-align: center;
  margin-right: -87px;
  margin-left: 251px;
  /* display: flex;
  flex-wrap: wrap;
  justify-content: space-between; */
}

.SRno {
  /* position:fixed; */
  font-weight: bold;
  font-size: 20px;
  float: left;
  text-align: left;
  /* margin-right: -87px; */
  margin-left: 119px;
}

.serviceno {
  border: 0;
  border-bottom: 0px solid #000;
  width: 90px;
}

.report {
  border: 0;
  border-bottom: 0px solid #000;
  text-align: left;
  width: 647px;
  height: 320px;
  margin: 32px;
  position: inherit;
}

.top-left .graphic-path::after {
  content: "";
  height: 22px;
  width: 17px;
  background: var(--black);
  position: absolute;
  top: -13px;
  left: 6px;
  transform: rotate(45deg);
}

.top-left .graphic-path p {
  color: black;
  height: 40px;
  left: 0;
  text-transform: uppercase;
  background-color: var(--themeColor);
  font: 25px;
  z-index: 3;
  position: absolute;
  text-align: center;
  /* padding-left: 10px; */
}

/* User Store Section */
.store-user {
  padding-bottom: 25px;
}

.store-user p {
  margin: 2px;
  margin-left: 20px;
  font-weight: 600;
  /* display: inline-block; */
}

.try1 {
  margin: 11px;
  font-weight: 600;
  display: inline-block;
  margin-left: -1px;
  max-width: 354px;
}

.try2 {
  margin: 2px;
  font-weight: 600;
  display: inline-block;
  margin-left: -18px;
  max-width: 354px;
}

.try3 {
  margin: -12px;
  font-weight: 600;
  margin-left: 49px;
}

.extra-info p span {
  font-weight: 400;
}

.input {
  border: 0;
  border-bottom: 0px solid #000;
  /* margin-left: 538px;
  display: inline-block;
  flex-wrap: wrap; */
  /* justify-content: space-between; */
}

/* Footer Section */
footer {
  position: absolute;
  left: 75px;
}

footer hr {
  margin-bottom: -22px;
  border-top: 3px solid var(--darkWhite);
}

footer a {
  color: var(--themeColor);
}

.signature {
  border: 0;
  border-bottom: 1px solid #000;
}

.sign1 {
  margin: 2px;
  font-weight: 600;
  display: inline-block;
  margin-left: 64px;
  
}

.sign2 {
  font-weight: 600;
  display: inline-block;
  margin-left: 38px;
      margin-top: -37px;
}

.sign3 {
  margin: 2px;
  font-weight: 600;
  display: block;
  margin-left: 226px;
  margin-bottom: 13px;
}

footer p {
  padding: 6px;
  background-color: var(--white);
  display: inline-block;
}

tbody {
  counter-reset: Serial;   
}

tr td:first-child:before {
  counter-increment: Serial;      
	content: counter(Serial) "."; 
  padding-left: 5px;
  padding: 5px;
  
}

    </style>

<body>
    
    <div class="my-5 page" size="A4">
    <div class="p-5">
    <section class="top-content bb d-flex justify-content-between">
    <div class="top-left">
    <div class="graphic-path">

    <div class="text-center">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn" style="margin: 10px;">Print</button>
    </div>

    <h3 style="display: block; font-size: 1.17em; margin-block-start: 1em; margin-block-end: 0em; margin-inline-start: 0px; margin-inline-end: 0px; font-weight: bold; text-align:center">
    NEO WOODWORKING MACHINERY SDN. BHD.</h3>
    <p><center>NO 1, JALAN KOTA MURNI, TAMAN INDUSTRI KOTA MURNI,<br/>
    OFF JALAN MINYAK BEKU 83000 BATU PAHAT, JOHOR.<br/>
    Tel: 07-4355595, 07-4355596 Fax: 07-4355596<br/>
    Email: neowoodworking@hotmail.com
    </center> </p>
    </div>
                  
    <div class="position-relative"><br/><br/>
    <center>
   <div class="SR">Service Report</div>
    <div class="text-center">
    </div>

    <?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'nwmsystem');
                
        if (isset($_POST['servicereport_id'])) {
            $servicereport_id =$_POST['servicereport_id'];
            $query = ("SELECT * FROM servicereport WHERE servicereport_id='$servicereport_id'");
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
   
    <form action="servicereport.php" method="post">
    
    <div class="SRno">Service Report No:<input type="text" name="srvcreportnumber" id="numbreport" value="<?php echo $row['srvcreportnumber'] ?>" class="serviceno" /></div></center>
    
    </div></div>
    <br/><br/>
    </section>
            
    <section class="store-user mt-5">
    <div class="col-10">
    <div class="row bb pb-3">
    <br/>
    <div class="row extra-info pt-3">
    <div class="try1">
    
    <p><label>Date :</label> <span><input type="text" name="date" value="<?php echo $row['date'] ?>" class="input"/></span></p>
    <p><label style="position:absolute;">Customer Name :</label><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 130px;" class="textarea" role="textbox" contenteditable><?php echo $row['customer_name'] ?></span></p>
    <p><label>Contact No :</label><span><input type="text" name="cust_phone1" value="<?php echo $row['cust_phone1'] ?>" class="input" /></span></p>
    <p><label>Service Type :</label><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 2px;" class="textarea" role="textbox" contenteditable><?php echo $row['job_name'] ?></span></p>
    <p><label>Service Engineer :</label> <span><input type="text" name="job_assign" value="<?php echo $row['job_assign'] ?>" class="input" /></span></p>
    <script>

      const textarea = document.getElementById("txt");

      textarea.addEventListener("input", function (e) {
      this.style.height = "auto";
      this.style.height = this.scrollHeight + "px";
      });

      </script>

    <br/>
    <p>Problem Description :-</p>
    <span style="writing-mode: horizontal-tb !important;
    font-family: Arial;
    font-size: 13px;
    font-weight: 500;
    text-rendering: auto;
    display: inline-block;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    column-count: initial !important;
    width: 311px;
    height: auto;
    margin: 19px;
    padding: 1px 2px;
    border-width: 1px;
    resize: none;
    box-sizing: border-box;
    border-style: solid;" 
    class="textarea" role="textarea" contenteditable>
    <?php foreach($query_run as $res) :?>
    <?php echo $res['Problem_Description'];?>&#13;&#10;
    <?php endforeach;?>
    </span>
    </div>

    <div class="try2">
    <p><label>Travel Time :</label><span><input type="technician_arrival" name="Travel_Time" class="input" value="<?php echo $row['Travel_Time'] ?>" /></span></p>
    <p><label>Time At  Site :</label> <span><input type="text" name="technician_arrival" value="<?php echo $row['technician_arrival'] ?>" class="input" /></span></p>
    <p><label>Return Time :</label><span><input type="text" name="technician_leaving" value="<?php echo $row['technician_leaving'] ?>" class="input" /></span></p>
    <p><label style="position:absolute;">Machine Name :</label><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 118px;" class="textarea" role="textbox" contenteditable><?php echo $row['machine_name'] ?></span></p>
    <p><label>Serial Number :</label> <span><input type="text" name="serialnumber" value="<?php echo $row['serialnumber'] ?>" class="input" /></span></p>

    <br/>
    <p>Submitted Items :-</p>
   <span style="writing-mode: horizontal-tb !important;
    font-family: Arial;
    font-size: 13px;
    font-weight: 500;
    text-rendering: auto;
    display: inline-block;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    column-count: initial !important;
    width: 311px;
    height: auto;
    margin: 19px;
    padding: 1px 2px;
    border-width: 1px;
    resize: none;
    box-sizing: border-box;
    border-style: solid;" 
     class="textarea" role="textarea" contenteditable>
    <?php foreach($query_run as $res) :?>
    <?php echo $res['Submitted_Items'];?>&#13;&#10;
    <?php endforeach;?>
    </span>
    <br/></div>
    <br/><br/>
    <div class="try3">

    <p>Report :-</p><textarea style="writing-mode: horizontal-tb !important;
    font-family: Arial;
    text-rendering: auto;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    column-count: initial !important;
    width: 621px;
    height: 300px;
    margin: 19px;
    padding: 1px 2px;
    border-width: 0px;
    resize: none;"><?php echo $row['report'];?></textarea>

    </div>

 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }

      if ($queryRecords) {
        while ($row = mysqli_fetch_array($queryRecords)) {

          ?>
        <div class="part_used">
        <table id="remark_grid" text-align="center" class="table table-condensed table-hover table-striped bootgrid-table" style="margin-top: -41px; margin-bottom: 14px; border-collapse: collapse; border: 1px solid black;">
          <thead>
          </thead>
          <br/><br/>
        <tbody>
   
         <th colspan="4" style="text-align:left; padding-left:5px;">Accessories/ Sparts Part Used:</th>
         <?php foreach ($queryRecords as $res) :?>
        
            <tr data-row-id="<?php echo $res['id']; ?>">
             <td></td></div>
      
           
            <td><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 0px;" class="textarea" role="textbox" contenteditable><?php echo $res['accessories_name']; ?></span></td>
            <td><input readonly type="text" style="font-size: 15px; border: none; text-align:center;" class="accessories_uom" value="<?php echo $res['accessories_uom']; ?>" /></td>
            <td><input readonly type="text" style="font-size: 15px; border: none; text-align: center;" class="accessories_quantity" value="<?php echo $res['accessories_quantity']; ?>" /></td>

            </tr> 

     
	        <?php endforeach; ?>

        <?php
           }

        }
        ?>

          </tbody>
        </table>

          </div>

    </div></div></div>
      
    </section>
    <br/>
    <?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'nwmsystem');
                
        if (isset($_POST['servicereport_id'])) {
            $servicereport_id =$_POST['servicereport_id'];
            $query = ("SELECT * FROM servicereport WHERE servicereport_id ='$servicereport_id'");
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    <div class="sign1">
    <p>Issue By : <input type="text" name="Issue_By" class="serviceno" value="<?php echo $row['Issue_By'] ?>" /></p>
    </div>
    <div class="sign2"><br />
    <p>Customer Name : <input style="width:250px" type="text" name="cust" class="serviceno" value="<?php echo $row['cust'] ?>" /></p>
    <p>Phone Number : <input style="width:250px" type="text" name="custphone" class="serviceno" value="<?php echo $row['custphone'] ?>" /></p>
    </div>
    <!-- <div class="sign3"><p>Date and Time:</p></div> -->
    </form>
          <?php
            } ?>
   <?php
        }
    }
    ?>
    <?php
        }
    }
    ?>

              <?php
            } ?>

          
</body>
</html>