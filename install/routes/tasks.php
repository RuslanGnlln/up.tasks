<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/task-list.php'));
	$routes->get('/tasks/', new PublicPageController('/local/modules/up.tasks/views/task-list.php'));

	$routes->post('/tasks/add/', function () {
		Up\Tasks\TaskController::addTask();
	});

	$routes->post('/tasks/delete/', function () {
		Up\Tasks\TaskController::deleteTask();
	});
};