# Aplikasi To-Do List

## Deskripsi

Aplikasi sederana bberbasis PHP untuk mencatat tugas harian.

## Fitur

-   Tambah tugas
-   Tandai tugas selesai
-   Hapus tugas

## Struktur Folder

-   `.env` - file konfigurasi aplikasi, termasuk konfigurasi database
-   `app/Http/Controllers/TaskController.php` - file controller yang menghandle proses
-   `routes/web.php` - file router utama
-   `app/Models/Task.php` - file model Task
-   `resources/views/tasks/index.blade.php` - file halaman utama
-   `resources/css/app.css` - file css utama

## Cara Menjalankan

1. Clone repository.
    ```bash
    $ git clone https://github.com/ghustinmr/todo-list.git
    ```
2. Install dependency composer.
    ```bash
    $ composer install
    ```
3. Install dependency dan build asset.
    ```bash
    $ npm install && npm run build
    ```
4. Copy lalu rename .env.example dan atur konfigurasi database.
    ```bash
    # .env
    #...
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1   # Database Host
    DB_PORT=3306        # Database Port
    DB_DATABASE=        # Database Name
    DB_USERNAME=        # Database Username
    DB_PASSWORD=        # Database Password
    #...
    ```
5. Generate aplikasi key.
    ```bash
    $ php artisan key:generate
    ```
6. Jalankan server laravel.
    ```bash
    $ php artisan serve
    ```

## Kontributor

-   [Ghustin Muhammad R](https://gihub.com/ghustinmr)
