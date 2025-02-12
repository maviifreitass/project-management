TaskToDo - Sistema de Gestão de Projetos 🚀

Sobre o Projeto 🏢

O TaskToDo é um sistema desenvolvido para facilitar a gestão de projetos dentro de uma empresa. A plataforma permite o gerenciamento de usuários, projetos, tarefas e clientes, garantindo organização e eficiência no fluxo de trabalho. ✅

Funcionalidades Principais ⚡

📌 Cadastro, edição e remoção de usuários, projetos, tarefas e clientes.

👥 Associação de usuários a tarefas em projetos específicos.

💻 Interface responsiva desenvolvida com Bootstrap.

🔒 Autenticação e segurança implementadas com os recursos nativos do Laravel.

🛡️ Proteção contra ataques CSRF, XSS e SQL Injection.

📊 Gerenciamento ágil utilizando Scrum e Trello.

🗂️ Versionamento de código com GitHub.

Tecnologias Utilizadas 🛠️

Backend: Laravel 🐘

Frontend: Blade + Bootstrap 🎨

Banco de Dados: MySQL 🗄️

Versionamento: GitHub 🛜

Gerenciamento Ágil: Scrum + Trello 📌

Deploy: Laravel Forge e Envoyer 🚀

Instalação e Configuração ⚙️

Pré-requisitos 📌

Certifique-se de ter instalado:

PHP (≥ 8.0) 🐘

Composer 🎼

Node.js 🌿

MySQL 🗄️

Git 🔗

Passos para Instalação 📥
Clone o repositório:
git clone https://github.com/seu-usuario/tasktodo.git
cd tasktodo

Instale as dependências do Laravel:
composer install

Crie o arquivo .env e configure suas credenciais do banco de dados:
cp .env.example .env

Gere a chave da aplicação:
php artisan key:generate

Execute as migrações para criar as tabelas no banco de dados:
php artisan migrate

Inicie o servidor local:
php artisan serve

Estrutura do Banco de Dados 🏛️

A aplicação conta com quatro tabelas principais:

👤 Usuários: Armazena informações dos usuários do sistema.

📁 Projetos: Contém os detalhes de cada projeto.

✅ Tarefas: Lista de tarefas associadas aos projetos.

🏢 Clientes: Informações sobre os clientes vinculados aos projetos.

Autenticação e Segurança 🔐

Middleware de autenticação nativo do Laravel.

Proteção contra CSRF, XSS e SQL Injection.

Gerenciamento e Deploy 🚀

O projeto é gerenciado com Scrum e organizado via Trello.

Deploy realizado através do Laravel Forge e Envoyer.

Contribuição 🤝

Se você deseja contribuir para o TaskToDo, siga os passos:

Faça um fork do repositório.

Crie uma branch para sua funcionalidade (git checkout -b feature/minha-feature).

Realize suas alterações e faça commit (git commit -m 'Adiciona minha feature').

Envie as alterações para seu repositório (git push origin feature/minha-feature).

Crie um pull request e aguarde a revisão.

Desenvolvedores 👨‍💻

Anthoni da Luz

Maria Vitoria

Miguel Serea
