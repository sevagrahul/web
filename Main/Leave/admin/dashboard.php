<?php 
	include('inc/head.php'); 
	session_start();
	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location:index.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title Page-->
    <title>Employee Leaderboard | Admin Panel</title>

    <!-- Meta and Fonts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    
    <!-- Vendor CSS-->
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Custom Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        /* Header styling */
        #header {
            background-color: #1a4592;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 15rem;
            position: fixed;
            width: 100%;
            top: -22px;
            left: 220px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #header .logo img {
            height: 50px;
    		position: relative;
    		right: 451px;
   			top: 9px;
        }
        #header .user-profile {
            display: flex;
            align-items: center;
            position: relative;
            top: 11px;
        }
        #header .profile-pic {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        #header .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        #header .user-profile:hover .dropdown-content {
            display: block;
        }
        #header .dropdown-content a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }
        #header .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Sidebar styling */
        /* Sidebar styling */
#sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    height: calc(100% - 60px);
    width: 200px;
    background-color: #f4f4f4;
    padding: 1rem;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    z-index: 100;
    color: black;
}

#sidebar ul {
    list-style-type: none;
    padding: 0;
}

#sidebar ul li {
    margin: 10px 0;
}

#sidebar ul li a {
    color: black;
    text-decoration: none;
    font-size: 1rem;
    padding: 10px;
    display: flex;
    align-items: center; /* Align text and icon vertically */
    border-radius: 5px;
    transition: background-color 0.3s;
}

#sidebar ul li a i {
    margin-right: 10px; /* Space between icon and text */
    min-width: 20px; /* Ensure all icons take the same space */
    text-align: center;
}

#sidebar ul li a:hover {
    background-color: #333;
    color: white;
}

        /* Main content styling */
        #main-content {
            margin-left: 220px;
            padding: 2rem;
            padding-top: 80px;
            background-color: #d2d6de;
            min-height: 100vh;
        }
		.container{
			width: 1000px;
            max-width: 100%;
            position: relative;
            left: -3px;
    		top: 6px;
		}

        h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0A1172;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #d2d6de;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #1a4592;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            text-align: center;
            margin: 1rem auto;
        }
        .btn:hover {
            background-color:black;
            color:  #fff;
        }

        .btn-reset {
            float: right;
            margin-right: 1rem;
        }
    </style>
</head>
<body>
    <!-- Header with logo and user profile -->
    <header id="header">
         <div class="logo">
            <img src="logo-blue.png" alt="Company Logo">
        </div>
        <div class="user-profile">
            <img src="img\dipu.jpg" alt="User Profile Picture" class="profile-pic">
            <div class="name">John Doe</div>
            <!-- <div class="dropdown-content">
                <a href="index.php">Logout</a>
            </div> -->
        </div>
    </header>

    <!-- Sidebar for navigation -->
    <aside id="sidebar">
        <ul>
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="pending.php"><i class="fa fa-hourglass-half"></i> Pending Leave</a></li>
        <li><a href="approved.php"><i class="fa fa-check-circle"></i> Approved</a></li>
        <li><a href="totalleave.php"><i class="fa fa-calendar"></i> Total Leave</a></li>
        <li><a href="addemployee.php"><i class="fa fa-user-plus"></i> Add Employee</a></li>
        <li><a href="viewemployee.php"><i class="fa fa-users"></i> View Employee</a></li>
        <li><a href="holidays.php"><i class="fa fa-sun-o"></i> Holidays</a></li>
        <li><a href="index.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
        </ul>
    </aside>
	<!-- Designed and developed by Habibur Rahman Mahid -->
	<!----Section2 for showing Post Model ---->
	<div id="main-content">
    <div class="container">
	<div class="main-content">
        <h2>Employee List</h2>
	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Department</th>
								<th>Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php
									$sql = "SELECT * FROM leaves ORDER BY id DESC";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {

									?>

							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['leavedate']; ?></td>
							 		<td><?php echo $result['leavereason']; ?></td>
							 		<td>
							 			<?php
							 			if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>
							 </tbody>
						</table>
			</div>
		</div>
	</section>
	</div>
</div>
</div>


  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>
  <!-- Designed and developed by Habibur Rahman Mahid -->
</body>
</html>

<?php
	if (isset($_POST['adduser'])){
		$name = $_POST['name'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);


		$sql = "INSERT INTO users(name,department,email,password)VALUES('$name','$department','$email','$password')";

		$run = mysqli_query($con,$sql);

		if($run == true){

			echo "<script>
					alert('User Added');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script>
			alert('Failed');
			</script>";
		}
	}
 ?>