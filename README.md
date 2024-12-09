
# Retsept Boshqaruvi Loyihasi
Bu loyiha foydalanuvchilar tomonidan retseptlar yaratish, saqlash va baham ko’rish imkoniyatini taqdim etadi.
## Xususiyatlari
### Foydalanuvchi:
Retseptlarni ko'rish va o‘z retseptlarini yaratish <br>
Admin: <br>
Email:admin@examle.com <br>
Password:password <br>
Yangi retseptlar yaratish, tahrirlash va o'chirish. <br>
Foydalanuvchilar tomonidan yuborilgan retseptlarni tasdiqlash. <br>
Manager: <br>
Email:manager@example.com
Password:password <br>
Foydalanuvchilar tomonidan yuborilgan retseptlarni tasdiqlash.
### Talablar
Loyihani ishga tushirish uchun quyidagi dasturlar kerak: <br>
PH >= 8.1 <br>
Composer <br>
MySQL yoki boshqa ma'lumotlar bazasi <br>
Laravel>= 10.x <br>
Node.js (npm bilan) <br>
### O‘rnatish yo'riqnomas:
1.Loyihani yuklab olish: <br>
GitHub’da kerakli loyihaga kiring. <br>
Yashil Code tugmasini bosing. <br>
"Download ZIP" tugmasini tanlang. <br>
ZIP faylni o‘z kompyuteringizga yuklab oling va oching. <br>
2.Loyihaga kirib, barcha kerakli kutubxonalarni o’rnatish:  <br>
composer install <br>
3..env faylni sozlang: <br>
Loyihada .env fayli mavjud bo‘lmasa, .env.example faylini nusxa ko‘chirib, nomini .env qilib o‘zgartiring:
```
cp .env.example .env
```
4. Keyin .env faylni ochib, ma’lumotlar bazasi (MySQL) bilan bog‘liq quyidagi parametrlarni sozlang:
```
DB_CONNECTION: mysql (yoki ishlatilayotgan baza turi)
DB_HOST: 127.0.0.1
DB_PORT: 3306
DB_DATABASE: Ma’lumotlar bazasi nomi (masalan: recipe_db)
DB_USERNAME: MySQL foydalanuvchisi (masalan: root)
DB_PASSWORD: MySQL foydalanuvchi paroli (agar mavjud bo‘lsa).
```
6. Ma’lumotlar bazasi migratsiyasi
```
php artisan migrate
php artisan db:seed
```
8. Frontend fayllarini o‘rnatish (npm)
```
npm install
npm run dev
```
10. Lokal serverni ishga tushirish
```
php artisan serve
```
### Agar muammo yuzaga kelsa, quyidagi buyruqlar yordamida Laravel keshlarini tozalang:
```
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```
### Muallif
* Farangiz Masharipova

### 2024



