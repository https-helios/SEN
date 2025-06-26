<?php
$host = "localhost";
$port = "5432";
$username = "zeb"; 
$password = "3303832"; 
$dbname = "sen";

try {
    // Connect to default 'postgres' database
    $dsn = "pgsql:host=$host;port=$port;dbname=postgres";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if target database exists
    $stmt = $conn->prepare("SELECT 1 FROM pg_database WHERE datname = :dbname");
    $stmt->execute([':dbname' => $dbname]);

    if ($stmt->fetch()) {
        if (!empty($allow_output)) {
            echo "Database '$dbname' already exists.\n";
        }
    } else {
        // Create the database
        $conn->exec("CREATE DATABASE \"$dbname\"");
        if (!empty($allow_output)) {
            echo "Database '$dbname' created successfully.\n";
        }
    }

    // Connect to the target database
    $dsnTarget = "pgsql:host=$host;port=$port;dbname=$dbname";
    $db = new PDO($dsnTarget, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($allow_output)) {
        echo "Connected to '$dbname' successfully.\n";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
