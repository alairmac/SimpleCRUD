<?php
session_start();

include('./config.php');

$_SESSION['token'] = bin2hex(random_bytes(32));

$sql = "SELECT p.ProjectCode, p.ProjectName, t.TaskName, t.TaskHours, t.TaskId 
        FROM Project p 
        LEFT JOIN Task t ON p.ProjectCode = t.ProjectCode";
$result = mysqli_query($conn, $sql);

$ProjectNames = [];
$TaskIds = [];
$TaskNames = [];
$TaskHrs = [];
while ($row = mysqli_fetch_assoc($result)) {

    $ProjectNames[$row['ProjectCode']] = $row['ProjectName'];
    $TaskIds[$row['ProjectCode']][] = $row['TaskId'];
    $TaskNames[$row['ProjectCode']][] = $row['TaskName'];
    $TaskHrs[$row['ProjectCode']][] =  $row['TaskHours'];
}

if (isset($_POST['project'])) {
    $_SESSION['project'] = $_POST['project'];
} else {
    $_SESSION['project'] = '';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body table-responsive" style="min-height: 90vh;">
                <div class="row">
                    <div class="col-4 mt-5">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProject">
                            Add Project
                        </button>
                        <?php include('./modals/createProject.php') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <form method="post" action="">
                        <div class="col-sm-12">
                            <select id="project" name="project" required onchange="this.form.submit()" class="selectpicker show-tick form-control" aria-describedby="project" title="Select Project" data-actions-box="true" data-live-search="true">
                                <option value="">Select Project Code/Project Name</option>
                                <?php
                                foreach ($ProjectNames as $ProjectCode => $ProjectName) {
                                ?>
                                    <option <?php
                                            if (isset($_SESSION['project']) && $_SESSION['project'] == $ProjectCode) {
                                                echo 'selected ';
                                            }
                                            ?>value="<?= $ProjectCode ?>"><?= $ProjectCode . ' - ' . $ProjectName ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">Project Code</th>
                                    <th scope="col">Project Name/Task Name</th>
                                    <th scope="col" style="width: 10px;">Task</th>
                                    <th scope="col" style="width: 10px;">Edit</th>
                                    <th scope="col" style="width: 10px;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ProjectNames) && $_SESSION['project'] == '') {
                                    foreach ($ProjectNames as $ProjectCode => $ProjectName) {
                                ?>
                                        <tr>
                                            <td><strong><?= $ProjectCode ?></strong></td>
                                            <td><strong><?= $ProjectName ?></strong></td>
                                            <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addTask" data-id="<?= $ProjectCode ?>">Add</button></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editProject" data-name="<?= $ProjectName ?>" data-id="<?= $ProjectCode ?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-type="porject" data-id="<?= $ProjectCode ?>" data-name="<?= $ProjectName ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php if (isset($TaskIds[$ProjectCode])) {
                                            foreach ($TaskIds[$ProjectCode] as $j => $TaskId) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $TaskNames[$ProjectCode][$j] . ' - ' . $TaskHrs[$ProjectCode][$j] . ' hours' ?></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editTask" data-id="<?= $TaskId ?>" data-name="<?= $TaskNames[$ProjectCode][$j] ?>" data-hr="<?= $TaskHrs[$ProjectCode][$j] ?>">Edit</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-type="task" data-id="<?= $TaskId ?>" data-name="<?= $TaskNames[$ProjectCode][$j] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('./modals/editProject.php');
    include('./modals/addTask.php');
    include('./modals/editTask.php');
    include('./modals/delete.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
    <script src="./assets/js/addProject.js"></script>
    <script src="./assets/js/editProject.js"></script>

    <script src="./assets/js/addTask.js"></script>
    <script src="./assets/js/editTask.js"></script>

    <script src="./assets/js/delete.js"></script>
    <script src="./assets/js/removeBtn.js"></script>

    <script src="./assets/js/getSelectedValue.js"></script>
    <script src="./assets/js/updateTable.js"></script>
    <script src="./assets/js/fetchTableData.js"></script>
    <script src="./assets/js/createBtn.js"></script>
    <script src="./assets/js/createRow.js"></script>

    <script>
        $('selectpicker').selectpicker();
    </script>

    <?php if ($_SESSION['project'] != '') { ?>
        <script>
            const selectedValue = getSelectedValue("project");
            updateTable("./includes/fetchTableData.inc.php", selectedValue, "<?= $_SESSION['token'] ?>");
        </script>
    <?php } ?>

</body>

</html>