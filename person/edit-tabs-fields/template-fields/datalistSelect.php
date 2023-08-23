<?php
function datalistSelect($link, $name, $placeholder, $value, $table, $row,
                        $value_function = null, $sql_query = null): void
{
    $value_function ??= function ($value) {
        return $value;
    };
    $sql_query ??= "SELECT DISTINCT `$value` FROM $table";
    ?>
    <input name="<?php echo $name ?>[]" placeholder="<?php echo $placeholder ?>"
           value="<?php echo $value_function($row[$value]) ?>" list="<?php echo $name ?>_list">
    <datalist id="<?php echo $name ?>_list">
        <?php
        $result = mysqli_query($link, $sql_query);
        $row = mysqli_fetch_array($result);
        if (!is_null($row)) {
            do {
                ?>
                <option value='<?php echo $value_function($row[$value]) ?>'></option>
                <?php
            } while ($row = mysqli_fetch_array($result));
        }
        ?>
    </datalist>
    <?php
}

?>
