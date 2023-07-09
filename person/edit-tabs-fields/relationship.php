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