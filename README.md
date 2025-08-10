<!-- Banner -->
<p align="center">
  <img src="https://img.shields.io/badge/Skill%20Exchange-%F0%9F%A4%9D-blueviolet?style=for-the-badge&logo=hackthebox" alt="Skill Exchange Banner"/>
</p>

<h1 align="center">🤝 Skill Exchange Platform</h1>
<p align="center"><em>A modern barter-style web app where people exchange skills — no money, only mutual help.</em></p>

<p align="center">
  <img src="https://img.shields.io/badge/Tech-Laravel%20%7C%20PHP%20%7C%20MySQL-blue?style=flat-square&logo=laravel" alt="Tech">
  <img src="https://img.shields.io/badge/Status-Production%20Ready-yellow?style=flat-square" alt="Status">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
</p>

---

## 🔥 Demo & Screenshots

> Add your screenshots in `/screenshots` folder. Recommended: `1200px` width.

| Homepage | Request Flow | Requests Dashboard |
|---|---|---|
| ![home](screenshots/home_page.png) | ![request](screenshots/user_profile.png) | ![dashboard](screenshots/requests.png) |

---

## 📖 Overview

**Skill Exchange** lets users:
- Browse skills offered by others.
- Request a skill and **offer one of their own** in return.
- Skill owner reviews request + offered skill.
- When both parties accept, exchange is assigned/confirmed.

This design fosters community learning and direct barter — no cash, just skills.

---

## ✨ Features

- 🔍 Browse & search skills
- 📩 Send a skill request with an offered skill
- 👀 Owners can review incoming requests
- ✅ Mutual approval flow to confirm exchange
- ⭐ Ratings & reviews after exchange (optional)
- 📱 Responsive UI with Bootstrap

---

## 🧭 Table of Contents

- [Tech Stack](#-tech-stack)
- [Quick Start](#-quick-start)
- [Project Structure](#-project-structure)
- [Core DB / API design](#-core-db--api-design)
- [Contributing](#-contributing)
- [License & Contact](#-license--contact)

---

## 🛠️ Tech Stack

- Frontend: HTML, CSS, JavaScript, Bootstrap  
- Backend: Laravel (PHP)  
- DB: MySQL

---

## 🚀 Quick Start

```bash
# clone
git clone https://github.com/DevPanchal2610/skill-exchange-project.git
cd skill-exchange-project

# install
composer install
npm install && npm run dev   # if using assets

# env
cp .env.example .env
# update DB credentials in .env

php artisan key:generate
php artisan migrate
php artisan db:seed   # optional seeders

# serve
php artisan serve
# open http://localhost:8000
