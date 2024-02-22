<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"]) && isset($_POST["projectCode"])) {
        include('../config.php');

        $projectId = $_POST["projectCode"];
        $projectName = $_POST["projectName"];

        $stmt = $conn->prepare("UPDATE Project SET ProjectName = ? WHERE ProjectCode = ?");
        $stmt->bind_param("ss", $projectName, $projectId);
        if ($stmt->execute()) {
            $_SESSION["success"] = "Project Added";
        } else {
            $_SESSION["failure"] = "Project Not Added";
        }
        $stmt->close();
        $conn->close();
        header("Location: ../index.php");
        die;
    }
}
