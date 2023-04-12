<?php
// имитация загрузки фирм из базы данных
$companies = array(
	array('id' => 1, 'name' => 'Фирма 1'),
	array('id' => 2, 'name' => 'Фирма 2'),
	array('id' => 3, 'name' => 'Фирма 3'),
);

$output = '<h2>Фирмы</h2>';
$output .= '<button class="back-button" style="display: none;">Назад</button>';
$output .= '<ul>';
foreach ($companies as $company) {

		$output .= '<li class="company" ref-id="' . $company['id'] . '">' . $company['name'] . '</li>';

}
$output .= '</ul>';
echo $output;
?>