<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"]) && isset($_POST["taskName"])) {
        include('../config.php');

        $taskNames = $_POST["taskName"];
        $taskHours = $_POST["taskHr"];
        $projectId = $_POST["projectCode"];
        $stmt = $conn->prepare("INSERT INTO Task (TaskName, TaskHours, ProjectCode) VALUES (?, ?, ?)");
        $flag = true;
        for ($i = 0; $i < count($taskNames); $i++) {
            $taskName = $taskNames[$i];
            $taskHour = $taskHours[$i];
            $stmt->bind_param("sii", $taskName, $taskHour, $projectId);
            if (!$stmt->execute()) {
                $_SESSION["failure"] = "Task Not Added";
                break;
            }
        }
        $_SESSION["success"] = "Task Added";
        $stmt->close();
        $conn->close();
        header("Location: ../index.php");
        die;
    }
}
