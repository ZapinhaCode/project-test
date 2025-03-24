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

Os testes são o coração deste projeto, implementados com PHPUnit, o framework de testes do Laravel. Eles asseguram que as funcionalidades críticas funcionem corretamente e foram divididos em dois tipos principais:

### Tipos de Testes

- **Testes de Unidade**: Validam componentes isolados do sistema.
- **Testes de Feature**: Verificam o comportamento integrado das funcionalidades.

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
- **Abordagem**: Usa requisições HTTP simuladas (GET, POST) para testar respostas e estados de autenticação.

#### Gerenciamento de Produtos
- **Testes**:
  - `user_can_view_product_list`: Testa a exibição da lista de produtos.
  - `user_can_create_a_product`: Verifica a criação de um produto com dados válidos.
  - `user_can_edit_a_product`: Confirma acesso à página de edição.
  - `user_can_update_a_product`: Testa a atualização de um produto existente.
  - `user_can_delete_a_product`: Garante que um produto pode ser excluído.
- **Abordagem**: Simula interações do usuário com requisições HTTP (GET, POST, PUT, DELETE) e usa factories para criar dados de teste.

### Tabela Resumo dos Testes

| Funcionalidade          | Teste                                      | Descrição                                      |
|-------------------------|--------------------------------------------|------------------------------------------------|
| Conexão com Banco       | `test_database_connection`                 | Verifica conexão com o banco de dados         |
| Login                   | `test_route_login`                         | Acessibilidade da página de login             |
|                         | `test_user_can_login_with_correct_credentials` | Login bem-sucedido com credenciais válidas    |
|                         | `test_user_cannot_login_with_wrong_credentials` | Falha no login com credenciais inválidas      |
|                         | `test_authenticated_user_can_access_protected_route` | Acesso a rotas protegidas por usuários logados |
|                         | `test_guest_is_redirected_from_protected_route` | Redirecionamento de usuários não autenticados |
| Gerenciamento de Produtos | `user_can_view_product_list`               | Visualização da lista de produtos             |
|                         | `user_can_create_a_product`                | Criação de um novo produto                    |
|                         | `user_can_edit_a_product`                  | Acesso à edição de um produto                 |
|                         | `user_can_update_a_product`                | Atualização de um produto existente           |
|                         | `user_can_delete_a_product`                | Exclusão de um produto                        |

## Como Executar os Testes

Para rodar os testes localmente:

1. Configure o ambiente Laravel (instale dependências com `composer install` e ajuste o arquivo `.env`).
2. Execute no terminal: `php artisan test`.
3. Veja os resultados, indicando quais testes passaram ou falharam.

## Conclusão

Os testes garantem a robustez da aplicação, cobrindo desde a conexão com o banco até as operações CRUD. Futuras melhorias podem incluir testes para cenários extremos e desempenho.