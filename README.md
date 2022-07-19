# IMDSound

Projeto para conclusão do curso de Banco de Dados.

## Ambiente de desenvolvimento

Com o Docker e Docker Compose instalados, execute:

```
cp .env.example .env
docker-compose build app
docker-compose up -d
docker-compose exec app composer install
```

Feito isso a aplicação servida em **localhost:8000** e o banco mysql pela porta **3304**.

Para parar e remover os containeres, execute:
```
docker-compose down
```


````
Para erros no build

rm  ~/.docker/config.json
````

Baseado em:

- [How to Create PHP Development Environments with Docker Compose](https://www.youtube.com/watch?v=l0jb-N5H52A)
- [Travellist - Laravel Demo App](https://github.com/do-community/travellist-laravel-demo)

