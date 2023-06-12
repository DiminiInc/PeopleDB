<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Person 1</td>
        <td>Person 2</td>
        <td>Relation type</td>
        <td>Start year</td>
        <td>Start month</td>
        <td>Start day</td>
        <td>End year</td>
        <td>End month</td>
        <td>End day</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM relationship where person_1='$id' or person_2='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        $person_1_id = $row['person_1'];
        $person_2_id = $row['person_2'];
        $person_1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$person_1_id'"));
        $person_2 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$person_2_id'"));
        ?>
        <tr>
            <td>
                <?php echo $person_1['last_name'] ?>&#32;
                <?php echo $person_1['first_name'] ?>&#32;
                <?php echo $person_1['middle_name'] ?>
            </td>
            <td>
                <?php echo $person_2['last_name'] ?>&#32;
                <?php echo $person_2['first_name'] ?>&#32;
                <?php echo $person_2['middle_name'] ?>
            </td>
            <td><?php echo $row['relation_type'] ?></td>
            <td><?php echo $row['year_start'] ?></td>
            <td><?php echo $row['month_start'] ?></td>
            <td><?php echo $row['day_start'] ?></td>
            <td><?php echo $row['year_end'] ?></td>
            <td><?php echo $row['month_end'] ?></td>
            <td><?php echo $row['day_end'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>