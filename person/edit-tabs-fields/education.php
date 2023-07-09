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