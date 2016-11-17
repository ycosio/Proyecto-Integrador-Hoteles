use hoteles;

INSERT INTO ciudad (nombre) values ("Colima");
INSERT INTO ciudad (nombre) values ("Villa de Alvarez");
INSERT INTO ciudad (nombre) values ("Manzanillo");
INSERT INTO ciudad (nombre) values ("Vallarta");
INSERT INTO ciudad (nombre) values ("Los cabos");
INSERT INTO ciudad (nombre) values ("CDMX");
INSERT INTO ciudad (nombre) values ("Cancún");
INSERT INTO ciudad (nombre) values ("Monterrey");
INSERT INTO ciudad (nombre) values ("Guerrero");
INSERT INTO ciudad (nombre) values ("Guanajuato");
INSERT INTO ciudad (nombre) values ("Queretaro");
INSERT INTO ciudad (nombre) values ("Los Angeles");
INSERT INTO ciudad (nombre) values ("Miami");
#SELECT * from ciudad;
#delete from ciudad where id_ciudad > 0;

########################################################################################################################################################
########################################                     HOTELES Y SERVICIOS                  ######################################################
########################################################################################################################################################

call serviciosyhotel('Las hadas','31221213','www.lasadas.com','4','En una playa de Manzanillo','Increible hotel frente a la playa','3',"No", "Si", "No", "No", "Si", "Si", "Si", "Si", "Si", "Si", "Si");
call serviciosyhotel("Mision Colima", "3111386", "www.mision.com", "3", "Camino Real de Colima", "Maravilloso hotel estilo antiguo",1,"Si", "Si", "No", "No", "Si", "Si", "No", "Si", "No", "Si", "Si");
call serviciosyhotel("Fiesta INN", "3111387", "www.fiestaINN.com", "4", "Contra esquina del hospital regional de Colima", "Maravilloso hotel en la entrada a Colima",1,"Si", "Si", "No", "No", "Si", "Si", "No", "Si", "No", "Si", "Si");
call serviciosyhotel("Montroy Colima", "3111388", "www.montroy.com", "4", "Villa de Alvarez", "Maravilloso hotel ubicado en el corazón del barrio villalvarence",3,"Si", "Si", "No", "No", "Si", "Si", "No", "Si", "No", "Si", "Si");
call serviciosyhotel("Hotel Maria Isabel", "3111389", "www.mariaisabel.com", "4", "Colima", "Maravilloso hotel en el corazón de Colima",1,"Si", "Si", "Si", "No", "No", "Si", "No", "Si", "No", "Si", "Si");
call serviciosyhotel("Hotel los volcanes", "31231234","www.nose.com", "5", "Por ahí", "Hermoso hotel sabe donde",5,"Si", "Si", "Si", "Si", "Si", "Si", "Si", "Si", "Si", "Si", "Si");

########################################################################################################################################################
##############################################                     CLIENTES                  ###########################################################
########################################################################################################################################################


INSERT INTO cliente (nombre,telefono,email,password) values ("Admin",3120000006,"admin@ucol.mx","123");
INSERT INTO cliente (nombre,telefono,email,password) values ("Daniel Valdovinos",3120000001,"dvaldovinos@ucol.mx","123");
INSERT INTO cliente (nombre,telefono,email,password) values ("Damian Barajas",3120000002,"dbarajas@ucol.mx","123");
INSERT INTO cliente (nombre,telefono,email,password) values ("Yair Cósio",3120000003,"ycosio@ucol.mx","123");
INSERT INTO cliente (nombre,telefono,email,password) values ("Pedro Terriquez",3120000004,"pterriquez@ucol.mx","123");
INSERT INTO cliente (nombre,telefono,email,password) values ("Alexis Navarro",3120000001,"anavarretes@ucol.mx","123");

#select * from cliente;

########################################################################################################################################################
#######################################                     HABITACIONES Y PAQUETES                  ###################################################
########################################################################################################################################################


