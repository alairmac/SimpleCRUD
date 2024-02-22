<?php
session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteId"])) {

    $deleteId = $_POST["deleteId"];

    $type = $_POST["type"];

    $conn->begin_transaction();
    try {
        if ($type == "porject") {
            $stmt = $conn->prepare("DELETE FROM Task WHERE ProjectCode = ?");
            $stmt->bind_param("i", $deleteId);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("DELETE FROM Project WHERE ProjectCode = ?");
            $stmt->bind_param("i", $deleteId);
            $stmt->execute();
        }else{
            $stmt = $conn->prepare("DELETE FROM Task WHERE TaskId = ?");
            $stmt->bind_param("i", $deleteId);
            $stmt->execute();

        }
        $stmt->close();
        $conn->commit();
        $_SESSION["success"] = "Project and associated tasks deleted successfully.";
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION["error"] = "Error deleting project and tasks: " . $e->getMessage();
    }

    $conn->close();

    header("Location: ../index.php");
    exit;
}
