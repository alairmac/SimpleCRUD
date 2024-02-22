<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"]) && isset($_POST["projectName"])) {

        include('../config.php');
        $projectName = $_POST["projectName"];
        $stmt = $conn->prepare("INSERT INTO Project (ProjectName) VALUES (?)");
        $stmt->bind_param("s", $projectName);

        if ($stmt->execute()) {
            $_SESSION["success"] = "Project Added";
            $projectId = $stmt->insert_id;

            if (isset($_POST["taskName"]) && isset($_POST["taskHr"])) {
                $taskNames = $_POST["taskName"];
                $taskHours = $_POST["taskHr"];

                $stmt = $conn->prepare("INSERT INTO Task (TaskName, TaskHours, ProjectCode) VALUES (?, ?, ?)");

                for ($i = 0; $i < count($taskNames); $i++) {
                    $taskName = $taskNames[$i];
                    $taskHour = $taskHours[$i];
                    $stmt->bind_param("sii", $taskName, $taskHour, $projectId);

                    if (!$stmt->execute()) {
                        $_SESSION["failure"] = "Project Not Added";
                        break;
                    }
                }
            }
        } else {
            $_SESSION["failure"] = "Project Not Added";
        }

        $stmt->close();
        $conn->close();
        header("Location: ../index.php");
        die;
    }
}
