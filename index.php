<!DOCTYPE html>
<html>
<head>
    <title>Student Directory</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js"></script>
</head>
<body>
<h1>Student Directory Project</h1>
<p>Your Name</p>
<p><?php echo date("F j, Y"); ?></p>

<form method="POST" action="search.php">
    <label>Enter Last Name:</label>
    <input type="text" name="lastName" required>
    <button type="submit">Search</button>
</form>
