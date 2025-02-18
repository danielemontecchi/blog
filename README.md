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
- **Image Optimization**: WebP support, lazy loading, and automatic compression for better performance.
- **GitHub-Integrated Comments**: Users can comment on posts using GitHub authentication.
- **Database Backup System**: Automatic and manual database backup options.
- **Advanced RSS Feeds**: Customizable RSS feed options with metadata enhancements.
- **Static Pages with Laravel Folio**: Manage and render static pages efficiently using Laravel Folio.

---

## Requirements

To run this project, ensure your system meets the required specifications. Refer to
the [REQUIREMENTS.md](REQUIREMENTS.md) file for detailed information on system and software requirements.

---

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/danielemontecchi/blog.git
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
	- **Email**: `admin@user.me`
	- **Password**: `admin1234`

### Multilingual Configuration

- Add new language files under the `resources/lang` directory.
- Use the language switcher on the site to toggle between languages.

### Managing Static Pages with Laravel Folio

The project uses **Laravel Folio** to handle static pages efficiently.

- Static pages are stored in `resources/views/pages`.
- Each page can be accessed dynamically via its route.
- To create a new static page:
	1. Add a new Blade file in `resources/views/pages/` (e.g., `about.blade.php`).
	2. Define its route in `routes/web.php`:
	   ```php
	   Route::get('/about', fn() => view('pages.about'));
	   ```
- These pages support full Blade templating, including components and layouts.

---

## Roadmap

- [x] Dynamic blog post creation and management
- [x] Image optimization with WebP and lazy loading
- [x] GitHub-integrated comments system
- [x] Database backup feature
- [x] Advanced RSS feed customization
- [x] Static pages management with Laravel Folio
- [ ] Content scheduling
- [ ] Newsletter subscription feature

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
