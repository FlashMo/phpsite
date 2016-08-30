<html>
<head>
	<title>Easy Admin</title>
</head>

<body>
	<h1>Welcome!</h1>
	<table>
		<tr>
			<th>Date</th>
			<th>PV</th>
			<th>UV</th>
		</tr>
		<?php while($row = $dataTable->fetch_array()):?>
		<tr>
			<td><?php echo $row['cdate'];?></td>
			<td><?php echo $row['pv'];?></td>
			<td><?php echo $row['uv'];?></td>
		</tr>
		<?php endwhile;?>
	</table>
	
	<p><a href="index.php?c=admin&m=view_data&begin=2016-06-15&end=2016-06-15">View Today</a></p>
	<p><a href="index.php?c=admin&m=view_data">View All</a></p>
	<p><a href="index.php?c=admin&m=logout_submit">logout</a></p>	
	
</body>

</html>
