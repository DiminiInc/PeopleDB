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
    require_once($path . "/person/edit-tabs-fields/template-fields/datalistSelect.php");
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="work_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>" readonly>
                </td>
                <td><?php datalistSelect(link: $link, name: 'work_company', placeholder: 'Company',
                        value: 'company', table: 'work', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><?php datalistSelect(link: $link, name: 'work_post', placeholder: 'Post',
                        value: 'post', table: 'work', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
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