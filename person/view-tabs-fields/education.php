<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Type</td>
        <td>Institution</td>
        <td>Start year</td>
        <td>End year</td>
        <td>Group</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM education where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['institution'] ?></td>
            <td><?php echo $row['year_start'] ?></td>
            <td><?php echo $row['year_end'] ?></td>
            <td><?php echo $row['group'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>