<?php

/** @var yii\web\View $this */

$this->title = 'Управление товарами';
?>
<div class="site-index">
    <div id="app">
        <h1>Управление товарами</h1>

        <div class="navbar">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createProductModal" onclick="$('#createProductModal').show()">Добавить новый товар</button>
            <button @click="sortByName('asc')">Сортировать по имени (по возрастанию)</button>
            <button @click="sortByName('desc')">Сортировать по имени (по убыванию)</button>
            <input type="text" v-model="searchTerm" @input="filterProducts" placeholder="Поиск товаров">
        </div>


        <div class="card-container">
            <div class="card" v-for="product in filteredProducts">
                <h2 class="card-text">{{product.name}}</h2>
                <p class="card-text">Описание: {{product.description}}</p>
                <p class="card-text">Цена: {{product.price}}</p>
                <p><a href=""
                      data-toggle="modal"
                      data-target="#updateProductModal"
                      onclick="openUpdateModal(this); return false;"
                      class="update-link"
                      :data-id="product.id"
                      :data-name="product.name"
                      :data-description="product.description"
                      :data-price="product.price"
                    >Изменить</a></p>
                <p><a href="" class="delete-link" :data-id="product.id" onclick="deleteProduct(this)">Удалить</a></p>
            </div>
        </div>

        <div class="modal" id="createProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="create-product">

                    <div class="modal-header">
                        <h4 class="modal-title">Добавить товар</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="$('#createProductModal').hide()">&times;</button>
                    </div>

                    <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Название товара:</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание:</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена:</label>
                                <input type="number" class="form-control" name="price" id="price">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="updateProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="update-product">

                        <div class="modal-header">
                            <h4 class="modal-title">Обновить товар</h4>
                            <button type="button" class="close" data-dismiss="modal" onclick="$('#updateProductModal').hide()">&times;</button>
                        </div>

                        <div class="modal-body">
                            <input type="text" class="form-control" name="id" id="id" hidden>
                            <div class="form-group">
                                <label for="name">Название товара:</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание:</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена:</label>
                                <input type="number" class="form-control" name="price" id="price">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>