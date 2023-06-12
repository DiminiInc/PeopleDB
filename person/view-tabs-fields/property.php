<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Property type</td>
        <td>Property</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM property where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['property_type'] ?></td>
            <td><?php echo $row['property_name'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>