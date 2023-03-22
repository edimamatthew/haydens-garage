## Hayden's Garage

This is simple booking system built in Laravel. It allows booking a 30-minutes appointment slot between 9:00am and 5:00pm.

### Requirement(s)
- PHP 8.1

### Technologies
- [Laravel 10.x](https://laravel.com/docs/10.x/)
- [Jetstream](https://jetstream.laravel.com/)
- [Livewire](https://laravel-livewire.com/)
- [Mailpit (for dev email)](https://github.com/axllent/mailpit)
- [Tailwindcss](https://tailwindcss.com/)

### Features
- Users can book on available time slots
- Form validation so only valid data gets stored
- Ensure date/slot cannot be booked more than once
- Also ensure users can only book appointments on weekdays
- Email notifications
- Admin can see all bookings
- Admin can filter bookings list by future date
- Admin can block some slots so users cannot book on those slots
- Admin can chose to block the whole day or specific slots in a day
- Dark theme support

### Setup
To setup locally, [Laravel Sail](https://github.com/laravel/sail/) is installed so you can get started immediately. Note that Sail requires Docker installed.

Follow the steps below to get started
- Clone the repo
- Run `cp .env.example .env`
- Run `composer install`
- Install javascript dependencies `npm install && npm run build`
- Start Sail `sail up`
- Run migration `sail php artisan migrate`
- Run the seeder `sail php artisan db:seed`

You should be able to access the app on http://localhost

To register, navigate to http://localhost/register and use http://localhost/login to sign in

### Issues
- I used Laravel's default authentication (via Jetstream) and didn't setup for email verification, admin privileges, etc. So for now, anybody signed in has access to the dashboard
- Also, Jetstream scaffolding came with some view files that needs to be cleaned up

### Screenshots

![image](https://user-images.githubusercontent.com/7883760/227040313-044bcd3d-ebb2-4f73-8e55-e661c84152b0.png)

![image](https://user-images.githubusercontent.com/7883760/227040659-099f3962-c31b-4fd4-abd5-11ba16b0bec1.png)

![image](https://user-images.githubusercontent.com/7883760/227040909-93419809-9845-4ac6-b8cc-e5c64955ff55.png)

![image](https://user-images.githubusercontent.com/7883760/227041056-6e5835d8-d1dd-4287-8fab-0585aa51f107.png)
