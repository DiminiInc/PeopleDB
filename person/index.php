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
    <meta property="og:title" content="PeopleDB"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://peopledb.localhost"/>
    <meta property="og:image" content="../peopledb.png"/>
    <meta property="og:description" content="PeopleDB"/>
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
        }
        $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
        $row = mysqli_fetch_assoc($result);
        if (!is_null($row)) {
            $person_id = $row['id'];
            echo "<div>
					<h1>" . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</h1>
					<h4>" . $row['nickname'] . " - " . $row['acquintance_type'] . "</h4>
				</div>
				<div>
					<a href=\"/person/edit.php?id=$id\"class=\"btn btn-primary btn-lg\">Edit</a>
				</div>";
        }
        ?>
    </div>
    <div class="data-section">
        <div class="tab">
            <button class="tab-links active" onclick="loginTabsChange(event, 'general')">General</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'contacts')">Contacts</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'education')">Education</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'army')">Army</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'work')">Work</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'relationship')">Relationship</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'skills')">Skills</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'languages')">Languages</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'likes')">Likes</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'property')">Property</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'alternativeNames')">Alternative names</button>
            <button class="tab-links" onclick="loginTabsChange(event, 'photos')">Photos</button>
        </div>
        <div id="general" class="tab-content active">
            <h2>General</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
                $row = mysqli_fetch_assoc($result);
                if (!is_null($row)) {
                    $mother_id = $row['mother'];
                    $father_id = $row['father'];
                    $mother = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$mother_id'"));
                    $father = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$father_id'"));
                    if ($row['sex'] === '1') {
                        $sex = "Мужской";
                    } elseif ($row['sex'] === '0') {
                        $sex = "Женский";
                    } else {
                        $sex = "";
                    }
                    echo "<tr><td>Name</td><td>" . $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</td></tr>
							<tr><td>Nickname</td><td>" . $row['nickname'] . "</td></tr>
							<tr><td>Acquintance type</td><td>" . $row['acquintance_type'] . "</td></tr>
							<tr><td>Sex</td><td>" . $sex . "</td></tr>
							<tr><td>Gender</td><td>" . $row['gender'] . "</td></tr>
							<tr><td>Orientation</td><td>" . $row['orientation'] . "</td></tr>
							<tr><td>Birth date</td><td>" . $row['birth_day'] . "." . $row['birth_month'] . "." . $row['birth_year'] . " " . $row['birth_hour'] . ":" . $row['birth_minute'] . "</td></tr>
							<tr><td>Relationship status</td><td>" . $row['relationship_status'] . "</td></tr>
							<tr><td>Height</td><td>" . $row['height'] . "</td></tr>
							<tr><td>Weight</td><td>" . $row['weight'] . "</td></tr>
							<tr><td>Home city</td><td>" . $row['home_city'] . "</td></tr>
							<tr><td>Address</td><td>" . $row['country'] . ", " . $row['city'] . ", " . $row['street'] . ", д. " . $row['building'] . ", этаж " . $row['floor'] . ", кв. " . $row['apartment'] . "</td></tr>
							<tr onclick='window.location=\"/person/index.php?id=$mother_id\";'>
								<td>Mother</td>
								<td>" . ($mother ? $mother['last_name'] : '') . " " . ($mother ? $mother['first_name'] : '') . " " . ($mother ? $mother['middle_name'] : '') . " " . "</td>
							</tr>
							<tr onclick='window.location=\"/person/index.php?id=$father_id\";'>
								<td>Father</td>
								<td>" . ($father ? $father['last_name'] : '') . " " . ($father ? $father['first_name'] : '') . " " . ($father ? $father['middle_name'] : '') . " " . "</td>
							</tr>
							<tr><td>Religion</td><td>" . $row['religion'] . "</td></tr>
							<tr><td>Political views</td><td>" . $row['political_views'] . "</td></tr>
							<tr><td>Personal priority</td><td>" . $row['personal_priority'] . "</td></tr>
							<tr><td>Important in others</td><td>" . $row['important_in_others'] . "</td></tr>
							<tr><td>Views on smoking</td><td>" . $row['views_on_smoking'] . "</td></tr>
							<tr><td>Views on alcohol</td><td>" . $row['views_on_alcohol'] . "</td></tr>
							<tr><td>Views on drugs</td><td>" . $row['views_on_drugs'] . "</td></tr>
							<tr><td>Drive license</td><td>" . $row['drive_license'] . "</td></tr>
							<tr><td>School results</td><td>" . $row['school_results'] . "</td></tr>
							<tr><td>EGE results</td><td>" . $row['ege_results'] . "</td></tr>
							<tr><td>University results</td><td>" . $row['univer_results'] . "</td></tr>
							<tr><td>IQ test</td><td>" . $row['iq_test'] . "</td></tr>
							<tr><td>Socionic test</td><td>" . $row['socionic_test'] . "</td></tr>
							<tr><td>Political test</td><td>" . $row['political_test'] . "</td></tr>
							<tr><td>Bennet test</td><td>" . $row['bennet_test'] . "</td></tr>
							<tr><td>Hikka test</td><td>" . $row['hikka_test'] . "</td></tr>
							<tr><td>Death status</td><td>" . $row['death_status'] . "</td></tr>
							<tr><td>Death date</td><td>" . $row['death_day'] . "." . $row['death_month'] . "." . $row['death_year'] . " " . $row['death_hour'] . ":" . $row['death_minute'] . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div id="contacts" class="tab-content">
            <h2>Contacts</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Account</td>
                    <td>Identificator</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM contacts where owner='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
									<td>" . $row['account'] . "</td>
									<td>" . $row['account_id'] . "</td>
									<td>" . $row['status'] . "</td>
								</tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="education" class="tab-content">
            <h2>Education</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Type</td>
                    <td>Institution</td>
                    <td>Start year</td>
                    <td>End year</td>
                    <td>Group</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM education where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['type'] . "</td>
                                        <td>" . $row['institution'] . "</td>
                                        <td>" . $row['year_start'] . "</td>
                                        <td>" . $row['year_end'] . "</td>
                                        <td>" . $row['group'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="army" class="tab-content">
            <h2>Army</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Medical profile</td>
                    <td>Unit</td>
                    <td>Start year</td>
                    <td>End year</td>
                    <td>Rank</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM army where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        if ($row['suitablility'] === '1') {
                            $suitability = "Годен";
                        } elseif ($row['suitablility'] === '0') {
                            $suitability = "Не годен";
                        } else {
                            $suitability = "";
                        }
                        echo "<tr>
                                        <td>" . $suitability . "</td>
                                        <td>" . $row['unit'] . "</td>
                                        <td>" . $row['year_start'] . "</td>
                                        <td>" . $row['year_end'] . "</td>
                                        <td>" . $row['rank'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="work" class="tab-content">
            <h2>Work</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Company</td>
                    <td>Post</td>
                    <td>Start year</td>
                    <td>End year</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM work where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['company'] . "</td>
                                        <td>" . $row['post'] . "</td>
                                        <td>" . $row['year_start'] . "</td>
                                        <td>" . $row['year_end'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="relationship" class="tab-content">
            <h2>Relationship</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Person 1</td>
                    <td>Person 2</td>
                    <td>Relation type</td>
                    <td>Start year</td>
                    <td>Start month</td>
                    <td>Start day</td>
                    <td>End year</td>
                    <td>End month</td>
                    <td>End day</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM relationship where person_1='$id' or person_2='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        $person_1_id = $row['person_1'];
                        $person_2_id = $row['person_2'];
                        $person_1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$person_1_id'"));
                        $person_2 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$person_2_id'"));
                        echo "<tr>
                                        <td>" . $person_1['last_name'] . " " . $person_1['first_name'] . " " . $person_1['middle_name'] . "</td>
                                        <td>" . $person_2['last_name'] . " " . $person_2['first_name'] . " " . $person_2['middle_name'] . "</td>
                                        <td>" . $row['relation_type'] . "</td>
                                        <td>" . $row['year_start'] . "</td>
                                        <td>" . $row['month_start'] . "</td>
                                        <td>" . $row['day_start'] . "</td>
                                        <td>" . $row['year_end'] . "</td>
                                        <td>" . $row['month_end'] . "</td>
                                        <td>" . $row['day_end'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="skills" class="tab-content">
            <h2>Skills</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Skill</td>
                    <td>Level</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM skills where person='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['skill'] . "</td>
                                        <td>" . $row['level'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="languages" class="tab-content">
            <h2>Languages</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Language</td>
                    <td>Level</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM languages where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['language'] . "</td>
                                        <td>" . $row['level'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="likes" class="tab-content">
            <h2>Likes</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Status</td>
                    <td>Object type</td>
                    <td>Object</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM likes where person='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['like_status'] . "</td>
                                        <td>" . $row['object_type'] . "</td>
                                        <td>" . $row['object'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="property" class="tab-content">
            <h2>Property</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Property type</td>
                    <td>Property</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM property where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['property_type'] . "</td>
                                        <td>" . $row['property_name'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="alternativeNames" class="tab-content">
            <h2>Alternative names</h2>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Type</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM alternative_last_names where person_id='$id'");
                $row = mysqli_fetch_assoc($result);
                do {
                    if (!is_null($row)) {
                        echo "<tr>
                                        <td>" . $row['last_name'] . "</td>
                                        <td>" . $row['change_type'] . "</td>
                                    </tr>";
                    }
                } while ($row = mysqli_fetch_assoc($result));
                ?>
                </tbody>
            </table>
        </div>
        <div id="photos" class="tab-content">
            <h2>Photos</h2>
            <div class="grid-container">
                <?php
                $i = 0;
                if (isset($person_id)) {
                    while (file_exists($path . "/images/" . $person_id . "/" . $i . ".jpg")) {
                        echo "<div>
					  			<img src=\"/images/" . $person_id . "/" . $i . ".jpg\" alt=\"Person photo\">
				  			</div>";
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($link);
require_once($path . "/footer.php");
?>
</body>
</html>