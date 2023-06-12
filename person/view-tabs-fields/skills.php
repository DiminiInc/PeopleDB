<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Skill</td>
        <td>Level</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM skills where person='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['skill'] ?></td>
            <td><?php echo $row['level'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>