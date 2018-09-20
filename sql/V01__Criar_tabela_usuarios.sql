create table usuarios (
	id int unsigned auto_increment,
	nome varchar(64) not null,
	idade tinyint unsigned,
	primary key(id)
) engine=InnoDB default charset=utf8mb4;
