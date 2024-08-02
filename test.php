<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:main.ui.grid',
    '',
    [
        'GRID_ID' => 'MY_GRID_ID',
        'COLUMNS' => [
            ['id' => 'ID', 'name' => 'ID', 'default' => true, 'editable' => false],
            ['id' => 'NAME', 'name' => 'Name', 'default' => true, 'editable' => true],
            ['id' => 'AGE', 'name' => 'Age', 'default' => true, 'editable' => true],
        ],
        'ROWS' => [
            ['data' => ['ID' => 1, 'NAME' => 'John Doe', 'AGE' => 28]],
            ['data' => ['ID' => 2, 'NAME' => 'Jane Smith', 'AGE' => 34]],
        ],
        'SHOW_ROW_CHECKBOXES' => false,  // Убирает чекбоксы
        'SHOW_SELECTED_COUNTER' => false,  // Убирает счетчик выбранных элементов
        'SHOW_TOTAL_COUNTER' => false,  // Убирает счетчик всех элементов
        'SHOW_GRID_SETTINGS_MENU' => false,  // Убирает настройки таблицы

    ]
);
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>