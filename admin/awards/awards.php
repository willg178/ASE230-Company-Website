<?php
// Include your database connection code here

function getAwards() {
    // Retrieve all awards from the database
    // Modify the SQL query as per your database schema
    $query = "SELECT * FROM awards";
    $result = mysqli_query($connection, $query);
    return $result;
}

function getAwardById($id) {
    // Retrieve a specific award by ID from the database
    // Modify the SQL query as per your database schema
    $query = "SELECT * FROM awards WHERE id = $id";
    $result = mysqli_query($connection, $query);
    return $result;
}

function createAward($name, $description) {
    // Insert a new award into the database
    // Modify the SQL query as per your database schema
    $query = "INSERT INTO awards (name, description) VALUES ('$name', '$description')";
    mysqli_query($connection, $query);
    return mysqli_insert_id($connection);
}

function updateAward($id, $name, $description) {
    // Update an existing award in the database
    // Modify the SQL query as per your database schema
    $query = "UPDATE awards SET name='$name', description='$description' WHERE id=$id";
    mysqli_query($connection, $query);
}

function deleteAward($id) {
    // Delete an award from the database
    // Modify the SQL query as per your database schema
    $query = "DELETE FROM awards WHERE id=$id";
    mysqli_query($connection, $query);
}

?>
