# Back-end | Amor e Saúde

- PHP 5.4
- MySQL


É ideal que seja realizado primeiro a instalação do servidor back-end e depois o front-end. O código e documentação do front-end podem ser encontrado nesse [link](https://github.com/LucasSAguilar/front_test_amor_saude).

### Como inicializar o projeto

#### - Clone o repositório

`` git clone https://github.com/LucasSAguilar/back_test_amor_saude.git``

Acesse a pasta e instale as dependências necessárias

``cd nome_da_pasta``

``composer install``

#### - Faça a migração com o banco de dados

Acesse seu editor MySQL e crie um banco de dados;

No projeto crie um arquivo ".env" e configure com as suas informações. Exemplo:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=amor_saude
DB_USERNAME=root
DB_PASSWORD=
```

Após isso rode o código de migração através do comando ``php artisan migrate``  

Caso tenha feito corretamente, serão incluidos alguns dados para testes e um usuário para que possa realizar o login.

E-mail: admin@example.com

Password: senha123

#### - Inicialize o projeto

``php artisan serve``

--- 


