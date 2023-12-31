# Web-приложение "Каталог"

Этот демо проект разработан на Yii2 Basic и использует Docker для контейнеризации и Vue.js для фронтенда. 
Управление товарами осуществляется через REST API.

## Как запустить проект

Чтобы запустить проект, выполните следующие шаги:

1. **Установите Docker**: Если у вас еще нет Docker, установите его, следуя официальным инструкциям на [сайте Docker](https://docs.docker.com/get-docker/).

2. **Установите Composer**: Если у вас еще нет Composer, установите его, следуя инструкциям на [сайте Composer](https://getcomposer.org/download/).

3. **Пропишите переменные окружения** Небходимо создать файл .env скопировав его из .env.prod. В файле .env необходимо указать значения перменных.

4. **Запустите контейнеры Docker**:
   - Склонируйте репозиторий проекта на свой компьютер.
   - Перейдите в корневую папку проекта и выполните следующую команду для запуска контейнеров Docker:

   ```bash
   docker-compose up -d
   ```

5. **Установите Vue.js**:
   - Выполните команду установки Vue.js:

   ```bash
   npm install vue
   ```

6. **Установите зависимости PHP**:
   - Выполните команду установки зависимостей PHP с помощью Composer:

   ```bash
   composer install
   ```

7. **Выполните миграции**:
   - В контейнере `shop-php` выполните команду миграции для создания таблицы с товарами:

   ```bash
   php yii migrate
   ```
8. **Прописать алиас сайта**:
   - В файле /etc/hosts (c:\windows\system32\drivers\etc\hosts в случае Windows) прописать:
   
    ```bash
   127.0.0.1	local.web-shop.ru
   ```

9. **Просмотр сайта**:
   - Теперь вы можете просматривать сайт, перейдя по адресу [http://local.web-shop.ru](http://local.web-shop.ru) в вашем браузере. 
   - Для входа в админку перейдите на страницу Вход, данные для входа будут указаны на ней.

Теперь проект запущен и готов к использованию!

## Лицензия

Этот проект распространяется под лицензией MIT.