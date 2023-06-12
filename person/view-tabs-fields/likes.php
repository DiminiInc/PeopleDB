<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Status</td>
        <td>Object type</td>
        <td>Object</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM likes where person='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['like_status'] ?></td>
            <td><?php echo $row['object_type'] ?></td>
            <td><?php echo $row['object'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>