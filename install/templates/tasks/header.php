<?php
/**
 * @var CMain $APPLICATION
 */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<!doctype html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php $APPLICATION->ShowTitle(); ?></title>

	<?php $APPLICATION->ShowHead(); ?>
</head>
<body>

<?php $APPLICATION->ShowPanel(); ?>

<div class="container mt-4 shadow p-3 mb-5 bg-white rounded">
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand fs-2" href="/tasks/">
			<span>📋</span> Tasks
		</a>
		<div class="container-fluid justify-content-center">
				<form class="d-flex" method="post" action="/tasks/add/">
					<input class="form-control me-2" type="text" placeholder="<?= Loc::getMessage('UP_TASKS_PLACEHOLDER') ?>" name="task-text">
					<button class="btn btn-outline-success" type="submit">+</button>
				</form>
		</div>
	</nav>
	<hr class="hr">
