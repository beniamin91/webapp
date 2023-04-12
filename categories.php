
<?php
// имитация загрузки категорий из базы данных
$companyId = $_GET['companyId'];
$categories = array(
	array('id' => 1, 'name' => 'Категория 1', 'companyId' => 1),
	array('id' => 2, 'name' => 'Категория 2', 'companyId' => 1),
	array('id' => 3, 'name' => 'Категория 3', 'companyId' => 2),
	array('id' => 4, 'name' => 'Категория 4', 'companyId' => 2),
	array('id' => 5, 'name' => 'Категория 5', 'companyId' => 3),
	array('id' => 6, 'name' => 'Категория 6', 'companyId' => 3),
);

$output = '<h2>Категории</h2>';
$output .= '<button class="back-button" onclick="loadCompanies()" style="display: block; ">Назад</button>';
$output .= '<ul>';
foreach ($categories as $category) {
	if ($category['companyId'] == $companyId) {
		$output .= '<li class="category" ref-id="' . $category['id'] . '" parent-id="' . $companyId . '">' . $category['name'] . '</li>';
	}
}
$output .= '</ul>';
echo $output;
?>
