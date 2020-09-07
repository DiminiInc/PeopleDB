<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$path = $_SERVER['DOCUMENT_ROOT'];
		$path .= "/head.php";
		include_once($path);
    ?>
	<title>About - PeopleDB</title>
	<meta name="description" content="About - PeopleDB"> 
	<link rel="canonical" href="http://peopledb.localhost">
	<meta property="og:title" content="About - PeopleDB" /> 
	<meta property="og:type" content="website" /> 
	<meta property="og:url" content="http://peopledb.localhost" /> 
	<meta property="og:image" content="./asocialnetwork.png" /> 
	<meta property="og:description" content="About - PeopleDB" />
</head>
<body id="site">
	<?php 
		$path = $_SERVER['DOCUMENT_ROOT'];
		$path .= "/header.php";
		include_once($path);
    ?>
	<div id="about-content">
		<div id="about-block">
			<div>
				<img src="/global/site-files/peopledb-logo.svg"><strong>PeopleDB</strong>
			</div>
			<div>
				<strong>Version: </strong><span id="version">0.0.1</span>
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
				<strong>&#169; <a href="https://dimini.tk/?utm_source=peopledb&amp;utm_medium=software&amp;utm_campaign=peopledb_about">Dimini Inc.</a>, <?php echo date('Y') ?></strong>
			</div>
		</div>
	</div>
	<?php 
		$path = $_SERVER['DOCUMENT_ROOT'];
		$path .= "/footer.php";
		include_once($path);
    ?>
</body>
</html>