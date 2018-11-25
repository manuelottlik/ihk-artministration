## Systemvoraussetzungen
- Git
- Docker
- Text Editor

## Installationsschritte
1. git clone https://github.com/manuelottlik/ihk-artministration.git
2. cd ihk-artministration
3. git submodule init
4. git submodule update
5. cp .env.example .env
6. cd laradock-ihk-artministration
7. cp ..\.env.example.laradock .env
8. docker-compose up -d nginx mysql
9. docker-compose exec mysql bash
10. mysql -u root -p
11. root
12. ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
13. ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
14. ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
15. exit
16. exit
17. docker-compose exec workspace bash
18. composer update
19. php artisan key:generate
20. php artisan passport:install
21. php artisan migrate --seed
