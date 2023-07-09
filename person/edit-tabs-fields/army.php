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
                <td><input name="army_suitability[]" placeholder="Suitability"
                           value="<?php echo $suitability ?>" list="army_suitability_list"></td>
                <td><input name="army_unit[]" placeholder="Unit" value="<?php echo $row['unit'] ?>"
                           list="army_unit_list"></td>
                <td><input name="army_year_start[]" placeholder="Year start"
                           value="<?php echo $row['year_start'] ?>"></td>
                <td><input name="army_year_end[]" placeholder="Year end"
                           value="<?php echo $row['year_end'] ?>"></td>
                <td><input name="army_rank[]" placeholder="Rank" value="<?php echo $row['rank'] ?>"
                           list="army_rank_list"></td>
            </tr>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
    </tbody>
</table>
<datalist id="army_suitability_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT suitability FROM army");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            $suitability = $row['suitability'] === '0' ? "Не годен" : "Годен";
            ?>
            <option value='<?php echo $suitability ?>'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>
<datalist id="army_unit_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT unit FROM army");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
    do {
    ?>
    <option value='<?php echo $row['unit'] ?>'>
        <?php
        } while ($row = mysqli_fetch_array($result));
        }
        ?>
</datalist>
<datalist id="army_rank_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT rank FROM army");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <option value='<?php echo $row['rank'] ?>"'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>