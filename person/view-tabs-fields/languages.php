<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Language</td>
        <td>Level</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM languages where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['language'] ?></td>
            <td><?php echo $row['level'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>