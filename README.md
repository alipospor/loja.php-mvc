# loja.php-mvc

## Padrão de Desenvolvimento MVC

MVC significa **Model** – **View** – **Controller** (Modelo – Visão – Controlador)  e é um modelo da arquitetura de software que tem a função de separar front-end (que o usuário vê) do back-end (que é o motor da aplicação).

A estrutura MVC funciona da seguinte maneira:

- **Model** (modelo) – A parte da modelagem de dados e regras de negócio. É nela que ira constar as classes, as consultas ao banco de dados e as regras de negócio do sistema.

- **View** (Visão) – A view é a parte estética, a interface. É a "tela" onde os dados e os links serão apresentados ao usuário. De grosso modo, um arquivo somente com códigos HTML e CSS (e se tiver, o Javascript também).

- **Controller** (Controlador) –  É ele quem faz as ligações das diversas partes do sistema, recebe e valida os dados fornecidos na entrada de dados das views, faz a ligação dos dados com as regras de negócios e as consultas a base de dados dos models, processa a requisição e retorna um resultado, geralmente em uma nova view.