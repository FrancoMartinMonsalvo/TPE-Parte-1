<?php
/*La funcion de este archivo db.oho deberia ser la de meter 
todas las funciones que se conecten con la base de datos para hacer consultas */

/*   
    EJEMPLO PARA ENTENDER MEJOR LA FUNCIONALIDAD DEL ARCHIVO

    Acá iria 
    function getConnection(){
        devuelve una variable $db que va a tomar un PDO(donde esté localizado la tabla de juegos)
        $db= new 
        PDO('mysql:host=localhost;dbname=db_ecommerce;charset=utf8','root', '');
        
        $query = $db->prepare('SELECT * FROM juegos');
        $query->execute();
        $query->fetchAll(PDO::FETCH_OBJ);
    
    }
    function getGames(){
        declararia una variable $db que tome la funcion de arriba

        variable query que toma el valor de $db, lo preparo(selecciono todo de la tabla juegos);
        $query-> la ejecuto ();

        games es un arreglo de juegos
        $games= $query->fetchAll(PDO::FETCH_OBJ);
        
        retorno los juegos return $games;

    }
    aca tendríamos otras funciones como las siguientes
    function insertGame($name,$category,$mount){
        etc etc etc
    }
    function deleteGame($id){
        etc etc etc
    }
*/