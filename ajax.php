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
        echo json_encode($result);
        die;
    }
    if (strpos($msisdn, '+84') === 0) {
        $msisdn = str_replace('+84', '', $msisdn);
    }
    if (strpos($msisdn, '84') === 0) {
        $msisdn = str_replace('84', '', $msisdn);
    }
    if (strpos($msisdn, '0') === 0) {
        $msisdn = str_replace('0', '', $msisdn);
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
                'pack' => ['SP50', 'SP120', 'SP200'],
                'message' => 'Gói FF3'
            ];
        } else {
            $type = isset($rows[0]) ? $rows[0]['type'] : 'FF3';
            $type = empty($type) ? 'FF3' : $type;
            if ($type === 'FF1') {
                $listPack = ['SP50KH', 'SP120KH', 'SP200KH', 'MF50KH', 'MF120KH', 'MF200KH', 'SP50', 'SP120', 'SP200'];
                $listPackAss = [];

                foreach ($listPack as $pack) {
//                    $tbl = strtolower($pack);
                    $tbl = $pack;
                    $sql = "SELECT COUNT(*) AS count_msisdn  FROM $tbl WHERE msisdn = :msisdn";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':msisdn', $msisdn);
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $stmt->fetch();
                    if (!(empty($row) || $row['count_msisdn'] == 0)) {
                        $listPackAss[] = $pack;
                    }
                }
                $result = [
                    'success' => true,
                    'data' => ['type' => $type],
                    'pack' => $listPackAss,
                    'message' => ''
                ];
            } else if ($type === 'FF2') {
                $listPack = ['SP50', 'SP120', 'SP200'];
                $listPackAss = [];
                foreach ($listPack as $pack) {
//                    $tbl = strtolower($pack);
                    $tbl = $pack;
                    $sql = "SELECT COUNT(*) AS count_msisdn  FROM $tbl WHERE msisdn = :msisdn";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':msisdn', $msisdn);
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $stmt->fetch();
                    if (!(empty($row) || $row['count_msisdn'] == 0)) {
                        $listPackAss[] = $pack;
                    }
                }
                $result = [
                    'success' => true,
                    'data' => ['type' => $type],
                    'pack' => $listPackAss,
                    'message' => ''
                ];
            } else {
                $result = [
                    'success' => true,
                    'data' => ['type' => $type],
                    'pack' => ['SP50', 'SP120', 'SP200'],
                    'message' => ''
                ];
            }

        }
        echo json_encode($result);
        $conn = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}