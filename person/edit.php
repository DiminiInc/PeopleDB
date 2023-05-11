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
        } else {
            $id = 0;
        }
        $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
        $row = mysqli_fetch_array($result);
        if (!is_null($row)) {
            $person_id = $row['id'];
            ?>
            <div>
                <h1>
                    <?php echo $row['last_name'] ?>&#32;
                    <?php echo $row['first_name'] ?>&#32;
                    <?php echo $row['middle_name'] ?>
                </h1>
                <h4>
                    <?php echo $row['nickname'] ?>&#32;-&#32;
                    <?php echo $row['acquaintance_type'] ?>
                </h4>
            </div>
            <div>
                <button name='submit' type='submit' value='Update data' form='extForm' class='btn btn-primary btn-lg'>
                    Update
                </button>
            </div>
            <?php
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
        </div>
        <form id='extForm' action='update.php?id=<?php echo $id; ?>' method='post' name='form'>
            <div id="general" class="tab-content active">
                <h2>General</h2>
                <table class="table table-striped table-bordered" style="width:100%">
                    <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
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
                        ?>
                        <tr>
                            <td>Last name</td>
                            <td><input name="person_last_name" placeholder="Last name"
                                       value="<?php echo $row['last_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td>First name</td>
                            <td><input name="person_first_name" placeholder="First name"
                                       value="<?php echo $row['first_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Middle name</td>
                            <td><input name="person_middle_name" placeholder="Middle name"
                                       value="<?php echo $row['middle_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Nickname</td>
                            <td><input name="person_nickname" placeholder="Nickname"
                                       value="<?php echo $row['nickname'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Acquaintance type</td>
                            <td>
                                <input name="person_acquaintance_type" placeholder="Acquaintance type"
                                       value="<?php echo $row['acquaintance_type'] ?>"
                                       list="person_acquaintance_type_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td><input name="person_sex" placeholder="Sex" value="<?php echo $sex ?>"
                                       list="person_sex_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input name="person_gender" placeholder="Gender" value="<?php echo $row['gender'] ?>"
                                       list="person_gender_list"></td>
                        </tr>
                        <tr>
                            <td>Orientation</td>
                            <td><input name="person_orientation" placeholder="Orientation"
                                       value="<?php echo $row['orientation'] ?>" list="person_orientation_list"></td>
                        </tr>
                        <tr>
                            <td>Birth day</td>
                            <td><input name="person_birth_day" placeholder="Birth day"
                                       value="<?php echo $row['birth_day'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Birth month</td>
                            <td><input name="person_birth_month" placeholder="Birth month"
                                       value="<?php echo $row['birth_month'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Birth year</td>
                            <td><input name="person_birth_year" placeholder="Birth year"
                                       value="<?php echo $row['birth_year'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Birth hour</td>
                            <td><input name="person_birth_hour" placeholder="Birth hour"
                                       value="<?php echo $row['birth_hour'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Birth minute</td>
                            <td><input name="person_birth_minute" placeholder="Birth minute"
                                       value="<?php echo $row['birth_minute'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Relationship status</td>
                            <td><input name="person_relationship_status" placeholder="Relationship status"
                                       value="<?php echo $row['relationship_status'] ?>"
                                       list="person_relationship_status_list"></td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td><input name="person_height" placeholder="Height" value="<?php echo $row['height'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td><input name="person_weight" placeholder="Weight" value="<?php echo $row['weight'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Home city</td>
                            <td><input name="person_home_city" placeholder="Home city"
                                       value="<?php echo $row['home_city'] ?>"
                                       list="person_home_city_list"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><input name="person_country" placeholder="Country" value="<?php echo $row['country'] ?>"
                                       list="person_country_list"></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input name="person_city" placeholder="City" value="<?php echo $row['city'] ?>"
                                       list="person_city_list"></td>
                        </tr>
                        <tr>
                            <td>Street</td>
                            <td><input name="person_street" placeholder="Street" value="<?php echo $row['street'] ?>"
                                       list="person_street_list"></td>
                        </tr>
                        <tr>
                            <td>Building</td>
                            <td><input name="person_building" placeholder="Building"
                                       value="<?php echo $row['building'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Floor</td>
                            <td><input name="person_floor" placeholder="Floor" value="<?php echo $row['floor'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Apartment</td>
                            <td><input name="person_apartment" placeholder="Apartment"
                                       value="<?php echo $row['apartment'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Mother</td>
                            <td><input name="person_mother" placeholder="Mother"
                                       value="<?php echo $mother ? $mother['id'] : '' ?>. <?php echo $mother ? $mother['last_name'] : '' ?> <?php echo $mother ? $mother['first_name'] : '' ?> <?php echo $mother ? $mother['middle_name'] : '' ?>"
                                       list="person_mother_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Father</td>
                            <td><input name="person_father" placeholder="Father"
                                       value="<?php echo $father ? $father['id'] : '' ?>. <?php echo $father ? $father['last_name'] : '' ?> <?php echo $father ? $father['first_name'] : '' ?> <?php echo $father ? $father['middle_name'] : '' ?>"
                                       list="person_father_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td><input name="person_religion" placeholder="Religion"
                                       value="<?php echo $row['religion'] ?>"
                                       list="person_religion_list"></td>
                        </tr>
                        <tr>
                            <td>Political views</td>
                            <td><input name="person_political_views" placeholder="Political views"
                                       value="<?php echo $row['political_views'] ?>" list="person_political_views_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Personal priority</td>
                            <td><input name="person_personal_priority" placeholder="Personal priority"
                                       value="<?php echo $row['personal_priority'] ?>"
                                       list="person_personal_priority_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Important in others</td>
                            <td><input name="person_important_in_others" placeholder="Important in others"
                                       value="<?php echo $row['important_in_others'] ?>"
                                       list="person_important_in_others_list"></td>
                        </tr>
                        <tr>
                            <td>Views on smoking</td>
                            <td><input name="person_views_on_smoking" placeholder="Views on smoking"
                                       value="<?php echo $row['views_on_smoking'] ?>"
                                       list="person_views_on_smoking_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Views on alcohol</td>
                            <td><input name="person_views_on_alcohol" placeholder="Views on alcohol"
                                       value="<?php echo $row['views_on_alcohol'] ?>"
                                       list="person_views_on_alcohol_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Views on drugs</td>
                            <td><input name="person_views_on_drugs" placeholder="Views on drugs"
                                       value="<?php echo $row['views_on_drugs'] ?>" list="person_views_on_drugs_list">
                            </td>
                        </tr>
                        <tr>
                            <td>Drive license</td>
                            <td><input name="person_drive_license" placeholder="Drive license"
                                       value="<?php echo $row['drive_license'] ?>"></td>
                        </tr>
                        <tr>
                            <td>School results</td>
                            <td><input name="person_school_results" placeholder="School results"
                                       value="<?php echo $row['school_results'] ?>"></td>
                        </tr>
                        <tr>
                            <td>EGE results</td>
                            <td><input name="person_ege_results" placeholder="EGE results"
                                       value="<?php echo $row['ege_results'] ?>"></td>
                        </tr>
                        <tr>
                            <td>University results</td>
                            <td><input name="person_univer_results" placeholder="University results"
                                       value="<?php echo $row['univer_results'] ?>"></td>
                        </tr>
                        <tr>
                            <td>IQ test</td>
                            <td><input name="person_iq_test" placeholder="IQ test"
                                       value="<?php echo $row['iq_test'] ?>"></td>
                        </tr>
                        '
                        <tr>
                            <td>Socionic test</td>
                            <td><input name="person_socionic_test" placeholder="Socionic test"
                                       value="<?php echo $row['socionic_test'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Political test</td>
                            <td><input name="person_political_test" placeholder="Political test"
                                       value="<?php echo $row['political_test'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Bennet test</td>
                            <td><input name="person_bennet_test" placeholder="Bennet test"
                                       value="<?php echo $row['bennet_test'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Hikka test</td>
                            <td><input name="person_hikka_test" placeholder="Hikka test"
                                       value="<?php echo $row['hikka_test'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Death status</td>
                            <td><input name="person_death_status" placeholder="Death status"
                                       value="<?php echo $row['death_status'] ?>" list="person_death_status_list"></td>
                        </tr>
                        <tr>
                            <td>Death day</td>
                            <td><input name="person_death_day" placeholder="Death day"
                                       value="<?php echo $row['death_day'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Death month</td>
                            <td><input name="person_death_month" placeholder="Death month"
                                       value="<?php echo $row['death_month'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Death year</td>
                            <td><input name="person_death_year" placeholder="Death year"
                                       value="<?php echo $row['death_year'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Death hour</td>
                            <td><input name="person_death_hour" placeholder="Death hour"
                                       value="<?php echo $row['death_hour'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Death minute</td>
                            <td><input name="person_death_minute" placeholder="Death minute"
                                       value="<?php echo $row['death_minute'] ?>"></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="person_acquaintance_type_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT acquaintance_type FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['acquaintance_type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_sex_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT sex FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            $sex = $row['sex'] == 1 ? "Мужской" : "Женский";
                            ?>
                            <option value='<?php echo $sex ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_gender_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT gender FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['gender'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_orientation_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT orientation FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['orientation'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_relationship_status_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT relationship_status FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['relationship_status'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_home_city_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT home_city FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['home_city'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_country_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT country FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['country'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_city_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT city FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['city'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_street_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT street FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['street'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_mother_list">
                    <?php
                    $result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person where sex=0");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option
                                value='<?php echo $row['id'] ?>. <?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_father_list">
                    <?php
                    $result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person where sex=1");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option
                                value='<?php echo $row['id'] ?>. <?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_religion_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT religion FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['religion'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_political_views_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT political_views FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['political_views'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_personal_priority_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT personal_priority FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['personal_priority'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_important_in_others_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT important_in_others FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['important_in_others'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_views_on_smoking_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT views_on_smoking FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['views_on_smoking'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_views_on_alcohol_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT views_on_alcohol FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['views_on_alcohol'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_views_on_drugs_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT views_on_drugs FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['views_on_drugs'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="person_death_status_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT death_status FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['death_status'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="contacts" class="tab-content">
                <h2>Contacts</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'contactsTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Account</td>
                        <td>Identifier</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                    <tbody id="contactsTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM contacts where owner='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="contacts_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly>
                                </td>
                                <td><input name="contacts_account[]" placeholder="Account type"
                                           value="<?php echo $row['account'] ?>" list="contacts_account_list"></td>
                                <td><input name="contacts_account_id[]" placeholder="Account ID"
                                           value="<?php echo $row['account_id'] ?>"></td>
                                <td><input name="contacts_status[]" placeholder="Status"
                                           value="<?php echo $row['status'] ?>"
                                           list="contacts_status_list"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="contacts_account_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT account FROM contacts");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['account'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="contacts_status_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT status FROM contacts");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['status'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="education" class="tab-content">
                <h2>Education</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'educationTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Type</td>
                        <td>Institution</td>
                        <td>Start year</td>
                        <td>End year</td>
                        <td>Group</td>
                    </tr>
                    </thead>
                    <tbody id="educationTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM education where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="education_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="education_type[]" placeholder="Type" value="<?php echo $row['type'] ?>"
                                           list="education_type_list"></td>
                                <td><input name="education_institution[]" placeholder="Institution"
                                           value="<?php echo $row['institution'] ?>" list="education_institution_list">
                                </td>
                                <td><input name="education_year_start[]" placeholder="Year start"
                                           value="<?php echo $row['year_start'] ?>"></td>
                                <td><input name="education_year_end[]" placeholder="Year end"
                                           value="<?php echo $row['year_end'] ?>"></td>
                                <td><input name="education_group[]" placeholder="Group"
                                           value="<?php echo $row['group'] ?>" list="education_group_list"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="education_type_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT type FROM education");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="education_institution_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT institution FROM education");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['institution'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="education_group_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT `group` FROM education");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['group'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="army" class="tab-content">
                <h2>Army</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'armyTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Medical profile</td>
                        <td>Unit</td>
                        <td>Start year</td>
                        <td>End year</td>
                        <td>Rank</td>
                    </tr>
                    </thead>
                    <tbody id="armyTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM army where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            if ($row['suitability'] === '1') {
                                $suitability = "Годен";
                            } elseif ($row['suitability'] === '0') {
                                $suitability = "Не годен";
                            } else {
                                $suitability = "";
                            }
                            ?>
                            <tr>
                                <td><input name="army_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>" readonly>
                                </td>
                                <td><input name="army_suitability[]" placeholder="Suitability"
                                           value="<?php echo $suitability ?>" list="army_suitability_list"></td>
                                <td><input name="army_unit[]" placeholder="Unit" value="<?php echo $row['unit'] ?>"
                                           list="army_unit_list"></td>
                                <td><input name="army_year_start[]" placeholder="Year start"
                                           value="<?php echo $row['year_start'] ?>"></td>
                                <td><input name="army_year_end[]" placeholder="Year end"
                                           value="<?php echo $row['year_end'] ?>"></td>
                                <td><input name="army_rank[]" placeholder="Rank" value="<?php echo $row['rank'] ?>"
                                           list="army_rank_list"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="army_suitability_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT suitability FROM army");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            $suitability = $row['suitability'] === '0' ? "Не годен" : "Годен";
                            ?>
                            <option value='<?php echo $suitability ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="army_unit_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT unit FROM army");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                    do {
                    ?>
                    <option value='<?php echo $row['unit'] ?>'>
                        <?php
                        } while ($row = mysqli_fetch_array($result));
                        }
                        ?>
                </datalist>
                <datalist id="army_rank_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT rank FROM army");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['rank'] ?>"'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="work" class="tab-content">
                <h2>Work</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'workTableBody')" class="btn btn-primary">Add
                        more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Company</td>
                        <td>Post</td>
                        <td>Start year</td>
                        <td>End year</td>
                    </tr>
                    </thead>
                    <tbody id="workTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM work where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="work_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>" readonly>
                                </td>
                                <td><input name="work_company[]" placeholder="Company"
                                           value="<?php echo $row['company'] ?>" list="work_company_list"></td>
                                <td><input name="work_post[]" placeholder="Post" value="<?php echo $row['post'] ?>"
                                           list="work_post_list"></td>
                                <td><input name="work_year_start[]" placeholder="Year start"
                                           value="<?php echo $row['year_start'] ?>"></td>
                                <td><input name="work_year_end[]" placeholder="Year end"
                                           value="<?php echo $row['year_end'] ?>"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="work_company_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT company FROM work");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['company'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="work_post_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT post FROM work");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['post'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="relationship" class="tab-content">
                <h2>Relationship</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'relationshipTableBody')"
                            class="btn btn-primary">Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
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
                    <tbody id="relationshipTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM relationship where person_1='$id' or person_2='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            $person_1_id = $row['person_1'];
                            $person_2_id = $row['person_2'];
                            $person_1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$person_1_id'"));
                            $person_2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM person where id='$person_2_id'"));
                            ?>
                            <tr>
                                <td><input name="relationship_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="relationship_person_1[]" placeholder="Person 1"
                                           value="<?php echo $person_1['id'] ?>. <?php echo $person_1['last_name'] ?> <?php echo $person_1['first_name'] ?> <?php echo $person_1['middle_name'] ?>"
                                           list="relationship_person_list"></td>
                                <td><input name="relationship_person_2[]" placeholder="Person 2"
                                           value="<?php echo $person_2['id'] ?>. <?php echo $person_2['last_name'] ?> <?php echo $person_2['first_name'] ?> <?php echo $person_2['middle_name'] ?>"
                                           list="relationship_person_list"></td>
                                <td><input name="relationship_relation_type[]" placeholder="Relation type"
                                           value="<?php echo $row['relation_type'] ?>"
                                           list="relationship_relation_type_list"></td>
                                <td><input name="relationship_year_start[]" placeholder="Year start" size="10"
                                           value="<?php echo $row['year_start'] ?>"></td>
                                <td><input name="relationship_month_start[]" placeholder="Month start" size="10"
                                           value="<?php echo $row['month_start'] ?>"></td>
                                <td><input name="relationship_day_start[]" placeholder="Day start" size="10"
                                           value="<?php echo $row['day_start'] ?>"></td>
                                <td>
                                    <input name="relationship_year_end[]" placeholder="Year end" size="10"
                                           value="<?php echo $row['year_end'] ?>"></td>
                                <td><input name="relationship_month_end[]" placeholder="Month end" size="10"
                                           value="<?php echo $row['month_end'] ?>"></td>
                                <td><input name="relationship_day_end[]" placeholder="Day end" size="10"
                                           value="<?php echo $row['day_end'] ?>"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="relationship_person_list">
                    <?php
                    $result = mysqli_query($link, "SELECT id, last_name, first_name, middle_name FROM person");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option
                                value='<?php echo $row['id'] ?>. <?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="relationship_relation_type_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT relation_type FROM relationship");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['relation_type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="skills" class="tab-content">
                <h2>Skills</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'skillsTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Skill</td>
                        <td>Level</td>
                    </tr>
                    </thead>
                    <tbody id="skillsTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM skills where person='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="skills_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="skills_skill[]" placeholder="Skill" value="<?php echo $row['skill'] ?>"
                                           list="skills_skill_list"></td>
                                <td><input name="skills_level[]" placeholder="Level" value="<?php echo $row['level'] ?>"
                                           list="skills_level_list"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="skills_skill_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT skill FROM skills");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['skill'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="skills_level_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT level FROM skills");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['level'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="languages" class="tab-content">
                <h2>Languages</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'languagesTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Language</td>
                        <td>Level</td>
                    </tr>
                    </thead>
                    <tbody id="languagesTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM languages where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="languages_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="languages_language[]" placeholder="Language"
                                           value="<?php echo $row['language'] ?>" list="languages_language_list"></td>
                                <td><input name="languages_level[]" placeholder="Level"
                                           value="<?php echo $row['level'] ?>" list="languages_level_list"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="languages_language_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT language FROM languages");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['language'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="languages_level_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT level FROM languages");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['level'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="likes" class="tab-content">
                <h2>Likes</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'likesTableBody')" class="btn btn-primary">
                        Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Status</td>
                        <td>Object type</td>
                        <td>Object</td>
                    </tr>
                    </thead>
                    <tbody id="likesTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM likes where person='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="likes_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="likes_like_status[]" placeholder="Like status"
                                           value="<?php echo $row['like_status'] ?>" list="likes_like_status_list"></td>
                                <td><input name="likes_object_type[]" placeholder="Object type"
                                           value="<?php echo $row['object_type'] ?>" list="likes_object_type_list"></td>
                                <td><input name="likes_object[]" placeholder="Object"
                                           value="<?php echo $row['object'] ?>"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="likes_like_status_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT like_status FROM likes");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['like_status'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
                <datalist id="likes_object_types_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT object_type FROM likes");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['object_type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="property" class="tab-content">
                <h2>Property</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'propertyTableBody')" class="btn btn-primary">Add
                        more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Property type</td>
                        <td>Property</td>
                    </tr>
                    </thead>
                    <tbody id="propertyTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM property where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="property_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                                           readonly></td>
                                <td><input name="property_property_type[]" placeholder="Property type"
                                           value="<?php echo $row['property_type'] ?>"
                                           list="property_property_type_list"></td>
                                <td><input name="property_property_name[]" placeholder="Property name"
                                           value="<?php echo $row['property_name'] ?>"></td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="property_property_type_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT property_type FROM property");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['property_type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                </datalist>
            </div>
            <div id="alternativeNames" class="tab-content">
                <h2>Alternative names</h2>
                <div>
                    <button type="button" onclick="addInput(event, 'alternativeNamesTableBody')"
                            class="btn btn-primary">Add more
                    </button>
                </div>
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Type</td>
                    </tr>
                    </thead>
                    <tbody id="alternativeNamesTableBody">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM alternative_last_names where person_id='$id'");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <tr>
                                <td><input name="alternative_names_ids[]" placeholder="ID"
                                           value="<?php echo $row['id'] ?>" readonly></td>
                                <td><input name="alternative_names_name[]" placeholder="Name"
                                           value="<?php echo $row['last_name'] ?>"></td>
                                <td><input name="alternative_names_type[]" placeholder="Type"
                                           value="<?php echo $row['change_type'] ?>" list="alternative_names_type_list">
                                </td>
                            </tr>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
                    ?>
                    </tbody>
                </table>
                <datalist id="alternative_names_type_list">
                    <?php
                    $result = mysqli_query($link, "SELECT DISTINCT change_type FROM alternative_last_names");
                    $row = mysqli_fetch_array($result);
                    if (!is_null($row)) {
                        do {
                            ?>
                            <option value='<?php echo $row['change_type'] ?>'></option>
                            <?php
                        } while ($row = mysqli_fetch_array($result));
                    }
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