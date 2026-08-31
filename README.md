# NuvisFinance™

Online accounting and financial management software designed for small businesses and freelancers. Proprietary product of Nuvis Technologies.

## Requirements

* PHP 8.1 or higher
* Database (e.g.: MariaDB, MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)

## Installation

* Install dependencies: `composer install ; npm install ; npm run dev`
* Install NuvisFinance:

```bash
php artisan install --db-name="nuvisfinance" --db-username="root" --db-password="pass" --admin-email="admin@company.com" --admin-password="123456"
```

* Create sample data (optional): `php artisan sample-data:seed`

## License

NuvisFinance is proprietary software owned by Nuvis Technologies. All Rights Reserved. See [LICENSE.txt](LICENSE.txt).
