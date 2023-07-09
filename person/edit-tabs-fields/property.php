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