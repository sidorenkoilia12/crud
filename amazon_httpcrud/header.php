<?php
	$table_name = "new_table";

	$server="mytestdb.ctd8udfbedms.us-east-2.rds.amazonaws.com";
	$user="sidorenkoilia12";
	$pwd="hey4ever";
	$dbase="testdb";

	$db = mysql_connect($server, $user, $pwd) or die ("Can not connect to MySQL-server. Check or empty variables.");
	mysql_select_db( $dbase, $db ) or die ("I can not connect to the database: $cDatabase.");


	$tables_list = mysql_query("show tables"); // run the query and assign the result to $result
?>
