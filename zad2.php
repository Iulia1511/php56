<?php
$data = "1. William Smith, 1990, 2344455666677\n"
. "2. John Doe, 1988, 4445556666787\n"
. "3. Michael Brown, 1991, 7748956996777\n"
. "4. David Johnson, 1987, 5556667779999\n"
. "5. Robert Jones, 1992, 99933456678888\n";
file_put_contents("file.txt", $data) or die("Ошибка создания файла!");
$data_from_file = file_get_contents("file.txt") or die("Ошибка открытия файла для чтения!");
?>
<div>Данные из файла: </div>
<?php
echo nl2br($data_from_file); // Выводим содержимое файла, заменяя переносы строк на теги <br>
?>