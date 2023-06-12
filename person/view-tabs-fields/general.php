<table class="table table-striped table-bordered" style="width:100%">
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
    $row = mysqli_fetch_assoc($result);
    if (!is_null($row)) {
        $mother_id = $row['mother'];
        $father_id = $row['father'];
        $mother = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$mother_id'"));
        $father = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM person where id='$father_id'"));
        if ($row['sex'] === '1') {
            $sex = "Мужской";
        } elseif ($row['sex'] === '0') {
            $sex = "Женский";
        } else {
            $sex = "";
        }
        ?>
        <tr>
            <td>Name</td>
            <td>
                <?php echo $row['last_name'] ?>&#32;
                <?php echo $row['first_name'] ?>&#32;
                <?php echo $row['middle_name'] ?>
            </td>
        </tr>
        <tr>
            <td>Nickname</td>
            <td><?php echo $row['nickname'] ?></td>
        </tr>
        <tr>
            <td>Acquaintance type</td>
            <td><?php echo $row['acquaintance_type'] ?></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td><?php echo $sex ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'] ?></td>
        </tr>
        <tr>
            <td>Orientation</td>
            <td><?php echo $row['orientation'] ?></td>
        </tr>
        <tr>
            <td>Birth date</td>
            <td>
                <?php echo $row['birth_day'] ?>.<?php echo $row['birth_month'] ?>.
                <?php echo $row['birth_year'] ?>&#32;
                <?php echo $row['birth_hour'] ?>:<?php echo $row['birth_minute'] ?>
            </td>
        </tr>
        <tr>
            <td>Relationship status</td>
            <td><?php echo $row['relationship_status'] ?></td>
        </tr>
        <tr>
            <td>Height</td>
            <td><?php echo $row['height'] ?></td>
        </tr>
        <tr>
            <td>Weight</td>
            <td><?php echo $row['weight'] ?></td>
        </tr>
        <tr>
            <td>Home city</td>
            <td><?php echo $row['home_city'] ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <?php echo $row['country'] ?>,&#32;<?php echo $row['city'] ?>,&#32;
                <?php echo $row['street'] ?>,&#32;д.&#32;<?php echo $row['building'] ?>,&#32;этаж&#32;
                <?php echo $row['floor'] ?>,&#32;кв.&#32;<?php echo $row['apartment'] ?>
            </td>
        </tr>
        <tr onclick='window.location="/person/index.php?id=<?php echo $mother_id ?>";'>
            <td>Mother</td>
            <td><?php echo $mother ? $mother['last_name'] : '' ?>&#32;
                <?php echo $mother ? $mother['first_name'] : '' ?>&#32;
                <?php echo $mother ? $mother['middle_name'] : '' ?>
            </td>
        </tr>
        <tr onclick='window.location="/person/index.php?id=<?php echo $father_id ?>";'>
            <td>Father</td>
            <td><?php echo $father ? $father['last_name'] : '' ?>&#32;
                <?php echo $father ? $father['first_name'] : '' ?>&#32;
                <?php echo $father ? $father['middle_name'] : '' ?>
            </td>
        </tr>
        <tr>
            <td>Religion</td>
            <td><?php echo $row['religion'] ?></td>
        </tr>
        <tr>
            <td>Political views</td>
            <td><?php echo $row['political_views'] ?></td>
        </tr>
        <tr>
            <td>Personal priority</td>
            <td><?php echo $row['personal_priority'] ?></td>
        </tr>
        <tr>
            <td>Important in others</td>
            <td><?php echo $row['important_in_others'] ?></td>
        </tr>
        <tr>
            <td>Views on smoking</td>
            <td><?php echo $row['views_on_smoking'] ?></td>
        </tr>
        <tr>
            <td>Views on alcohol</td>
            <td><?php echo $row['views_on_alcohol'] ?>"</td>
        </tr>
        <tr>
            <td>Views on drugs</td>
            <td><?php echo $row['views_on_drugs'] ?></td>
        </tr>
        <tr>
            <td>Drive license</td>
            <td><?php echo $row['drive_license'] ?></td>
        </tr>
        <tr>
            <td>School results</td>
            <td><?php echo $row['school_results'] ?></td>
        </tr>
        <tr>
            <td>EGE results</td>
            <td><?php echo $row['ege_results'] ?></td>
        </tr>
        <tr>
            <td>University results</td>
            <td><?php echo $row['univer_results'] ?></td>
        </tr>
        <tr>
            <td>IQ test</td>
            <td><?php echo $row['iq_test'] ?></td>
        </tr>
        <tr>
            <td>Socionic test</td>
            <td><?php echo $row['socionic_test'] ?></td>
        </tr>
        <tr>
            <td>Political test</td>
            <td><?php echo $row['political_test'] ?></td>
        </tr>
        <tr>
            <td>Bennet test</td>
            <td><?php echo $row['bennet_test'] ?></td>
        </tr>
        <tr>
            <td>Hikka test</td>
            <td><?php echo $row['hikka_test'] ?></td>
        </tr>
        <tr>
            <td>Death status</td>
            <td><?php echo $row['death_status'] ?></td>
        </tr>
        <tr>
            <td>Death date</td>
            <td><?php echo $row['death_day'] ?>.<?php echo $row['death_month'] ?>.
                <?php echo $row['death_year'] ?>&#32;
                <?php echo $row['death_hour'] ?>:<?php echo $row['death_minute'] ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>