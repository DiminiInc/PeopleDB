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