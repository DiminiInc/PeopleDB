<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/head.php";
	include_once($path);
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
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/header.php";
	include_once($path);
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
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Nickname</th>
						<th>Acquintance type</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$search_string='';
					$result = mysqli_query($link,"SELECT * FROM person");
					$myrow = mysqli_fetch_array($result);
					do{
						$person_id = $myrow['id'];
						echo "<tr onclick='window.location=\"/person/index.php?id=$person_id\";'><td>".$myrow['id']."</td><td>".$myrow['last_name']."</td><td>".$myrow['first_name']."</td><td>".$myrow['middle_name']."</td><td>".$myrow['nickname']."</td><td>".$myrow['acquintance_type']."</td></tr>";
					}
					while($myrow = mysqli_fetch_array($result));
					mysqli_close($link);
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/footer.php";
	include_once($path);
	?>
</body>
</html>