# Sistema de conta bancária  :bank:

#### Tecnologias:

- Laravel 7
- Bootstrap 4
- JavaScript



#### Instruções para executar a aplicação:

1. Faça um clone ou baixe esse projeto;
2. Altere o arquivo `.env.example` para `.env`;
4. Crie um banco de dados com um nome de sua escolha e altere os arquivos `.env`  e `config/database.php` com os parâmetros do seu database;
5. Execute o comando `php artisan migrate` para criar as tabelas;
5. Execute o comando `php artisan db:seed` para criar um usuário de teste;
6. Execute o comando `composer install` para instalar as dependências do projeto;
7. Navegue até o diretório `/public`;
8. Execute o comando `php -S localhost:8000` para iniciar a aplicação usando o servidor do PHP;
9. Acesse a aplicação em execução em um navegador no endereço `http://localhost:8000`;



##### Dados de usuário com dados já inseridos:

email: `teste@mail.com`

senha: `12345`
