# Smart Service Booking Portal

A full-stack PHP web application that allows users to book services and provides an admin dashboard to manage bookings and services.

![Preview](screenshots/booking-form.png)

---

## Features

- Client booking form with AJAX submission
- Admin login with session management
- Admin dashboard with:
  - Service management (add/delete)
  - Booking management (view/delete)
- Responsive UI using Bootstrap 5
- MySQL database integration
- Clean folder structure

---

## Tech Stack

- PHP
- MySQL
- Bootstrap 5
- jQuery & AJAX
- XAMPP (for local development)

---

## Screenshots

### Booking Form
![Booking Form](screenshots/booking-form.png)

### Admin Dashboard
![Admin Dashboard](screenshots/admin-dashboard.png)

### Manage Services
![Manage Services](screenshots/services-page.png)

### Manage Bookings
![Manage Bookings](screenshots/bookings-page.png)

---

## Setup Instructions

1. Clone or download this repository

2. Place it in your `htdocs` folder inside XAMPP:
   ```
   C:/xampp/htdocs/smart_service_booking_portal_with_bookings/
   ```

3. Start Apache and MySQL from the XAMPP Control Panel

4. Import the SQL schema:
   - Visit: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a database: `smart_booking`
   - Import the file: `sql/schema.sql`

5. Access the site:
   - **Client Booking:** [http://localhost/smart_service_booking_portal_with_bookings](http://localhost/smart_service_booking_portal_with_bookings)
   - **Admin Login:** [http://localhost/smart_service_booking_portal_with_bookings/admin/login.php](http://localhost/smart_service_booking_portal_with_bookings/admin/login.php)

---

## Admin Credentials

- **Username:** admin
- **Password:** admin123

---

## License

This project is open for educational and personal use.