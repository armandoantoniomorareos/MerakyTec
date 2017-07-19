<?php
include "Crud.php";;

function test()
{
    $cliente = new client();
    $result = $cliente->searchClient("cliente1");
    $cliente->createTableClient($result);
}

if (isset($_REQUEST["action"])) {
    $cliente = new client();
    switch ($_REQUEST["action"]) {
        case 'showClient' :

            $result = $cliente->searchClient($_REQUEST["data"]);
            $cliente->createTableClient($result);
            break;
        case 'addClient':
            $name = $_REQUEST['clientName'];
            $tel1 = $_REQUEST['tel1'];
            $tel2 = $_REQUEST['tel2'];
            $query = "INSERT INTO cliente (nombre, tel1, tel2) 
                     values ('$name', '$tel1', '$tel2')";
            $cliente->insertClient($query);
        break;
    }
}

class client
{

    private $conn;
    //private $conn;
    function __construct()
    {
        $this->conn = new Crud();
    }

    function createTableClient($values)
    {
        $table = "";
        $tableRow = "";
        $row = "
            <tr>
                <td onclick='testt(%s, 0)'> %s </td>
                <td onclick='testt(%s, 1)'> %s </td>
                <td onclick='testt(%s, 2)'> %s </td>
                <td onclick='testt(%s, 3)'> %s </td>
            </tr>";
        $count=0;
        foreach ($values as $val) {
            $count+=1;
            $tableRow .= sprintf($row, $count, $val['idCliente'], 
                                 $count, $val['nombre'], 
                                 $count, $val['tel1'], 
                                 $count, $val['tel2']);
        }
        //echo htmlspecialchars($tableRow);
        $table =
            "
                <table id='clientTable'> 
                    <tr>
                        <th> ID </th>
                        <th> Nombre </th>
                        <th> Tel1 </th>
                        <th> Tel2 </th>
                    </tr>
                    %s
                </table>";
        $table = sprintf($table, $tableRow);
        echo $table;
            //return $table;


    }

    function searchClient($data)
    {
        $query = "SELECT * FROM cliente WHERE nombre LIKE '%$data%'";
        $result = $this->conn->consult($query);
        
        /*if ($result)
            foreach ($result as $row) {
            echo $row["nombre"] . "<br>";
        }
        else {
            echo "No Encontrado";
        }*/
        return $result;
    }

    function insertClient($query)
    {
        $this->conn->insert($query);
        //return result
        
    }

}

?>