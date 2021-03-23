[![Laravel][laravel-shield]]
[![PHP][php-shield]]
[![Composer][composer-shield]]



<br />

# DespesasX

  <h3 align="center">⏩ CRUD DE DESPESAS ⏪</h3>

</p>







## Sobre o Projeto

[![Product Name Screen Shot][product-screenshot]](https://example.com)

#### Informações da aplicação: 
O Usuário entra plataforma e pode cadastrar as despesas 
dos meses anteriores ou do mês atual ou seja ele terá um controle dos seus gastos conforme o decorrer do ano.

## Tarefas Concluídas

- [x] Autenticação de usuários
- [x] Listagem de despesas
- [x] Detalhe de despesas
- [x] Cadastro de despesas
- [x] Edição de despesas
- [x] Remoção de despesas
- [x] Experiência Mobile
- [x] Interface em Blade
- [x] Testes unitários
- [x] Máscaras

<br />
<br />

### Validações do formulário

* Verificar se algum campo está vazio
* Verificar se a data está no formato correto e se o mês e ano são válidos
* Verificar se o valor da despesa é no formato correto
* Verificar se anexo é +8MB e se o arquivo é uma imagem

### Extras

* Paginação das despesas em AJAX
* Soma Total dos montantes no mês designado a partir do mês atual, ou seja 
se estamos em março só aparece opçao de somar março, fevereiro e janeiro
(Já que não pode ser adicionado despesas de meses futuros não é necessário mostrar os 12 meses do ano no select)
* Gerenciamento de usuários o usuário solicita acesso a nossa plataforma e o admin tem a opçao de aceitar, deletar, bloquear e desbloquear o usuário 

<br />
<br />

<br />

### Instalação

1. Clone este repositório
   ```sh
   git clone https://github.com/LucasB-R/DespesasX.git
   ```
2. Instale as dependêcias
   ```sh
   composer install
   ```
3. Configure o arquivo .env
4. Adicione as tabelas ao banco de dados
   ```sh
   php artisan migrate
   ```
5. Verifique se está tudo OK!
   ```sh
   vendor\bin\phpunit
   ```
6. Inicie o servidor!
7. Ao criar sua conta deve ir na tabela usuários e mudar is_active para 1 e o is_admin para 1








[laravel-shield]: https://img.shields.io/badge/Laravel-v8.33.1-red
[composer-shield]: https://img.shields.io/badge/Composer-v2.0.9-red
[php-shield]: https://img.shields.io/badge/PHP-v8.0.2-red
