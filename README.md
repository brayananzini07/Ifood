# Sistema de Delivery - iFood

Sistema de delivery desenvolvido como atividade utilizando PHP, MySQL e HTML.

O objetivo é organizar clientes, restaurantes e pedidos em um único sistema.

## Funcionalidades

- Cadastro, consulta, alteração e exclusão de clientes;
- Cadastro, consulta, alteração e exclusão de restaurantes;
- Cadastro, consulta, alteração e exclusão de pedidos;
- Seleção de cliente e restaurante ao cadastrar um pedido;
- Consulta dos pedidos com informações do cliente e restaurante;
- Consulta dos pedidos de um cliente específico.

## Banco de Dados

O sistema possui três tabelas:

- **Clientes:** nome, email e telefone;
- **Restaurantes:** nome, endereço, telefone e categoria;
- **Pedidos:** cliente, restaurante, data, valor e status.

Os pedidos possuem relacionamento com clientes e restaurantes através de chaves estrangeiras.

## JOIN

Na consulta dos pedidos é utilizado `JOIN` para mostrar juntos os dados do pedido, o cliente e o restaurante.

## Tecnologias

- PHP
- MySQL
- HTML
- XAMPP
- phpMyAdmin
