<!DOCTYPE html>
<html lang="ru">
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
		<div id="head-section">
			<?php 
			$path = $_SERVER['DOCUMENT_ROOT'];
			$path .= "/connection.php";
			require_once($path);
			$link = mysqli_connect($host, $user, $pass, $database) 
			or die("Error " . mysqli_error($link));
			$link->set_charset("utf8");
			if(isset($_GET['id'])) { $id=$_GET['id']; } 
			$result = mysqli_query($link,"SELECT * FROM person where id='$id'");
			$myrow = mysqli_fetch_array($result);
			do{
				$person_id = $myrow['id'];
				echo "<div><h1>".$myrow['last_name']." ".$myrow['first_name']." ".$myrow['middle_name']."</h1>";
				echo "<h4>".$myrow['nickname']." - ".$myrow['acquintance_type']."</h4></div>";
				echo "<div><a href=\"/person/edit.php?id=$id\"class=\"btn btn-primary btn-lg\">Edit</a></div>";
			}
			while($myrow = mysqli_fetch_array($result));
			mysqli_close($link);
			?>
		</div>
		<div class="data-section">
			<div class="tab">
				<button class="tablinks active" onclick="loginTabsChange(event, 'general')">General</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'contacts')">Contacts</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'education')">Education</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'army')">Army</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'work')">Work</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'relationship')">Relationship</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'skills')">Skills</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'languages')">Languages</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'likes')">Likes</button>
				<button class="tablinks" onclick="loginTabsChange(event, 'property')">Property</button>
			</div>
			<div id="general" class="tabcontent active">
				<h2>General</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM person where id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							$mother_id = $myrow['mother'];
							$father_id = $myrow['father'];
							$mother = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$mother_id'"));
							$father = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$father_id'"));
							echo "<tr><td>Last name</td><td>".$myrow['last_name']."</td></tr>";
							echo "<tr><td>First name</td><td>".$myrow['first_name']."</td></tr>";
							echo "<tr><td>Middle name</td><td>".$myrow['middle_name']."</td></tr>";
							echo "<tr><td>Nickname</td><td>".$myrow['nickname']."</td></tr>";
							echo "<tr><td>Acquintance type</td><td>".$myrow['acquintance_type']."</td></tr>";
							echo "<tr><td>Sex</td><td>".$myrow['sex']."</td></tr>";
							echo "<tr><td>Gender</td><td>".$myrow['gender']."</td></tr>";
							echo "<tr><td>Birth day</td><td>".$myrow['birth_day']."</td></tr>";
							echo "<tr><td>Birth month</td><td>".$myrow['birth_month']."</td></tr>";
							echo "<tr><td>Birth year</td><td>".$myrow['birth_year']."</td></tr>";
							echo "<tr><td>Birth hour</td><td>".$myrow['birth_hour']."</td></tr>";
							echo "<tr><td>Birth minute</td><td>".$myrow['birth_minute']."</td></tr>";
							echo "<tr><td>Relationship status</td><td>".$myrow['relationship_status']."</td></tr>";
							echo "<tr><td>Height</td><td>".$myrow['height']."</td></tr>";
							echo "<tr><td>Weight</td><td>".$myrow['weight']."</td></tr>";
							echo "<tr><td>Home city</td><td>".$myrow['home_city']."</td></tr>";
							echo "<tr><td>Country</td><td>".$myrow['country']."</td></tr>";
							echo "<tr><td>City</td><td>".$myrow['city']."</td></tr>";
							echo "<tr><td>Street</td><td>".$myrow['street']."</td></tr>";
							echo "<tr><td>Building</td><td>".$myrow['building']."</td></tr>";
							echo "<tr><td>Floor</td><td>".$myrow['floor']."</td></tr>";
							echo "<tr><td>Apartment</td><td>".$myrow['apartment']."</td></tr>";
							echo "<tr onclick='window.location=\"/person/index.php?id=$mother_id\";'><td>Mother</td><td>".$mother['last_name']." ".$mother['first_name']." ".$mother['middle_name']." "."</td></tr>";
							echo "<tr onclick='window.location=\"/person/index.php?id=$father_id\";'><td>Father</td><td>".$father['last_name']." ".$father['first_name']." ".$father['middle_name']." "."</td></tr>";
							echo "<tr><td>Religion</td><td>".$myrow['religion']."</td></tr>";
							echo "<tr><td>Political views</td><td>".$myrow['political_views']."</td></tr>";
							echo "<tr><td>Personal priority</td><td>".$myrow['personal_priority']."</td></tr>";
							echo "<tr><td>Import in others</td><td>".$myrow['important_in_others']."</td></tr>";
							echo "<tr><td>Views on smoking</td><td>".$myrow['views_on_smoking']."</td></tr>";
							echo "<tr><td>Views on alcohol</td><td>".$myrow['views_on_alcohol']."</td></tr>";
							echo "<tr><td>Views on drugs</td><td>".$myrow['views_on_drugs']."</td></tr>";
							echo "<tr><td>Drive license</td><td>".$myrow['drive_license']."</td></tr>";
							echo "<tr><td>School results</td><td>".$myrow['school_results']."</td></tr>";
							echo "<tr><td>EGE results</td><td>".$myrow['ege_results']."</td></tr>";
							echo "<tr><td>University results</td><td>".$myrow['univer_results']."</td></tr>";
							echo "<tr><td>IQ test</td><td>".$myrow['iq_test']."</td></tr>";
							echo "<tr><td>Socionic test</td><td>".$myrow['socionic_test']."</td></tr>";
							echo "<tr><td>Political test</td><td>".$myrow['political_test']."</td></tr>";
							echo "<tr><td>Bennet test</td><td>".$myrow['bennet_test']."</td></tr>";
							echo "<tr><td>Hikka test</td><td>".$myrow['hikka_test']."</td></tr>";
							echo "<tr><td>Death status</td><td>".$myrow['death_status']."</td></tr>";
							echo "<tr><td>Death day</td><td>".$myrow['death_day']."</td></tr>";
							echo "<tr><td>Death month</td><td>".$myrow['death_month']."</td></tr>";
							echo "<tr><td>Death year</td><td>".$myrow['death_year']."</td></tr>";
							echo "<tr><td>Death hour</td><td>".$myrow['death_hour']."</td></tr>";
							echo "<tr><td>Death minute</td><td>".$myrow['death_minute']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="contacts" class="tabcontent">
				<h2>Contacts</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Account</td><td>Identificator</td><td>Status</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM contacts where owner='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['account']."</td><td>".$myrow['account_id']."</td><td>".$myrow['status']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="education" class="tabcontent">
				<h2>Education</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Type</td><td>Institution</td><td>Start year</td><td>End year</td><td>Group</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM education where person_id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['type']."</td><td>".$myrow['institution']."</td><td>".$myrow['year_start']."</td><td>".$myrow['year_end']."</td><td>".$myrow['group']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="army" class="tabcontent">
				<h2>Army</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Medical profile</td><td>Unit</td><td>Start year</td><td>End year</td><td>Rank</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM army where person_id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['suitablility']."</td><td>".$myrow['unit']."</td><td>".$myrow['year_start']."</td><td>".$myrow['year_end']."</td><td>".$myrow['rank']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="work" class="tabcontent">
				<h2>Work</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Company</td><td>Post</td><td>Start year</td><td>End year</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM work where person_id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['company']."</td><td>".$myrow['post']."</td><td>".$myrow['year_start']."</td><td>".$myrow['year_end']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="relationship" class="tabcontent">
				<h2>Relationship</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Person 1</td><td>Person 2</td><td>Relation type</td><td>Start year</td><td>Start month</td><td>Start day</td><td>End year</td><td>End month</td><td>End day</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM relationship where person_1='$id' or person_2='$id'");
						$myrow = mysqli_fetch_array($result);

						do{
							$person_1_id = $myrow['person_1'];
							$person_1 = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$person_1_id'"));
							$person_2_id = $myrow['person_2'];
							$person_2 = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$person_2_id'"));
							echo "<tr><td>".$person_1['last_name']." ".$person_1['first_name']." ".$person_1['middle_name']."</td><td>".$person_2['last_name']." ".$person_2['first_name']." ".$person_2['middle_name']."</td><td>".$myrow['relation_type']."</td><td>".$myrow['year_start']."</td><td>".$myrow['month_start']."</td><td>".$myrow['day_start']."</td><td>".$myrow['year_end']."</td><td>".$myrow['month_end']."</td><td>".$myrow['day_end']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="skills" class="tabcontent">
				<h2>Skills</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Skill</td><td>Level</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM skills where person='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['skill']."</td><td>".$myrow['level']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="languages" class="tabcontent">
				<h2>Languages</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Language</td><td>Level</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM languages where person_id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['language']."</td><td>".$myrow['level']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="likes" class="tabcontent">
				<h2>Likes</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Status</td><td>Object type</td><td>Object</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM likes where person='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['like_status']."</td><td>".$myrow['object_type']."</td><td>".$myrow['object']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
			<div id="property" class="tabcontent">
				<h2>Property</h2>
				<table class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr><td>Property type</td><td>Property</td></tr>
					</thead>
					<tbody>
						<?php 
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/connection.php";
						require_once($path);
						$link = mysqli_connect($host, $user, $pass, $database) 
						or die("Error " . mysqli_error($link));
						$link->set_charset("utf8");
						if(isset($_GET['id'])) { $id = $_GET['id']; } 
						$result = mysqli_query($link,"SELECT * FROM property where person_id='$id'");
						$myrow = mysqli_fetch_array($result);
						do{
							echo "<tr><td>".$myrow['property_type']."</td><td>".$myrow['property_name']."</td></tr>";
						}
						while($myrow=mysqli_fetch_array($result));
						mysqli_close($link);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/footer.php";
	include_once($path);
	?>
</body>
</html>