INSERT INTO habitacion (nombre, precio, descuento, descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Suite Presidencial","10000", "0.10","lo más chigón",10,0,"a1",1);
INSERT INTO habitacion (nombre, precio, descuento, descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Suite Nupcial","8000" ,"0.50","pa las parejitas",2,0,"a3",1);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Junior Suites:","3000","0.50","ago cool pero no tanto",5,0,"a5",1);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitación Triple","5000","0.20","pa los loquillos",3,0,"b1",1);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitacion Doble","4700","0.15","pa los naquitos",2,0,"b1",1);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitacion Individual","1900","0","pa los POBRES",1,0,"c1",1);

INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitacion Presidencial","1900","0.30","lo más chigón",10,0,"a1",2);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitacion Nupcial","900","0","pa las parejitas",2,0,"a3",2);
INSERT INTO habitacion (nombre, precio, descuento,descripcion,adultos,ninos,numeroHabitacion,id_hotel) values ("Habitacion Junior:","700","0.10","ago cool pero no tanto",5,0,"a5",2);



########################################################################################################################################################
############################################                     PAGOS y RESERVACIONES               ###################################################
########################################################################################################################################################

INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values ("41472122xxxxxxxx","Chabelo","10/21","304");
INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values ("41472123xxxxxxxx","Chabelo2","10/21","304");
INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values ("41472124xxxxxxxx","Chabelo3","10/21","304");
INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values ("41472125xxxxxxxx","Chabelo4","10/21","304");
INSERT INTO forma_de_pago (numeroTarjeta,nTitular,fechaVencimiento,codigoSeguridad) values ("41472126xxxxxxxx","Chabelo5","10/21","304");

INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values ("2016-10-10","2016-12-10","2016-12-15",1,1,1,1);
INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values ("2016-10-9","2016-12-9","2016-12-16",2,1,1,4);
INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values ("2016-10-10","2016-12-1","2016-12-9",3,1,1,6);
INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values ("2016-10-10","2016-12-25","2016-12-27",1,2,1,7);
INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values ("2016-10-10","2016-12-25","2016-12-27",2,2,1,8);
#INSERT INTO reservacion (fechaReservacion,fechaLlegada,fechaSalida,id_cliente,id_hotel,id_fPago, id_habitacion) values (now(),now(),now()+1,2,2,1,8);

cholo;

call serviciosyhotel('Jalisquillo hermoso','3123123123','www.jalisquillo','5','Jalisco','Lalala','14','Si','Si', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No')

#select * from cliente;
#select * from habitacion;
#select * from forma_de_pago;
#select * from hotel;
#select * from mejoresdescuentosTODO;
#select * from vistafiltros;


#select * from reservacion;
#SELECT ho.id_hotel, ho.nombre as hotel, ho.telefono, ho.estrellas, ho.direccion, ho.descripcion, ha.nombre, ha.precio, ha.precio*(1-ha.descuento) from hotel ho INNER JOIN habitacion ha ON ho.id_hotel=ha.id_hotel where id_ciudad="1";
#select * from allReservaciones;	

select * from vistafiltros where (id_habitacion NOT IN (select id_habitacion from vistafiltros where "2016-12-09 00:00:00" between fechaLlegada and fechaSalida  
or "2016-12-22 00:00:00" between fechaLlegada and fechaSalida  or 
("2016-12-09 00:00:00"<fechaLlegada and "2016-12-22 00:00:00">fechaSalida))) 
and ciudad="colima" and promocion between 1000 and 4000;

call filtros('2016-12-16 00:00:00','2016-12-21 00:00:00','colima',null,null,null,null,null,'Si',null,null,null,null,null, 1000, 4000);
call filtros('2014-12-16','2018-12-12','colima','Si','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No',100,5000);
call filtros('2010-12-12','2018-12-12','colima','Si','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No',100,4000);
call filtros('2014-12-16','2016-12-21','colima','Si','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No',100,4000);
call filtros('2014-12-16 00:00:00','2016-12-21 00:00:00','colima','Si','No', 'No', 'No', 'No','No', 'No','No','No', 'No', 'No',4000,100);

DROP TRIGGER if exists insertarHotel;
DELIMITER //
CREATE TRIGGER insertarHotel BEFORE INSERT ON hotel
FOR EACH ROW
BEGIN
	SET new.id_servicio = new.id_hotel;
END //
DELIMITER ;