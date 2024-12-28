# Project Requirements

This document outlines the requirements and dependencies needed to set up and run the project successfully.

---

## **System Requirements**

Ensure your system meets the following requirements:

- **Operating System**: macOS, Linux, or Windows (WSL recommended for Windows users).
- **PHP**: Version 8.3
- **Database**: MySQL 8.x
- **Node.js**: Version 20.18.x
- **npm**: 10.8.x
- **Composer**: Version 2.x
- **Web Server**:
    - Laravel Valet (recommended for macOS).
    - Nginx or Apache for production environments.
- **Browser**: Latest version of Chrome, Firefox, or Safari.

---

## **Dependencies**

The following tools and libraries are required:

### **Backend**

- Laravel 9.x or later
- PHP Extensions:
    - `openssl`
    - `pdo`
    - `mbstring`
    - `tokenizer`
    - `xml`
    - `ctype`
    - `json`

### **Frontend**

- TailwindCSS (optional)
- Vite (for asset bundling)

### **Development Tools**

- Laravel Debugbar (optional for debugging)
- Filament Admin Panel (for backend settings management)

---

## **Third-Party Services**

The following external services are required:

- **Google Analytics**:
    - Used for tracking and monitoring website traffic.
    - The tracking ID must be configured in the project settings.