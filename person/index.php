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
    <div id="head-section">
        <?php
        require_once($path . "/connection.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $result = mysqli_query($link, "SELECT * FROM person where id='$id'");
        $row = mysqli_fetch_assoc($result);
        if (!is_null($row)) {
            $person_id = $row['id'];
            ?>
            <div>
                <h1><?php echo $row['last_name'] ?>&#32;
                    <?php echo $row['first_name'] ?>&#32;
                    <?php echo $row['middle_name'] ?></h1>
                <h4><?php echo $row['nickname'] ?> - <?php echo $row['acquaintance_type'] ?></h4>
            </div>
            <div>
                <a href="/person/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-lg">Edit</a>
            </div>
        <?php } ?>
    </div>
    <div class="data-section">
        <?php
        $tabs_names = [
            ['id' => 'general', 'text' => 'General', 'class' => 'active'],
            ['id' => 'contacts', 'text' => 'Contacts', 'class' => ''],
            ['id' => 'education', 'text' => 'Education', 'class' => ''],
            ['id' => 'army', 'text' => 'Army', 'class' => ''],
            ['id' => 'work', 'text' => 'Work', 'class' => ''],
            ['id' => 'relationship', 'text' => 'Relationship', 'class' => ''],
            ['id' => 'skills', 'text' => 'Skills', 'class' => ''],
            ['id' => 'languages', 'text' => 'Languages', 'class' => ''],
            ['id' => 'likes', 'text' => 'Likes', 'class' => ''],
            ['id' => 'property', 'text' => 'Property', 'class' => ''],
            ['id' => 'alternativeNames', 'text' => 'Alternative names', 'class' => ''],
            ['id' => 'photos', 'text' => 'Photos', 'class' => '']
        ]
        ?>
        <div class="tab">
            <?php
            foreach ($tabs_names as $value) {
                ?>
                <button class="tab-links <?php echo $value['class'] ?>"
                        onclick="loginTabsChange(event, '<?php echo $value['id'] ?>')"><?php echo $value['text'] ?>
                </button>
                <?php
            }
            ?>
        </div>
        <?php
        foreach ($tabs_names as $value) {
            ?>
            <div id="<?php echo $value['id'] ?>" class="tab-content <?php echo $value['class'] ?>">
                <h2><?php echo $value['text'] ?></h2>
                <?php
                require_once($path . "/person/view-tabs-fields/" . $value['id'] . ".php");
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
mysqli_close($link);
require_once($path . "/footer.php");
?>
</body>
</html>