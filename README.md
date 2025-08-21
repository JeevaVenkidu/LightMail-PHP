# 🌟 LightMail-PHP

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4.svg?logo=php&logoColor=white)](https://www.php.net/)

> 🚀 A super lightweight **PHP Contact Form Email API** powered by [PHPMailer](https://github.com/PHPMailer/PHPMailer).  

LightMail-PHP is designed for developers who need a **simple, secure, and lightweight** email backend for their landing pages, portfolios, or small projects — without the overhead of databases or heavy frameworks.  

---

## ✨ Features
- 📩 Send contact form emails via SMTP (PHPMailer)
- 🔒 Secure with input validation
- ⚡ Ultra-lightweight (no DB, no frameworks)
- 🌍 CORS-enabled (ready for frontend integration)
- 🛠 Easy to configure with a single `config.php` file

---

## 📂 Project Structure

```
LightMail-PHP/
├── api/
│   ├── phpmailer/             # PHPMailer library
│   ├── templates/             # Email templates
│   │   └── contact-template.php
│   ├── config.example.php      # Example SMTP config
│   ├── contact.php             # Main API entry point
│   ├── mailer.php              # Mail sending logic
│   ├── validator.php           # Input validation
│   └── response.php            # JSON response helper
├── .gitignore
├── LICENSE
└── README.md
```

---

## 🚀 Getting Started

### 1. Clone the repo
```bash
git clone https://github.com/JeevaVenkidu/LightMail-PHP.git
cd LightMail-PHP/api
```

### 2. Configure SMTP
update with your SMTP details in config.php:

```php
return [
    "host"     => "smtp.example.com",
    "username" => "your-email@example.com",
    "password" => "your-app-password",
    "port"     => 587,
    "from"     => "your-email@example.com",
    "fromName" => "Your Website",
    "to"       => "destination@example.com",
    "debug"    => false
];
```

### 3. Send a Request
Make a `POST` request to `api/contact.php` with JSON payload:

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "subject": "Hello!",
  "message": "This is a test message."
}
```

Example using `fetch` in JavaScript:
```js
fetch("https://yourdomain.com/api/contact.php", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({
    name: "John Doe",
    email: "john@example.com",
    subject: "Hello!",
    message: "This is a test message."
  })
})
.then(res => res.json())
.then(data => console.log(data));
```

---

## 📜 License

This project is licensed under the **MIT License** – free to use, modify, and distribute.

---

## 💡 Contributing

Contributions, issues, and feature requests are welcome!  
Feel free to fork this repo and submit a PR.

---

## ❤️ Credits

Built with [PHPMailer](https://github.com/PHPMailer/PHPMailer).  
Created and maintained by **Jeeva**.