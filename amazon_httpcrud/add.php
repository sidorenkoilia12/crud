<?php
                        
	 include('header.php');


	$fields_array = mysql_query("DESCRIBE $table_name",$db) or die (mysql_error());
		$cntr = 0;

		while($res = mysql_fetch_array($fields_array)){

			$field[$cntr] = $res[0];
			$fieldType[$cntr] = $res[1];
			$cntr++;
		}



		$tempArr = array_keys($_POST);
		$table_name = $_POST['table_name_field'];
		$first = $tempArr[0];
		
		$res1 = mysql_query('INSERT INTO ' . $table_name . ' ('. $field[0] .') VALUES ("")');
		//$res = mysql_query('INSERT INTO ' . $table_name . ' ('.$first.') VALUES ("'.$_POST[$first].'")');
		$res = mysql_query('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1');
		$items = mysql_fetch_array($res);
		
		foreach($tempArr as $value){
						
			//mysql_query('UPDATE ' . $table_name . ' SET '.$value.' = "'.$_POST[$value].'" WHERE '. $first . ' = "' . $_POST[$first] .'"');
			mysql_query('UPDATE ' . $table_name . ' SET '.$value.' = "'.$_POST[$value].'" WHERE '. $field[0] . ' = "' . $items[0] .'"');
		}
		
	 	 echo json_encode($items);
	 	 
	 	 //$newbase = R::dispence('base');
	 	 //foreach($_POST as $key => $valuse)
	 	 //	$newbase -> $key = $value;
	 	 //$id = R::store($newbase);
?>
