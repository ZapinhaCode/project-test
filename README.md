# Projeto de Gerenciamento de Produtos com Laravel

Este projeto é uma aplicação web desenvolvida com Laravel para autenticação de usuários e gerenciamento de produtos. Usuários podem se registrar, fazer login e realizar operações CRUD (Criar, Ler, Atualizar, Deletar) em uma lista de produtos. O foco principal do trabalho acadêmico está nos testes, que garantem a qualidade e confiabilidade do software.

## Funcionalidades Principais

- **Autenticação de Usuários**: Registro e login seguros para acesso às funcionalidades.
- **Gerenciamento de Produtos**: Operações CRUD (visualizar, adicionar, editar e excluir produtos).

## Tecnologias Utilizadas

- **Backend**: Laravel (PHP)
- **Frontend**: Templates Blade, Bootstrap
- **Banco de Dados**: MySQL

## Detalhes dos Testes

Os testes são o coração deste projeto, implementados com PHPUnit e Laravel Dusk, frameworks de testes do Laravel. Eles asseguram que as funcionalidades críticas funcionem corretamente e foram divididos em dois tipos principais:

### Tipos de Testes

- **Testes de Unidade**: Validam componentes isolados do sistema.
- **Testes de Feature**: Verificam o comportamento integrado das funcionalidades.
- **Testes de Navegador (Dusk)**: Simulam interações do usuário no navegador para testar a interface.

### Testes Específicos

#### Conexão com Banco de Dados
- **Teste**: `test_database_connection`
- **Descrição**: Confirma a conexão com o banco executando uma consulta SQL simples.
- **Método**: Utiliza `DB::select` e verifica com `assertNotEmpty` se há retorno.

#### Funcionalidade de Login
- **Testes**:
  - `test_route_login`: Garante que a página de login está acessível (status 200).
  - `test_user_can_login_with_correct_credentials`: Simula login com credenciais corretas e verifica redirecionamento.
  - `test_user_cannot_login_with_wrong_credentials`: Testa falha no login com credenciais incorretas.
  - `test_authenticated_user_can_access_protected_route`: Confirma acesso a rotas protegidas por usuários autenticados.
  - `test_guest_is_redirected_from_protected_route`: Verifica redirecionamento de usuários não autenticados.
  - `test_user_can_login` (Dusk): Simula login no navegador com credenciais corretas e verifica redirecionamento para `/home`.
  - `test_user_can_register` (Dusk): Simula registro de um novo usuário no navegador e verifica adição ao banco de dados.
- **Abordagem**: Usa requisições HTTP simuladas (GET, POST) e Laravel Dusk para interações no navegador, incluindo preenchimento de formulários e cliques em botões.

#### Gerenciamento de Produtos
- **Testes**:
  - `user_can_view_product_list`: Testa a exibição da lista de produtos.
  - `user_can_create_a_product`: Verifica a criação de um produto com dados válidos.
  - `user_can_edit_a_product`: Confirma acesso à página de edição.
  - `user_can_update_a_product`: Testa a atualização de um produto existente.
  - `user_can_delete_a_product`: Garante que um produto pode ser excluído.
  - `test_user_can_create_a_product` (Dusk): Simula a criação de um produto no navegador por um usuário autenticado, verifica adição ao banco de dados e exibição de mensagem de sucesso.
  - `test_user_can_edit_a_product` (Dusk): Simula a edição de um produto existente no navegador por um usuário autenticado, verifica atualização no banco de dados e exibição de mensagem de sucesso.
  - `test_user_can_delete_a_product` (Dusk): Simula a exclusão de um produto no navegador por um usuário autenticado, verifica remoção do banco de dados e exibição de mensagem de sucesso.
- **Abordagem**: Simula interações do usuário com requisições HTTP (GET, POST, PUT, DELETE) e usa Laravel Dusk para interações no navegador, como navegação, preenchimento de formulários e cliques.

### Tabela Resumo dos Testes

| Funcionalidade          | Teste                                      | Descrição                                      |
|-------------------------|--------------------------------------------|------------------------------------------------|
| Conexão com Banco       | `test_database_connection`                 | Verifica conexão com o banco de dados         |
| Login                   | `test_route_login`                         | Acessibilidade da página de login             |
|                         | `test_user_can_login_with_correct_credentials` | Login bem-sucedido com credenciais válidas    |
|                         | `test_user_cannot_login_with_wrong_credentials` | Falha no login com credenciais inválidas      |
|                         | `test_authenticated_user_can_access_protected_route` | Acesso a rotas protegidas por usuários logados |
|                         | `test_guest_is_redirected_from_protected_route` | Redirecionamento de usuários não autenticados |
|                         | `test_user_can_login` (Dusk)               | Simula login no navegador e verifica redirecionamento |
|                         | `test_user_can_register` (Dusk)            | Simula registro e verifica adição ao banco    |
| Gerenciamento de Produtos | `user_can_view_product_list`               | Visualização da lista de produtos             |
|                         | `user_can_create_a_product`                | Criação de um novo produto                    |
|                         | `user_can_edit_a_product`                  | Acesso à edição de um produto                 |
|                         | `user_can_update_a_product`                | Atualização de um produto existente           |
|                         | `user_can_delete_a_product`                | Exclusão de um produto                        |
|                         | `test_user_can_create_a_product` (Dusk)    | Simula criação de produto e verifica adição ao banco |
|                         | `test_user_can_edit_a_product` (Dusk)      | Simula edição de produto e verifica atualização no banco |
|                         | `test_user_can_delete_a_product` (Dusk)    | Simula exclusão de produto e verifica remoção do banco |

## Como Executar os Testes

Para rodar os testes localmente:

1. Configure o ambiente Laravel (instale dependências com `composer install` e ajuste o arquivo `.env`).
2. Execute no terminal:
   - Para testes PHPUnit: `php artisan test`
   - Para testes Dusk: `php artisan dusk`
3. Veja os resultados, indicando quais testes passaram ou falharam.

## Conclusão

Os testes garantem a robustez da aplicação, cobrindo desde a conexão com o banco até as operações CRUD, tanto via requisições HTTP quanto simulações no navegador com Laravel Dusk. A inclusão dos novos testes de login, registro e gerenciamento de produtos amplia a cobertura, assegurando que as interações reais do usuário sejam validadas. Futuras melhorias podem incluir testes para cenários extremos e desempenho.