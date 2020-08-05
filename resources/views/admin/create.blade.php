<!DOCTYPE html>
<html>
<head>
	<title>Create New Chocolate</title>
	<link rel="stylesheet" type="text/css" href="css/createOrder.css">
	<style type="text/css">
		.outer{
			position: relative;
			background-color: red;
		}
		.faram{
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			background-color: red;
		}
	</style>
</head>
<body>
	<div class="outer">
	<form action = "/addnew" method = "post" class = "faram" enctype="multipart/form-data">
		@csrf
		<label>Name</label><br>
		<input type="text" name="name"><br>
		<label>Type</label><br>
		<input type="text" name="type"><br>
		<label>Price</label><br>
		<input type="text" name="price"><br>
		<label>Quantity</label><br>
		<input type="numeric" name="quantity"><br>
		<label>Image</label>
		<input type="file" name="image">
		<button class = "alterButton" type = "submit">Add</button>
	</form>
	</div>
</body>
</html>