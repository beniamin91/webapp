
<?php
// имитация загрузки товаров из базы данных
$categoryId = $_GET['categoryId'];
$companyId = $_GET['companyId'];
$products = array(
	array('id' => 1, 'name' => 'Товар 1', 'categoryId' => 1),
	array('id' => 2, 'name' => 'Товар 2', 'categoryId' => 1),
	array('id' => 3, 'name' => 'Товар 3', 'categoryId' => 2),
	array('id' => 4, 'name' => 'Товар 4', 'categoryId' => 2),
	array('id' => 5, 'name' => 'Товар 5', 'categoryId' => 3),
	array('id' => 6, 'name' => 'Товар 6', 'categoryId' => 3),
);

$output = '<h2>Товары</h2>';
$output .= '<button class="back-button" onclick="loadCategories(' . $companyId . ')" style="display: block;">Назад</button>';
$output .= '<ul>';
foreach ($products as $product) {
	if ($product['categoryId'] == $categoryId) {
		$output .= 
			'<li class="product" ref-id="' . $product['id'] . '" parent-id="' . $categoryId . '">' . $product['name'] . '
				<button class="decrease-button" style="display: block;">-
				</button>
				<button class="increase-button" style="display: block;">+
				</button>
			</li>';
	}
}
$output .= '</ul>';
echo $output;
?>
