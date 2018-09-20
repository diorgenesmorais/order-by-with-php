# Projeto: Ordenação de resultado

##### Criar o banco
```sql
create database ordenando default character set utf8mb4 default collate utf8mb4_general_ci;
```

##### Criar uma pasta para salvar os scripts (migrações)
```bash
mkdir sql
```

> Deletar a pasta _sql_ do flyway e criar um link simbólico apontando para pasta **sql**
>
> ```bash
> ...flyway-5.1.4$ $ ln -s ../../sql sql
> ```


##### Criar os script para criação da tabela
```sql
create table usuarios (
	id int unsigned auto_increment,
	nome varchar(64) not null,
	idade tinyint unsigned,
	primary key(id)
) engine=InnoDB default charset=utf8mb4;
```

* **Nota**

> Usei o Flyway para migração no banco
>
> O script foi salvo na pasta sql (flyway) com o nome: V01__Criar_tabela_usuarios.sql
>
> Executar o seguinte comando (abaixo) dentro do diretório: ...flyway-5.1.4$ $
>
> ```bash
> ./flyway migrate
> ```


###### Authors

* **Diorgenes Morais**
