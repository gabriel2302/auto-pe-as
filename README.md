# Auto Peças
Sistema de auto peças ( Desenvolvido como atividade da matéria de Projeto de Sistemas de Informação) SI - UEMG-Frutal


# Sistema de Venda de Auto Peças


# Projeto
O sistema de Venda de Auto Peças, consiste no gerenciamento de produtos, vendas, clientes, funcionários bem como o controle de estoque. O sistema também deve emitir relatórios e consultas, possibilitando um melhor gerenciamento dos produtos do estabelecimento. 

# Requisitos Funcionais e Regras de negócio

* RF1. Produtos - O sistema deve permitir incluir, alterar e excluir produtos, com os seguintes atributos: nome, descrição, quantidade, valor, categoria e marca.
  * RN.1.1 - As funções do cadastro de produtos só podem ser acessadas pelo administrador do sistema.
  * RN.1.2 - Caso não houver nenhuma categoria cadastrada, deverá ser cadastrada um valor padrão para a categoria.
    
* RF2. Parâmetros - O sistema deve permitir incluir, alterar e excluir que auxiliem no funcionamento de operações.
  * RF.2.1 - O sistema deve permitir incluir, alterar e excluir categorias de produto com o seguinte atributo: nome.
  * RF.2.2 - O sistema deve permitir incluir, alterar e excluir marcas de produto com o seguinte atributo: nome.
  * RF.2.3 - O sistema deve permitir a funcionalidade  de alteração do valor de limite de crédito que incidirá sobre o cadastro dos clientes.
  * RF.2.4 - O sistema deve permitir a funcionalidade de alteração da porcentagem de comissão que incidirá sobre as vendas dos usuários do tipo vendedor.
  * RF.2.5 - O sistema deve permitir a funcionalidade de alteração da porcentagem de desconto que incidirá sobre o valor total da venda.

* RF3. Vendas - O sistema deve permitir incluir, alterar e excluir vendas com os seguintes atributos: data, produtos, valor unitário, valor total, desconto, cliente, vendedor e valor da comissão.
  * RN.3.1 - O sistema deve permitir a aplicação de desconto em relação ao valor final da venda conforme pré-estabelecido.
  * RN.3.2 - O sistema deve exigir que uma venda esteja vinculada a um cliente e um vendedor.
  * RN.3.3 - O sistema deve permitir as seguintes formas de pagamento: dinheiro, cartão e crédito interno.
  * RN.3.4 - Ao realizar o pagamento de uma venda utilizando o crédito interno, é necessário que o sistema verifique se há crédito disponível no cadastro do cliente para autorizar a compra.
  * RN.3.5 - O sistema deve permitir consultar as vendas utilizando um filtro por período, possibilitando gerar relatórios com as seguintes informações: número da venda, cliente e valor total.
  * RN.3.6 - O sistema deve permitir a exclusão lógica de uma venda.
  * RN.3.7 - O sistema deve permitir a alteração ou exclusão de uma venda, desde que esteja dentro do prazo de 7 (sete) dias a contar da data em que a mesma foi realizada, conforme prazo estabelecido pelo Código de Defesa do Consumidor.
  * RN.3.8 - O sistema deve atribuir ao cliente um crédito caso a venda tenha sido cancelada.
  * RN.3.9 - O sistema deve atualizar a quantidade disponível dos produtos que foram vendidos.

* RF4. Clientes - O sistema deve permitir incluir, alterar e excluir clientes. Os clientes devem ser pessoa física e jurídica. Dessa forma, para pessoa física são necessários os seguintes atributos: nome, CPF, endereço, telefone, celular, WhatsApp e email. Entretanto, para pessoa jurídica são os atributos: nome fantasia, razão social, CNPJ, endereço, telefone, celular, WhatsApp e email.
  * RN.4.1 - Ao realizar a inclusão de um cliente, terá atribuído um crédito já pré-estabelecido para realizar compras a prazo.
  * RN.4.2 - O sistema deve verificar se o cliente já está cadastrado antes de iniciar o cadastro realizando a busca por CPF ou CNPJ.
  * RN.4.3 - O sistema deve gerar relatórios com as informações dos clientes.
  * RN.4.4 - O sistema deve permitir a exclusão lógica de um cliente, entretanto, ocorrerá a exclusão física caso o cliente não possua nenhum cadastro vinculado.

* RF5. Usuários - O sistema deve permitir incluir, alterar e excluir usuários com os seguintes atributos: nome, CPF, endereço, telefone, celular, WhatsApp, email, senha e função.
  * RN.5.1 - O sistema deve verificar se o usuário já está cadastrado antes de iniciar o cadastro.
  * RN.5.2 - O sistema deve permitir uma função para o usuário, sendo as seguintes opções: administrador, vendedor e caixa.
  * RN.5.3 - O sistema deve permitir que todas as funções estejam disponíveis para um usuário que tenha função administrador. Entretanto, para usuários com função vendedor, deve-se permitir apenas a função de realizar vendas e, para função caixa, deve-se permitir o recebimento , alteração e exclusão de uma venda.
  * RN.5.4 - O sistema deve permitir a exclusão lógica de um usuário, entretanto, ocorrerá a exclusão física caso o usuário não possua nenhum cadastro vinculado.

* RF6.  Entrada de produtos - O sistema deve permitir incluir, alterar e excluir os produtos do estoque, com os seguintes atributos: número da nota fiscal, produto, quantidade e data da entrada.
  * RN.6.1 - O sistema deve atualizar a quantidade de um produto ao fazer inclusão no estoque.
  * RN.6.2 - O sistema deve permitir a exclusão lógica do estoque, entretanto, ocorrerá a exclusão física caso o estoque não possua nenhum cadastro vinculado.
