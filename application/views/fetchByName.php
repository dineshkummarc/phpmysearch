<?php session_start();
$_SESSION['search1'] = $_POST["query"];
$connect = mysqli_connect("localhost", "root", "", "search_engine");
$output = '';

if (empty($_SESSION['search2'])) {
} else {
	$query_for_phone = $_SESSION['search2'];
}
if (empty($_SESSION['search3'])) {
} else {
	$query_for_address = $_SESSION['search3'];
}

if (isset($_POST["query"])) {
	$search1 = mysqli_real_escape_string($connect, $_POST["query"]);

	if (!empty($query_for_phone) && !empty($query_for_address)) {
		$query = "SELECT * FROM users WHERE Name LIKE '%" . $search1 . "%' AND Phone_No LIKE '%" . $query_for_phone . "%'  AND  Address LIKE '%" . $query_for_address . "%'";
	} elseif (!empty($query_for_phone)) {
		$query = "SELECT * FROM users WHERE Name LIKE '%" . $search1 . "%' AND Phone_No LIKE '%" . $query_for_phone . "%'";
	} elseif (!empty($query_for_address)) {
		$query = "SELECT * FROM users WHERE Name LIKE '%" . $search1 . "%' AND  Address LIKE '%" . $query_for_address . "%'";
	} else {
		$query = "SELECT * FROM users WHERE Name LIKE '%" . $search1 . "%'";
	}
}
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
	if (mysqli_num_rows($result) > 1) {
		echo "  <h4 class=' text-center'  style='color: rgb(199, 16, 77)'> $rows results found  
		<i class='fa fa-refresh fa-spin' style='font-size:24px; color:white' onClick='window.location.reload();'></i>
		</h4> <br /> ";
		echo '<h4 class=" text-center"  style="color: rgb(199, 16, 77)">Looking for a  more precise match ?
		<button id ="" style="padding:5px 25px;" class="btn btn-md btn-danger" href="#phone_no" data-toggle="tab"
		href="#phone_no" role="tab"  onclick= "myFunction()" >Search using Phone No.</button> or <button id ="" style="padding:5px 25px;" class="btn btn-md btn-danger" href="#address" data-toggle="tab"
		href="#address" role="tab"  onclick= "myFunction2()" >Search using Address</button></h4> <br />';
	}
	$output .= '<div class="table-responsive " >
					<table class="table table bordered" style="color:white;">
						<tr>
							<th>Name</th>
							<th>Phone_No</th>
							<th>Address</th>
						</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$output .= '<tr>
				<td>' . $row["Name"] . '</td>
				<td>' . $row["Phone_No"] . '</td>
				<td>' . $row["Address"] . '</td>
			</tr>';
	}
	echo $output;
} else {
	echo "<h4 class=' text-center'  style='color:rgb(199, 16, 77)'>Data Not Found ! <br /> <br />
	<button style='padding:5px 25px;' class='btn btn-md btn-danger' onClick='window.location.reload();'>
		<i class='fa fa-refresh fa-spin' style='font-size:24px; color:white' ></i> Search Again	</button> </h4>";
}
?>

<script>
	function myFunction() {
		var element = document.getElementById("name-tab");
		element.classList.remove("active");
		var element3 = document.getElementById("address-tab");
		element3.classList.remove("active");
		var element2 = document.getElementById("phone-no-tab");
		element2.classList.add("active");
	}

	function myFunction2() {
		var element = document.getElementById("name-tab");
		element.classList.remove("active");
		var element3 = document.getElementById("phone-no-tab");
		element3.classList.remove("active");
		var element2 = document.getElementById("address-tab");
		element2.classList.add("active");
	}
</script>