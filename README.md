## RecapPlus

system to open tire retread OS, sales analysis and sales statistics.

<hr>

###### Tasks
|   Task|  Status |
| :------------ | :------------ |
|   Client |  ok  |
| Login system  | ok  |
|  Form payment |  ok  |
| Tire measurements  | pending  |
| Band  | pending  |
| brand   | pending  |
| Open OS  | pending  |
| Reports  | pending  |
| Home  | pending  |
| Dashboard  | pending  |

##### Screenshot

[![Login](https://uploaddeimagens.com.br/images/003/430/762/original/Screenshot_from_2021-09-14_17-13-16.png?1631661246 "Login")](https://uploaddeimagens.com.br/images/003/430/762/original/Screenshot_from_2021-09-14_17-13-16.png?1631661246 "Login")

[![Clients](https://uploaddeimagens.com.br/images/003/430/767/original/Screenshot_from_2021-09-14_17-16-09.png?1631661394 "Clients")](https://uploaddeimagens.com.br/images/003/430/767/original/Screenshot_from_2021-09-14_17-16-09.png?1631661394 "Clients")

#### Instalation

Clone this repository and execute the commands below:
```bash
git clone https://github.com/leandro47/recap-plus-laravel-vue.git
cd recap-plus-laravel-vue
composer install
npm install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
npm run watch
```
Visit `http://127.0.0.1:8000/login` 
Login: **admin@admin.com**
Password: **password**

#### See me running in `https://recapplus.leandro47.com`
