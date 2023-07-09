<div>
    <button type="button" onclick="addInput(event, 'contactsTableBody')" class="btn btn-primary">
        Add more
    </button>
</div>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Account</td>
        <td>Identifier</td>
        <td>Status</td>
    </tr>
    </thead>
    <tbody id="contactsTableBody">
    <?php
    $result = mysqli_query($link, "SELECT * FROM contacts where owner='$id'");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="contacts_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                           readonly>
                </td>
                <td><input name="contacts_account[]" placeholder="Account type"
                           value="<?php echo $row['account'] ?>" list="contacts_account_list"></td>
                <td><input name="contacts_account_id[]" placeholder="Account ID"
                           value="<?php echo $row['account_id'] ?>"></td>
                <td><input name="contacts_status[]" placeholder="Status"
                           value="<?php echo $row['status'] ?>"
                           list="contacts_status_list"></td>
            </tr>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
    </tbody>
</table>
<datalist id="contacts_account_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT account FROM contacts");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <option value='<?php echo $row['account'] ?>'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>
<datalist id="contacts_status_list">
    <?php
    $result = mysqli_query($link, "SELECT DISTINCT status FROM contacts");
    $row = mysqli_fetch_array($result);
    if (!is_null($row)) {
        do {
            ?>
            <option value='<?php echo $row['status'] ?>'></option>
            <?php
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</datalist>