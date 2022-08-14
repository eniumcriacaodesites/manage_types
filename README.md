# Gerenciador de Tipos
 Simplified management of types, categories and subcategories

## Instalação
```
composer require eniumcriacaosites/types
```
Assim que terminar você precisar registrar o ServiceProvider no seu arquivo `app.php`
```
// config/app.php

'providers' => [
    EniumCriacaoSites\Types\Providers\TypeServiceProvider::class,
];
```

Agora execute o comando abaixo caso deseje publicar as configurações necessárias
```
php artisan vendor:publish --provider="EniumCriacaoSites\Types\Providers\TypeServiceProvider"
```

Execute o comando abaixo para criar as tabelas no banco de dados
```
php artisan migrate
```

Rotas disponíveis
```
GET /api/types 
POST /api/types - Parâmetros: name, description, group (string para agrupar os tipos), type_id (ID do type pai), is_active (true,false)
PUT /api/types/{type} 
DELETE /api/types/{type 
```

