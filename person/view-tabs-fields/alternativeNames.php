<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Name</td>
        <td>Type</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM alternative_last_names where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['change_type'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>