# 🌍 Globe Trotting - Laravel Travel Booking Platform

A modern Laravel application for planning and booking travel services including **cars**, **flights**, **hotel stays**, and **activities**. Built with elegant UI and Tailwind CSS.

---

## 📸 Booking Form UI Preview

![Booking Form Preview](resources/screenshots/booking-ui.png)

---

## 🚀 Features

- ✈️ Flight Search with Cabin Class, Date Range, and Pax
- 🚗 Car Rentals with Location & Driver Age Support
- 🏨 Hotel Stay Finder with Room & Radius Options
- 🎟️ Local Activity Booking with Date Filters
- 🌈 Modern Tailwind CSS UI with Gradient + Glass Effects

---

## ⚙️ Setup Instructions

```bash
# Clone this project
git clone https://github.com/hardeex/Global-troting-travel-agency

cd Global-troting-travel-agency

# Install dependencies
composer install
npm install && npm run dev

# Set up environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start server
php artisan serve


