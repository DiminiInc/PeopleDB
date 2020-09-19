<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	require_once($path . "/head.php");
	?>
	<title>PeopleDB</title>
	<meta name="description" content="PeopleDB"> 
	<link rel="canonical" href="http://peopledb.localhost">
	<meta property="og:title" content="PeopleDB" /> 
	<meta property="og:type" content="website" /> 
	<meta property="og:url" content="http://peopledb.localhost" /> 
	<meta property="og:image" content="./asocialnetwork.png" /> 
	<meta property="og:description" content="PeopleDB" />
</head>
<body id="site">
	<?php 
	require_once($path . "/header.php");
	?>
	<div id="content">
		<div id="add-person">
			<a href="/person/edit.php" class="btn btn-primary">Add person</a>
		</div>
		<div id="search-results">
			<table id="personsTable" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Photo</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Nickname</th>
						<th>Acquintance type</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					require_once($path . "/connection.php");
					$link = mysqli_connect($host, $user, $pass, $database);
					mysqli_set_charset($link, "utf8");
					$result = mysqli_query($link, "SELECT * FROM person");
					$row = mysqli_fetch_assoc($result);
					do{
						$person_id = $row['id'];
						echo "<tr onclick='window.location=\"/person/index.php?id=$person_id\";'>
								<td>" . $row['id'] . "</td>
								<td>" . (file_exists($path . "/images/" . $row['id'] . "/0.jpg") ? "<img src=\"/images/" . $row['id'] . "/0.jpg\" alt=\"Person photo\">" : "") . "</td>
								<td>" . $row['last_name'] . "</td>
								<td>" . $row['first_name'] . "</td>
								<td>" . $row['middle_name'] . "</td>
								<td>" . $row['nickname'] . "</td>
								<td>" . $row['acquintance_type'] . "</td>
							</tr>";
					}
					while($row = mysqli_fetch_assoc($result));
					mysqli_close($link);
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php 
	require_once($path . "/footer.php");
	?>
</body>
</html>