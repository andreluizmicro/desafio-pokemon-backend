# Desafio Pokemon

Projeto API Laravel + MYSQL + Docker

### Instalação da aplicação

Após realizar o download da aplicação, serão necessáias algumas etapas para o seu funcionamento correto.

Será necessário ter o Docker, e Docker composer previamente configurados.

#### Buildando a aplicação

Com o Docker instalado basta rodar o comando abaixo, que será realiza o build da aplicação.

    docker compose build

As dependências podem ser instaladas também acessando o container

    docker compose exec app bash

Dentro do container rodar o comando:

    composer install

Para executar a aplicação rodar o comando:

    docker compose up -d

Aplicação será executada no endereço `http://localhost:8000`

### Documentação

A aplicação possui apenas dois endpoints:

- `GET` http://localhost:8000/api/v1/pokemons?offset=2&limit=5
- `GET` http://localhost:8000/api/v1/pokemons/1
