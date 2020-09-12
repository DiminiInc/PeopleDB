<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/connection.php");
$link = mysqli_connect($host, $user, $pass, $database);
mysqli_set_charset($link, "utf8");
if (isset($_GET['id'])) { 
	$id = $_GET['id']; 
} 

$person_last_name = $_POST['person_last_name']; 
$person_first_name = $_POST['person_first_name']; 
$person_middle_name = $_POST['person_middle_name']; 
$person_nickname = $_POST['person_nickname']; 
$person_acquintance_type = $_POST['person_acquintance_type']; 
$person_sex = $_POST['person_sex']; 
$person_gender = $_POST['person_gender']; 
$person_birth_day = $_POST['person_birth_day']; 
$person_birth_month = $_POST['person_birth_month']; 
$person_birth_year = $_POST['person_birth_year']; 
$person_birth_hour = $_POST['person_birth_hour']; 
$person_birth_minute = $_POST['person_birth_minute']; 
$person_relationship_status = $_POST['person_relationship_status']; 
$person_height = (!empty($_POST['person_height']) ? $_POST['person_height'] : NULL); 
$person_weight = $_POST['person_weight']; 
$person_home_city = $_POST['person_home_city']; 
$person_country = $_POST['person_country']; 
$person_city = $_POST['person_city']; 
$person_street = $_POST['person_street']; 
$person_building = $_POST['person_building']; 
$person_floor = $_POST['person_floor']; 
$person_apartment = $_POST['person_apartment']; 
if ($_POST['person_mother'] != ".   ") {
	$person_mother = substr($_POST['person_mother'], 0, strpos($_POST['person_mother'], "."));
} else {
	$person_mother = "NULL";
}
if ($_POST['person_father'] != ".   ") {
	$person_father = substr($_POST['person_father'], 0, strpos($_POST['person_father'], "."));
} else {
	$person_father = "NULL";
} 
$person_religion = $_POST['person_religion']; 
$person_political_views = $_POST['person_political_views']; 
$person_personal_priority = $_POST['person_personal_priority']; 
$person_important_in_others = $_POST['person_important_in_others']; 
$person_views_on_smoking = $_POST['person_views_on_smoking']; 
$person_views_on_alcohol = $_POST['person_views_on_alcohol']; 
$person_views_on_drugs = $_POST['person_views_on_drugs']; 
$person_drive_license = $_POST['person_drive_license']; 
$person_school_results = $_POST['person_school_results']; 
$person_ege_results = $_POST['person_ege_results']; 
$person_univer_results = $_POST['person_univer_results']; 
$person_iq_test = $_POST['person_iq_test']; 
$person_socionic_test = $_POST['person_socionic_test']; 
$person_political_test = $_POST['person_political_test'];
$person_bennet_test = $_POST['person_bennet_test']; 
$person_hikka_test = $_POST['person_hikka_test']; 
$person_death_status = $_POST['person_death_status']; 
$person_death_day = $_POST['person_death_day']; 
$person_death_month = $_POST['person_death_month']; 
$person_death_year = $_POST['person_death_year']; 
$person_death_hour = $_POST['person_death_hour']; 
$person_death_minute = $_POST['person_death_minute']; 
if ($id != 0) {
	$result = mysqli_query($link, "UPDATE person set 
									last_name = '$person_last_name'
									, first_name = '$person_first_name'
									, middle_name = '$person_middle_name'
									, nickname = '$person_nickname'
									, acquintance_type = '$person_acquintance_type'
									, sex = '$person_sex'
									, gender = '$person_gender'
									, birth_day = '$person_birth_day'
									, birth_month = '$person_birth_month'
									, birth_year = '$person_birth_year'
									, birth_hour = '$person_birth_hour'
									, birth_minute = '$person_birth_minute'
									, relationship_status = '$person_relationship_status'
									, height = '$person_height'
									, weight = '$person_weight'
									, home_city = '$person_home_city'
									, country = '$person_country'
									, city = '$person_city'
									, street = '$person_street'
									, building = '$person_building'
									, floor = '$person_floor'
									, apartment = '$person_apartment'
									, mother = $person_mother
									, father = $person_father
									, religion = '$person_religion'
									, political_views = '$person_political_views'
									, personal_priority = '$person_personal_priority'
									, important_in_others = '$person_important_in_others'
									, views_on_smoking = '$person_views_on_smoking'
									, views_on_alcohol = '$person_views_on_alcohol'
									, views_on_drugs = '$person_views_on_drugs'
									, drive_license = '$person_drive_license'
									, school_results = '$person_school_results'
									, ege_results = '$person_ege_results'
									, univer_results = '$person_univer_results'
									, iq_test = '$person_iq_test'
									, socionic_test = '$person_socionic_test'
									, political_test = '$person_political_test'
									, bennet_test = '$person_bennet_test'
									, hikka_test = '$person_hikka_test'
									, death_status = '$person_death_status'
									, death_day = '$person_death_day'
									, death_month = '$person_death_month'
									, death_year = '$person_death_year'
									, death_hour = '$person_death_hour'
									, death_minute = '$person_death_minute' 
									where id = '$id'");
} else {
	$result = mysqli_query($link, "INSERT INTO person 
									(last_name
									, first_name
									, middle_name
									, nickname
									, acquintance_type
									, sex
									, gender
									, birth_day
									, birth_month
									, birth_year
									, birth_hour
									, birth_minute
									, relationship_status
									, height, weight
									, home_city
									, country
									, city
									, street
									, building
									, floor
									, apartment
									, mother
									, father
									, religion
									, political_views
									, personal_priority
									, important_in_others
									, views_on_smoking
									, views_on_alcohol
									, views_on_drugs
									, drive_license
									, school_results
									, ege_results
									, univer_results
									, iq_test
									, socionic_test
									, political_test
									, bennet_test
									, hikka_test
									, death_status
									, death_day
									, death_month
									, death_year
									, death_hour
									, death_minute) 
									values 
									('$person_last_name'
									, '$person_first_name'
									, '$person_middle_name'
									, '$person_nickname'
									, '$person_acquintance_type'
									, '$person_sex'
									, '$person_gender'
									,'$person_birth_day'
									, '$person_birth_month'
									, '$person_birth_year'
									, '$person_birth_hour'
									, '$person_birth_minute'
									, '$person_relationship_status'
									, '$person_height'
									, '$person_weight'
									, '$person_home_city'
									, '$person_country'
									, '$person_city'
									, '$person_street'
									, '$person_building'
									, '$person_floor'
									,'$person_apartment'
									, $person_mother
									, $person_father
									, '$person_religion'
									, '$person_political_views'
									, '$person_personal_priority'
									, '$person_important_in_others'
									, '$person_views_on_smoking'
									, '$person_views_on_alcohol'
									, '$person_views_on_drugs'
									, '$person_drive_license'
									, '$person_school_results'
									, '$person_ege_results'
									, '$person_univer_results'
									, '$person_iq_test'
									, '$person_socionic_test'
									, '$person_political_test'
									, '$person_bennet_test'
									, '$person_hikka_test'
									, '$person_death_status'
									, '$person_death_day'
									, '$person_death_month'
									, '$person_death_year'
									, '$person_death_hour'
									, '$person_death_minute') ");
	$sub_result = mysqli_query($link, "SELECT MAX(id) as id FROM person");
	$myrow = mysqli_fetch_array($sub_result);
	$id = $myrow["id"];
}

$contacts_ids = $_POST['contacts_ids'];
$contacts_account = $_POST['contacts_account'];
$contacts_account_id = $_POST['contacts_account_id'];
$contacts_status = $_POST['contacts_status'];
for ($i = 0; $i < count($contacts_account); $i++) {
	if ($contacts_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE contacts set 
													account = '$contacts_account[$i]'
													, account_id = '$contacts_account_id[$i]'
													, status = '$contacts_status[$i]' 
													where id = '$contacts_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into contacts 
													(owner
													, account
													, account_id
													, status) 
													values 
													('$id'
													, '$contacts_account[$i]'
													, '$contacts_account_id[$i]'
													, '$contacts_status[$i]')");
	}
}

$education_ids = $_POST['education_ids'];
$education_type = $_POST['education_type']; 
$education_institution = $_POST['education_institution'];
$education_year_start = $_POST['education_year_start'];
$education_year_end = $_POST['education_year_end'];
$education_group = $_POST['education_group'];
for ($i = 0; $i < count($education_type); $i++) {
	if ($education_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE education set 
													type = '$education_type[$i]'
													, institution = '$education_institution[$i]'
													, year_start = '$education_year_start[$i]'
													, year_end = '$education_year_end[$i]'
													, `group` = '$education_group[$i]' 
													where id = '$education_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into education 
													(person_id
													, type
													, institution
													, year_start
													, year_end
													, `group`) 
													values 
													('$id'
													, '$education_type[$i]'
													, '$education_institution[$i]'
													, '$education_year_start[$i]'
													, '$education_year_end[$i]'
													,'$education_group[$i]')");
	}
}

$army_ids = $_POST['army_ids'];
$army_suitablility = $_POST['army_suitablility'];
$army_unit = $_POST['army_unit'];
$army_year_start = $_POST['army_year_start'];
$army_year_end = $_POST['army_year_end'];
$army_rank = $_POST['army_rank'];
for ($i = 0; $i < count($army_suitablility); $i++) {
	if ($army_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE army set 
													suitablility = '$army_suitablility[$i]'
													, unit = '$army_unit[$i]'
													, year_start = '$army_year_start[$i]'
													, year_end = '$army_year_end[$i]'
													, rank = '$army_rank[$i]' 
													where id = '$army_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into army 
													(person_id
													, suitablility
													, unit
													, year_start
													, year_end
													, rank) 
													values 
													('$id'
													,'$army_suitablility[$i]'
													, '$army_unit[$i]'
													, '$army_year_start[$i]'
													, '$army_year_end[$i]'
													, '$army_rank[$i]')");
	}
}

$work_ids = $_POST['work_ids'];
$work_company = $_POST['work_company'];
$work_post = $_POST['work_post'];
$work_year_start = $_POST['work_year_start'];
$work_year_end = $_POST['work_year_end'];
for ($i = 0; $i < count($work_company); $i++) {
	if ($work_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE work set 
													company = '$work_company[$i]'
													, post = '$work_post[$i]'
													, year_start = '$work_year_start[$i]'
													, year_end = '$work_year_end[$i]' 
													where id = '$work_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into work 
													(person_id
													, company
													, post
													, year_start
													, year_end) 
													values 
													('$id'
													, '$work_company[$i]'
													, '$work_post[$i]'
													, '$work_year_start[$i]'
													, '$work_year_end[$i]')");
	}
}

$relationship_ids = $_POST['relationship_ids']; 
$relationship_person_1 = $_POST['relationship_person_1'];
$relationship_person_2 = $_POST['relationship_person_2'];
$relationship_relation_type = $_POST['relationship_relation_type'];
$relationship_year_start = $_POST['relationship_year_start'];
$relationship_month_start = $_POST['relationship_month_start']; 
$relationship_day_start = $_POST['relationship_day_start'];
$relationship_year_end = $_POST['relationship_year_end'];
$relationship_month_end = $_POST['relationship_month_end'];
$relationship_day_end = $_POST['relationship_day_end'];
for ($i = 0; $i < count($relationship_relation_type); $i++) {
	if ($relationship_person_1[$i] != ".   ") {
		$relationship_person_1[$i] = substr($relationship_person_1[$i], 0, strpos($relationship_person_1[$i], "."));
	} else {
		$relationship_person_1[$i] = "NULL";
	} 
	if ($relationship_person_2[$i] != ".   ") {
		$relationship_person_2[$i] = substr($relationship_person_2[$i], 0, strpos($relationship_person_2[$i], "."));
	} else {
		$relationship_person_2[$i] = "NULL";
	} 
	if ($relationship_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE relationship set 
													person_1 = $relationship_person_1[$i]
													, person_2 = $relationship_person_2[$i]
													, relation_type = '$relationship_relation_type[$i]'
													, year_start = '$relationship_year_start[$i]'
													, month_start = '$relationship_month_start[$i]'
													, day_start = '$relationship_day_start[$i]'
													, year_end = '$relationship_year_end[$i]'
													, month_end = '$relationship_month_end[$i]'
													, day_end = '$relationship_day_end[$i]' 
													where id = '$relationship_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into relationship 
													(person_1
													, person_2
													, relation_type
													, year_start
													, month_start
													, day_start
													, year_end
													, month_end
													, day_end) 
													values 
													($relationship_person_1[$i]
													, $relationship_person_2[$i]
													, '$relationship_relation_type[$i]'
													, '$relationship_year_start[$i]'
													, '$relationship_month_start[$i]'
													, '$relationship_day_start[$i]'
													, '$relationship_year_end[$i]'
													, '$relationship_month_end[$i]'
													, '$relationship_day_end[$i]' )");
	}
}

$skills_ids = $_POST['skills_ids'];
$skills_skill = $_POST['skills_skill'];
$skills_level = $_POST['skills_level'];
for ($i = 0; $i < count($skills_skill); $i++) {
	if ($skills_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE skills set 
													skill = '$skills_skill[$i]'
													, level = '$skills_level[$i]' 
													where id = '$skills_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into skills 
													(person
													, skill
													, level) 
													values 
													('$id'
													, '$skills_skill[$i]'
													, '$skills_level[$i]')");
	}
}

$languages_ids = $_POST['languages_ids'];
$languages_language = $_POST['languages_language'];
$languages_level = $_POST['languages_level'];
for ($i = 0; $i < count($languages_language); $i++) {
	if ($languages_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE languages set 
													language = '$languages_language[$i]'
													, level = '$languages_level[$i]' 
													where id = '$languages_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into languages 
													(person_id
													, language
													, level) 
													values 
													('$id'
													, '$languages_language[$i]'
													, '$languages_level[$i]')");
	}
}

$likes_ids = $_POST['likes_ids'];
$likes_like_status = $_POST['likes_like_status'];
$likes_object_type = $_POST['likes_object_type'];
$likes_object = $_POST['likes_object'];
for ($i = 0; $i < count($likes_like_status); $i++) {
	if ($likes_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE likes set 
													like_status = '$likes_like_status[$i]'
													, object_type = '$likes_object_type[$i]'
													, object = '$likes_object[$i]' 
													where id = '$likes_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into likes 
													(person
													, like_status
													, object_type
													, object) 
													values 
													('$id'
													, '$likes_like_status[$i]'
													, '$likes_object_type[$i]'
													, '$likes_object[$i]')");
	}
}

$property_ids = $_POST['property_ids'];
$property_property_type = $_POST['property_property_type'];
$property_property_name = $_POST['property_property_name'];
for ($i = 0; $i < count($property_property_type); $i++) {
	if ($property_ids[$i]) {
		$result = $result AND mysqli_query($link, "UPDATE property set 
													property_type = '$property_property_type[$i]'
													, property_name = '$property_property_name[$i]' 
													where id = '$property_ids[$i]'");
	} else {
		$result = $result AND mysqli_query($link, "INSERT into property 
													(person_id
													, property_type
													, property_name) 
													values 
													('$id'
													, '$property_property_type[$i]'
													, '$property_property_name[$i]')");
	}
}

mysqli_close($link);
if ($result == 'true') { 
	echo'<span style = "color: red; font-weight: bold;">OK</span>'; 
	$url = "/person/index.php?id=$id";
	ob_start();
	header('Location: '.$url);
	ob_end_flush();
	die();
} else { 
	echo'<span style = "color: red; font-weight: bold;">Something went wrong</span>'; 
} 
?>