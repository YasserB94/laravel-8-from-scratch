### Setup local environment to edit this project
- This project was built using
  - Composer version 2.4.4
  - Node version 19.0.1
- Install Composer and Node packages used
```bash
      #Bash - In project directory
      $ composer install;npm install;
```
- This project expects a relational database
- Set the database credentials in your .env file
```bash
      #Bash - In project directory
      $ cp .env.example .env
```
- Seed the database with dummy data
```bash
      #Bash - In project directory
      $ php artisan migrate:fresh --seed
```
***
### To run this project for development
- Run vite to parse TailwindCSS - JavaScript in development 
```bash
      #Bash - In project directory
      $ vite
```
- Serve with a PHP server
```bash
      #Bash - In project directory
      $ php artisan serve 
```
***
### Clockwork
(https://github.com/itsgoingd/clockwork)[Clockwork]
Awesome PHP Devtools for Laravel :D
