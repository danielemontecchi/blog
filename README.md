# Personal Website and Blog

A Laravel-based personal website with an integrated blog, featuring multilingual support, dynamic settings management
via Filament, and a responsive, modern design.

---

## Features

- **Dynamic Blog System**: Create, edit, and display blog posts.
- **Multilingual Support**: Supports multiple languages with a language switcher.
- **Customizable Settings**: Manage site-wide settings (e.g., Google Analytics, meta descriptions) via a Filament admin
  panel.
- **Responsive Design**: Mobile-friendly layout for a seamless user experience.
- **SEO Optimized**: Meta tags, social sharing configuration, and clean URLs.
- **Custom Error Pages**: Beautifully designed 404 and 500 error pages.
- **Google Analytics Integration**: Track and monitor site performance easily.

---

## Requirements

To run this project, ensure your system meets the required specifications. Refer to
the [REQUIREMENTS.md](REQUIREMENTS.md) file for detailed information on system and software requirements.

---

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/<your-username>/<repo-name>.git
   cd <repo-name>
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Set Environment Variables**:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update database credentials and other settings in `.env`. See [REQUIREMENTS.md](REQUIREMENTS.md) for the necessary
      environment variables.

4. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Seed the Database (Optional)**:
   ```bash
   php artisan db:seed
   ```

6. **Serve the Application**:
   ```bash
   php artisan serve
   ```

7. **Access the Application**:
   Open your browser and go to [http://localhost:8000](http://localhost:8000).

---

## Usage

### Admin Panel

- Access the admin panel for managing settings and posts at `/admin`.
- Default credentials (if seeding is enabled):
    - **Email**: `daniele@montecchi.me`
    - **Password**: `admin1234`

### Multilingual Configuration

- Add new language files under the `resources/lang` directory.
- Use the language switcher on the site to toggle between languages.

---

## Roadmap

- [x] Dynamic blog post creation and management
- [x] Multilingual support
- [x] Google Analytics integration
- [ ] Newsletter subscription feature
- [ ] Advanced search functionality
- [ ] Content scheduling

---

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your message here"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a pull request.

---

## License

This project is licensed under the [MIT License](LICENSE). Please read the license file for more information.
