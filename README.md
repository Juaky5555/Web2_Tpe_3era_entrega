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

/api/individuos/:ID -> Metodo: GET
                -> Descripcios: Trae un individuo especifico basandose en el ID que se coloque como parametro (en un JSON)
                -> ejemplo:   /api/individuos/3  { 
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

/api/individuos/:ID -> Metodo: DELETE
                -> Descripcion: Elimina un individuo junto con todas las consultas que este pueda tener.
                -> ejemplo: Se envia el metodo delete con el id del individuo que se quiere eliminar y aparece el msj "Se borro el individuo".
                
/api/individuos/:ID -> Metodo: PUT
                -> Descripcion: Modifica el contenido de un individuo en particular (segun el id que enviemos en el endpoint)
                -> ejemplo: /api/individuos/2
                Se ingresa en el body (en raw) un individuo con el siguiente formato:
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

/api/individuos/byage/:MIN_AGE/:MAX_AGE -> Metodo: GET
                           -> Descripcion: Filtra a los individuos por su edad, se ingresa la edad minima como primer parametro y la maxima como segundo
                           -> ejemplos: los parametros /2/3 devuleven:
                           {
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

/api/individuos/paginacion/:NUM/:PAGE  -> Metodo: GET
                           -> Descripcion: Hace una paginacion, el primer parametro es la cantidad de individuos que se desea y el segundo a partir de que objeto se desea ver (excluyendo este ultimo).
                           -> ejemplos: api/individuos/paginacion/2/3
                           "individuos": [
                                             {
                                                   "id": 4,
                                                   "nombre": "Tanque",
                                                   "raza": "Maine coon",
                                                   "edad": 5,
                                                   "color": "Gris",
                                                   "personalidad": "Tanque es muy amigable y sociable. En caso de ser el único gato de la casa, ve a requerir mucha atención humana. Además, es  muy charlatan, es decir, sus arrullos y maullidos te acompañarán durante todo el día. Es muy afable y tolerante con otros animales y con los niños.",
                                                   "fk_id_especie": 2,
                                                   "imagen": "",
                                                   "id_especie": 2,
                                                   "especie": "Felino",
                                                   "descripcion": "Posee un pelaje suave y lanoso con una apariencia brillante, mantenida con una constante limpieza con la lengua. Su cuerpo es flexible, ligero, musculoso y compacto. Las patas delanteras tienen cinco dígitos y las traseras cuatro. Las garras son retráctiles, largas, afiladas, muy curvadas y comprimidas lateralmente."
                                             },
                                             {
                                                   "id": 5,
                                                   "nombre": "Pelusa",
                                                   "raza": "Cobaya peruana",
                                                   "edad": 1,
                                                   "color": "Crema",
                                                   "personalidad": "Pelusa se caracteriza por su personalidad cariñosa y dócil. Tiene un marcado instinto de exploración, ya que es muy curioso y atento.",
                                                   "fk_id_especie": 3,
                                                   "imagen": "",
                                                   "id_especie": 3,
                                                   "especie": "Roedor",
                                                   "descripcion": "La mayoría de los roedores tienen patas cortas, son cuadrúpedos (se mueven a cuatro patas) y son relativamente pequeños. Su característica común principal son los dos incisivos, de gran tamaño y crecimiento continuo, situados en el maxilar inferior y superior, y que solo están cubiertos de esmalte en la parte frontal."
                                             }
                                          ]



/api/consultas -> Metodo: GET
                -> Descripcion: Trae todas las consultas (en un JSON)
                -> ejemplo:  {
                                "consulta": "Puede estar con niños?",
                                "nombre": "Chanchi"
                             }

/api/consultas/:ID -> Metodo: GET
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

/api/consultas/:ID -> Metodo: DELETE
                -> Descripcion: Elimina la consulta elegida (se debe ingresar el id de la consulta en el parametro)
                -> ejemplo: Se envia el metodo delete con el id del individuo que se quiere eliminar y aparece el msj "Se borro la consulta"

/api/consultas/:ID -> Metodo: PUT
                -> Descripcion: Cambia el contenido de una consulta en particular (segun que id enviemos en el endpoint)
                -> ejemplo: Se ingresa en el body (en raw) un individuo con el siguiente formato:
                             {
                                "consulta": "¿Sabe ir al baño afuera y sentarse?",
                                "fk_id_individuo": 1
                             }