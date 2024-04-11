<?php
    $surnames = array(
        'Петров',
        'Петушков',
        'Сидоров',
        'Баранов',
        'Осипов',
        'Смирнов'
    );
    $names = array(
        'Олег',
        'Марат',
        'Илья',
        'Леонид',
        'Василий'
    );
    $patronymics = array(
        'Петрович',
        'Сергеевич',
        'Иванович',
        'Максимович',
        'Григорьевич'
    );
$data = generateCombinations($surnames, $names, $patronymics);

echo ("<pre>");
echo ("<h3>Дано:</h3>");
print_r($surnames);
print_r($names);
print_r($patronymics);
echo ("<pre>");
echo ("<h3>Результат:</h3>");
function generateCombinations(array $surnames, array $names, array $patronymics): array {
    $combinations = array();
    foreach ($surnames as $surname) {
        foreach ($names as $name) {
            foreach ($patronymics as $patronymic) {
                $combination = $surname." ".$name ." ".$patronymic;
                $combinations[] = $combination;
            }
        }
    }
    return $combinations;
}
print_r($data);
?>