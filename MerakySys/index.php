<!DOCTYPE>

<html>
<head>
   
    <script src="js/forms.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    
    <title> MerakySys </title>

    <script>

        var xmlhttp = new XMLHttpRequest();

        function sendClientInfo(){
 
            var name = document.getElementById("clientName").value;
            var tel1 = document.getElementById("clientTel1").value;
            var tel2 = document.getElementById("clientTel2").value;
            var query = "&clientName="+name+"&tel1="+tel1+"&tel2="+tel2;
 
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                  alert(this.responseText);
                }
            };
            xmlhttp.open("POST", "bd/client.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("action=addClient"+query);

        }

         function testt(row, column){
             table = document.getElementById("clientTable");
             var clientId = table.rows[row].cells[0].innerHTML;
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                  document.getElementById('deviceTable').innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "bd/device.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("&device="+clientId);
        }
       

        function sendDeviceInfo(){
            /*validate info*/
            var idClient = document.getElementById("idClient").value;
            var model = document.getElementById("model").value;
            var shelf = document.getElementById("shelf").value;
            var status = document.getElementById("status").value;
            var date = document.getElementById("receptionDate").value;
            var account = document.getElementById("account").value;
            var passAccount = document.getElementById("passAccount").value;
            var pinUnlock = document.getElementById("pinUnlock").value;
            var description = document.getElementById("description").value;

            var query = "&idClient="+idClient+"&model="+model+"&shelf="+shelf+"&status="+status
                        +"&receptionDate="+date+"&description="+description;

            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                  alert(this.responseText);
                }
            };
            xmlhttp.open("POST", "bd/device.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("action=showClient"+query);
        }

    function searchClient(data){
      
        xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("test").innerHTML = this.responseText;
        }
    };
       xmlhttp.open("POST", "bd/client.php", true);
       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xmlhttp.send("action=showClient&data="+data);
    }
        </script>
</head>
<body>
    <div class="container">
        <div class="leftSide">
            <ul>
                <li>
                    <div class="button1" id="buttonLeft1">
                        <img src="img/logo.jpg"/>
                    </div>
                </li>
                <li>
                    <div class="btnConsultComments" id="buttonLeft2">
                        <p>Comentarios</p>
                    </div>
                </li>
                 <li>
                    <div class="btnInventario" id="buttonLeft2">
                        <p>Comentarios</p>
                    </div>
                </li>
                 <li>
                    <div class="btnStadisticas" id="buttonLeft2">
                        <p>Comentarios</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class = "searchClientInput">
            <input type="search"  name="searchClient" oninput="searchClient(this.value)" >
        </div>
        
        <div id="clientDeviceTables">
            <div id=test class="client">
              
           </div>

            <div id="deviceTable">
                
            </div>
        </div>

        <div id='insertClientDiv'>
            <form name="insertClientForm">
                <label> Nombre: </label> <input type="text" name="clientName" id="clientName" value=""> 
                <label> Tel1: </label> <input type="tel1" name="clientName" id="clientTel1" value=""> 
                <label> Tel2 : </label> <input type="tel2" name="clientName" id="clientTel2" value=""> 
                <div id="buttonAddClient" onclick="sendClientInfo()">
                    <p> Agregar</p>
                </div>
            </form>
        </div>
        

        <div id="addDevice">
            <form name="addDevice">
                <table>
                <tr>
                    <td>
                        <label > Id cliente </label>
                    </td>
                    <td>
                        <input type="text" name="idClient" id="idClient" value="" required><br>
                    </td>
                    <td>
                        <label > Id Dispisitivo </label>
                    </td>
                    <td>
                        <input type="text" name="idDevice" id="idDevice" value="" required><br>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <label > Modelo </label>
                    </td>
                    <td>
                        <input type="text" name="disModel" id="model" value="" required><br>
                    </td>
                
               
                    <td>
                        <label >Repisa</label>
                    </td>
                    <td>
                        <input type="text" name="shelf" id="shelf" value="" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label > Status </label>
                    </td>
                    <td>
                        <input type="text" name="status" id="status" value="" required><br>
                    </td>
                    <td>
                        <label > Fecha </label>
                    </td>
                    <td>
                        <input type="text" name="receptionDate" id="receptionDate" value="" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label > Cuenta </label>
                    </td>
                    <td>
                        <input type="text" name="account" id="account" value="" required><br>
                    </td>
                    <td>
                        <label > Contrasenia </label>
                    </td>
                    <td>
                        <input type="text" name="passAccount" id="passAccount" value="" required><br>
                    </td>
                </tr>
                    <td>
                        <label > Pin Desbloqueo </label>
                    </td>
                    <td>
                        <input type="text" name="pinUnlock" id="pinUnlock" value="" required><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <textarea name="description" id="description" rows="12" required></textarea><br>
                    </td>
                </tr>
                </table>
            </form>
            <div id="buttonAddDevice" onclick="sendDeviceInfo()">
                <p> Agregar</p>

            </div>
        </div>
    </div>
        <!--<form id="formInfo" action="validate.php" method="post">
            <div class="clientInfo">
            Id Cliente: 
            <input type="text" name="idClient" value="" ><br>
             Nombre: 
            <input type="text" name="clientName" value="" required><br>
            Tel1: 
            <input type="text" name="tel1" value="" required><br>
            Tel2:
            <input type="text" name="tel2" value=""><br>
            Cuenta Google/ICloud:
            <input type="text" name="account" value=""><br>
            Contrasenia cuenta:
            <input type="text" name="passAccount" value=""><br>
            </div>
            <div class="deviceInfo">
            No.Cel
            <input type="text" name="idDis" value=""><br>
            Repisa
            <input type="text" name="shelf" value="" required><br>
            Modelo
            <input type="text" name="disModel" value="" required><br>
            Pin Desbloqueo
            <input type="text" name="pinUnlock" value=""><br>
            Fecha
            <input type="date" name="receptionDate" value="" required><br>

            <input type="radio" name="status" text="arreglado" >Arreglado<br>
            <input type="radio" name="status" text="Revisando" >Revisando<br>
            <input type="radio" name="status" text="arreglado" >En Espera<br><br>
            
            Elementos Extras<br>

            <input type="checkbox" name="accesoriosDejados" value="Cargador">Cargador<br>
            <input type="checkbox" name="accesoriosDejados" value="Sim">Sim<br>
            <input type="checkbox" name="accesoriosDejados" value="Sdcard">Sdcard<br>
            <textarea name="description" rows="20" cols="80" required></textarea><br>
            <input type="" name="" value="">
            <input type="submit" value="Guardar" >
            </div>
        </form>
    </div>-->
</body>

</html>