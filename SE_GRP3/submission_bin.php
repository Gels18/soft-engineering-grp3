<?php
include 'config.php';
$conn = $connection;

// Handle file download
if (isset($_GET['download_id'])) {
    $id = intval($_GET['download_id']);
    $query = "SELECT file_name, status, file_type, file_data FROM submissions WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $file = mysqli_fetch_assoc($result);
        header('Content-Type: ' . $file['file_type']);
        header('Content-Disposition: attachment; filename="' . $file['file_name'] . '"');
        echo $file['file_data'];
        exit;
    } else {
        echo "File not found.";
        exit;
    }
}

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $query = "DELETE FROM submissions WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file: " . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_name = $_FILES['document']['name'];
    $file_type = $_FILES['document']['type'];
    $file_data = file_get_contents($_FILES['document']['tmp_name']);
    $document_type = $_POST['document_type'];

    $stmt = $conn->prepare("INSERT INTO submissions (file_name, file_type, file_data, submission_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $file_name, $file_type, $file_data, $document_type);

    if ($stmt->execute()) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file: " . $stmt->error;
    }
    $stmt->close();
}

$query = "SELECT id, file_name, status, file_type, submission_date, submission_type FROM submissions";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$submitted_types_query = "SELECT DISTINCT submission_type FROM submissions";
$submitted_types_result = mysqli_query($conn, $submitted_types_query);

$submitted_types = [];
while ($row = mysqli_fetch_assoc($submitted_types_result)) {
    $submitted_types[] = $row['submission_type'];
}

$all_submission_types = [
    "Library Clearance",
    "Financial Clearance",
    "Sports Clearance",
    "Hostel Clearance"
];

$available_submission_types = array_diff($all_submission_types, $submitted_types);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/submission.css">
    <title>Submission Bin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="sidebar">
        <h2>Clearance System</h2>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="#clearance">Clearance</a></li>
            <li><a href="submission_bin.php">Submission Bin</a></li>
            <li><a href="#notifications">Notifications</a></li>
            <li><a href="#settings">Settings</a></li>
        </ul>
        <button id="logout-btn" class="close-btn">Logout</button>
        <button id="sidebar-close-btn" class="close-btn">BACK</button>
    </nav>
    <div style="margin-left: 20%;">
    <section id="submission-bin">
        <h2>Submission Bin</h2>
        <p>Here you can upload and manage your clearance documents.</p>
        <form action="submission_bin.php" method="POST" enctype="multipart/form-data">
            <label for="document">Upload Document:</label>
            <input type="file" id="document" name="document" required>
            
            <label for="document-type">Select Type:</label>
            <select id="document-type" name="document_type" required>
                <option value="">--Select Type--</option>
                <?php foreach ($available_submission_types as $type): ?>
                    <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit">Submit</button>
        </form>
    </section>

    <h1>Submission Bin</h1>
    <table>
        <thead>
            <tr>
                <th>File Name</th>
                <th>Status</th>
                <th>Submission Date</th>
                <th>Submission Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['file_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td><?php echo htmlspecialchars($row['submission_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['submission_type']); ?></td>
                    <td>
                        <a href="?download_id=<?php echo $row['id']; ?>">Download</a>
                        <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this file?');">X</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
mysqli_free_result($result);
mysqli_free_result($submitted_types_result);
mysqli_close($conn);
?>
