# API – Exportação de Categorias em CSV

Este projeto consiste numa aplicação desenvolvida em PHP com base de dados MySQL, executada em ambiente Docker. O seu objetivo principal é permitir a exportação dos dados da tabela `categorias` para um ficheiro CSV compatível com Microsoft Excel.

A aplicação segue uma arquitetura simples baseada na separação de responsabilidades, com classes dedicadas à ligação à base de dados, à manipulação dos dados e à exposição dos endpoints.

---

## Tecnologias Utilizadas

- PHP 8.2
- Apache
- MySQL 8
- Docker
- Docker Compose
- PDO (PHP Data Objects)
- HTML

---

## Estrutura do Projeto

```
API/
├── categorias/
│   ├── exportar_CSV.php
│   └── listar.php
├── config/
│   └── database.php
├── objects/
│   └── categorias.php
├── produtos/
├── docker-compose.yml
├── Dockerfile
├── README.md
└── .gitignore
```

---

## Frontend

Este backend é consumido por uma aplicação React.

Frontend:
https://github.com/britoandrecaires/react-api-rest-categorias

## Descrição dos Componentes

Dockerfile  
Define a imagem base PHP com Apache e copia o código da aplicação para o container.

docker-compose.yml  
Responsável por orquestrar os serviços da aplicação, nomeadamente o servidor web e a base de dados MySQL.

config/database.php  
Contém a classe responsável pela ligação à base de dados MySQL através de PDO.

objects/categorias.php  
Implementa a classe Categoria, responsável por executar as queries à base de dados, gerar o conteúdo no formato CSV e listar categorias em JSON.

categorias/exportar_CSV.php  
Endpoint que realiza a exportação dos dados e força o download do ficheiro CSV.

categorias/listar.php  
Endpoint que devolve a listagem de categorias em formato JSON, permitindo integração com aplicações externas ou frontends modernos.

produtos/  
Pasta reservada para futura implementação de endpoints relacionados com produtos.

---

## Funcionalidades Implementadas

- Ligação à base de dados MySQL através de PDO
- Consulta da tabela categorias (CSV e JSON)
- Geração dinâmica de ficheiro CSV com separador ;
- Download automático do ficheiro CSV através do browser
- Endpoint para listagem de categorias em JSON (para consumo por aplicações externas)
- Compatibilidade com Microsoft Excel

---

## Funcionamento da Exportação CSV

1. O utilizador acede à página /categorias/
2. Ao clicar no botão Download CSV é feita uma chamada ao ficheiro exportar_CSV.php
3. O ficheiro estabelece ligação à base de dados
4. Os dados da tabela categorias são consultados
5. O conteúdo é formatado em CSV
6. O ficheiro é descarregado automaticamente no browser

---

## Como Executar o Projeto

Clonar o repositório

```
git clone <URL_DO_REPOSITORIO>
cd API
```

Iniciar os containers Docker

```
docker-compose up --build
```

Aceder à aplicação

```
http://localhost:8080/categorias/
```

---

## Formato do Ficheiro CSV

O ficheiro gerado contém as seguintes colunas:

- ID
- Nome
- Descrição
- Data de Criação

O separador utilizado é ;, garantindo compatibilidade com o Excel em sistemas configurados para português.

---

## Notas Técnicas

- A comunicação entre os serviços é feita utilizando o nome do serviço Docker mysql
- A ligação à base de dados é realizada através de PDO
- Os headers HTTP são enviados antes de qualquer output para garantir o download correto do ficheiro
- Avisos PHP são desativados no endpoint de exportação para evitar interferências no CSV

---

## Contexto Académico

Projeto desenvolvido em contexto académico com o objetivo de consolidar conhecimentos em desenvolvimento de APIs em PHP, comunicação com bases de dados MySQL, utilização de Docker e Docker Compose e exportação de dados.

---

## Autor

André Brito
