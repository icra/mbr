<?php 
	include "mysql.php";
	$start = microtime(true); //record starting time
?>
<!doctype html><html><head>
	<title>Update Setpoints</title>
	<link rel=stylesheet href="estils.css">
	<style>td{text-align:center}</style>
</head><body><center>
<!--NAVBAR-->	<?php include("navbar.php") ?>
<!--TITLE-->	<h2 onclick=window.location='setpoints.php' style=cursor:pointer>Update Setpoints Manually (directly to PLC)</h2>

<?php
	//protect this page with password to continue or stop loading TODO TBD
	/*
	$password="icralequia";
	if(!isset($_POST['pass']))
	{
		die("<form method=POST>Password <input placeholder=Password name=pass type=password size=7> <button type=submit>ok</button></form>");
	}
	else if($_POST['pass']!=$password)
	{
		die('Password incorrect');
	}
	//if reach here password is correct
	*/
?>

<!--SETPOINTS-->
<table cellpadding=3>
	<tr><th>Id<th>Device<th>Last Value<th>Unit<th>New Value<th>PLC Position<th>Ubication</tr>
	<?php
		//query setpoints AND last value (which corresponts to max id grouped by id_device)
		$sql="
				SELECT * FROM devices LEFT JOIN
				(
					SELECT id_device,date,value 
					FROM
					(
						SELECT MAX(id) as maxid FROM readings GROUP BY id_device
					) mid,readings
					WHERE readings.id=mid.maxid
				) LV on LV.id_device=devices.id 
				WHERE type='Setpoint'
		";
		$res=mysql_query($sql);
		$setpoints=mysql_num_rows($res);
		echo "<b>$setpoints setpoints</b>"; //value oustide a <th> element will show at the top of the table
		while($row=mysql_fetch_array($res))
		{
			$id   		 = $row['id'];
			$name 		 = $row['name'];
			$ubic 		 = $row['ubication'];
			$unit 		 = $row['unit'];
			$plcPosition = $row['plcPosition'];
			$setpoint	 = $row['value'];
			$date	 	 = $row['date'];

			//red if there is no setpoint or plc position
			$colorSetpoint 	= $setpoint=="" ? "red":"";
			$unit 			= $setpoint=="" ? "" : $unit;
			$colorPLC 		= $plcPosition=="" ? "red":"";

			//display
			echo "<tr>
				<td>$id
				<td style=text-align:left><a href='/mbr/device.php?id=$id'>$name</a>
				<td style='text-align:right;background:$colorSetpoint' title='$date'>$setpoint
				<td>$unit
				<form method=GET action=updateSetpoint.php>
					<td>
						<input name=plcPosition value='$plcPosition' type=hidden>
						<input name=value size=1 placeholder=0 autocomplete=off>
						<button>Save</button>
				</form>
				<td style=background:$colorPLC>$plcPosition
				<td><a href=devices.php?ubication=$ubic>$ubic</a>
			";
		}	
	?>
</table>

<!--TIME--><?php printf("Page generated in %f seconds",microtime(true)-$start)?>