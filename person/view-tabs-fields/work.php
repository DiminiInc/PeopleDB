<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Company</td>
        <td>Post</td>
        <td>Start year</td>
        <td>End year</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM work where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['company'] ?></td>
            <td><?php echo $row['post'] ?></td>
            <td><?php echo $row['year_start'] ?></td>
            <td><?php echo $row['year_end'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>