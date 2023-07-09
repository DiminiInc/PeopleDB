<table class="table table-striped table-bordered" style="width:100%">
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
    $row = mysqli_fetch_array($result);
    $mother = null;
    $father = null;
    $sex = null;
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
    }
    ?>
    <tr>
        <td>Last name</td>
        <td><input name="person_last_name" placeholder="Last name"
                   value="<?php echo $row ? $row['last_name'] : '' ?>"></td>
    </tr>
    <tr>
        <td>First name</td>
        <td><input name="person_first_name" placeholder="First name"
                   value="<?php echo $row ? $row['first_name'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Middle name</td>
        <td><input name="person_middle_name" placeholder="Middle name"
                   value="<?php echo $row ? $row['middle_name'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Nickname</td>
        <td><input name="person_nickname" placeholder="Nickname"
                   value="<?php echo $row ? $row['nickname'] : '' ?>">
        </td>
    </tr>
    <tr>
        <td>Acquaintance type</td>
        <td>
            <input name="person_acquaintance_type" placeholder="Acquaintance type"
                   value="<?php echo $row ? $row['acquaintance_type'] : '' ?>"
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
        <td><input name="person_gender" placeholder="Gender"
                   value="<?php echo $row ? $row['gender'] : '' ?>"
                   list="person_gender_list"></td>
    </tr>
    <tr>
        <td>Orientation</td>
        <td><input name="person_orientation" placeholder="Orientation"
                   value="<?php echo $row ? $row['orientation'] : '' ?>" list="person_orientation_list">
        </td>
    </tr>
    <tr>
        <td>Birth day</td>
        <td><input name="person_birth_day" placeholder="Birth day"
                   value="<?php echo $row ? $row['birth_day'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Birth month</td>
        <td><input name="person_birth_month" placeholder="Birth month"
                   value="<?php echo $row ? $row['birth_month'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Birth year</td>
        <td><input name="person_birth_year" placeholder="Birth year"
                   value="<?php echo $row ? $row['birth_year'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Birth hour</td>
        <td><input name="person_birth_hour" placeholder="Birth hour"
                   value="<?php echo $row ? $row['birth_hour'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Birth minute</td>
        <td><input name="person_birth_minute" placeholder="Birth minute"
                   value="<?php echo $row ? $row['birth_minute'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Relationship status</td>
        <td><input name="person_relationship_status" placeholder="Relationship status"
                   value="<?php echo $row ? $row['relationship_status'] : '' ?>"
                   list="person_relationship_status_list"></td>
    </tr>
    <tr>
        <td>Height</td>
        <td><input name="person_height" placeholder="Height"
                   value="<?php echo $row ? $row['height'] : '' ?>">
        </td>
    </tr>
    <tr>
        <td>Weight</td>
        <td><input name="person_weight" placeholder="Weight"
                   value="<?php echo $row ? $row['weight'] : '' ?>">
        </td>
    </tr>
    <tr>
        <td>Home city</td>
        <td><input name="person_home_city" placeholder="Home city"
                   value="<?php echo $row ? $row['home_city'] : '' ?>"
                   list="person_home_city_list"></td>
    </tr>
    <tr>
        <td>Country</td>
        <td><input name="person_country" placeholder="Country"
                   value="<?php echo $row ? $row['country'] : '' ?>"
                   list="person_country_list"></td>
    </tr>
    <tr>
        <td>City</td>
        <td><input name="person_city" placeholder="City" value="<?php echo $row ? $row['city'] : '' ?>"
                   list="person_city_list"></td>
    </tr>
    <tr>
        <td>Street</td>
        <td><input name="person_street" placeholder="Street"
                   value="<?php echo $row ? $row['street'] : '' ?>"
                   list="person_street_list"></td>
    </tr>
    <tr>
        <td>Building</td>
        <td><input name="person_building" placeholder="Building"
                   value="<?php echo $row ? $row['building'] : '' ?>">
        </td>
    </tr>
    <tr>
        <td>Floor</td>
        <td><input name="person_floor" placeholder="Floor"
                   value="<?php echo $row ? $row['floor'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Apartment</td>
        <td><input name="person_apartment" placeholder="Apartment"
                   value="<?php echo $row ? $row['apartment'] : '' ?>"></td>
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
                   value="<?php echo $row ? $row['religion'] : '' ?>"
                   list="person_religion_list"></td>
    </tr>
    <tr>
        <td>Political views</td>
        <td><input name="person_political_views" placeholder="Political views"
                   value="<?php echo $row ? $row['political_views'] : '' ?>"
                   list="person_political_views_list">
        </td>
    </tr>
    <tr>
        <td>Personal priority</td>
        <td><input name="person_personal_priority" placeholder="Personal priority"
                   value="<?php echo $row ? $row['personal_priority'] : '' ?>"
                   list="person_personal_priority_list">
        </td>
    </tr>
    <tr>
        <td>Important in others</td>
        <td><input name="person_important_in_others" placeholder="Important in others"
                   value="<?php echo $row ? $row['important_in_others'] : '' ?>"
                   list="person_important_in_others_list"></td>
    </tr>
    <tr>
        <td>Views on smoking</td>
        <td><input name="person_views_on_smoking" placeholder="Views on smoking"
                   value="<?php echo $row ? $row['views_on_smoking'] : '' ?>"
                   list="person_views_on_smoking_list">
        </td>
    </tr>
    <tr>
        <td>Views on alcohol</td>
        <td><input name="person_views_on_alcohol" placeholder="Views on alcohol"
                   value="<?php echo $row ? $row['views_on_alcohol'] : '' ?>"
                   list="person_views_on_alcohol_list">
        </td>
    </tr>
    <tr>
        <td>Views on drugs</td>
        <td><input name="person_views_on_drugs" placeholder="Views on drugs"
                   value="<?php echo $row ? $row['views_on_drugs'] : '' ?>"
                   list="person_views_on_drugs_list">
        </td>
    </tr>
    <tr>
        <td>Drive license</td>
        <td><input name="person_drive_license" placeholder="Drive license"
                   value="<?php echo $row ? $row['drive_license'] : '' ?>"></td>
    </tr>
    <tr>
        <td>School results</td>
        <td><input name="person_school_results" placeholder="School results"
                   value="<?php echo $row ? $row['school_results'] : '' ?>"></td>
    </tr>
    <tr>
        <td>EGE results</td>
        <td><input name="person_ege_results" placeholder="EGE results"
                   value="<?php echo $row ? $row['ege_results'] : '' ?>"></td>
    </tr>
    <tr>
        <td>University results</td>
        <td><input name="person_univer_results" placeholder="University results"
                   value="<?php echo $row ? $row['univer_results'] : '' ?>"></td>
    </tr>
    <tr>
        <td>IQ test</td>
        <td><input name="person_iq_test" placeholder="IQ test"
                   value="<?php echo $row ? $row['iq_test'] : '' ?>"></td>
    </tr>
    '
    <tr>
        <td>Socionic test</td>
        <td><input name="person_socionic_test" placeholder="Socionic test"
                   value="<?php echo $row ? $row['socionic_test'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Political test</td>
        <td><input name="person_political_test" placeholder="Political test"
                   value="<?php echo $row ? $row['political_test'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Bennet test</td>
        <td><input name="person_bennet_test" placeholder="Bennet test"
                   value="<?php echo $row ? $row['bennet_test'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Hikka test</td>
        <td><input name="person_hikka_test" placeholder="Hikka test"
                   value="<?php echo $row ? $row['hikka_test'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Death status</td>
        <td><input name="person_death_status" placeholder="Death status"
                   value="<?php echo $row ? $row['death_status'] : '' ?>"
                   list="person_death_status_list"></td>
    </tr>
    <tr>
        <td>Death day</td>
        <td><input name="person_death_day" placeholder="Death day"
                   value="<?php echo $row ? $row['death_day'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Death month</td>
        <td><input name="person_death_month" placeholder="Death month"
                   value="<?php echo $row ? $row['death_month'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Death year</td>
        <td><input name="person_death_year" placeholder="Death year"
                   value="<?php echo $row ? $row['death_year'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Death hour</td>
        <td><input name="person_death_hour" placeholder="Death hour"
                   value="<?php echo $row ? $row['death_hour'] : '' ?>"></td>
    </tr>
    <tr>
        <td>Death minute</td>
        <td><input name="person_death_minute" placeholder="Death minute"
                   value="<?php echo $row ? $row['death_minute'] : '' ?>"></td>
    </tr>
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