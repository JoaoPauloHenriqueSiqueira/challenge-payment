
# Projeto API para transações bancárias

Aplicação backend para registro de usuários e criação de Depósitos/transações entre usuários


# Instalação

## Baixar o projeto

```
git clone https://github.com/JoaoPauloHenriqueSiqueira/challenge-payment.git
```

## Criar .env
```
cp .env.example .env
```
## Alterar valores do banco de dados para o desejado (.env criado) . Exemplo: 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=meubancoaqui
DB_USERNAME=root
DB_PASSWORD=root

```

## Subir containers 
```
docker-compose up -d
```

## Instalar dependências
```
composer install
```

## Gerar chave 
```
php artisan key:generate
```

## Documentação

[Documentação](http://localhost/docs)

## Queue email (local)
```
php artisan queue:listen --queue=mail
```
## Run tests 
```
php artisan test
```

## Code Verify PHPMD
```
vendor/bin/phpmd app  text cleancode,codesize,controversial,design,naming,unusedcode
```

