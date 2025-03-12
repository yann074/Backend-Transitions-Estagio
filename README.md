# Sistema de RH - Backend Laravel

Este é o backend do Sistema de RH desenvolvido com **Laravel**. Ele fornece uma API REST para comunicação com o frontend, incluindo funcionalidades de autenticação usando **Sanctum**.

## Requisitos

- PHP 7.4 ou superior
- Composer
- MySQL ou MariaDB (ou outro banco de dados suportado pelo Laravel)

## Como rodar o projeto

### Passo 1: Clonar o repositório

Clone o repositório do backend para o seu ambiente local:

```bash
git clone https://seu-repositorio.git
cd nome-do-repositorio/backend


### Passo 2: Instalar dependências

Instalar dependências do Laravel:

```bash
composer install

### Passo 3: Configuração do ambiente

Copie o arquivo .env.example para .env:

```bash
cp .env.example .env

Em seguida, configure o banco de dados e outras variáveis no arquivo .env. Exemplo de configuração de banco de dados:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_rh
DB_USERNAME=root
DB_PASSWORD=

Gerar a chave da aplicação:
```bash
php artisan key:generate


### Passo 4: Configuração do Sanctum (Autenticação)

Publicar as configurações do Sanctum:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

Executar as migrações:

```bash
php artisan migrate

Carregar para login:

```bash
php artisan db:seed


### Passo 5: Rodar o servidor Laravel

```bash
php artisan serve

Isso iniciará o servidor na URL http://localhost:8000.


### Passo 6: Dados para o Login

Para os dados do login ultilize:

userteste@gmail.com
senha123