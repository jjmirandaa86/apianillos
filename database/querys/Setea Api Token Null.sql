/* Ver la varibale si esta activa */
/***********************************/
/*
    SHOW VARIABLES
    WHERE VARIABLE_NAME = 'event_scheduler'
*/


/* Genero el procedimiento almacenado*/
/***********************************/
/*
CREATE PROCEDURE actualizarUserTokenNull()
BEGIN
    UPDATE users
    SET api_token = null
    where TIMESTAMPDIFF(SECOND, updated_at ,now()) > 1200
    and api_token != "null";
END
*/

/* Ejecuto el procedimiento */
/***********************************/
/*
call actualizarUserTokenNull
*/


/* Creo el evento para que se ejecute cada 10 min */
/* Doy al usuario una conexion entre 20 y 30 min de conexion */
/***********************************/
/*

CREATE EVENT e_ActualizarUserTokenNull
ON SCHEDULE EVERY 10 MINUTE STARTS '2021-06-26 00:00:00'
DO call actualizarUserTokenNull()

*/


/* Mostrar eventos */
SHOW events;

/* Eliminar eventos */
DROP EVENT e_ActualizarUserTokenNull;


/* Consulto si hay datos que setear a null*/
/*
select idUser, TIMESTAMPDIFF(SECOND, updated_at ,now()) 
from users
where api_token != "null";

*/

/* Consulta los eventos*/
/*
SELECT * FROM INFORMATION_SCHEMA.EVENTS WHERE EVENT_NAME='e_ActualizarUserTokenNull';
*/


