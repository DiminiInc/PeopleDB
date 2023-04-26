<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path . "/head.php");
    ?>
    <title>About - PeopleDB</title>
    <meta name="description" content="About - PeopleDB">
    <link rel="canonical" href="http://peopledb.localhost">
    <meta property="og:title" content="About - PeopleDB"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://peopledb.localhost"/>
    <meta property="og:image" content="/global/site-files/peopledb-logo.png"/>
    <meta property="og:description" content="About - PeopleDB"/>
</head>
<body id="site">
<?php
require_once($path . "/header.php");
?>
<div id="about-content">
    <div id="about-block">
        <div>
            <img src="/global/site-files/peopledb-logo.svg"
                 alt="PeopleDB logo">
            <strong>PeopleDB</strong>
        </div>
        <div>
            <strong>Version: </strong><span id="version">0.1.3</span>
        </div>
        <div>
            <strong>Development: </strong>Yaskovich Dmitry
        </div>
        <div>
            <strong>Design: </strong>Yaskovich Dmitry
        </div>
        <div>
            <strong>QA: </strong>Yaskovich Dmitry
        </div>
        <div>
            <strong>Support: </strong><u><a href="mailto:support@dimini.tk">support@dimini.tk</a></u>
        </div>
        <div>
            <strong>
                &#169; <a
                    href="https://dimini.tk/?utm_source=peopledb&amp;utm_medium=software&amp;utm_campaign=peopledb_about">
                    Dimini Inc.</a>, <?php echo date('Y') ?>
            </strong>
        </div>
    </div>
</div>
<?php
require_once($path . "/footer.php");
?>
</body>
</html>