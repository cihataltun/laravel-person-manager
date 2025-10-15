# Laravel Person Manager

Laravel 12, PostgreSQL ve Docker kullanılarak geliştirilmiş kişi yönetim sistemi.

## 🚀 Özellikler

- Laravel 12
- PostgreSQL database
- Docker containerization
- 1M test verisi seeder'ı
- Optimize edilmiş yaş ortalaması API'si
- Performans odaklı index yapıları

## 📋 Gereksinimler

- Docker
- Docker Compose

## 🛠️ Kurulum

```bash
# Repository'yi klonla
git clone https://github.com/[KULLANICI_ADIN]/laravel-person-manager.git
cd laravel-person-manager

# Container'ları başlat
docker-compose up -d

# Bağımlılıkları yükle
docker-compose exec app composer install

# Environment dosyasını oluştur
cp .env.example .env

# Migration'ları çalıştır
docker-compose exec app php artisan migrate

# Test verilerini ekle (opsiyonel)
docker-compose exec app php artisan db:seed --class=TestPeopleSeeder

🎯 API Endpoints
Yaş Ortalaması Hesapla
Endpoint:

http
GET /average-age
Açıklama:
Tüm kişilerin doğum tarihlerinden yaşlarını hesaplayarak ortalama yaşı döndürür. Performans optimizasyonu sayesinde 1 saniyenin altında çalışır.

Response:

json
{
  "success": true,
  "data": {
    "average_age": 49.25,
    "execution_time_ms": 45.62,
    "total_records": 1000000
  },
  "message": "Method 1 saniyenin altında çalıştı"
}
Response Alanları:

Alan	            Tip	Açıklama
average_age	float	Hesaplanan ortalama yaş
execution_time_ms	float	Sorgu çalışma süresi (milisaniye)
total_records	    int	İşlenen toplam kayıt sayısı
message	string	    Performans durum mesajı

Örnek Kullanım:
bash
curl -X GET http://localhost:8000/average-age

🗄️ Database Yapısı
sql
people table:
- id (bigint)
- name (string)
- surname (string)
- birthdate (date)
- email (string, unique)
- phone (string)
- address (text)
- gender (enum: male, female, other)
- created_at (timestamp)
- updated_at (timestamp)

📊 Performans
1M kayıt üzerinde yaş ortalaması sorgusu: < 1 saniye

Optimize edilmiş PostgreSQL index'leri

Batch insert ile hızlı veri yükleme

🏗️ Proje Yapısı
text
laravel-person-manager/
├── app/
│   ├── Models/
│   │   └── Person.php
│   ├── Services/
│   │   └── PersonService.php
│   └── Http/
│       └── Controllers/
│           └── PersonController.php
├── database/
│   ├── migrations/
│   └── seeders/
├── docker-compose.yml
└── Dockerfile

🔧 Geliştirme
bash
# Container'a giriş yap
docker-compose exec app bash

# Yeni migration oluştur
php artisan make:migration create_new_table

# Seeder çalıştır
php artisan db:seed

# Testleri çalıştır
php artisan test

