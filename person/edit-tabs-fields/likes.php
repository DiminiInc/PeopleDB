<div>
    <button type="button" onclick="addInput(event, 'likesTableBody')" class="btn btn-primary">
        Add more
    </button>
</div>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Status</td>
        <td>Object type</td>
        <td>Object</td>
    </tr>
    </thead>
    <tbody id="likesTableBody">
    <?php
    $result = mysqli_query($link, "SELECT * FROM likes where person='$id'");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="likes_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                           readonly></td>
                <td><input name="likes_like_status[]" placeholder="Like status"
                           value="<?php echo $row['like_status'] ?>" list="likes_like_status_list"></td>
                <td><input name="likes_object_type[]" placeholder="Object type"
                           value="<?php echo $row['object_type'] ?>" list="likes_object_type_list"></td>
                <td><input name="likes_object[]" placeholder="Object"
                           value="<?php echo $row['object'] ?>"></td>
            </tr>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
    </tbody>
</table>
<datalist id="likes_like_status_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT like_status FROM likes");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <option value='<?php echo $row['like_status'] ?>'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>
<datalist id="likes_object_types_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT object_type FROM likes");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <option value='<?php echo $row['object_type'] ?>'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>