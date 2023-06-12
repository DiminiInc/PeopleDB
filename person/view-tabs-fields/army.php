<table class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <td>Medical profile</td>
        <td>Unit</td>
        <td>Start year</td>
        <td>End year</td>
        <td>Rank</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM army where person_id='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['suitability'] === '1') {
            $suitability = "Годен";
        } elseif ($row['suitability'] === '0') {
            $suitability = "Не годен";
        } else {
            $suitability = "";
        }
        ?>
        <tr>
            <td><?php echo $suitability ?></td>
            <td><?php echo $row['unit'] ?></td>
            <td><?php echo $row['year_start'] ?></td>
            <td><?php echo $row['year_end'] ?></td>
            <td><?php echo $row['rank'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>