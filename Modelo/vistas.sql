


create view view_pago
	as
select
	c.nu_pago ,
	c.fe_pago ,
	c.in_envio,
	c.fe_envio,
	y.*

from pago c
inner join usuario y using (nu_usuario)
;



create view view_historial_pago
	as
select
	c.nu_pago ,
	c.fe_pago ,
	c.in_envio,
	c.fe_envio,
	(
		select sum(d.ca_articulo * p.va_costo)
		from minucia_pago d
		inner join articulo p using (nu_articulo)
		where d.nu_pago = c.nu_pago
	) as suma,
	y.*

from pago c
inner join usuario y using (nu_usuario)
where c.in_envio <> 'C'
;


