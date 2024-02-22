<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../config.php');
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if (isset($data['key']) && isset($data['token']) && $data['token'] == $_SESSION['token']) {

        $projectCode = $data['key'];
        $sql = "SELECT p.ProjectCode, p.ProjectName, t.TaskName, t.TaskHours, t.TaskId 
        FROM Project p 
        LEFT JOIN Task t ON p.ProjectCode = t.ProjectCode 
        WHERE p.ProjectCode = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $projectCode);
        $stmt->execute();
        $stmt->bind_result($projectCode, $projectName, $taskName, $taskHours, $taskId);
        $results = array();


        $ProjectNames = [];
        $TaskIds = [];
        $TaskNames = [];
        $TaskHrs = [];
        $result = [];
        while ($stmt->fetch()) {
            $projectCode = $projectCode;
            $ProjectNames = $projectName;
            $TaskIds[] = $taskId;
            $TaskNames[] = $taskName;
            $TaskHrs[] =  $taskHours;
        }
        $stmt->close();
        echo json_encode([
            'projectCode' => $projectCode,
            'ProjectNames' => $ProjectNames,
            'TaskIds' => $TaskIds,
            'TaskNames' => $TaskNames,
            'TaskHrs' => $TaskHrs
        ]);
    }
}
