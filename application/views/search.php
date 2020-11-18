<?php session_start(); ?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Search Engine</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color : #17202A; color : white;">
	<div class="container">
		<br /> <br /> <br />
		<h1 style="text-align: center; color: rgb(168,12,64);">phpmySearch </h1>
		<br /> <br />

		<div class="row">
			<div class="col-md-12 ">
				<nav>
					<div id="nav-bar" class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="name-tab" data-toggle="tab" href="#name" role="tab" aria-controls="name" aria-selected="true">Search by Name</a>
						<a class="nav-item nav-link " id="phone-no-tab" data-toggle="tab" href="#phone_no" role="tab" aria-controls="phone_no" aria-selected="false">Search by Phone No.</a>
						<a class="nav-item nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Search by Address</a>
					</div>
				</nav> <br />

				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="name" role="tabpanel" aria-labelledby="name-tab">
						<div class="col-md-12">
							<input type="text" name="search_text" id="search_text" placeholder="Search by Name" class="form-control" onfocus="this.value=''" />
						</div>
					</div>
					<div class="tab-pane fade" id="phone_no" role="tabpanel" aria-labelledby="phone-no-tab">
						<div class="col-md-12">
							<input type="text" name="search_text" id="search_num" placeholder="Search by Phone No." class="form-control" onfocus="this.value=''" />

						</div>
					</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
						<div class="col-md-12">
							<input type="text" name="search_text" id="search_address" placeholder="Search by Address" class="form-control" onfocus="this.value=''" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<br /> <br />
		<div id="result"></div>
	</div>
	<div style="clear:both"></div>
	<br /><br /><br /><br />
</body>

</html>

<script>
	//code for searching by name
	$(document).ready(function() {
		function load_data(query) {
			$.ajax({
				url: "fetchbyname",
				method: "post",
				data: {
					query: query
				},
				success: function(data) {
					$('#result').html(data);
				}
			});
		}
		$('#search_text').keyup(function() {
			var search = $(this).val();
			if (search != '') {
				load_data(search);
			}
		});
	});

	//code for searching by phone number
	$(document).ready(function() {
		function load_data(query) {
			$.ajax({
				url: "fetchbyphone",
				method: "post",
				data: {
					query: query
				},
				success: function(data) {
					$('#result').html(data);
				}
			});
		}
		$('#search_num').keyup(function() {
			var searchNum = $(this).val();
			if (searchNum != '') {
				load_data(searchNum);
			}

		});
	});

	//code for searching by address
	$(document).ready(function() {
		function load_data(query) {
			$.ajax({
				url: "fetchbyaddress",
				method: "post",
				data: {
					query: query
				},
				success: function(data) {
					$('#result').html(data);
				}
			});
		}
		$('#search_address').keyup(function() {
			var search = $(this).val();
			if (search != '') {
				load_data(search);
			}
		});
	});
</script>

<script type="text/javascript">
	window.onload = function() {
		var htmlString = "<?php session_destroy(); ?>";
		//dom not only ready, but everything is loaded
	}
</script>