# Praktikum PAW Modul 10 — Controller dan View pada Laravel 13

- **Nama:** Zaki Irsyada Putra
- **NIM:** 108052500069
- **Kelas:** IS-08-03
- **Program Studi:** S1 Sistem Informasi · Telkom University Surabaya

## Ringkasan Implementasi
1. **Basic Controller (`HomeController`):** Halaman `/home` dengan passing data `$pageTitle`.
2. **Single Action Controller (`ProfileController --invokable`):** Halaman `/profile` menggunakan magic method `__invoke()`.
3. **Resource Controller (`EmployeeController --resource`):** Pengelolaan route resource `employees` (`index`, `create`, `store`, dll).
4. **Form, Validasi, CSRF Protection, & Repopulating Forms (`old()`):** Halaman `/employees/create` dan validasi input `Validator::make()`.

## Cara Menjalankan Lokal
```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan serve
```
