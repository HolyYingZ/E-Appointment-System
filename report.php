<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

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

<body class="sidebar-menu-collapsed">
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
        <li class="breadcrumb-item active" aria-current="page">Data Summary</li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary">Admin</span>, Welcome to Appointment Summary</h1>
   
    </div>

    <!-- statistics data -->
    
    <!-- //statistics data -->

    <!-- charts -->
    
    <!-- //charts -->

    <!-- chatting -->
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 chart-grid mb-4">
          <div class="card card_border p-4">
            <input type="hidden" name="sdate" id="sdate" value="<?php echo date('Y/m/d');?>">
          <table class="table" id="report">
  <thead>
    <tr>
      <th scope="col"><center>S.No</center></th>
      <th scope="col"><center>Name of the Appointer</center></th>
      <th scope="col"><center>Purpose of Visit</center></th>
      <th scope="col"><center>Address</center></th>
      <th scope="col"><center>Date</center></th>
     
      
     
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
                    
                      $sql = "SELECT * from entry";
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  
  <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
    
    <script type="text/javascript" src="assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="assets/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="assets/js/vfs_fonts.js"></script>
<script src="assets/dataTable_ini.js"></script>
<script>
  $(document).ready( function () {
    $('#report').DataTable();
} );
</script>

</body>

</html>
  