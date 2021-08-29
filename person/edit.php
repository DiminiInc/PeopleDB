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
		<div id="head-section">
			<?php 
			require_once($path . "/connection.php");
			$link = mysqli_connect($host, $user, $pass, $database);
			mysqli_set_charset($link, "utf8");
			if (isset($_GET['id'])) { 
				$id = $_GET['id']; 
			} else {
				$id = 0;
			} 
			$result = mysqli_query($link, "SELECT * FROM person where id='$id'");
			$row = mysqli_fetch_array($result);
			$person_id = $row['id'];
			echo "<div><h1>" . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</h1>";
			echo "<h4>" . $row['nickname'] . " - " . $row['acquintance_type'] . "</h4></div>";
			echo "<div><button name='submit' type='submit' value='Update data' form='extForm' class='btn btn-primary btn-lg'>Update</button></div>";
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
				<button class="tablinks" onclick="loginTabsChange(event, 'alternativeNames')">Alternative names</button>
			</div>
			<form id='extForm' action='<?php echo "update.php?id=$id"; ?>' method='post' name='form'>
				<div id="general" class="tabcontent active">
					<h2>General</h2>
					<table class="table table-striped table-bordered" style="width:100%">
						<tbody>
							<?php 
							$result = mysqli_query($link, "SELECT * FROM person where id='$id'");
							$row = mysqli_fetch_array($result);
							$mother_id = $row['mother'];
							$father_id = $row['father'];
							$mother = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$mother_id'"));
							$father = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$father_id'"));
							if ($row['sex'] === '1') {
								$sex = "Мужской";
							} elseif ($row['sex'] === '0') {
								$sex = "Женский";
							} else {
								$sex = "";
							}
							echo '<tr>
									<td>Last name</td>
									<td><input name="person_last_name" placeholder="Last name" value="' . $row['last_name'] . '"></td>
								</tr>';
							echo '<tr>
									<td>First name</td>
									<td><input name="person_first_name" placeholder="First name" value="' . $row['first_name'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Middle name</td>
									<td><input name="person_middle_name" placeholder="Middle name" value="' . $row['middle_name'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Nickname</td>
									<td><input name="person_nickname" placeholder="Nickname" value="' . $row['nickname'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Acquintance type</td>
									<td>
										<input name="person_acquintance_type" placeholder="Acquintance type" value="' . $row['acquintance_type'] . '" list="person_acquintance_type_list">
									</td>
								</tr>';
							echo '<tr>
									<td>Sex</td>
									<td><input name="person_sex" placeholder="Sex" value="' . $sex . '" list="person_sex_list"></td>
								</tr>';
							echo '<tr>
									<td>Gender</td>
									<td><input name="person_gender" placeholder="Gender" value="' . $row['gender'] . '" list="person_gender_list"></td>
								</tr>';;
							echo '<tr>
									<td>Birth day</td>
									<td><input name="person_birth_day" placeholder="Birth day" value="' . $row['birth_day'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Birth month</td>
									<td><input name="person_birth_month" placeholder="Birth month" value="' . $row['birth_month'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Birth year</td>
									<td><input name="person_birth_year" placeholder="Birth year" value="' . $row['birth_year'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Birth hour</td>
									<td><input name="person_birth_hour" placeholder="Birth hour" value="' . $row['birth_hour'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Birth minute</td>
									<td><input name="person_birth_minute" placeholder="Birth minute" value="' . $row['birth_minute'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Relationship status</td>
									<td><input name="person_relationship_status" placeholder="Relationship status" value="' . $row['relationship_status'] . '" list="person_relationship_status_list"></td>
								</tr>';
							echo '<tr>
									<td>Height</td>
									<td><input name="person_height" placeholder="Height" value="' . $row['height'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Weight</td>
									<td><input name="person_weight" placeholder="Weight" value="' . $row['weight'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Home city</td>
									<td><input name="person_home_city" placeholder="Home city" value="' . $row['home_city'] . '" list="person_home_city_list"></td>
								</tr>';
							echo '<tr>
									<td>Country</td>
									<td><input name="person_country" placeholder="Country" value="' . $row['country'] . '" list="person_country_list"></td>
								</tr>';
							echo '<tr>
									<td>City</td>
									<td><input name="person_city" placeholder="City" value="' . $row['city'] . '" list="person_city_list"></td>
								</tr>';
							echo '<tr>
									<td>Street</td>
									<td><input name="person_street" placeholder="Street" value="' . $row['street'] . '" list="person_street_list"></td>
								</tr>';
							echo '<tr>
									<td>Building</td>
									<td><input name="person_building" placeholder="Building" value="' . $row['building'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Floor</td>
									<td><input name="person_floor" placeholder="Floor" value="' . $row['floor'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Apartment</td>
									<td><input name="person_apartment" placeholder="Apartment" value="' . $row['apartment'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Mother</td>
									<td><input name="person_mother" placeholder="Mother" value="' . $mother['id'] . ". " . $mother['last_name'] . " " . $mother['first_name'] . " " . $mother['middle_name'] . '" list="person_mother_list"></td>
								</tr>';
							echo '<tr>
									<td>Father</td>
									<td><input name="person_father" placeholder="Father" value="' . $father['id'] . ". " . $father['last_name'] . " " . $father['first_name'] . " " . $father['middle_name'] . '" list="person_father_list"></td>
								</tr>';
							echo '<tr>
									<td>Religion</td>
									<td><input name="person_religion" placeholder="Religion" value="' . $row['religion'] . '" list="person_religion_list"></td>
								</tr>';
							echo '<tr>
									<td>Political views</td>
									<td><input name="person_political_views" placeholder="Political views" value="' . $row['political_views'] . '" list="person_political_views_list"></td>
								</tr>';
							echo '<tr>
									<td>Personal priority</td>
									<td><input name="person_personal_priority" placeholder="Personal priority" value="' . $row['personal_priority'] . '" list="person_personal_priority_list"></td>
								</tr>';
							echo '<tr>
									<td>Important in others</td>
									<td><input name="person_important_in_others" placeholder="Important in others" value="' . $row['important_in_others'] . '" list="person_important_in_others_list"></td>
								</tr>';
							echo '<tr>
									<td>Views on smoking</td>
									<td><input name="person_views_on_smoking" placeholder="Views on smoking" value="' . $row['views_on_smoking'] . '" list="person_views_on_smoking_list"></td>
								</tr>';
							echo '<tr>
									<td>Views on alcohol</td>
									<td><input name="person_views_on_alcohol" placeholder="Views on alcohol" value="' . $row['views_on_alcohol'] . '" list="person_views_on_alcohol_list"></td>
								</tr>';
							echo '<tr>
									<td>Views on drugs</td>
									<td><input name="person_views_on_drugs" placeholder="Views on drugs" value="' . $row['views_on_drugs'] . '" list="person_views_on_drugs_list"></td>
								</tr>';
							echo '<tr>
									<td>Drive license</td>
									<td><input name="person_drive_license" placeholder="Drive license" value="' . $row['drive_license'] . '"></td>
								</tr>';
							echo '<tr>
									<td>School results</td>
									<td><input name="person_school_results" placeholder="School results" value="' . $row['school_results'] . '"></td>
								</tr>';
							echo '<tr>
									<td>EGE results</td>
									<td><input name="person_ege_results" placeholder="EGE results" value="' . $row['ege_results'] . '"></td>
								</tr>';
							echo '<tr>
									<td>University results</td>
									<td><input name="person_univer_results" placeholder="University results" value="' . $row['univer_results'] . '"></td>
								</tr>';
							echo '<tr>
									<td>IQ test</td>
									<td><input name="person_iq_test" placeholder="IQ test" value="' . $row['iq_test'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Socionic test</td>
									<td><input name="person_socionic_test" placeholder="Socionic test" value="' . $row['socionic_test'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Political test</td>
									<td><input name="person_political_test" placeholder="Political test" value="' . $row['political_test'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Bennet test</td>
									<td><input name="person_bennet_test" placeholder="Bennet test" value="' . $row['bennet_test'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Hikka test</td>
									<td><input name="person_hikka_test" placeholder="Hikka test" value="' . $row['hikka_test'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Death status</td>
									<td><input name="person_death_status" placeholder="Death status" value="' . $row['death_status'] . '" list="person_death_status_list"></td>
								</tr>';
							echo '<tr>
									<td>Death day</td>
									<td><input name="person_death_day" placeholder="Death day" value="' . $row['death_day'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Death month</td>
									<td><input name="person_death_month" placeholder="Death month" value="' . $row['death_month'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Death year</td>
									<td><input name="person_death_year" placeholder="Death year" value="' . $row['death_year'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Death hour</td>
									<td><input name="person_death_hour" placeholder="Death hour" value="' . $row['death_hour'] . '"></td>
								</tr>';
							echo '<tr>
									<td>Death minute</td>
									<td><input name="person_death_minute" placeholder="Death minute" value="' . $row['death_minute'] . '"></td>
								</tr>';
							?>
						</tbody>
					</table>
					<datalist id="person_acquintance_type_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT acquintance_type FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['acquintance_type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_sex_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT sex FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							$sex = $row['sex'] == 1 ? "Мужской" : "Женский";
							echo "<option value='" . $sex . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>	
					</datalist>
					<datalist id="person_gender_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT gender FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['gender'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_relationship_status_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT relationship_status FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['relationship_status'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_home_city_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT home_city FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['home_city'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_country_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT country FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['country'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_city_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT city FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['city'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_street_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT street FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['street'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_mother_list">
						<?php
						$result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person where sex=0");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['id'] . ". " . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_father_list">
						<?php
						$result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person where sex=1");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['id'] . ". " . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_religion_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT religion FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['religion'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_political_views_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT political_views FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['political_views'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_personal_priority_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT personal_priority FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['personal_priority'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_important_in_others_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT important_in_others FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['important_in_others'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_views_on_smoking_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT views_on_smoking FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['views_on_smoking'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_views_on_alcohol_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT views_on_alcohol FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['views_on_alcohol'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_views_on_drugs_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT views_on_drugs FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['views_on_drugs'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="person_death_status_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT death_status FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['death_status'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="contacts" class="tabcontent">
					<h2>Contacts</h2>
					<div><button type="button" onclick="addInput(event, 'contactsTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Account</td><td>Identificator</td><td>Status</td></tr>
						</thead>
						<tbody id="contactsTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM contacts where owner='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="contacts_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="contacts_account[]" placeholder="Account type" value="' . $row['account'] . '" list="contacts_account_list"></td>
										<td><input name="contacts_account_id[]" placeholder="Account ID" value="' . $row['account_id'] . '"></td>
										<td><input name="contacts_status[]" placeholder="Status" value="' . $row['status'] . '" list="contacts_status_list"></td></tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="contacts_account_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT account FROM contacts");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['account'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="contacts_status_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT status FROM contacts");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['status'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="education" class="tabcontent">
					<h2>Education</h2>
					<div><button type="button" onclick="addInput(event, 'educationTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Type</td><td>Institution</td><td>Start year</td><td>End year</td><td>Group</td></tr>
						</thead>
						<tbody id="educationTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM education where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="education_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="education_type[]" placeholder="Type" value="' . $row['type'] . '" list="education_type_list"></td>
										<td><input name="education_institution[]" placeholder="Institution" value="' . $row['institution'] . '" list="education_institution_list"></td>
										<td><input name="education_year_start[]" placeholder="Year start" value="' . $row['year_start'] . '"></td>
										<td><input name="education_year_end[]" placeholder="Year end" value="' . $row['year_end'] . '"></td>
										<td><input name="education_group[]" placeholder="Group" value="' . $row['group'] . '" list="education_group_list"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="education_type_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT type FROM education");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="education_institution_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT institution FROM education");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['institution'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>	
					</datalist>
					<datalist id="education_group_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT `group` FROM education");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['group'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="army" class="tabcontent">
					<h2>Army</h2>
					<div><button type="button" onclick="addInput(event, 'armyTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Medical profile</td><td>Unit</td><td>Start year</td><td>End year</td><td>Rank</td></tr>
						</thead>
						<tbody id="armyTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM army where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								if ($row['suitablility'] === '1') {
									$suitability = "Годен";
								} elseif ($row['suitablility'] === '0') {
									$suitability = "Не годен";
								} else {
									$suitability = "";
								}
								echo '<tr>
										<td><input name="army_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="army_suitablility[]" placeholder="Suitability" value="' . $suitability . '" list="army_suitability_list"></td>
										<td><input name="army_unit[]" placeholder="Unit" value="' . $row['unit'] . '" list="army_unit_list"></td>
										<td><input name="army_year_start[]" placeholder="Year start" value="' . $row['year_start'] . '"></td>
										<td><input name="army_year_end[]" placeholder="Year end" value="' . $row['year_end'] . '"></td>
										<td><input name="army_rank[]" placeholder="Rank" value="' . $row['rank'] . '" list="army_rank_list"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="army_suitability_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT suitablility FROM army");
						$row = mysqli_fetch_array($result);
						do {
							$suitability = $row['suitablility'] === 0 ? "Не годен" : "Годен";	
							echo "<option value='" . $suitability . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="army_unit_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT unit FROM army");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['unit'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="army_rank_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT rank FROM army");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['rank'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="work" class="tabcontent">
					<h2>Work</h2>
					<div><button type="button" onclick="addInput(event, 'workTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Company</td><td>Post</td><td>Start year</td><td>End year</td></tr>
						</thead>
						<tbody id="workTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM work where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="work_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="work_company[]" placeholder="Company" value="' . $row['company'] . '" list="work_company_list"></td>
										<td><input name="work_post[]" placeholder="Post" value="' . $row['post'] . '" list="work_post_list"></td>
										<td><input name="work_year_start[]" placeholder="Year start" value="' . $row['year_start'] . '"></td>
										<td><input name="work_year_end[]" placeholder="Year end" value="' . $row['year_end'] . '"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="work_company_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT company FROM work");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['company'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="work_post_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT post FROM work");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['post'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="relationship" class="tabcontent">
					<h2>Relationship</h2>
					<div><button type="button" onclick="addInput(event, 'relationshipTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Person 1</td><td>Person 2</td><td>Relation type</td><td>Start year</td><td>Start month</td><td>Start day</td><td>End year</td><td>End month</td><td>End day</td></tr>
						</thead>
						<tbody id="relationshipTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM relationship where person_1='$id' or person_2='$id'");
							$row = mysqli_fetch_array($result);
							do {
								$person_1_id = $row['person_1'];
								$person_2_id = $row['person_2'];
								$person_1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$person_1_id'"));
								$person_2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$person_2_id'"));
								echo '<tr>
										<td><input name="relationship_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="relationship_person_1[]" placeholder="Person 1" value="' . $person_1['id'] . ". " . $person_1['last_name'] . " " . $person_1['first_name'] . " " . $person_1['middle_name'] . '" list="relationship_person_list"></td>
										<td><input name="relationship_person_2[]" placeholder="Person 2" value="' . $person_2['id'] . ". " . $person_2['last_name'] . " " . $person_2['first_name'] . " " . $person_2['middle_name'] . '" list="relationship_person_list"></td>
										<td><input name="relationship_relation_type[]" placeholder="Relation type" value="' . $row['relation_type'] . '" list="relationship_relation_type_list"></td>
										<td><input name="relationship_year_start[]" placeholder="Year start" size="10" value="' . $row['year_start'] . '"></td>
										<td><input name="relationship_month_start[]" placeholder="Month start" size="10" value="' . $row['month_start'] . '"></td>
										<td><input name="relationship_day_start[]" placeholder="Day start" size="10" value="' . $row['day_start'] . '"></td><td>
										<input name="relationship_year_end[]" placeholder="Year end" size="10" value="' . $row['year_end'] . '"></td>
										<td><input name="relationship_month_end[]" placeholder="Month end" size="10" value="' . $row['month_end'] . '"></td>
										<td><input name="relationship_day_end[]" placeholder="Day end" size="10" value="' . $row['day_end'] . '"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="relationship_person_list">
						<?php
						$result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['id'] . ". " . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="relationship_relation_type_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT relation_type FROM relationship");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['relation_type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="skills" class="tabcontent">
					<h2>Skills</h2>
					<div><button type="button" onclick="addInput(event, 'skillsTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Skill</td><td>Level</td></tr>
						</thead>
						<tbody id="skillsTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM skills where person='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="skills_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="skills_skill[]" placeholder="Skill" value="' . $row['skill'] . '" list="skills_skill_list"></td>
										<td><input name="skills_level[]" placeholder="Level" value="' . $row['level'] . '" list="skills_level_list"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="skills_skill_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT skill FROM skills");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['skill'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="skills_level_list">
						<?php 
						$result = mysqli_query($link, "SELECT DISTINCT level FROM skills");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['level'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="languages" class="tabcontent">
					<h2>Languages</h2>
					<div><button type="button" onclick="addInput(event, 'languagesTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Language</td><td>Level</td></tr>
						</thead>
						<tbody id="languagesTableBody">
							<?php  
							$result = mysqli_query($link, "SELECT * FROM languages where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="languages_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="languages_language[]" placeholder="Language" value="' . $row['language'] . '" list="languages_language_list"></td>
										<td><input name="languages_level[]" placeholder="Level" value="' . $row['level'] . '" list="languages_level_list"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="languages_language_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT language FROM languages");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['language'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="languages_level_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT level FROM languages");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['level'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="likes" class="tabcontent">
					<h2>Likes</h2>
					<div><button type="button" onclick="addInput(event, 'likesTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Status</td><td>Object type</td><td>Object</td></tr>
						</thead>
						<tbody id="likesTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM likes where person='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="likes_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="likes_like_status[]" placeholder="Like status" value="' . $row['like_status'] . '" list="likes_like_status_list"></td>
										<td><input name="likes_object_type[]" placeholder="Object type" value="' . $row['object_type'] . '" list="likes_object_type_list"></td>
										<td><input name="likes_object[]" placeholder="Object" value="' . $row['object'] . '"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="likes_like_status_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT like_status FROM likes");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['like_status'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
					<datalist id="likes_object_types_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT object_type FROM likes");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['object_type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="property" class="tabcontent">
					<h2>Property</h2>
					<div><button type="button" onclick="addInput(event, 'propertyTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Property type</td><td>Property</td></tr>
						</thead>
						<tbody id="propertyTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM property where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="property_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="property_property_type[]" placeholder="Property type" value="' . $row['property_type'] . '" list="property_property_type_list"></td>
										<td><input name="property_property_name[]" placeholder="Property name" value="' . $row['property_name'] . '"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="property_property_type_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT property_type FROM property");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['property_type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
				<div id="alternativeNames" class="tabcontent">
					<h2>Alternative names</h2>
					<div><button type="button" onclick="addInput(event, 'alternativeNamesTableBody')" class="btn btn-primary">Add more</button></div>
					<table class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr><td>ID</td><td>Name</td><td>Type</td></tr>
						</thead>
						<tbody id="alternativeNamesTableBody">
							<?php 
							$result = mysqli_query($link, "SELECT * FROM alternative_last_names where person_id='$id'");
							$row = mysqli_fetch_array($result);
							do {
								echo '<tr>
										<td><input name="alternative_names_ids[]" placeholder="ID" value="' . $row['id'] . '" readonly></td>
										<td><input name="alternative_names_name[]" placeholder="Name" value="' . $row['last_name'] . '"></td>
										<td><input name="alternative_names_type[]" placeholder="Type" value="' . $row['change_type'] . '" list="alternative_names_type_list"></td>
									</tr>';
							} while ($row = mysqli_fetch_array($result));
							?>
						</tbody>
					</table>
					<datalist id="alternative_names_type_list">
						<?php
						$result = mysqli_query($link, "SELECT DISTINCT change_type FROM alternative_last_names");
						$row = mysqli_fetch_array($result);
						do {	
							echo "<option value='" . $row['change_type'] . "'>";
						} while ($row = mysqli_fetch_array($result));
						?>
					</datalist>
				</div>
			</form>
		</div>
	</div>
	<?php 
	mysqli_close($link);
	require_once($path . "/footer.php");
	?>
</body>
</html>