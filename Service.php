<?php
//Insaf Mohamed Umar, 1001808683
//Darshan Bastola, 1001901484

require './Database.php';
require './Item.php';

class Service {

    function fetchAllItems($name = null) {
        $dbObject = new Database();
        $dbConnection = $dbObject->getDatabaseConnection();

        $sql = "SELECT * FROM item WHERE Iname LIKE ?";
        $stmt = $dbConnection->prepare($sql);
        $name = "%{$name}%";
        $stmt->bindParam(1, $name, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ITEM');
    }

    function addItem() {
        $iId = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "INSERT INTO item (iId, Iname, Sprice) VALUES (?, ?, ?)";

		$stmt = $dbConnection->prepare($sql);

        $stmt->bindParam(1, $iId, PDO::PARAM_INT);
        $stmt->bindParam(2, $name, PDO::PARAM_STR);
        $stmt->bindParam(3, $price, PDO::PARAM_INT);

        if ($stmt->execute()) {
            print "Item added successfully";
        } else {
            return 'Failed';  
        }
    }

    function deleteItem() {
        if (isset($_POST['exit'])) {
            header( "Location: http://localhost/php_school_demo/menu.php"); }
        $id = $_POST['id'];

        $dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "DELETE FROM item WHERE iId = ?";

        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            print "Item deleted successfully";
        } else {
            return 'Failed';
        }
    }

    function updateItem() 
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
    
        $dbObject = new Database();
        $dbConnection = $dbObject->getDatabaseConnection();
    
        $sql = "UPDATE item SET Iname = ?, Sprice = ? WHERE iId = ?";
    
        $stmt = $dbConnection->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $price, PDO::PARAM_INT);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            print "Item updated successfully";
        } else {
            return 'Failed';
        }
    }
}

