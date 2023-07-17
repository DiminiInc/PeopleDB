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
    require_once($path . "/person/edit-tabs-fields/template-fields/datalistSelect.php");
    if (!is_null($row)) {
        do {
            ?>
            <tr>
                <td><input name="contacts_ids[]" placeholder="ID" value="<?php echo $row['id'] ?>"
                           readonly>
                </td>
                <td><?php datalistSelect(link: $link, name: 'contacts_account', placeholder: 'Account type',
                        value: 'account', table: 'contacts', row: $row,
                        value_function: function ($value) {
                            return $value;
                        }) ?></td>
                <td><input name="contacts_account_id[]" placeholder="Account ID"
                           value="<?php echo $row['account_id'] ?>"></td>
                <td><?php datalistSelect(link: $link, name: 'contacts_status', placeholder: 'Status',
                        value: 'status', table: 'contacts', row: $row,
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