<h1 align="center">
  <a href="https://laravel.com/"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a>
  <br>
  Print2Connect
  <br>
</h1>

<h3 align="center">Print2Connect: An E-Marketplace of Printing Services. Built using <a href="https://laravel.com" target="_blank">Laravel</a>.</h3><br/>

<p align="center">
<img src="https://img.shields.io/badge/laravel-v8.0+-red.svg" alt="Laravel">
<img src="https://img.shields.io/badge/mysql-v8.0.23-blue.svg" alt="Mysql">
<img src="https://img.shields.io/badge/tailwindcss-v2.0.3-lightblue.svg" alt="Tailwind">
<img src="https://img.shields.io/badge/bootstrap-v4.0-blue.svg" alt="Bootstrap">
<img src="https://img.shields.io/badge/contributions-welcome-orange.svg" alt="Contributions">
<img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License"></a>
</p>

<h3>
<p align="center">
  <a href="#about">About</a> •
  <a href="#Installation">Installation</a> •
  <a href="#how-to-use">How To Use</a> •
  <a href="#credits">Credits</a> •
  <a href="#related">Related</a> •
  <a href="#license">License</a> •
  <a href="#todo">Todo</a>
</p>
</h3>


## About
Print2Connect is an e-marketplace of printing services inspired by social media apps and Freelancer.com. The platform has three types of users:

1. **Admin**: Responsible for approving or rejecting print shop accounts.
2. **Print Shop**: Can view customer service requests, accept requests, comment on posts, and post catalogues for promotion.
3. **Customer**: Can post print requests, comment on posts, and view other postings.

The system features SMTP for notifications when accounts are approved/rejected and when requests are accepted.

Modify the Tweety from https://github.com/durlavkalita/tweety. 
Tweety is a twitter clone built using laravel 8. It uses mysql database. Tailwindcss has been used to style the web app.
Tweety is a project from [Laravel from scratch](https://laracasts.com/series/laravel-6-from-scratch) course available on [Laracasts](https://laracasts.com/). Follow Laracasts for some great learning content. This project is just an extended and new version of the [original](https://github.com/laracasts/Tweety) one with some added features. There are still some features waiting to be added. Any contribution or feature added will be much welcomed :smile:.

## Installation

```bash
# Clone this repository
$ git clone https://github.com/HafiyKharu/Print2Connect

# Go into the repository
$ cd print2connect

# Install dependencies
$ composer install

# Copy .env.example to .env or rename it to .env
$ cp .env.example .env

# Generate application key
$ php artisan key:generate

```

## How To Use

To use/run tweety you need to configure your mysql database and add database details to the .env file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=print2connect
DB_USERNAME=<your database username>
DB_PASSWORD=<your database password>
```
Once this is complete you can start the app by-
```bash
# Run the migration
$ php artisan migrate
$ php artisan db:seed

# Install npm dependencies
$ npm install
$ npm run dev

# To upload image, configure storage link in `filesystem.php` and run- bash
$ php artisan storage:link


# Run the app
$ php artisan serve
```

The application should start on [localhost:8000](http://127.0.0.1:8000/)



## Credits

- [Laravel](http://laravel.com)
- [Laracasts](https://laracasts.com)
- [Tailwindcss](https://tailwindcss.com)
- [Laracasts-Tweety](https://github.com/laracasts/Tweety)
- [Print2Connect](https://github.com/HafiyKharu/Print2Connect)

## Related

[tweety-vue](https://github.com/durlavk98/tweety-vue) - Tweety app built using vuejs
[solar-calculator-landing](https://github.com/HafiyKharu/Solar-Calculator-Landing) - solar calcuator app using next.js 


## License

MIT

## Todo
- [x] The profile page banner image and description are hard-coded. Make these dynamic for each user. 

- [x] Add the ability to attach an image when publishing a tweet.

- [x] There is currently no way to unlike a tweet. Add the ability to toggle a like.

- [x] Add a pop-up flash message when a user publishes a tweet or follows someone.

- [ ] Consider adding Laravel Livewire to allow for more interactive forms.

- [ ] When writing a new tweet, display the number of remaining characters they're allowed.

- [x] Allow tweets to be deleted.

- [ ] Add support for mentions and notifications.

- [ ] Work on responsiveness.

## Some of my other project on laravel

- [websocket-vue-chat](https://github.com/durlavk98/websocket-vue-chat) - Real time chat app built usiing laravel websockets, vuejs


---

> Linkedin [@Muhamad Hafiy Mohd Kharu](https://www.linkedin.com/in/muhamad-hafiy-mohd-kharu-316a8424a/) &nbsp;&middot;&nbsp;


> [@durlav](https://durlavkalita.github.io) &nbsp;&middot;&nbsp;
> Linkedin [@durlavkalita](https://linkedin.com/in/durlavkalita)&nbsp;&middot;&nbsp;
> Medium [@durlavkalita](https://durlavkalita.medium.com) &nbsp;&middot;&nbsp;
> Twitter [@durlavk98](https://twitter.com/durlavk98)
