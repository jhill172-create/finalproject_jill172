<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "student_directory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lastName = $_POST['lastName'];

// Prepare statement to call stored procedure
$stmt = $conn->prepare("CALL search_students(?)");
$stmt->bind_param("s", $lastName);
$stmt->execute();

$result = $stmt->get_result();
?>

<h1>Search Results</h1>
<a href="index.php">Return to Home</a>

<?php
if ($result->num_rows === 0) {
    echo "<p>No students found.</p>";
} else {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
            </tr>";
    }
    echo "</table>";
}

$stmt->close();
$conn->close();
?>
