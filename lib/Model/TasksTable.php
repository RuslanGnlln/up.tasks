<?php
namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\DatetimeField,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\Type\DateTime;

//Loc::loadMessages(__FILE__);

/**
 * Class TasksTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TEXT string(255) mandatory
 * <li> CREATED_AT datetime optional default current datetime
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class TasksTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_tasks';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			new IntegerField(
				'ID',
				[
					'primary' => true,
					'autocomplete' => true,
					'title' => 'ID'
				]
			),
			new StringField(
				'TEXT',
				[
					'required' => true,
					'validation' => [__CLASS__, 'validateText'],
					'title' => 'Text'
				]
			),
			new DatetimeField(
				'CREATED_AT',
				[
					'default' => function()
					{
						return new DateTime();
					},
					'title' => 'Date created'
				]
			),
		];
	}

	/**
	 * Returns validators for TEXT field.
	 *
	 * @return array
	 */
	public static function validateText()
	{
		return [
			new LengthValidator(null, 255),
		];
	}
}