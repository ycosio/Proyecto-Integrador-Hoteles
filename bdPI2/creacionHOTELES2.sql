drop database hoteles;

CREATE DATABASE hoteles;
Use hoteles;

CREATE TABLE ciudad(
id_ciudad int auto_increment primary key,
nombre varchar(30) not null
);


CREATE TABLE servicios (
id_servicio int auto_increment primary key, 
wifi varchar(2) not null, 
estacionamiento varchar(2) not null,
gimnasio varchar(2) not null,
mascotasPermitidas varchar(2) not null,
instalacionesDeportivas varchar(2) not null,
alberca varchar(2) not null,
spa varchar(2) not null,
barHotel varchar(2) not null,
barPlaya varchar(2) not null,
doctor varchar(2) not null,
restaurante varchar(2) not null
);

CREATE TABLE hotel (
id_hotel int auto_increment primary key, 
nombre varchar(50) not null, 
telefono varchar(20) not null,
sitioWeb varchar(80) not null,
estrellas varchar(2) not null,
direccion varchar(100) not null,
descripcion varchar(100) not null,
id_ciudad int not null,
id_servicio int not null,
FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad),
FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio)
);

CREATE TABLE cliente (
id_cliente int auto_increment primary key, 
nombre varchar(50) not null, 
telefono varchar(20) not null,
email varchar(40) not null,
password varchar(16) not null
);

CREATE TABLE habitacion (
id_habitacion int auto_increment primary key, 
nombre varchar(50) not null, 
precio 	int not null,
descuento DEC(4,2) not null,
descripcion varchar(100) not null,
adultos varchar(2) not null,
ninos varchar(2) not null,
numeroHabitacion varchar(2) not null,
id_hotel int not null,
FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
);

CREATE TABLE forma_de_pago (
id_fPago int auto_increment primary key, 
numeroTarjeta varchar(16) not null, 
nTitular varchar(50) not null,
fechaVencimiento varchar(6) not null,
codigoSeguridad varchar(5) not null
);

CREATE TABLE reservacion (
id_reservacion int auto_increment primary key, 
fechaReservacion datetime not null,
fechaLlegada datetime not null,
fechaSalida datetime not null,
id_cliente int not null,
id_hotel int not null,
id_habitacion int not null,
id_fPago int not null,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
FOREIGN KEY (id_habitacion) REFERENCES habitacion(id_habitacion),
FOREIGN KEY (id_fPago) REFERENCES forma_de_pago(id_fPago)
);

/*
CREATE VIEW habitacionesPorHotel AS SELECT ho.id_hotel, ho.nombre, ha.id_habitacion, ha.nombre
AS habitacion FROM hotel ho, habitacion ha
WHERE ha.id_hotel=ho.id_hotel;

CREATE VIEW preciosConDescuento AS SELECT p.id_paquete, p.id_hotel, h.nombre, p.precio, (p.precio-(p.precio*p.descuento)) 
AS promocion FROM paquete p, hotel h
WHERE p.id_hotel=h.id_hotel;

CREATE VIEW paquetesMasBaratos AS SELECT distinct pd.id_paquete, pd.id_hotel, pd.nombre, pd.precio, pd.promocion
AS promocion FROM precioscondescuento pd
WHERE pd.promocion=(select min(promocion) from preciosConDescuento where id_hotel=(pd.id_hotel));

CREATE VIEW mejoresDescuentos AS SELECT p.id_paquete, p.id_hotel, h.nombre, p.precio, p.descuento AS descuento, (p.precio-(p.precio*p.descuento)) 
AS promocion FROM paquete p, hotel h
WHERE p.id_hotel=h.id_hotel and p.descuento=(select max(descuento) from paquete where id_hotel=(p.id_hotel));

CREATE VIEW mejoresDescuentosTODO AS SELECT p.id_paquete, p.id_hotel, h.nombre, p.precio, p.descuento 
AS descuento FROM paquete p, hotel h
WHERE p.id_hotel=h.id_hotel order by p.descuento DESC ,p.precio LIMIT 10;


CREATE VIEW paquetesPorHotel AS SELECT p.id_paquete, h.id_hotel, h.nombre
FROM paquete p, hotel h
WHERE p.id_hotel=h.id_hotel;

CREATE VIEW rervacionesPaquete AS SELECT r.id_reservacion,r.id_hotel, r.id_paquete, r.id_cliente, r.id_habitacion
FROM paquete p, reservacion r
WHERE p.id_paquete=r.id_paquete;

CREATE VIEW disponibilidad AS SELECT r.id_reservacion, p.id_habitacion, r.id_cliente, r.fechaLlegada, r.fechaSalida, r.id_paquete, r.id_hotel, ho.nombre as hotel, ho.id_servicio as servicios, ha.id_habitacion as habitacion, ha.nombre
FROM hotel ho, habitacion ha, reservacion r, paquete p
WHERE r.id_paquete=p.id_paquete and r.id_hotel=ho.id_hotel and p.id_habitacion=ha.id_habitacion;
*/


