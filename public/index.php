<?php

if (isset($_GET['with_redirect']))
{
	$code = isset($_GET['code']) ? $_GET['code'] : 302;
	
	if (isset($_GET['redirect_to']))
	{
		header('Location: ' . $_GET['redirect_to'] , true, $code);
		exit();
	}
	
	if (!isset($_GET['is_redirected']))
	{
		header('Location: index.php?with_redirect=true&is_redirected=' . mt_rand() , true, $code);
		exit();
	}
}

require_once '../vendor/autoload.php';
$faker = Faker\Factory::create();

$title = $faker->realText(50, 1);
$description = $faker->realText(200);
$image = $faker->imageUrl();
$author = mb_strtolower($faker->lastName);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<meta name="image" property="og:image" content="<?= $image ?>">
	<meta name="title" property="og:title" content="<?= $title ?>">
	<meta name="author" content="@<?= $author ?>">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?= $title ?>">
	<meta name="twitter:image" content="<?= $image ?>">
	<meta name="twitter:site" content="@<?= $author ?>">
	<meta name="twitter:creator" content="@<?= $author ?>">

	<meta name="description" property="og:description" content="<?= $description ?>">
	<meta name="twitter:description" content="<?= $description ?>">

	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
</head>
<body>
<div id="app">
	<h1><?= $title ?></h1>
	<img src="<?= $image ?>"

	<p><?= $description ?></p>
</div>
</body>
</html>