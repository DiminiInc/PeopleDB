<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Account</td>
        <td>Identifier</td>
        <td>Status</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM contacts where owner='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['account'] ?></td>
            <td><?php echo $row['account_id'] ?></td>
            <td><?php echo $row['status'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>