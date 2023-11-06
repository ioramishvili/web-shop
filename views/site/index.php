<?php

/** @var yii\web\View $this */

$this->title = 'Каталог товаров';
?>
<div class="site-index">
    <div id="app">
        <h1>Каталог товаров</h1>

        <div class="navbar">
            <button @click="sortByName('asc')">Сортировать по имени (по возрастанию)</button>
            <button @click="sortByName('desc')">Сортировать по имени (по убыванию)</button>
            <input type="text" v-model="searchTerm" @input="filterProducts" placeholder="Поиск товаров">
        </div>

        <div class="card-container">
            <div class="card" v-for="product in filteredProducts">
                <h2 class="card-text">{{product.name}}</h2>
                <p class="card-text">Описание: {{product.description}}</p>
                <p class="card-text">Цена: {{product.price}}</p>
            </div>
        </div>
    </div>
</div>