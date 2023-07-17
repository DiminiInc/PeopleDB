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
    require_once($path . "/person/edit-tabs-fields/template-fields/datalistSelect.php");
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="education_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                           readonly></td>
                <td><?php datalistSelect(link: $link, name: 'education_type', placeholder: 'Type',
                        value: 'type', table: 'education', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><?php datalistSelect(link: $link, name: 'education_institution', placeholder: 'Institution',
                        value: 'institution', table: 'education', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><input name="education_year_start[]" placeholder="Year start"
                           value="<?php echo $row['year_start'] ?>"></td>
                <td><input name="education_year_end[]" placeholder="Year end"
                           value="<?php echo $row['year_end'] ?>"></td>
                <td><?php datalistSelect(link: $link, name: 'education_group', placeholder: 'Group',
                        value: 'group', table: 'education', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
            </tr>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
    </tbody>
</table>