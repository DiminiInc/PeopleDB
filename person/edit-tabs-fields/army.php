<div>
    <button type="button" onclick="addInput(event, 'armyTableBody')" class="btn btn-primary">
        Add more
    </button>
</div>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Medical profile</td>
        <td>Unit</td>
        <td>Start year</td>
        <td>End year</td>
        <td>Rank</td>
    </tr>
    </thead>
    <tbody id="armyTableBody">
    <?php
    $result = mysqli_query($link, "SELECT * FROM army where person_id='$id'");
    $row = mysqli_fetch_array($result);
    require_once($path . "/person/edit-tabs-fields/template-fields/datalistSelect.php");
    if (!is_null($row)) {
        do {
            if ($row['suitability'] === '1') {
                $suitability = "Годен";
            } elseif ($row['suitability'] === '0') {
                $suitability = "Не годен";
            } else {
                $suitability = "";
            }
            ?>
            <tr>
                <td><input name="army_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>" readonly>
                </td>
                <td><?php datalistSelect(link: $link, name: 'army_suitability', placeholder: 'Suitability',
                        value: 'suitability', table: 'army', row: $row,
                        value_function: function ($value) {
                            if ($value === '1') {
                                return "Годен";
                            } elseif ($value === '0') {
                                return "Не годен";
                            } else {
                                return "";
                            }
                        }) ?></td>
                <td><?php datalistSelect(link: $link, name: 'army_unit', placeholder: 'Unit',
                        value: 'unit', table: 'army', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><input name="army_year_start[]" placeholder="Year start"
                           value="<?php echo $row['year_start'] ?>"></td>
                <td><input name="army_year_end[]" placeholder="Year end"
                           value="<?php echo $row['year_end'] ?>"></td>
                <td><?php datalistSelect(link: $link, name: 'army_rank', placeholder: 'Rank',
                        value: 'rank', table: 'army', row: $row,
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