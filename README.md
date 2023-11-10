# Web2_Tpe

Integrantes: 

Integrante A: Magiorano Aguilar, Joaquin. joacopirovano@gmail.com

integrante B: Salas Costa, Luna Bianca. lsalascosta@alumnos.exa.unicen.edu.ar

Descripcion:

Realizaremos una veterinaria que ofrece servicios de adopcion de mascotas.

Descripcion y ejemplos de los endpoints:

/api/individuos -> Metodo: GET
                -> Descripcios: Trae todos los individuos con sus caracteristicas (en un JSON)
                -> ejemplo: {  
                                "id": 1,
                                "nombre": "Chicho",
                                "raza": "Bobtail",
                                "edad": 8,
                                "color": "Blanco y Gris",
                                "personalidad": "Los bobtails, tan alegres y extrovertidos, son un compañero muy popular para las familias. Suelen ser de naturaleza adorable, aunque pueden ponerse nerviosos cuando juegan, por lo que deberás tener cuidado cuando haya niños pequeños cerca. Se unirán a cualquier actividad con mucho entusiasmo.",
                                "fk_id_especie": 1,
                                "imagen": "",
                                "id_especie": 1,
                                "especie": "Canino",
                                "descripcion": "Mamífero doméstico de la familia de los cánidos, de tamaño, forma y pelaje muy diversos, según las razas, que tiene olfato muy fino y es inteligente y muy leal a su dueño. La inteligencia canina se refiere a la habilidad de un perro de procesar la información que recibe a través de sus sentidos para aprender, adaptarse y resolver problemas.\r\n"
                            }

/api/individuos/3 -> Metodo: GET
                -> Descripcios: Trae un individuo especifico basandose en el ID que se coloque como parametro (en un JSON)
                -> ejemplo:     { 
                                  "id": 3,
                                  "nombre": "Taiga",
                                  "raza": "Bengali",
                                  "edad": 2,
                                  "color": "Marron y Negro",
                                  "personalidad": "Taiga muestra seguridad y confianza en sí misma y, además, es cariñosa. Es muy juguetona por naturaleza y rebosa energía. Es lista y parece que mira todo lo que la rodea, incluido al perro de la familia.",
                                  "fk_id_especie": 2,
                                  "imagen": "",
                                  "id_especie": 2,
                                  "especie": "Felino",
                                  "descripcion": "Posee un pelaje suave y lanoso con una apariencia brillante, mantenida con una constante limpieza con la lengua. Su cuerpo es flexible, ligero, musculoso y compacto. Las patas delanteras tienen cinco dígitos y las traseras cuatro. Las garras son retráctiles, largas, afiladas, muy curvadas y comprimidas lateralmente."
                                }

/api/individuos -> Metodo: POST
                -> Descripcion: Agrega un individuo nuevo que se le pase en formato JSON.
                -> ejemplo: Se ingresa en el body (en raw) un individuo con el siguiente formato:
                                {
                                  "nombre": "Nala",
                                  "raza": "Bengali",
                                  "edad": 5,
                                  "color": "Marron",
                                  "personalidad": "Es cariñosa. Es muy juguetona por naturaleza y rebosa energía. Es lista y parece que mira todo lo que la rodea, incluido al perro de la familia.",
                                  "fk_id_especie": 2,
                                  "imagen": ""
                                }

/api/individuos/55 -> Metodo: DELETE
                -> Descripcion: Elimina un individuo junto con todas las consultas que este pueda tener.
                -> ejemplo: Se envia el metodo delete con el id del individuo que se quiere eliminar y aparece el msj "Se borro el individuo".
                
/api/individuos/6 -> Metodo: PUT
                -> Descripcion: Modifica el contenido de un individuo en particular (segun el id que enviemos en el endpoint)
                -> ejemplo: Se ingresa en el body (en raw) un individuo con el siguiente formato:
                                {
                                    "nombre": "Chanchi",
                                    "raza": "Cobaya skinny",
                                    "edad": 2,
                                    "color": "Marroncito",
                                    "personalidad": "El comportamiento de Chanchi es dócil y noble en general, cuando se sienten muy a gusto y felices te lo hará saber, pero cuando no también, esto es debido a que tiene un sistema de comunicación bastante amplio, lo que nos permite saber su estado de ánimo.",
                                    "fk_id_especie": 3,
                                    "imagen": ""
                                }

/api/individuos/orden/:ORDER -> Metodo: GET
                              -> Descripcion: Devuelve los items ordenados de forma ascendente o descendente por el campo de edad.
                                              El parametro :ORDER debe ser reemplazado por "asc" o por "desc", así devolvera todos los items de la tabla ordenados, 
                                              en este caso solo los devuelve ordenados por el campo "edad".
                              -> ejemplos: /api/individuos/orden/asc --- ordena ascendentemente
                                           /api/individuos/orden/desc --- ordena descendentemente

/api/consultas -> Metodo: GET
                -> Descripcion: Trae todas las consultas (en un JSON)
                -> ejemplo:  {
                                "consulta": "Puede estar con niños?",
                                "nombre": "Chanchi"
                             }

/api/consultas/1 -> Metodo: GET
                -> Descripcion: Obtiene las consultas especificas de cada individuo, usando el id del individuo (en un JSON)
                -> ejemplo:  {
                                "consulta": "Sabe ir al baño afuera?",
                                "nombre": "Chicho"
                             }

/api/consultas -> Metodo: POST
                -> Descripcion: Agrega una consulta nueva al individuo cuyo ID coincida con el fk_id_individuo, que se le pasa en formato JSON.
                -> ejemplo: Se ingresa en el body (en raw) una consulta con el siguiente formato:
                             {
                                "consulta" : "¿Tiene alergias?",
                                "fk_id_individuo": 1
                             }

/api/consultas/7 -> Metodo: DELETE
                -> Descripcion: Elimina la consulta elegida (se debe ingresar el id de la consulta en el parametro)
                -> ejemplo: Se envia el metodo delete con el id del individuo que se quiere eliminar y aparece el msj "Se borro la consulta"

/api/consultas/1 -> Metodo: PUT
                -> Descripcion: Cambia el contenido de una consulta en particular (segun que id enviemos en el endpoint)
                -> ejemplo: Se ingresa en el body (en raw) un individuo con el siguiente formato:
                             {
                                "consulta": "¿Sabe ir al baño afuera y sentarse?",
                                "fk_id_individuo": 1
                             }