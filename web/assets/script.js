new Vue({
    el: '#app',
    data: {
        products: [],
        searchTerm: "",
        filteredProducts: [],
        sortByField: "",
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            fetch('/products')
            .then(response => response.json())
            .then(data => {
                this.products = data;
                this.filteredProducts = data;
            });
        },
        filterProducts() {
            if (this.searchTerm !== "") {
                this.filteredProducts = this.products.filter(product => {
                    return product.name.toLowerCase().includes(this.searchTerm.toLowerCase());
                });
            } else {
                this.filteredProducts = this.products;
            }
        },
        sortByName(direction) {
            this.sortDirection = direction;
            this.filteredProducts = this.sortProducts(this.filteredProducts, "name");
        },
        sortProducts(products, field) {
            if (field === "name") {
                const sortedProducts = products.slice();
                if (this.sortDirection === "asc") {
                    return sortedProducts.sort((a, b) => a.name.localeCompare(b.name));
                } else if (this.sortDirection === "desc") {
                    return sortedProducts.sort((a, b) => b.name.localeCompare(a.name));
                }
            }
        },
    },
});

$('#create-product').on("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: '/products',
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            alert('Товар создан');
            location.reload();
        },
        error: function(xhr, status, error) {
            let response = JSON.parse(xhr.responseText);
            console.log(response.errors.name);
            if (response.errors.name) {
                alert(response.errors.name);
            }
            if (response.errors.price) {
                alert(response.errors.price);
            }
        }
    });
});

$('#update-product').on("submit", function(e) {
    e.preventDefault();

    let productId = $(this).find('input[name="id"]').val();

    let formData = $(this).serialize();

    $.ajax({
        url: '/products/' + productId,
        type: 'PATCH',
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            console.log(response.model);
            alert('Товар обновлен');
            location.reload();
        },
        error: function(xhr, status, error) {
            let response = JSON.parse(xhr.responseText);
            console.log(response.errors.name);
            if (response.errors.name) {
                alert(response.errors.name);
            }
            if (response.errors.price) {
                alert(response.errors.price);
            }
        }
    });
});

function deleteProduct(element) {
    let productId = element.getAttribute('data-id');

    fetch('/products/' + productId, {
        method: 'DELETE',
    })
    .then(function (response) {
        if (response.ok) {
            alert('Товар с ID ' + productId + ' удален.');
        } else {
            alert('Произошла ошибка при удалении товара.');
        }
    })
    .catch(function (error) {
        console.error(error);
    });

    location.reload();
}

function openUpdateModal(element) {
    let productId = $(element).data("id");
    let productName = $(element).data("name");
    let productPrice = $(element).data("price");
    let productDescription = $(element).data("description");

    $("#updateProductModal #id").val(productId);
    $("#updateProductModal #name").val(productName);
    $("#updateProductModal #price").val(productPrice);
    $("#updateProductModal #description").val(productDescription);

    $('#updateProductModal').show();

    return false;
}