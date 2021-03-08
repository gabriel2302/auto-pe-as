use u506861159_autopecas;

create table clientes(
id_cliente int(11) not null auto_increment,
nome_fantasia varchar(255),
razao_social varchar(255),
cpf_cnpj varchar(19),
telefone varchar(16),
celular varchar(17),
whatsapp varchar(17),
email varchar(255),
cep varchar(10),
endereco varchar(255),
numero int(11),
complemento varchar(255),
bairro varchar(255),
cidade varchar(255),
estado varchar(255),
tipo_pessoa varchar(16),
credito decimal(10,2),
credito_utilizado decimal(10,2),
data_cadastro datetime,
data_alteracao datetime,
status int(2),
primary key(id_cliente)
);