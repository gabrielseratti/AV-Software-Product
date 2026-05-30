# Teste Backend - Laravel

API REST com autenticação, gerenciamento de usuários, categorias e postagens de notícias.

## Tecnologias

- PHP 8.3
- Laravel 12
- MySQL
- Laravel Sanctum (autenticação)

## Requisitos

- PHP >= 8.1
- Composer
- MySQL

## Instalação

```bash
# 1. Clonar o repositório
git clone https://github.com/gabrielseratti/teste-backend.git
cd teste-backend

# 2. Instalar dependências
composer install

# 3. Copiar o arquivo de ambiente
cp .env.example .env

# 4. Gerar a chave da aplicação
php artisan key:generate
```

## Configurar o banco de dados

Edite o arquivo `.env` com suas credenciais:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste_backend
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=file
```

Crie o banco de dados:

```sql
CREATE DATABASE teste_backend;
```

## Rodar as migrations e seeders

```bash
php artisan migrate:fresh
php artisan db:seed
```

## Iniciar o servidor

```bash
php artisan serve
```

Acesse: http://127.0.0.1:8000

## Usuários de exemplo

| Nome | Email | Senha |
|------|-------|-------|
| Admin User | admin@example.com | password |
| Test User | test@example.com | password |

## Endpoints da API

### Autenticação

| Método | Endpoint | Descrição |
|--------|----------|-----------|
| POST | /api/register | Cadastro de usuário |
| POST | /api/login | Login (retorna token Bearer) |
| POST | /api/logout | Logout (requer autenticação) |

### Posts

| Método | Endpoint | Descrição | Auth |
|--------|----------|-----------|------|
| GET | /api/posts | Listar posts (com filtros e paginação) | ❌ |
| GET | /api/posts/{id} | Ver post | ❌ |
| POST | /api/posts | Criar post | ✅ |
| PUT | /api/posts/{id} | Editar post | ✅ |
| DELETE | /api/posts/{id} | Deletar post | ✅ |

### Categorias

| Método | Endpoint | Descrição |
|--------|----------|-----------|
| GET | /api/categories | Listar categorias |
| GET | /api/categories/{id} | Ver categoria |

### Filtros disponíveis

```
GET /api/posts?title=Laravel
GET /api/posts?tag=PHP
GET /api/posts?category_id=1
GET /api/posts?page=2
```

### Exemplo de autenticação

```bash
# Login
POST /api/login
{
  "email": "admin@example.com",
  "password": "password"
}

# Usar token retornado nas requisições protegidas
Authorization: Bearer SEU_TOKEN
```

## Front-end

Acesse o front-end em: http://127.0.0.1:8000/posts

Funcionalidades:
- Listagem de posts com filtros
- Visualizar post
- Criar, editar e deletar posts (usuário autenticado)
- Login e registro

## Command Artisan

```bash
# Atualizar título de todas as postagens
php artisan posts:update-title "Novo Título"
```

## Arquitetura

- **Controllers** finos com apenas responsabilidades de requisição/resposta
- **Form Requests** com validações completas e mensagens em português
- **Service Layer** para organização das regras de negócio
- **Policies** do Laravel para controle de permissões
- **Seeders** organizados com dados de exemplo