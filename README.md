# TugasWeb-P10-BlogCRUD

Tugas Rutin Pertemuan 10 — Blog CRUD Laravel dengan Route Resource, Blade Layout, Components, Validasi, Flash Message, Soft Delete, dan Pagination.

---

## 🛠️ Langkah Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/necromancerbot1/TugasWeb-P10-BlogCRUD.git
cd TugasWeb-P10-BlogCRUD
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Buka `.env`, sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugaspertemuan10
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Database
Buat database baru bernama `tugaspertemuan10` di phpMyAdmin atau HeidiSQL.

### 5. Jalankan Migration
```bash
php artisan migrate
```

### 6. Buat Storage Link (untuk upload gambar)
```bash
php artisan storage:link
```

### 7. Jalankan Server
```bash
php artisan serve
```

Buka browser → **http://127.0.0.1:8000/posts**

---

## 📁 Struktur Folder

```
TugasWeb-P10-BlogCRUD/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PostController.php        ← Resource controller (7 methods)
│   ├── Models/
│   │   └── Post.php                      ← Model dengan SoftDeletes
│   └── View/
│       └── Components/
│           ├── Alert.php                 ← Component flash message
│           └── Card.php                 ← Component card post
├── database/
│   └── migrations/
│       └── xxxx_create_posts_table.php  ← Migration dengan soft delete
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php            ← Layout master dengan @yield
│       ├── components/
│       │   ├── alert.blade.php          ← View component alert
│       │   └── card.blade.php           ← View component card
│       └── posts/
│           ├── index.blade.php          ← Daftar post + pagination + search
│           ├── create.blade.php         ← Form tambah post + validasi
│           ├── edit.blade.php           ← Form edit post + validasi
│           └── show.blade.php           ← Detail post
└── routes/
    └── web.php                          ← Route::resource + search route
```

---

## 🌐 Routes

| Method | URL | Action | Name |
|--------|-----|--------|------|
| GET | `/posts` | index | posts.index |
| GET | `/posts/create` | create | posts.create |
| POST | `/posts` | store | posts.store |
| GET | `/posts/{post}` | show | posts.show |
| GET | `/posts/{post}/edit` | edit | posts.edit |
| PUT/PATCH | `/posts/{post}` | update | posts.update |
| DELETE | `/posts/{post}` | destroy | posts.destroy |
| GET | `/search?q=keyword` | search | posts.search |

---

## ✅ Checklist Requirement

- [x] `Route::resource('posts')` + named routes
- [x] `PostController` resource (7 methods)
- [x] Blade layout master + `@extends`/`@yield`
- [x] Minimal 2 components (Alert, Card)
- [x] Validasi + error per field + old input
- [x] Flash message sukses/gagal
- [x] `@csrf` semua form + `@method` PUT/DELETE
- [x] Route Model Binding + pagination
- [x] Bonus: pencarian
- [x] Bonus: soft delete
- [x] Bonus: upload gambar
