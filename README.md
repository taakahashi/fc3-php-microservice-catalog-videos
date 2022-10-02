# Full Cycle 3 
Módulo de "Microsserviço: Administração do Catálogo de vídeos com PHP" ( Back-end )

# Commands List

### Instalar PHP 8.1 no Linux (WSL)
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php8.1
```

### Alterar permissões de arquivos
```
chown -R 1000:1000 .
```

### Instalar PSR-4 (Autoload)
Adicionar o bloco abaixo no arquivo `composer.json` abaixo de "authors";

Após isso rodar o comando: `composer dump-autoload`
```
"autoload": {
    "psr-4": {
        "Core\\": "src/Core"
    }
},
```

### Instalar pelo Composer
```
composer require --dev phpunit/phpunit
composer require --dev mockery/mockery

composer require ramsey/uuid
```

### Criar alias para rodar testes com PHPUnit
```
--- Editar o arquivo abaixo
nano ~/.bashrc

--- Escrever o comando abaixo ao final do arquivo
alias unit='$(pwd)/vendor/bin/phpunit'
Ctrl+X

--- Rodar o .profile
sh ~/.profile

--- Rodar o .bashrc
source ~/.bashrc
```


# Commands Docker
```
docker-compose up -d
docker-compose exec app bash
```