<?php

namespace Up\Tasks;

use Bitrix\Main\Application;
use Bitrix\Main\Web\Json;

class TaskController
{
	public static function getTaskList()
	{
		$result = \Up\Tasks\Model\TasksTable::getList([
			'select' => ['*']
		]);

		return $result->fetchAll();
	}

	public static function addTask()
	{
		if (!check_bitrix_sessid()) {
			LocalRedirect('/tasks/');
		}

		$task = \Bitrix\Main\Context::getCurrent()->getRequest()->getPost('task-text');

		if (empty($task)) {
			LocalRedirect('/tasks/');
		}

		// Добавление задачи
		$result = \Up\Tasks\Model\TasksTable::add([
			'TEXT' => $task
		]);

		if (!$result->isSuccess()){
			print_r($result->getErrors());
		} else {
			LocalRedirect('/tasks/');
		}
	}

	public static function deleteTask()
	{
		if (!check_bitrix_sessid()) {
			LocalRedirect('/tasks/');
		}

		$taskId = \Bitrix\Main\Context::getCurrent()->getRequest()->getPost('id');

		// Удаление задачи
		$result = \Up\Tasks\Model\TasksTable::delete((int) $taskId);

		if (!$result->isSuccess()){
			print_r($result->getErrors());
		} else {
			LocalRedirect('/tasks/');
		}
	}
}