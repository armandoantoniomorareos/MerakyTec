<?php
    include "/bd/CRUD.php";
    
    $idDis = $_POST["idDis"];
    $shelf = $_POST["shelf"];
    $disModel = $_POST["disModel"];
    $pinUnlock = $_POST["pinUnlock"];
    $receptionDate = $_POST["receptionDate"];
    $description = $_POST["description"];
    $account = $_POST["account"];
    $passAccount = $_POST["passAccount"];
    
    //Client
    $idClient = $_POST["idClient"];
    $nombre = $_POST["clientName"];
    $tel1 = $_POST["tel1"];
    $tel2 = $_POST["tel2"];

    $conn = new Crud();

    //verificar si cliente ya existe()
    $isClient = sprintf("select * from cliente where nombre = '%s'", $nombre);
    echo $isClient;
    $insertClient = sprintf("insert into cliente (nombre, tel1, tel2) values ('%s', '%s', '%s')",
                        $nombre, $tel1, $tel2);
    $result = $conn->consult($isClient);
    if($result)
        $idClient = $result["idCliente"];
    else{
        $conn->insert($insertClient);
        $result = $conn->consult("SELECT * FROM cliente ORDER BY idCliente DESC LIMIT 1");
        $idClient = $result["idCliente"];
    }
    //insert into dispositivos
    /*$insertDevice = "insert into dispositivo (%s, %s, %s, %s, %s, %s, %s, %s)
                values (%s, '%s', %s, %s, '%s', '%s', '%s', '%s')";
    $insertComment = "insert into comentarios (%s, %s, %s ) values
                      (%s, '%s', '%s')";
    


    $query = sprintf($insertDevice,
                             "idClient",
                             "disModel",
                             "shelf",
                             "status",
                             "receptionDate",
                             "account",
                             "passAccount",
                             "pinUnlock",
                             $idClient,
                             $disModel,
                             $shelf,
                             0,
                             $receptionDate,
                             $account,
                             $passAccount,
                             $pinUnlock);

    //get last client id
    $getLastrow = "SELECT * FROM dispositivo ORDER BY idDis DESC LIMIT 1";
    $result= $conn->consult($getLastrow);
    echo "dasdad";
    foreach($result as $row){
        echo $row['idDis'];
    }

  //echo $query . "<br>";
    
    $conn->insert($query);
    $query = sprintf($insertComment, 
                    "idDis",
                    "comentario",
                    "status",
                    $row["idDis"],
                    $description,
                    "en espera"
                    );
    echo $query;
    $conn->insert($query);*/

?>