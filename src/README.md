# Aplicação de teste

Utilizando as tecnologias:

-   PHP 8.1.0
-   Laravel v9.19
-   MySql 5.7.32
-   Docker e Docker Compose

## Ambiente de desenvolvimento:

O ambiente de desenvolvimento foi criado usando Docker Compose para criar e
gerenciar containers e isolar o ambiente dev da máquina real.

Para usar o ambiente de desenvolvimento, deve ter o Docker e Docker Compose instalados na sua máquina.

Para executar os containers:

```
docker-compose up --build -d
```

Após a finalização da instalação dos containers,
executar o comando abaixo para instalar as dependencias do projeto:

```
docker-compose exec -u root ot_app /.docker/afterbuild.sh
```

Após o passo anterir, a aplicação deve estar acessível no endereço:

> http://localhost:9031

Para executar o frontend enquanto estiver desenvolvendo,
é usado o Vite para escutar as alterações do ReactJS:

```
docker-compose exec -u root ot_app npm run dev
```

Para executar o build do frontend:

```
docker-compose exec -u root ot_app npm run build
```
