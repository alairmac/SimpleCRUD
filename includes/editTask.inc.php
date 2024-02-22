<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"]) && isset($_POST["taskId"])) {
        include('../config.php');
        $taskId = $_POST["taskId"];
        $taskName = $_POST["taskName"];
        $taskHr = $_POST["taskHr"];
        $stmt = $conn->prepare("UPDATE Task SET TaskName = ?, TaskHours = ? WHERE TaskId = ?");
        $stmt->bind_param("sii", $taskName, $taskHr, $taskId);
        if ($stmt->execute()) {
            $_SESSION["success"] = "Task updated successfully";
        } else {
            $_SESSION["failure"] = "Failed to update task";
        }
        $stmt->close();
        $conn->close();
        header("Location: ../index.php");
        die;
    }
}
