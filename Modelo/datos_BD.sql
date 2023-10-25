create database game_zone;
use game_zone;


create table clases (
	nu_clase int not null auto_increment primary key,
	nb_clase varchar(70) not null unique
);


create table articulo (
	nu_articulo int not null auto_increment primary key,
	nb_articulo varchar(70) not null,
	de_articulo text not null,
	va_costo numeric(10) not null,
	ca_existencias int not null,
	nb_imagen varchar(75) not null,
	nu_clase int not null,
	foreign key (nu_clase) references clases (nu_clase),
	unique (nb_articulo,nu_clase),
	check (ca_existencias >= 0)
);


create table usuario (
	nu_usuario int not null auto_increment primary key,
	nb_usuario varchar(50) not null,
	co_correo varchar(35) not null unique,
	co_contraseña varchar(35) not null,
	nu_cedula int not null unique
);


create table bolsa (
	nu_usuario int not null,
	nu_articulo int not null,
	fe_compra date not null,
	primary key (nu_usuario,nu_articulo),
	foreign key (nu_usuario) references usuario (nu_usuario),
	foreign key (nu_articulo) references articulo (nu_articulo)
);


create table pago(
	nu_pago int not null auto_increment primary key,
	fe_pago date not null,
	nu_usuario int not null,
	in_envio char(1) not null,
	fe_envio date,
	check (in_envio in ('C','P','E')),
	foreign key (nu_usuario) references usuario (nu_usuario)
);

-- C: comprado; P: pagado; E: enviado


create table minucia_pago(
	nu_minucia int not null auto_increment primary key,
	nu_pago int not null,
	nu_articulo int not null,
	ca_articulo int not null,
	fe_minucia date not null,
	unique (nu_pago,nu_articulo),
	foreign key (nu_pago) references pago (nu_pago),
	foreign key (nu_articulo) references articulo (nu_articulo)
);



create view view_articulo
as
	select p.*, c.nb_clase
	from articulo p
	inner join clases c using (nu_clase)
;


create view view_bolsa
as
	select
		c.*, 
		p.*, 
		t.nb_clase,
		x.fe_compra
	from bolsa x
	inner join usuario c using (nu_usuario)
	inner join articulo p using (nu_articulo)
	inner join clases t using (nu_clase)
;


create view view_minucia_pago
as
	select
		dc.nu_minucia,
		co.nu_pago,
		co.fe_pago,
		co.in_envio,
		co.fe_envio,
		c.*,
		p.*,
		t.nb_clase,
		dc.ca_articulo,
		dc.fe_minucia
	from minucia_pago dc
	inner join pago co using (nu_pago)
	inner join usuario c using (nu_usuario)
	inner join articulo p using (nu_articulo)
	inner join clases t using (nu_clase)
;