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