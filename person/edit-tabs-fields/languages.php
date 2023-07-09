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