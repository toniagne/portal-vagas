#  PLATAFORMA CONTRATAÇÕES

Projeto para desenvolvimento de plataforma para testes de contratação

# DETALHES DO PROJETO

Site voltado para cadastro e testes para contratações de profissionais

## MÉTODOS E TECNOLOGIAS UTILIZADAS

- [Linguagem PHP](https://www.php.net/)
- [Banco de dados MYSql](https://www.mysql.com/)
- [Framework Laravel 6](https://laravel.com/) 

### INSTALAÇÃO
Clonagem do diretório:
```
git clone https://gitlab.com/inovedados/contratacoes.git
```

Baixe as dependências do projeto via composer. 
```
composer update
```
Configure o autoload
```
composer dump-autoload
```
Baixar as dependências (na raiz do repositório):
```
Atualizar a estrutura do banco de dados  (na raiz do repositório):
```
php artisan migrate
```
Popular o banco de dados com dados para criar usuário de exemplo (login -> exemple@dev.com.br pass-> 123123 ) :
```
php artisan migrate --seed
```
 