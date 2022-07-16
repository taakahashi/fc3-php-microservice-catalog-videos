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


# Commands Docker
```
docker-compose up -d
docker-compose exec app bash
```