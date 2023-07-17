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
    require_once($path . "/person/edit-tabs-fields/template-fields/datalistSelect.php");
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="skills_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                           readonly></td>
                <td><?php datalistSelect(link: $link, name: 'skills_skill', placeholder: 'Skill',
                        value: 'skill', table: 'skills', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><?php datalistSelect(link: $link, name: 'skills_level', placeholder: 'Skill',
                        value: 'level', table: 'skills', row: $row,
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