CREATE VIEW allReservaciones AS select r.id_reservacion, h.id_hotel, ho.nombre as hotel, ho.descripcion,
ho.telefono, ho.estrellas, ho.direccion, c.id_ciudad, c.nombre as ciudad, r.fechaLlegada, r.fechaSalida, 
r.id_cliente, h.id_habitacion, h.nombre, h.adultos, h.ninos, h.numeroHabitacion, h.precio, h.descuento, 
(select DATEDIFF(r.fechaSalida, r.fechaLlegada)) as noches, (h.precio*(1-h.descuento)) as promocion, 
(select DATEDIFF(r.fechaSalida, r.fechaLlegada)*(h.precio*(1-h.descuento))) as monto 
FROM reservacion r
right join habitacion h on r.id_habitacion=h.id_habitacion
left join hotel ho on h.id_hotel=ho.id_hotel
left join ciudad c on ho.id_ciudad=c.id_ciudad;

CREATE VIEW vistaFiltros AS SELECT a.*, s.*
FROM  allreservaciones a
left JOIN hotel h ON a.id_hotel=h.id_hotel left JOIN servicios s on h.id_servicio=s.id_servicio;

CREATE VIEW mejoresDescuentosTODO AS SELECT * 
FROM vistafiltros a
WHERE a.descuento>0 and (id_habitacion NOT IN (select id_habitacion from vistafiltros where (select Now()) between fechaLlegada and fechaSalida  
or (SELECT INTERVAL 1 DAY + NOW()) between fechaLlegada and fechaSalida  or 
((select Now())<fechaLlegada and (SELECT INTERVAL 1 DAY + NOW())>fechaSalida)))
order by a.descuento DESC ,a.precio LIMIT 10;

DELIMITER $
create procedure filtros(in fechaL datetime, in fechaS datetime, in ciudad varchar(30),
in wfi varchar(2), in estacionamient varchar(2), in gim varchar(2), in mascotas varchar(2), 
in canchas varchar(2), in alberca varchar(2), in spa varchar(2), in barH varchar(2), 
in barP varchar(2), in doc varchar(2), in restaurant varchar(2), in minPrecio int, in maxPrecio int)
begin

SET @cadena = CONCAT('select * from vistafiltros where (id_habitacion NOT IN (select id_habitacion from vistafiltros where "',fechaL,'" between fechaLlegada and fechaSalida  
or "',fechaS,'" between fechaLlegada and fechaSalida or ("',fechaL,'"<fechaLlegada and "',fechaS,'">fechaSalida))) ');
SET @cadena = CONCAT(@cadena,'and ciudad="', ciudad, '" ');

if(wfi='Si') then
		SET @cadena = CONCAT(@cadena,'and wifi="Si" ');
    end if;

if(estacionamient='Si') then
		SET @cadena = CONCAT(@cadena,'and estacionamiento="Si" ');
    end if;
    
if(gim='Si') then
		SET @cadena = CONCAT(@cadena,'and gimnasio="Si" ');
    end if;
    
if(mascotas='Si') then
		SET @cadena = CONCAT(@cadena,'and mascotasPermitidas="Si" ');
    end if;
    
if(canchas='Si') then
		SET @cadena = CONCAT(@cadena,'and instalacionesDeportivas="Si" ');
    end if;
    
if(alberca='Si') then
		SET @cadena = CONCAT(@cadena,'and alberca="Si" ');
    end if;
    
if(spa='Si') then
		SET @cadena = CONCAT(@cadena,'and spa="Si" ');
    end if;
    
if(barH='Si') then
		SET @cadena = CONCAT(@cadena,'and barHotel="Si" ');
    end if;
    
if(barP='Si') then
		SET @cadena = CONCAT(@cadena,'and barPlaya="Si" ');
    end if;
    
if(doc='Si') then
		SET @cadena = CONCAT(@cadena,'and doctor="Si" ');
    end if;
    
if(restaurant='Si') then
		SET @cadena = CONCAT(@cadena,'and restaurante="Si" ');
    end if;

SET @cadena = CONCAT(@cadena,'and (promocion between ', minPrecio, ' and ', maxPrecio, ') GROUP BY id_habitacion;');

PREPARE stmt1 FROM @cadena; 
EXECUTE stmt1; 
DEALLOCATE PREPARE stmt1; 
end$ 
delimiter ;





