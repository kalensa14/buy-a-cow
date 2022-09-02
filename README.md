## About Project

Simple web project with track user activity.

Just a simple test task that implements various idea with no particular sense.

## Installation

Make sure you have latest docker installed

```
git clone git@github.com:kalensa14/buy-a-cow.git
cd ./buy-a-cow
./app-run
```

After installation process complete open following address in your browser:
`http://localhost:8000`

### Dependencies

- **[Docker](https://www.docker.com/)**
- **[php 8.1](https://www.php.net/releases/8.1/en.php)**
- **[Laravel Framework](https://laravel.com/docs/9.x)**
- **[Alpine.js](https://alpinejs.dev/)**
- **[Chart.js](https://www.chartjs.org/)**
- **[Tabulator JavaScript tables](http://tabulator.info/)**
- **[Tailwind CSS](https://tailwindcss.com/)**

## Running application
Sme way, as during installation, `./app-run` script execution was used, to run application, same script execution is required.

When page `http://localhost:8000/login` opened, use following credentials to authenticate as admin:
```
 email: admin@buyacow.net
 password: admin
 ```

### New user registration

New user can be registered on `http://localhost:8000/register` page. After successful registration form submit user will be logged in automatically.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
