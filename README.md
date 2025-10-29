# 🎟️ TicketWave (PHP + Twig)

A simple ticket management system built with **PHP**, **Twig**, and **TailwindCSS**.  
Users can sign up, log in, and manage their tickets directly in the browser.  
All data (users and tickets) are stored in **localStorage**.

---

## 📂 Folder Structure

twig/
│
├── public/
│ ├── index.php
│ ├── js/
│ │ ├── auth.js
│ │ ├── tickets.js
│ │ └── toast.js
│ └── styles/
│
├── templates/
│ ├── base.twig
│ ├── login.twig
│ ├── signup.twig
│ ├── dashboard.twig
│ ├── tickets.twig
│ └── partials/
│ ├── dashboard_nav.twig
│ └── footer.twig
│
└── vendor/

yaml
Copy code

---

## ⚙️ Setup Instructions

### 1️⃣ Install dependencies
Make sure you have **PHP** and **Composer** installed.

```bash
composer install
2️⃣ Run a local server
From the twig/public directory:

bash
Copy code
php -S localhost:8000 -t .
Then visit:
👉 http://localhost:8000

▶️ Features
🔐 User signup and login

🎫 Create, update, and delete tickets

📊 Dashboard with ticket statistics

💬 Toast notifications for user actions

🎨 TailwindCSS responsive UI

💡 Notes
Uses localStorage for persistence.

No database or backend server required.

Toasts are managed by toast.js.

User’s email is displayed on the dashboard for identification.