<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'db.php';

$action = $_POST['action'] ?? '';
$filename = basename(__FILE__, ".php");
try
{

    switch ($action) {
        case 'add':

            //$desc = htmlspecialchars($desc); 
            $desc = htmlspecialchars(strip_tags(trim($_POST['description'])));
            // echo json_encode($desc);
            // exit;
            if (empty($desc)) {
                echo json_encode(['error' => 'Description cannot be empty']);
                exit;
            }
            
            $stmt = $conn->prepare("INSERT INTO task_checklist (description) VALUES (?)");

            if ($stmt === false) {
                echo json_encode(['error' => 'Error preparing the statement']);
                exit;
            }
            
            $stmt->bind_param("s", $desc);

            // echo json_encode($stmt);
            // exit;

            $stmt->execute();
            $stmt->close();

            update_log($filename, "Task ||" . $desc . "|| Added Successfully");

            break;

        case 'complete':
            $id = $_POST['id'];
            // Need this to have a toggle functionality between edit status or completed

            if (!filter_var($id, FILTER_VALIDATE_INT)) {
                echo json_encode(['error' => 'Invalid ID']);
                exit;
            }

            $conn->query("UPDATE task_checklist SET status = NOT status WHERE id = " . (int)$id);
            echo json_encode(['success' => true]);
            update_log($filename, "Status for id:||" . $id . "|| Updated Successfully");
            break;

        case 'delete':
            $id = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM task_checklist WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(['success' => true]);

            update_log($filename, "Id:||" . $id . "|| Deleted Successfully");

            $stmt->close();
            break;


        case 'list':
            $result = $conn->query("SELECT * FROM task_checklist ORDER BY created_at DESC");
            $tasks = [];

            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }

            echo json_encode($tasks);
            // exit;
            
            break;
    }

}
catch(Exception $exception)
{
    $message = "ERROR: " . print_r($exception->getMessage());
    update_log($filename, $message);
}
finally
{
    $conn->close();
}