use hoteles;
DROP PROCEDURE if exists serviciosyhotel;
DELIMITER $
CREATE PROCEDURE serviciosyhotel(nombre varchar(50),telefono varchar(20),sitioWeb varchar(20),estrellas varchar(2),direccion varchar (100),descripcion varchar(100),id_ciudad int, wifi varchar(2),estacionamiento varchar(2),gimnasio varchar(2),mascotasPermitidas varchar(2),instalacionesDeportivas varchar(2),alberca varchar(2),spa varchar(2),barHotel varchar(2),barPlaya varchar(2),doctor varchar(2),restaurante varchar(2))
BEGIN
	DECLARE ultimoID int;
    SET ultimoID = 1;
	##AQUI SE INSERTA EL SERVICIO
    INSERT INTO servicios (wifi, estacionamiento, gimnasio, mascotasPermitidas, instalacionesDeportivas, alberca, spa, barHotel, barPlaya, doctor, restaurante) values (wifi, estacionamiento, gimnasio, mascotasPermitidas, instalacionesDeportivas, alberca, spa, barHotel, barPlaya, doctor, restaurante);
	IF EXISTS (SELECT id_hotel from hotel) THEN
		SELECT MAX(id_hotel)+1 into ultimoID from hotel;	
	ELSE
		Select 1 into ultimoID;
	END IF;
    
	#ACÁ SE INSERTA EL HOTEL CON EL ID DEL SERVICIO
	INSERT INTO hotel (nombre,telefono,sitioWeb,estrellas,direccion,descripcion,id_ciudad,id_servicio) values (nombre,telefono,sitioWeb,estrellas,direccion,descripcion,id_ciudad,LAST_INSERT_ID());
    #SET respuesta = "Registros de hotel y servicios almacenados correctamente";
END $
DELIMITER ;


DROP PROCEDURE if exists reservandobien;
DELIMITER $
CREATE PROCEDURE reservandobien(numeroTarjeta varchar(16),nTitular varchar(50),fechaVencimiento varchar (6),codigoSeguridad varchar(5),fechaReservacion datetime,fechaLlegada datetime,fechaSalida datetime,id_cliente int,id_hotel int,id_habitacion int)
BEGIN
	DECLARE ultimoID int;
    SET ultimoID = 1;
	##AQUI SE INSERTA EL PAGO
    INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad);
	IF EXISTS (SELECT id_fPago from forma_de_pago) THEN
		SELECT MAX(id_fPago) INTO ultimoID from forma_de_pago;
	END IF;
	#ACÁ SE INSERTA LA RESERVACION CON EL ID DEL PAGO
	INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_habitacion,id_fPago) values (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_habitacion,ultimoID);
END $
DELIMITER ;


cholo;

#call serviciosyhotel('tepames feo','3121248129','tepamesfeo.com','2','En tu corazon','asdasd','2','No','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No');
#call serviciosyhotel('tepames feo','3121248129','tepamesfeo.com','1','En tu corazon','asdasd','1','No','No', 'No', 'Si', 'No','No', 'No','No','No', 'No', 'No');

#select count(*) from hotel;
#select * from hotel;
#select count(*) from servicios;
#select * from servicios;














DELIMITER $
CREATE PROCEDURE serviciosyhotelMEJOR(nombre varchar(50),telefono varchar(20),sitioWeb varchar(20),estrellas varchar(2),direccion varchar (100),descripcion varchar(100),id_ciudad int, wifi varchar(2),estacionamiento varchar(2),gimnasio varchar(2),mascotasPermitidas varchar(2),instalacionesDeportivas varchar(2),alberca varchar(2),spa varchar(2),barHotel varchar(2),barPlaya varchar(2),doctor varchar(2),restaurante varchar(2))
BEGIN
	DECLARE ultimoID int;
    SET ultimoID = 1;
	##AQUI SE INSERTA EL SERVICIO
    INSERT INTO servicios (wifi, estacionamiento, gimnasio, mascotasPermitidas, instalacionesDeportivas, alberca, spa, barHotel, barPlaya, doctor, restaurante) values (wifi, estacionamiento, gimnasio, mascotasPermitidas, instalacionesDeportivas, alberca, spa, barHotel, barPlaya, doctor, restaurante);
	IF EXISTS (SELECT id_servicio from servicios) THEN
		SELECT MAX(id_servicio)+1 from servicios;	
	ELSE
		Select 1 into ultimoID;
	END IF;
	#ACÁ SE INSERTA EL HOTEL CON EL ID DEL SERVICIO
	INSERT INTO hotel (nombre,telefono,sitioWeb,estrellas,direccion,descripcion,id_ciudad,id_servicio) values (nombre,telefono,sitioWeb,estrellas,direccion,descripcion,id_ciudad,mysql_insert_id());
    #SET respuesta = "Registros de hotel y servicios almacenados correctamente";
END $
DELIMITER ;

call serviciosyhotelMEJOR('tepames feo','3121248129','tepamesfeo.com','2','En tu corazon','asdasd','2','No','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No');

