<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $msisdn = isset($_POST['msisdn']) ? $_POST['msisdn'] : "";
   if (empty($msisdn)) {
       $result = [
           'success' => false,
           'data' => [],
           'message' => 'Số điện thoại trống'
       ];
       echo json_encode($result);die;
   } 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        $sql = "SELECT * FROM msisdn_type WHERE msisdn = :msisdn LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':msisdn', $msisdn);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        if (empty($rows)) {
            $result = [
                'success' => true,
                'data' => ['type' => 'FF3'],
                'message' => 'Gói FF3'
            ];
        } else {
            $type = isset($rows[0]) ? $rows[0]['type'] : 'FF3';
            $type = empty($type) ? 'FF3' : $type;
            $result = [
                'success' => true,
                'data' => ['type' => $type],
                'message' => ''
            ];
        }
        echo json_encode($result);
        $conn = null;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}