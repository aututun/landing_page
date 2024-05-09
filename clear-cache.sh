#!/bin/bash

# Xóa bộ nhớ cache ứng dụng
php artisan cache:clear

# Xóa bộ nhớ cache route
php artisan route:cache

# Xóa bộ nhớ cache view
php artisan view:clear

# Xóa bộ nhớ cache cấu hình
php artisan config:cache
