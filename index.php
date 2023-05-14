<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path . "/head.php");
    ?>
    <title>PeopleDB</title>
    <meta name="description" content="PeopleDB">
    <link rel="canonical" href="http://peopledb.localhost">
    <meta property="og:title" content="PeopleDB"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://peopledb.localhost"/>
    <meta property="og:image" content="/global/site-files/peopledb-logo.png"/>
    <meta property="og:description" content="PeopleDB"/>
</head>
<body id="site">
<?php
require_once($path . "/header.php");
?>
<div id="content">
    <div id="add-person">
        <a href="/person/edit.php" class="btn btn-primary">Add person</a>
    </div>
    <div id="search-results">
        <table id="personsTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th class="td-image">Photo</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Nickname</th>
                <th>Acquaintance type</th>
                <th>Alternative names</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once($path . "/connection.php");
            $result = mysqli_query($link, "SELECT * FROM person");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr onclick='window.open("/person/index.php?id=<?php echo $row ? $row['id'] : '' ?>", "_blank");'>
                    <td> <?php echo $row ? $row['id'] : '' ?></td>
                    <td class="td-image">
                        <?php if (file_exists($path . "/images/" . ($row ? $row['id'] : '') . "/0.jpg")) { ?>
                            <img src="/images/<?php echo $row ? $row['id'] : '' ?>/0.jpg" loading="lazy"
                                 alt="Person photo">
                        <?php } ?>
                    </td>
                    <td> <?php echo $row ? $row['last_name'] : '' ?></td>
                    <td> <?php echo $row ? $row['first_name'] : '' ?></td>
                    <td> <?php echo $row ? $row['middle_name'] : '' ?></td>
                    <td> <?php echo $row ? $row['nickname'] : '' ?></td>
                    <td> <?php echo $row ? $row['acquaintance_type'] : '' ?></td>
                    <td>
                        <?php
                        $sub_result = mysqli_query($link,
                            "SELECT * FROM alternative_last_names WHERE person_id=" . ($row ? $row['id'] : 0));
                        $sub_row = mysqli_fetch_assoc($sub_result);
                        echo isset($sub_row) ? $sub_row['last_name'] : '';
                        while ($sub_row = mysqli_fetch_assoc($sub_result)) {
                            echo ", " . $sub_row['last_name'];
                        }
                        ?>
                    </td>
                </tr>
                <?php
            };
            mysqli_close($link);
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once($path . "/footer.php");
?>
</body>
</html>