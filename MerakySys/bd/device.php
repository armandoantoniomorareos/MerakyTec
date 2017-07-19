<?php
include "Crud.php";

if (isset($_REQUEST["action"])) {

    $idClient = $_REQUEST["idClient"];
    $model = $_REQUEST["model"];
    $shelf = $_REQUEST["shelf"];
    $status = $_REQUEST["status"];
    $receptionDate = $_REQUEST["receptionDate"];
    $idClient = $_REQUEST["idClient"];
    $tempDate =getdate();
    $receptionDate = $tempDate['year']."-".$tempDate['mon']."-".$tempDate['mday'];
    $receptionDate = date('Y-m-d');
    $description = $_REQUEST['description'];
    $query = "INSERT into dispositivo ( idClient, disModel, shelf, status,
                     receptionDate, account, passAccount, pinUnlock) values (
                     $idClient , '$model' , $shelf , '$status' , '$receptionDate',
                     '', '', '' )";

    $queryComm = "INSERT INTO comentarios (idDis, comentario, status) 
                  values (%s, '$description', '$status')";

    
    $device = new Device();

    //validate if device doesn't exit with the same owner 
    $result = $device->insertDevice($query);
    $device->insertComments($queryComm);
}

if(isset($_REQUEST['device'])){
    $clientId = $_REQUEST['device'];
    $device = new Device();
    $result = $device->searchDevices($clientId);
    $device->createTableDevice($result);

}

class Device
{

    private $conn;
    function __construct()
    {
        $this->conn = new Crud();
    }

    function insertDevice($query)
    {

        return $this->conn->insert($query);

    }

    function createTableDevice($values){
        $table = "";
        $tableRow = "";
        $row = "
            <tr>
                <td onclick='testt2(1)'> %s </td>
                <td> %s </td>
                <td> %s </td>
                <td> %s </td>
            </tr>";

        foreach ($values as $val) {
            $tableRow .= sprintf($row, $val['idDis'], $val['disModel'], $val['status'], $val['receptionDate']);
        }
        $table =
            "
            <table> 
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
    }

    function searchDevices($clientId)
    {
        $query = "SELECT * FROM dispositivo WHERE idClient = $clientId";
        return  $this->conn->consult($query);
        
    }

    function getLastDeviceId(){
        $getLastrow = "SELECT * FROM dispositivo ORDER BY idDis DESC LIMIT 1";
        return $this->conn->consult($getLastrow);
    }
    function insertComments($query){
        $idDis = $this->getLastDeviceId();
        foreach($idDis as $row){
           $query = sprintf($query, $row["idDis"]);
        }
        $this->conn->insert($query);

    }


}

?>