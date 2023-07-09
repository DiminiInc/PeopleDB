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