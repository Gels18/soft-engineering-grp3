<?php
include 'config.php';
require_once "phpscript/runner.php";
runSqlScript("./phpscript/script.sql", "client4", false);

session_start();
if (!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance System</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
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
        <main class="content">
            <header>
                <button id="menu-toggle" class="menu-toggle">☰</button>
                <h1>Dashboard</h1>
                <div class="date-time">
                    <div id="clock" class="clock"></div>
                    <div id="calendar" class="calendar"></div>
                </div>
            </header>
            <section>
                <h2>Welcome to the Clearance System</h2>
                <p>Use the sidebar to navigate through different sections of the system.</p>
            </section>
            <section id="requirements">
                <h2>Clearance Requirements</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Library Clearance</td>
                            <td>Return all borrowed books and clear any fines.</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>Financial Clearance</td>
                            <td>Settle all tuition and other fees.</td>
                            <td>Approved</td>
                        </tr>
                        <tr>
                            <td>Sports Clearance</td>
                            <td>Return all sports equipment.</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>Hostel Clearance</td>
                            <td>Vacate hostel room and clear dues.</td>
                            <td>Approved</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <!-- <section id="submission-bin">
                <h2>Submission Bin</h2>
                <p>Here you can upload and manage your clearance documents.</p>
                <form action="phpscript/submit.php" method="POST" enctype="multipart/form-data">
                    <label for="document">Upload Document:</label>
                    <input type="file" id="document" name="document" required>

                    <label for="document-type">Select Type:</label>
                    <select id="document-type" name="document_type" required>
                        <option value="">--Select Type--</option>
                        <option value="Library Clearance">Library Clearance</option>
                        <option value="Financial Clearance">Financial Clearance</option>
                        <option value="Sports Clearance">Sports Clearance</option>
                        <option value="Hostel Clearance">Hostel Clearance</option>
                    </select>
                    
                    <button type="submit">Submit</button>
                </form>
            </section> -->
            <section id="notifications">
                <h2>Notifications</h2>
                <p>No new notifications.</p>
            </section>
        </main>
    </div>
    
    <div id="logout-modal" class="modal">
        <div class="modal-content">
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <button id="confirm-logout" class="modal-btn">Yes</button>
            <button id="cancel-logout" class="modal-btn">No</button>
        </div>
    </div>

    <script src="JS/index.js"></script>
    <script src="JS/clock.js"></script>
    <script src="JS/calendar.js"></script>
    <script src="JS/logout.js"></script>
</body>
</html>
