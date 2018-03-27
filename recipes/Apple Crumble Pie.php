<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form method="POST">
      <table>
          <tr><th>Type</th></tr>
           <tr>
              <td><select name="type">
                  <option value="Tablet" selected="selected">Tablets</option>
                  <option value="Webcam">Webcam</option>
                   <option value="VR Headset">VR Headset</option>
                   <option value="Camera">Camera</option>
                   <option value="Smartphone">Smartphone</option>
                   <option value="Laptop">Laptop</option>
                   <option value="Dynamic Mics">Dynamic Microphones</option>
                </select>
            </td>
          </tr>
          <tr><th>Name</th></tr>
           <tr> <td><input type="text" name="name"></td></tr>
           <tr>
              <td>
                  <input type="radio" name="avail" value="Available" checked> Available<br>
                  <input type="radio" name="avail" value="Checkedout"> Unavailable<br>
              </td>
              <td>
                  <input type="radio" name="order" value="price" checked> Price<br>
                  <input type="radio" name="order" value="deviceName"> Name<br>
              </td>
          </tr>
           <tr>
              <td> <input type="submit" value="Filter Results"/></td>
          </tr>
      </table>
          </form>
          
       <?php
       $name = $_POST["name"];
       $type = $_POST["type"];
       $avail = $_POST["avail"];
       $order = $_POST["order"];
 
        include 'MDBConnection.php';
        $conn = getDataBaseconnection('tech_checkout');

       $sql = " SELECT * FROM device
        WHERE status LIKE '$avail'
        AND (deviceName LIKE '$name' OR deviceType = '$type')
        ORDER BY $order";
       
        $stmt = $conn -> prepare ($sql);
        
        $stmt -> execute ();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
        echo $record['deviceName'] ." ". $record['deviceType'] ." ". $record['price'] ." ". $record['status'] ."<br> ";
    }
        
?>
    </body>
</html>