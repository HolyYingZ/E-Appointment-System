<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

<?php 
 $con=mysql_connect("localhost","root","");
    // Check connection
   if(!$con){
     die("can not connect:" . mysql_error());
   }
   mysql_select_db("appointment",$con);
//..............dbconnection..............//
if(isset($_POST['update'])) 
    { 
           $UpdateQuery="UPDATE `entry` set status='$_POST[status]' WHERE id='$_POST[e0]'";
       mysql_query($UpdateQuery, $con);
     } 
?>
<?php require_once 'db_connect.php';?>
<?php 
$sql = "SELECT * FROM `entry`";
$query = $con->query($sql);
$counta = $query->num_rows;
$sql = "SELECT * FROM `entry` WHERE status='Approve'";
$query = $con->query($sql);
$countapp = $query->num_rows;
$sql = "SELECT * FROM `entry` WHERE status='Reject'";
$query = $con->query($sql);
$countrr = $query->num_rows;
$con->close();
?>
<?php
if(isset($_POST['update']))
{
  
  require 'PHPMailerAutoload.php';
  require 'credential.php';

$mail = new PHPMailer;
$status = $_POST['status'];
$mail->SMTPDebug = 4;                               // Enable verbose debug output
$links = 'Your Appointment has been '.$status.'';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'E-Appointment System');
$mail->addAddress($_POST['email']);     // Add a recipient              // Name is optional
$mail->addReplyTo(EMAIL);

        
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

//$mail->Subject = 'Please Come on the Date you have choosen';
$mail->Body    = $links;
//$mail->AltBody = 'Please Click this Link';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
  header("location: adminhome.php");
}
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>E-Appointment System</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.html">Collective</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="assets/images/logo.png" alt="logo-icon"> </a>
    </div>
    <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="adminhome.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>
        
        <li><a href="approve.php"><i class="fa fa-table"></i> <span>Approved Appointment</span></a></li>
        <li><a href="reject.php"><i class="fa fa-th"></i> <span>Rejected Appointment</span></a></li>
        <li><a href="report.php"><i class="fa fa-file-text"></i> <span>Generate Report</span></a></li>
        <li><a href="login.php"><i class="fa fa-file-text"></i> <span>Logout</span></a></li>
      </ul>
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Open Menu</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div>
      <div >
        
        <center><h2>E-Appointment System</h2></center>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary">Admin</span>, Welcome to Dashboard</h1>
   
    </div>

    <!-- statistics data -->
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-primary number"><?php echo $counta; ?></h3>
                <p class="stat-text">Total Appointment</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-eye"> </i>
                <h3 class="text-secondary number"><?php echo $countapp; ?></h3>
                <p class="stat-text">Approved Appointment</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-cloud-download"> </i>
                <h3 class="text-success number"><?php echo $countrr; ?></h3>
                <p class="stat-text">Rejected Appointment</p>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

    <!-- charts -->
    
    <!-- //charts -->

    <!-- chatting -->
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 chart-grid mb-4">
          <div class="card card_border p-4">
            <input type="hidden" name="sdate" id="sdate" value="<?php echo date('Y/m/d');?>">
          <table class="table">
  <thead>
    <tr>
      <th scope="col"><center>S.No</center></th>
      <th scope="col"><center>Name of the Appointer</center></th>
      <th scope="col"><center>Purpose of Visit</center></th>
      <th scope="col"><center>Address</center></th>
      <th scope="col"><center>Appointment Apply Date</center></th>
      <th scope="col"><center>Appointer Photo</center></th>
      <th scope="col"><center>Action</center></th>
     
    </tr>
  </thead>
  <?php 
  $localhost = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// db connection
$con = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($con->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

              
                       $count = 1;
                   
              $sdate="";
              $sdate=date('Y-m-d');
                    
                      $sql = "SELECT * from entry WHERE status='Applied' AND adate='$sdate'";
$run_q = mysqli_query($con, $sql);
                      while($row  = mysqli_fetch_assoc($run_q)){
                        $id = $row['id'];
                        
                         
                        
?>  
                    <tr>
                  
              <td><center><center><?php echo $count; ?></center></td>
          <td><center><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></center></td>
          <td><center><?php echo $row['pov'];?></center></td>
           <td><center><?php echo $row['address'];?></center></td>
            <td><center><?php echo $row['adate'];?></center></td>
            <td><center><img src='upload/<?php echo $row['photo'];?>' style="width:100px; height:100px;"></center></td>
         <td>
           <td>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?php echo $row['id'] ?>">
  View
</button>
<div class="modal fade" id="exampleModal-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-<?php echo $row['id'] ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-<?php echo $row['id'] ?>">Edit Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    
        <form method="post" action="">
      <div class="modal-body">
    
         
             <div class="form-group">
            <label for="in">Designation: </label><br>
            <input type="text" class="form-control" name="" id="t1-<?php echo $row['id'] ?>" value="<?php echo $row['desig'] ?>">
             <input type="hidden" name="e0" id="e0-<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
       </div> <!-- /form-group-->            
          <div class="form-group">
            <label for="qty">Phone Number: </label><br>
                <input type="text" class="form-control" name="t2" id="t2-<?php echo $row['id'] ?>" value="<?php echo $row['phone'] ?>">
           
          </div>
      <div class="form-group">
            <label for="qty">Email ID: </label><br>
              <input type="text" class="form-control" name="email" id="email-<?php echo $row['id'] ?>" value="<?php echo $row['aemail'] ?>">
           
          </div>
       <div class="form-group">
            <label for="qty">ID Proof: </label><br>
              <img src='upload/<?php echo $row['iproof'];?>' style="width:100px; height:100px;">
           
          </div>
          <div class="form-group">
            <label for="qty">Action: </label><br>
              <select class="form-control" name="status">
                <option>Select Any</option>
                <option value="Approve">Approve</option>
                <option value="Reject">Reject</option>
              </select>
           
          </div>
        
      </div>
    
    
    
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Save</button>
    
      </div>
    </div>
   </form>
      </div>
     
   
</div>

 
              </div>

          </td>

         </td>

                  
              
              
              
               
              
          </tr>
          <?php 
          
                    
        $count++;
       }
          
          ?>
  <tbody>
  </tbody>
</table>
          </div>
        </div>
      </div>
    </div>
    <!-- //chatting -->

    <!-- accordions -->
  
    <!-- //accordions -->

    <!-- modals -->
  
    <!-- //modals -->

  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 Collective. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank"
      class="text-primary">W3layouts.</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
  