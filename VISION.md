Síntesis de la propuesta.

0.-Lógica de tanda.php
Tanda es un archivo, de los cientos que conforman winmates.net, en el que se presentan problemas de dificultad controlada (de 1 a 10, en una colección de 6000, 600 para cada uno de los niveles y que cubren las edades cronológicas de 6 a 16 años -aunque los dos últimos (15 y16) de forma tangencial. Los problemas están destinados y pensados para los alumnos de Enseñanza Obligatoria -6 a 16 años-. 
Todos los ficheros relativos a este apartado Problemas de winmates.net están en el directorio ../proble/ excepto aquellos que son llamados para cuestiones concretas (connexion a la Base de datos - ../connexion/B_6000.php…), funciones (/funcy.inc, ../ y ../includes/pie_ad_horizontal.inc, ../includes/cabe1.inc,  ../includes/cabe2.inc …)
1.- Forma de acceso a tanda.
Doble vía:

A.- Para aquellos alumnos que se han registrado en el programa y que han realizado un diagnóstico con 30 problemas ordenados por dificultad creciente, a través del cual se estima la maduración psicomatemática de los alumnos independientemente de su edad cronológica. (Problemas -> Winmates )
El resultado de este diagnóstico nos servirá para obtener el puntero donde comenzará a trabajar el alumno en esa colección de 6000 problemas a los que tiene acceso tanda. Ello exige entrar en la tarea -tanda- con usuario y contraseña e ir trabajando en sesiones de entre 10 y 20 problemas. Los resultados y los tiempos, de los que el alumno va teniendo información y se permite una segunda oportunidad tras el primer fallo, quedan grabados en diferentes tablas de la Base de Datos para análisis global y seguimiento individual. 
Ante una respuesta fallada, se procede a dar una segunda oportunidad, y si es acertada, se solicita la justificación de la respuesta. La justificación de la respuesta consiste en completar una igualdad en la que el primer miembro es la respuesta acertada y la segunda una expresión con números (que han de coincidir con los datos que presenta el problema) y operaciones que expliquen que el alumno ha comprendido y es capaz de justificar la respuesta en base a los datos del problema. Todo ello en el caso de que el problema necesite justificación (hay veces que se solicita un datos del problema para estimar si la capacidad de comprensión global es más fuerte que la tendencia operatoria).
Posteriormente el alumno entrará en la tanda con su código y contraseña y el puntero del problema estará situado en el punto en que concluyó el día anterior.

B.- Acceso de los alumnos no registrados.
En este caso todo es mucho más sencillo. Se evita el diagnóstico originario y es el alumnos (padre o tutor) el que lo sitúa en una de las 10 posibilidades que se ofrecen (de 1 a 10), resultando el inicio del trabajo en un puntero que se obtiene de multiplicar el número seleccionado por 600 con un discreto desplazamiento pseudoaleatorio. Se graban también los errores cometidos pero no asociados a un usuario sino al nº de problema.
2.- Archivos relacionados con ella. 
1.- Alumnos Registrados.
Como comentamos previamente es necesario hacer un diagnóstico, que requiere los archivos diag.php (identificación) y diagnóstico.php (ejecución y credenciales si el diagnóstico es aceptable, es decir se ha aceptado la identificación y se obtienen más de 4 ejercicios bien). El diagnóstico finaliza cuando llega al final (30 ejercicios) o por el error consecutivo de 4 errores. Antes de tanda.php se pasa por tan_dir.php y por veri_tand.php
Obviamente el programa se coordina con la apertura a la base de datos de donde obtiene y guarda los datos necesarios. Ese fichero es ../connexio/B_6000.php

2.- Alumnos No Registrados.
. Problemas -> Dificultad. (tanda0.php (elección de nivel) -> tanda1.php (resolución de los problemas)
. Problemas -> Músculo.  (mmen0.php)  (elección de nivel) -> mmen1.php (resolución de los problemas)
. Dificultad -> Lógica  (lotesp0.php)  (elección de nivel) -> lotesp1.php (resolución de los problemas)
. Dificultad -> Geometría (geome0.php)  (elección de nivel) -> geome1.php (resolución de los problemas)
. Problemas -> P.I.S.A. (pisaged0.php)  (elección de nivel) -> pisaged1.php (resolución de los problemas)

3.- Tablas de interacción con tanda.
Base de datos: newbase_6000.
Tablas de tanda y tanda1: erraci, informa, basedif0, dificil, restanda, justidop, contador
Tablas de mmen1.php: mmental, contador
Tablas de Logica: lotesp
Tablas de Geometria: geome
Tablas de pisaged1: pisaged

La tabla basedif0 (6000 registros, es decir, todos los problemas con sus características: nº de problema, texto, solución, datos, dificultad inicial…) es una tabla muy estable, con pocos cambios. El resto de ellas nacieron vacías y se van llenando con las respuestas que van generando los alumnos. a medida que van resolviendo los problemas. 
Winmates no genera problemas, los busca en basedif0 en base a la dificultad que necesita el alumno (según diagnostico o según elección), donde están ordenados por dificultad (media) creciente.

4.- Problemas enviados.
Fichero adjunto de muestra: sample_basedif0.csv,  con filas 60 filas (registros) extraídos y representativos de los 6000 problemas de basedif0.

5.- Código de tanda.
Fichero que se adjunta con código de tanda.php

