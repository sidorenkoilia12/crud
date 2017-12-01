<html>

	<head>

		<title>HTTP CRUD operations</title>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src = "handler.js"></script>
	</head>

	<body class="container">

		<?php

			include("header.php");

			$update_field = $_POST['update_field'];
			$update_id = $_POST['update_id'];
			$update_value = $_POST['update_value'];
			$delete_id = $_POST['delete_id'];
			$table_name = $_GET['table_name'];

			if($_POST['update_field'] != null){

				mysql_query("UPDATE `testdb`.`".$table_name."` SET `".$update_field."`='".$update_value."' WHERE `id`='".$update_id."'") or die (mysql_error());
				//mysql_query("UPDATE $table_name SET " . $_POST['update_field'] ." = '". $_POST['update_value'] . "' WHERE id=". $_POST['update_id']) or die (mysql_error());
			}

			if($_POST['delete_id'] != null){

				mysql_query("DELETE FROM `testdb`.`".$table_name."` WHERE `id`='".$delete_id."'") or die (mysql_error());
				//mysql_query("UPDATE $table_name SET " . $_POST['update_field'] ." = '". $_POST['update_value'] . "' WHERE id=". $_POST['update_id']) or die (mysql_error());
			}
		?>

		<h1 align="center">HTTP CRUD operations</h1>

		<hr>

		<h3>Select table:</h3>

		<?php

			while($table = mysql_fetch_array($tables_list)) { // go through each row that was returned in $result

					echo'<button style="margin: 5px" id="'.$table[0].'" type="button" class="btn table_name_btn">
						 <span class="glyphicon glyphicon-th-list"></span> '.$table[0].'</button>';
				}


			//..........................................................................................................................

			if($table_name != null){

				include('table_content.php');
			}

		?>


		<br>
		<div class=" col-sm-12 " > <div align="center"><a href="#">&#169; HTTP CRUD Operations</a></div></div>
		<hr>
		<br>


	</body>
</html>
