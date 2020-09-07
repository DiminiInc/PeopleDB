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
			if(isset($_GET['id'])) { $id=$_GET['id']; } else {$id = 0;} 
			$result = mysqli_query($link,"SELECT * FROM person where id='$id'");
			$myrow = mysqli_fetch_array($result);
			do{
				$person_id = $myrow['id'];
				echo "<div><h1>".$myrow['last_name']." ".$myrow['first_name']." ".$myrow['middle_name']."</h1>";
				echo "<h4>".$myrow['nickname']." - ".$myrow['acquintance_type']."</h4></div>";
				echo "<div><button name='submit' type='submit' value='Update data' form='extForm' class='btn btn-primary btn-lg'>Update</button></div>";
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
			<?php 
			$path = $_SERVER['DOCUMENT_ROOT'];
			$path .= "/connection.php";
			require_once($path);
			$link = mysqli_connect($host, $user, $pass, $database) 
			or die("Error " . mysqli_error($link));
			$link->set_charset("utf8");
			if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
			echo "<form id='extForm' action='update.php?id=$id' method='post' name='form'>";
			mysqli_close($link);
			?>
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
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM person where id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								$mother_id = $myrow['mother'];
								$father_id = $myrow['father'];
								$mother = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$mother_id'"));
								$father = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$father_id'"));
								echo '<tr><td>Last name</td><td><input name="person_last_name" type="varchar" placeholder="Last name" class="login-input-label" size="20" maxlength="40" value="'.$myrow['last_name'].'"></td></tr>';
								echo '<tr><td>First name</td><td><input name="person_first_name" type="varchar" placeholder="First name" class="login-input-label" size="20" maxlength="40" value="'.$myrow['first_name'].'"></td></tr>';
								echo '<tr><td>Middle name</td><td><input name="person_middle_name" type="varchar" placeholder="Middle name" class="login-input-label" size="20" maxlength="40" value="'.$myrow['middle_name'].'"></td></tr>';
								echo '<tr><td>Nickname</td><td><input name="person_nickname" type="varchar" placeholder="Nickname" class="login-input-label" size="20" maxlength="40" value="'.$myrow['nickname'].'"></td></tr>';
								echo '<tr><td>Acquintance type</td><td><input name="person_acquintance_type" type="varchar" placeholder="Acquintance type" class="login-input-label" size="20" maxlength="40" value="'.$myrow['acquintance_type'].'" list="person_acquintance_type_list"><datalist id="person_acquintance_type_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT acquintance_type FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['acquintance_type']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Sex</td><td><input name="person_sex" type="varchar" placeholder="Sex" class="login-input-label" size="20" maxlength="40" value="'.$myrow['sex'].'" list="person_sex_list"><datalist id="person_sex_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT sex FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['sex']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Gender</td><td><input name="person_gender" type="varchar" placeholder="Gender" class="login-input-label" size="20" maxlength="40" value="'.$myrow['gender'].'" list="person_gender_list"><datalist id="person_gender_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT gender FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['gender']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';;
								echo '<tr><td>Birth day</td><td><input name="person_birth_day" type="varchar" placeholder="Birth day" class="login-input-label" size="20" maxlength="40" value="'.$myrow['birth_day'].'"></td></tr>';
								echo '<tr><td>Birth month</td><td><input name="person_birth_month" type="varchar" placeholder="Birth month" class="login-input-label" size="20" maxlength="40" value="'.$myrow['birth_month'].'"></td></tr>';
								echo '<tr><td>Birth year</td><td><input name="person_birth_year" type="varchar" placeholder="Birth year" class="login-input-label" size="20" maxlength="40" value="'.$myrow['birth_year'].'"></td></tr>';
								echo '<tr><td>Birth hour</td><td><input name="person_birth_hour" type="varchar" placeholder="Birth hour" class="login-input-label" size="20" maxlength="40" value="'.$myrow['birth_hour'].'"></td></tr>';
								echo '<tr><td>Birth minute</td><td><input name="person_birth_minute" type="varchar" placeholder="Birth minute" class="login-input-label" size="20" maxlength="40" value="'.$myrow['birth_minute'].'"></td></tr>';
								echo '<tr><td>Relationship status</td><td><input name="person_relationship_status" type="varchar" placeholder="Relationship status" class="login-input-label" size="20" maxlength="40" value="'.$myrow['relationship_status'].'" list="person_relationship_status_list"><datalist id="person_relationship_status_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT relationship_status FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['relationship_status']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Height</td><td><input name="person_height" type="varchar" placeholder="Height" class="login-input-label" size="20" maxlength="40" value="'.$myrow['height'].'"></td></tr>';
								echo '<tr><td>Weight</td><td><input name="person_weight" type="varchar" placeholder="Weight" class="login-input-label" size="20" maxlength="40" value="'.$myrow['weight'].'"></td></tr>';
								echo '<tr><td>Home city</td><td><input name="person_home_city" type="varchar" placeholder="Home city" class="login-input-label" size="20" maxlength="40" value="'.$myrow['home_city'].'" list="person_home_city_list"><datalist id="person_home_city_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT home_city FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['home_city']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Country</td><td><input name="person_country" type="varchar" placeholder="Country" class="login-input-label" size="20" maxlength="40" value="'.$myrow['country'].'" list="person_country_list"><datalist id="person_country_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT country FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['country']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>City</td><td><input name="person_city" type="varchar" placeholder="City" class="login-input-label" size="20" maxlength="40" value="'.$myrow['city'].'" list="person_city_list"><datalist id="person_city_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT city FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['city']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Street</td><td><input name="person_street" type="varchar" placeholder="Street" class="login-input-label" size="20" maxlength="40" value="'.$myrow['street'].'" list="person_street_list"><datalist id="person_street_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT street FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['street']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Building</td><td><input name="person_building" type="varchar" placeholder="Building" class="login-input-label" size="20" maxlength="40" value="'.$myrow['building'].'"></td></tr>';
								echo '<tr><td>Floor</td><td><input name="person_floor" type="varchar" placeholder="Floor" class="login-input-label" size="20" maxlength="40" value="'.$myrow['floor'].'"></td></tr>';
								echo '<tr><td>Apartment</td><td><input name="person_apartment" type="varchar" placeholder="Apartment" class="login-input-label" size="20" maxlength="40" value="'.$myrow['apartment'].'"></td></tr>';
								$mother_id = $myrow['mother'];
								$mother = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$mother_id'"));
								echo '<tr><td>Mother</td><td><input name="person_mother" type="varchar" placeholder="Mother" class="login-input-label" size="20" maxlength="40" value="'.$mother['id'].". ".$mother['last_name']." ".$mother['first_name']." ".$mother['middle_name'].'" list="person_mother_list"><datalist id="person_mother_list">';
								$sub_result = mysqli_query($link,"SELECT id, last_name, first_name, middle_name FROM person where sex=0");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['id'].". ".$my_sub_row['last_name']." ".$my_sub_row['first_name']." ".$my_sub_row['middle_name']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								$father_id = $myrow['father'];
								$father = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$father_id'"));
								echo '<tr><td>Father</td><td><input name="person_father" type="varchar" placeholder="Father" class="login-input-label" size="20" maxlength="40" value="'.$father['id'].". ".$father['last_name']." ".$father['first_name']." ".$father['middle_name'].'" list="person_father_list"><datalist id="person_father_list">';
								$sub_result = mysqli_query($link,"SELECT id, last_name, first_name, middle_name FROM person where sex=1");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['id'].". ".$my_sub_row['last_name']." ".$my_sub_row['first_name']." ".$my_sub_row['middle_name']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Religion</td><td><input name="person_religion" type="varchar" placeholder="Religion" class="login-input-label" size="20" maxlength="40" value="'.$myrow['religion'].'" list="person_religion_list"><datalist id="person_religion_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT religion FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['religion']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Political views</td><td><input name="person_political_views" type="varchar" placeholder="Political views" class="login-input-label" size="20" maxlength="40" value="'.$myrow['political_views'].'" list="person_political_views_list"><datalist id="person_political_views_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT political_views FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['political_views']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Personal priority</td><td><input name="person_personal_priority" type="varchar" placeholder="Personal priority" class="login-input-label" size="20" maxlength="40" value="'.$myrow['personal_priority'].'" list="person_personal_priority_list"><datalist id="person_personal_priority_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT personal_priority FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['personal_priority']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Important in others</td><td><input name="person_important_in_others" type="varchar" placeholder="Important in others" class="login-input-label" size="20" maxlength="40" value="'.$myrow['important_in_others'].'" list="person_important_in_others_list"><datalist id="person_important_in_others_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT important_in_others FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['important_in_others']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Views on smoking</td><td><input name="person_views_on_smoking" type="varchar" placeholder="Views on smoking" class="login-input-label" size="20" maxlength="40" value="'.$myrow['views_on_smoking'].'" list="person_views_on_smoking_list"><datalist id="person_views_on_smoking_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT views_on_smoking FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['views_on_smoking']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Views on alcohol</td><td><input name="person_views_on_alcohol" type="varchar" placeholder="Views on alcohol" class="login-input-label" size="20" maxlength="40" value="'.$myrow['views_on_alcohol'].'" list="person_views_on_alcohol_list"><datalist id="person_views_on_alcohol_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT views_on_alcohol FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['views_on_alcohol']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Views on drugs</td><td><input name="person_views_on_drugs" type="varchar" placeholder="Views on drugs" class="login-input-label" size="20" maxlength="40" value="'.$myrow['views_on_drugs'].'" list="person_views_on_drugs_list"><datalist id="person_views_on_drugs_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT views_on_drugs FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['views_on_drugs']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Drive license</td><td><input name="person_drive_license" type="varchar" placeholder="Drive license" class="login-input-label" size="20" maxlength="40" value="'.$myrow['drive_license'].'"></td></tr>';
								echo '<tr><td>School results</td><td><input name="person_school_results" type="varchar" placeholder="School results" class="login-input-label" size="20" maxlength="40" value="'.$myrow['school_results'].'"></td></tr>';
								echo '<tr><td>EGE results</td><td><input name="person_ege_results" type="varchar" placeholder="EGE results" class="login-input-label" size="20" maxlength="40" value="'.$myrow['ege_results'].'"></td></tr>';
								echo '<tr><td>University results</td><td><input name="person_univer_results" type="varchar" placeholder="University results" class="login-input-label" size="20" maxlength="40" value="'.$myrow['univer_results'].'"></td></tr>';
								echo '<tr><td>IQ test</td><td><input name="person_iq_test" type="varchar" placeholder="IQ test" class="login-input-label" size="20" maxlength="40" value="'.$myrow['iq_test'].'"></td></tr>';
								echo '<tr><td>Socionic test</td><td><input name="person_socionic_test" type="varchar" placeholder="Socionic test" class="login-input-label" size="20" maxlength="40" value="'.$myrow['socionic_test'].'"></td></tr>';
								echo '<tr><td>Political test</td><td><input name="person_political_test" type="varchar" placeholder="Political test" class="login-input-label" size="20" maxlength="40" value="'.$myrow['political_test'].'"></td></tr>';
								echo '<tr><td>Bennet test</td><td><input name="person_bennet_test" type="varchar" placeholder="Bennet test" class="login-input-label" size="20" maxlength="40" value="'.$myrow['bennet_test'].'"></td></tr>';
								echo '<tr><td>Hikka test</td><td><input name="person_hikka_test" type="varchar" placeholder="Hikka test" class="login-input-label" size="20" maxlength="40" value=""'.$myrow['hikka_test'].'"></td></tr>';
								echo '<tr><td>Death status</td><td><input name="person_death_status" type="varchar" placeholder="Death status" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_status'].'" list="person_death_status_list"><datalist id="person_death_status_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT death_status FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['death_status']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
								echo '<tr><td>Death day</td><td><input name="person_death_day" type="varchar" placeholder="Death day" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_day'].'"></td></tr>';
								echo '<tr><td>Death month</td><td><input name="person_death_month" type="varchar" placeholder="Death month" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_month'].'"></td></tr>';
								echo '<tr><td>Death year</td><td><input name="person_death_year" type="varchar" placeholder="Death year" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_year'].'"></td></tr>';
								echo '<tr><td>Death hour</td><td><input name="person_death_hour" type="varchar" placeholder="Death hour" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_hour'].'"></td></tr>';
								echo '<tr><td>Death minute</td><td><input name="person_death_minute" type="varchar" placeholder="Death minute" class="login-input-label" size="20" maxlength="40" value="'.$myrow['death_minute'].'"></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="contacts" class="tabcontent">
					<h2>Contacts</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT account FROM contacts");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'contactsTableBody', [";
					do{
						echo "'{$myrow['account']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT status FROM contacts");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['status']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Account</td><td>Identificator</td><td>Status</td></tr>
						</thead>
						<tbody id="contactsTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM contacts where owner='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="contacts_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="contacts_account[]" type="varchar" placeholder="Account type" class="login-input-label" maxlength="40" value="'.$myrow['account'].'" list="contacts_account_list"><datalist id="contacts_account_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT account FROM contacts");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['account']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="contacts_account_id[]" type="varchar" placeholder="Account ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['account_id'].'"></td><td><input name="contacts_status[]" type="varchar" placeholder="Status" class="login-input-label" size="20" maxlength="40" value="'.$myrow['status'].'" list="contacts_status_list"><datalist id="contacts_status_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT status FROM contacts");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['status']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="education" class="tabcontent">
					<h2>Education</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT type FROM education");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'educationTableBody', [";
					do{
						echo "'{$myrow['type']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT institution FROM education");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['institution']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT `group` FROM education");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['group']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Type</td><td>Institution</td><td>Start year</td><td>End year</td><td>Group</td></tr>
						</thead>
						<tbody id="educationTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM education where person_id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="education_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="education_type[]" type="varchar" placeholder="Type" class="login-input-label" maxlength="40" value="'.$myrow['type'].'" list="education_type_list"><datalist id="education_type_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT type FROM education");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['type']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="education_institution[]" type="varchar" placeholder="Institution" class="login-input-label" size="20" maxlength="40" value="'.$myrow['institution'].'" list="education_institution_list"><datalist id="education_institution_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT institution FROM education");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['institution']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="education_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_start'].'"></td><td><input name="education_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_end'].'"></td><td><input name="education_group[]" type="varchar" placeholder="Group" class="login-input-label" size="20" maxlength="40" value="'.$myrow['group'].'" list="education_group_list"><datalist id="education_group_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT `group` FROM education");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['group']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="army" class="tabcontent">
					<h2>Army</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT unit FROM army");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'armyTableBody', [";
					do{
						echo "'{$myrow['unit']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT rank FROM army");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['rank']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Medical profile</td><td>Unit</td><td>Start year</td><td>End year</td><td>Rank</td></tr>
						</thead>
						<tbody id="armyTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM army where person_id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="army_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="army_suitablility[]" type="varchar" placeholder="Suitability" class="login-input-label" size="20" maxlength="40" value="'.$myrow['suitablility'].'"></td><td><input name="army_unit[]" type="varchar" placeholder="Unit" class="login-input-label" maxlength="40" value="'.$myrow['unit'].'" list="army_unit_list"><datalist id="army_unit_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT unit FROM army");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['unit']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="army_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_start'].'"></td><td><input name="army_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_end'].'"></td><td><input name="army_rank[]" type="varchar" placeholder="Rank" class="login-input-label" size="20" maxlength="40" value="'.$myrow['rank'].'" list="army_rank_list"><datalist id="army_rank_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT rank FROM army");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['rank']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="work" class="tabcontent">
					<h2>Work</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT company FROM work");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'workTableBody', [";
					do{
						echo "'{$myrow['company']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT post FROM work");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['post']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Company</td><td>Post</td><td>Start year</td><td>End year</td></tr>
						</thead>
						<tbody id="workTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM work where person_id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="work_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="work_company[]" type="varchar" placeholder="Company" class="login-input-label" maxlength="40" value="'.$myrow['company'].'" list="work_company_list"><datalist id="work_company_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT company FROM work");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['company']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="work_post[]" type="varchar" placeholder="Post" class="login-input-label" maxlength="40" value="'.$myrow['post'].'" list="work_post_list"><datalist id="work_post_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT post FROM work");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['post']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="work_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_start'].'"></td><td><input name="work_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40" value="'.$myrow['year_end'].'"></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="relationship" class="tabcontent">
					<h2>Relationship</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'relationshipTableBody')\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Person 1</td><td>Person 2</td><td>Relation type</td><td>Start year</td><td>Start month</td><td>Start day</td><td>End year</td><td>End month</td><td>End day</td></tr>
						</thead>
						<tbody id="relationshipTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM relationship where person_1='$id' or person_2='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								$person_1_id = $myrow['person_1'];
								$person_1 = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$person_1_id'"));
								$person_2_id = $myrow['person_2'];
								$person_2 = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM person where id='$person_2_id'"));
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="relationship_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="relationship_person_1[]" type="varchar" placeholder="Person 1" class="login-input-label" maxlength="40" value="'.$person_1['id'].". ".$person_1['last_name']." ".$person_1['first_name']." ".$person_1['middle_name'].'" list="relationship_person_list"><datalist id="relationship_person_list">';
								$sub_result = mysqli_query($link,"SELECT id, last_name, first_name, middle_name FROM person");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['id'].". ".$my_sub_row['last_name']." ".$my_sub_row['first_name']." ".$my_sub_row['middle_name']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="relationship_person_2[]" type="varchar" placeholder="Person 2" class="login-input-label" maxlength="40" value="'.$person_2['id'].". ".$person_2['last_name']." ".$person_2['first_name']." ".$person_2['middle_name'].'" list="relationship_person_list"></td><td><input name="relationship_relation_type[]" type="varchar" placeholder="Relation type" class="login-input-label" size="20" maxlength="40" value="'.$myrow['relation_type'].'" list="relationship_relation_type_list"><datalist id="relationship_relation_type_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT relation_type FROM relationship");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['relation_type']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="relationship_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="10" maxlength="40" value="'.$myrow['year_start'].'"></td><td><input name="relationship_month_start[]" type="varchar" placeholder="Month start" class="login-input-label" size="10" maxlength="40" value="'.$myrow['month_start'].'"></td><td><input name="relationship_day_start[]" type="varchar" placeholder="Day start" class="login-input-label" size="10" maxlength="40" value="'.$myrow['day_start'].'"></td><td><input name="relationship_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="10" maxlength="40" value="'.$myrow['year_end'].'"></td><td><input name="relationship_month_end[]" type="varchar" placeholder="Month end" class="login-input-label" size="10" maxlength="40" value="'.$myrow['month_end'].'"></td><td><input name="relationship_day_end[]" type="varchar" placeholder="Day end" class="login-input-label" size="10" maxlength="40" value="'.$myrow['day_end'].'"></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="skills" class="tabcontent">
					<h2>Skills</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT skill FROM skills");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'skillsTableBody', [";
					do{
						echo "'{$myrow['skill']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT level FROM skills");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['level']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Skill</td><td>Level</td></tr>
						</thead>
						<tbody id="skillsTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM skills where person='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="skills_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="skills_skill[]" type="varchar" placeholder="Skill" class="login-input-label" maxlength="40" value="'.$myrow['skill'].'" list="skills_skill_list"><datalist id="skills_skill_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT skill FROM skills");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['skill']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="skills_level[]" type="varchar" placeholder="Level" class="login-input-label" size="20" maxlength="40" value="'.$myrow['level'].'" list="skills_level_list"><datalist id="skills_level_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT level FROM skills");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['level']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="languages" class="tabcontent">
					<h2>Languages</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT language FROM languages");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'languagesTableBody', [";
					do{
						echo "'{$myrow['language']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT level FROM languages");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['level']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Language</td><td>Level</td></tr>
						</thead>
						<tbody id="languagesTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM languages where person_id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="languages_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="languages_language[]" type="varchar" placeholder="Language" class="login-input-label" maxlength="40" value="'.$myrow['language'].'" list="languages_language_list"><datalist id="languages_language_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT language FROM languages");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['language']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="languages_level[]" type="varchar" placeholder="Level" class="login-input-label" size="20" maxlength="40" value="'.$myrow['level'].'" list="languages_level_list"><datalist id="languages_level_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT level FROM languages");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['level']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="likes" class="tabcontent">
					<h2>Likes</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT like_status FROM likes");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'likesTableBody', [";
					do{
						echo "'{$myrow['like_status']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "],[";
					$result = mysqli_query($link,"SELECT DISTINCT object_type FROM likes");
					$myrow = mysqli_fetch_array($result);
					do{
						echo "'{$myrow['object_type']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Status</td><td>Object type</td><td>Object</td></tr>
						</thead>
						<tbody id="likesTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM likes where person='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="likes_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="likes_like_status[]" type="varchar" placeholder="Like status" class="login-input-label" maxlength="40" value="'.$myrow['like_status'].'" list="likes_like_status_list"><datalist id="likes_like_status_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT like_status FROM likes");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['like_status']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="likes_object_type[]" type="varchar" placeholder="Object type" class="login-input-label" size="20" maxlength="40" value="'.$myrow['object_type'].'" list="likes_object_type_list"><datalist id="likes_object_types_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT object_type FROM likes");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['object_type']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="likes_object[]" type="varchar" placeholder="Object" class="login-input-label" size="20" maxlength="40" value="'.$myrow['object'].'"></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
				<div id="property" class="tabcontent">
					<h2>Property</h2>
					<?php 
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/connection.php";
					require_once($path);
					$link = mysqli_connect($host, $user, $pass, $database) 
					or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$result = mysqli_query($link,"SELECT DISTINCT property_type FROM property");
					$myrow = mysqli_fetch_array($result);
					echo "<div><button type=\"button\" onclick=\"addInput(event, 'propertyTableBody', [";
					do{
						echo "'{$myrow['property_type']}',";
					}
					while($myrow=mysqli_fetch_array($result));
					echo "])\" class=\"btn btn-primary\">Add more</button></div>";
					mysqli_close($link);
					?>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Property type</td><td>Property</td></tr>
						</thead>
						<tbody id="propertyTableBody">
							<?php 
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path .= "/connection.php";
							require_once($path);
							$link = mysqli_connect($host, $user, $pass, $database) 
							or die("Error " . mysqli_error($link));
							$link->set_charset("utf8");
							if(isset($_GET['id'])) { $id = $_GET['id']; } else {$id = 0;} 
							$result = mysqli_query($link,"SELECT * FROM property where person_id='$id'");
							$myrow = mysqli_fetch_array($result);
							do{
								// if ($myrow['account'] or $myrow['account_id']) 
								echo '<tr><td><input name="property_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" value="'.$myrow['id'].'"></td><td><input name="property_property_type[]" type="varchar" placeholder="Property type" class="login-input-label" maxlength="40" value="'.$myrow['property_type'].'" list="property_property_type_list"><datalist id="property_property_type_list">';
								$sub_result = mysqli_query($link,"SELECT DISTINCT property_type FROM property");
								$my_sub_row = mysqli_fetch_array($sub_result);
								do{	
									echo "<option value='".$my_sub_row['property_type']."'>";
								}
								while($my_sub_row=mysqli_fetch_array($sub_result));
								echo'</datalist></td><td><input name="property_property_name[]" type="varchar" placeholder="Property name" class="login-input-label" size="20" maxlength="40" value="'.$myrow['property_name'].'"></td></tr>';
							}
							while($myrow=mysqli_fetch_array($result));
							mysqli_close($link);
							?>
						</tbody>
					</table>
				</div>
			</form>
			<!-- <?php 
			if (!isset($_SESSION[$nickname]))
			{
						// $nickname=$_GET['nickname'];
						// echo $_GET['nickname'];
				if(isset($_GET['nickname'])) { $nickname=$_GET['nickname']; } 
				$myrow= mysqli_fetch_array(mysqli_query($link,("SELECT status FROM relationship where (((person_1 in (select id from person where nickname='$nickname')) and (person_2 in (select id from person where nickname='$nickname_real'))) or ((person_2 in (select id from person where nickname='$nickname')) and (person_1 in (select id from person where nickname='$nickname_real'))))")));
				if ((isset($_GET['nickname'])) && mysqli_fetch_array(mysqli_query($link,("SELECT * FROM person where nickname='$nickname_real'")))['role']=="admin" || $nickname==$nickname_real || $myrow['status']==2) 
				{
					$result=mysqli_query($link,"SELECT * FROM person where nickname='$nickname'");
					$myrow= mysqli_fetch_array($result);
					$password_hash = $myrow['password'];
					if(password_verify($password , $password_hash))
					{
						$result=mysqli_query($link,"SELECT * FROM person join contacts on(person.id=contacts.owner) where person.nickname='$nickname'");
						$myrow= mysqli_fetch_array($result);
						echo "<div class='card'>";
						do
						{
							if ($myrow['account'] or $myrow['account_id']) 
								echo $myrow['account'].': '. $myrow['account_id']."<br>";
						}
						while($myrow=mysqli_fetch_array($result));
						echo "</div>";
					}
					else
					{
						echo'<span style="color: red; font-weight: bold;">Please authorize</span>'; 
					}
				}
			}
			while($myrow=mysqli_fetch_array($result));
			mysqli_close($link);
			?> -->
		</div>
	</div>
	<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/footer.php";
	include_once($path);
	?>
</body>
</html>