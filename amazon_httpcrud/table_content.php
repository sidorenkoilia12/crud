<?php

	$fields_array = mysql_query("DESCRIBE $table_name",$db) or die (mysql_error());
		$cntr = 0;

		while($res = mysql_fetch_array($fields_array)){

			$field[$cntr] = $res[0];
			$fieldType[$cntr] = $res[1];
			$cntr++;
		}

?>

<hr>

		<h3>Table: "<?php echo $table_name ?>"</h3>

		<table id="reload" class="table table-hover table-responsive">

			<tr>

			<?php

				$cntr = 0;
				while($field[$cntr]){

					echo'<th>'.$field[$cntr].' (' . $fieldType[$cntr] .')</th>';
					$cntr++;
				}
			?>

			</tr>

			<form id="add">
				<?php
					echo'<tr>';
					$cnt = 0;
					while($field[$cnt]){

						if($cnt != 0){

							echo'<td><input class="form-control" type="text" name="'.$field[$cnt].'"></td>';
						}
						else{

							echo'<td><kbd><big><big>CRUD</big></big></kbd></td>';
						}
						$cnt++;
					}

					echo'<input type="hidden" name="table_name_field" value="'.$table_name.'">';

					echo'<td><button type="submit" class="btn">
						 <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> add
						 </button></td></tr>';
				?>
			</form>

			<?php

				$result= mysql_query("SELECT * FROM $table_name");

				while ($items = mysql_fetch_array($result)){

					$count = 0;

					echo'<tr id="row'.$items[0].'">';

					while($field[$count]){

						if($fieldType[$count] == "int(11)" || $fieldType[$count] == "INT" || $fieldType[$count] == "float"){

							echo'<td><input class="'.$field[$count].' form-control"  type="number" id="'.$items[0].'" value="'.$items[$count].'"></td>';
							$count++;
						}
						else{

							echo'<td><input class="'.$field[$count].' form-control" id="'.$items[0].'" value="'.$items[$count].'"></td>';
							$count++;
						}
					}

					echo'<td><button id="'.$items[0].'" type="button" class="btn">
						 <span class="glyphicon glyphicon-remove" ></span> delete
						 </button></td></tr>';
				}


    		?>
		</table>

		<hr>