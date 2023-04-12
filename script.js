document.addEventListener("DOMContentLoaded", function() {
	loadCompanies();
});

function loadCompanies() {
	fetch('companies.php')
		.then(function(response) {
			if (!response.ok) {
				throw new Error('Ошибка загрузки фирм');
			}
			return response.text();
		})
		.then(function(companies) {
			showCompanies(companies);
		})
		.catch(function(error) {
			console.error('Ошибка запроса на сервер', error);
		});
}

function showCompanies(companies) {
	var content = document.querySelector('.content');
	content.innerHTML = companies;
}

function loadCategories(companyId) {
	fetch(`categories.php?companyId=${companyId}`)
		.then(function(response) {
			if (!response.ok) {
				throw new Error('Ошибка загрузки категорий');
			}
			return response.text();
		})
		.then(function(categories) {
			showCategories(categories);
		})
		.catch(function(error) {
			console.error('Ошибка запроса на сервер', error);
		});
}

function showCategories(categories) {
	var content = document.querySelector('.content');
	content.innerHTML = categories;
}

function loadProducts(categoryId,companyId) {
	fetch(`products.php?categoryId=${categoryId}&companyId=${companyId}`)
		.then(function(response) {
			if (!response.ok) {
				throw new Error('Ошибка загрузки товаров');
			}
			return response.text();
		})
		.then(function(products) {
			showProducts(products);
		})
		.catch(function(error) {
			console.error('Ошибка запроса на сервер', error);
		});
}

function loadProduct(productId,categoryId) {
	// fetch(`products.php?categoryId=${categoryId}&companyId=${companyId}`)
	// 	.then(function(response) {
	// 		if (!response.ok) {
	// 			throw new Error('Ошибка загрузки товаров');
	// 		}
	// 		return response.text();
	// 	})
	// 	.then(function(products) {
	// 		showProducts(products);
	// 	})
	// 	.catch(function(error) {
	// 		console.error('Ошибка запроса на сервер', error);
	// 	});
	alert(productId + categoryId);
}

function showProducts(products) {
	var content = document.querySelector('.content');
	content.innerHTML = products;
}

document.querySelector('.content').addEventListener('click', function(event) {
	if (event.target.classList.contains('company')) {
		var companyId = event.target.getAttribute('ref-id');
		loadCategories(companyId);
	} 
	else if (event.target.classList.contains('category')) {
		var categoryId = event.target.getAttribute('ref-id');
		var companyId = event.target.getAttribute('parent-id');
		loadProducts(categoryId,companyId);
	}
	else if (event.target.classList.contains('product')) {
		var productId = event.target.getAttribute('ref-id');
		var categoryId = event.target.getAttribute('parent-id');
		loadProduct(productId,categoryId);
	}
});

function escapeHtml(text) {
	var map = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#039;'
	};
	return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}