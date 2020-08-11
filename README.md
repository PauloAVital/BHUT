## Teste BHUT

## REQUISITOS NECESSÁRIOS PARA RODAR O SISTEMA

> O teste foi realizado em ambiente LINUX Ubuntu 18.04.4 LTS

> 1 - Apache - abra o terminal em modo sudo digite os comandos:
>>    sudo apt update
>>    sudo apt install apache2

> 2 -  PHP - abra o terminal em modo sudo digite os comandos:
>>   sudo apt-get update
>>   sudo apt-get install php7.0 php7.0-fpm
>>   sudo apt-get install libapache2-mod-php7.0
>>   sudo apt-get install php7.0-mysql -y

> 3 - MYSQL - abra o terminal em modo sudo digite os comandos:
>>   sudo apt update
>>   sudo apt upgrade
>>   sudo apt install mysql-server
>>   sudo mysql

## Instale o Composer como gerenciador de dependências
> Após entrar no diretorio do projeto execute a linha de comando abaixo:
php -r "copy ('https://getcomposer.org/installer', 'composer-setup.php');"

>digite o comando: composer install
# BHUT

# BASE DE DADOS MYSQL:
> create database bhut;
> use bhut;
> CREATE TABLE log (
>     id int(11) NOT NULL AUTO_INCREMENT,
>     car_id varchar(150) COLLATE utf8_general_ci NOT NULL,
>     data_hora TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
>     PRIMARY KEY (id)
>);

# Utilização das Apis
> Para realiza os testes utilizei o POSTMAN
> http://localhost:8080/api/bhut/listCars
> http://localhost:8080/api/bhut/createCar
> http://localhost:8080/api/bhut/logs

# Para conseguir o _id do Car criado e joga-lo no Log eu usei a api:
> http://localhost:8080/api/bhut/searchListCars/$1

# Dúvidas
> Caso seja necessário algum tipo de ajuda para instalar e rodar o teste estou a disposição:
> phone pelo watssap 17-99132-6395
> e-mail: pauloavital@gmail.com
