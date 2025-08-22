# 🎉 Event Invitation System

A beautiful Laravel Blade application for managing event attendees with MySQL backend. This application manages two cultural events: **Haldi Ceremony** and **Onam Festival**.

## ✨ Features

- **Responsive Design**: Mobile-first, responsive interface that works on all devices
- **Two Event Management**: Toggle between Haldi and Onam events
- **Attendee Registration**: Modal-based registration form with validation
- **Duplicate Prevention**: Prevents duplicate registrations based on phone number
- **Real-time Updates**: Dynamic attendee count updates
- **Admin Dashboard**: View and manage all registered attendees
- **Export Functionality**: Export attendee lists as CSV files
- **Cultural Content**: Rich, culturally relevant content for each event
- **Beautiful UI**: Modern gradient design with smooth animations

## 🎭 Events

### Haldi Ceremony 🌺
A traditional pre-wedding ritual featuring:
- Turmeric application ceremony
- Folk music and dancing
- Traditional Indian snacks
- Photography and memories

### Onam Festival 🌾
Kerala's harvest festival featuring:
- Traditional Sadhya feast
- Pookalam (flower arrangements)
- Kathakali performances
- Cultural programs

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL or SQLite (comes configured with SQLite by default)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd invitation
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=AttendeeSeeder  # Optional: Add sample data
   ```

5. **Start the development server**
   ```bash
   php artisan serve
   ```

6. **Visit the application**
   - Main Application: http://127.0.0.1:8000
   - Admin Dashboard: http://127.0.0.1:8000/admin/attendees

## 📱 Application Structure

### Routes
- `/` - Home page with event selection
- `/event/{event}` - Individual event details (haldi/onam)
- `/register` - AJAX endpoint for attendee registration
- `/admin/attendees` - Admin dashboard for viewing attendees

### Database
- **attendees table**:
  - `id` - Primary key
  - `name` - Attendee's full name
  - `phone` - Phone number (unique constraint)
  - `event` - Event type (haldi/onam)
  - `created_at` - Registration timestamp
  - `updated_at` - Update timestamp

### Key Components

#### Models
- **Attendee Model**: Handles attendee data with event scoping

#### Controllers
- **EventController**: Manages all event-related functionality
  - `index()` - Home page with event overview
  - `show()` - Individual event details
  - `register()` - Handle attendee registration
  - `admin()` - Admin dashboard

#### Views
- **Layout**: `layouts/app.blade.php` - Main responsive layout
- **Home**: `events/index.blade.php` - Event selection page
- **Event Details**: `events/show.blade.php` - Individual event pages
- **Admin**: `admin/attendees.blade.php` - Attendee management

## 🎨 Design Features

- **Responsive Design**: Works seamlessly on mobile and desktop
- **Gradient Backgrounds**: Beautiful color schemes for each event
- **Modal Registration**: Smooth modal popup for attendee registration
- **Hover Effects**: Interactive cards with smooth animations
- **Cultural Icons**: Event-appropriate emojis and styling
- **Real-time Feedback**: Instant success/error messages

## 🔧 API Endpoints

### Registration API
**POST** `/register`
```json
{
  "name": "John Doe",
  "phone": "1234567890",
  "event": "haldi"
}
```

**Response** (Success):
```json
{
  "success": true,
  "message": "Welcome to our celebration, John Doe! 🌟 We're excited to have you join us!",
  "attendee_count": 6
}
```

**Response** (Already Registered):
```json
{
  "success": true,
  "message": "You are already on our list, thank you! 🎉",
  "attendee_count": 5
}
```

## 🛠️ Customization

### Adding New Events
1. Update the event enum in the migration
2. Add new routes in `web.php`
3. Update the controller validation
4. Create new view templates
5. Add appropriate styling

### Styling
- **CSS Framework**: TailwindCSS
- **Custom Styles**: Inline styles in the layout
- **Colors**: Customizable gradient themes per event

## 📊 Features in Detail

### Attendee Management
- Unique phone number constraint prevents duplicates
- Real-time count updates
- Event-specific attendee lists
- Registration timestamps

### Admin Dashboard
- View all attendees by event
- Export functionality for attendee lists
- Summary statistics
- Responsive data tables

### User Experience
- Mobile-responsive design
- Intuitive navigation
- Cultural content and imagery
- Smooth animations and transitions

## 🔒 Security Features
- CSRF protection on all forms
- Input validation and sanitization
- XSS protection through Blade templating
- SQL injection prevention via Eloquent ORM

## 🚀 Production Deployment

For production deployment:

1. **Environment Configuration**
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Database Configuration**
   - Update `.env` with production database credentials
   - Run migrations on production server

3. **Optimization**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## 🎯 Future Enhancements

- **Email Notifications**: Send confirmation emails to attendees
- **SMS Integration**: SMS confirmations and reminders
- **QR Code Generation**: Generate QR codes for attendees
- **Event Calendar**: Integration with calendar applications
- **Photo Gallery**: Event photo sharing functionality
- **Multiple Language Support**: Multi-language interface

## 📞 Support

For any issues or questions:
- Check the Laravel documentation: https://laravel.com/docs
- Review the code comments for implementation details
- Test the application thoroughly before production use

## 🎉 Enjoy Your Events!

This application is designed to make event management simple and beautiful. The cultural themes and responsive design ensure your guests have a wonderful experience from registration to attendance.

**Made with ❤️ using Laravel, TailwindCSS, and lots of cultural appreciation!**

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
