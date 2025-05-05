<?php
    // put all the delete student logic

    // Connect to Database
    $database = connectToDB();

    // data from the delete form (id)
    $todo_id = $_POST["todo_id"];

    // 3. delete the student from the students table using the student_id
    // 3.1 SQL command (recipe)
    $sql = "DELETE FROM todos WHERE id = :id";
    // 3.2 prepare your SQL query (prepare your material)
    $query = $database->prepare($sql);
    // 3.3 execute the SQL query (cook it)
    $query->execute([
        "id" => $todo_id
    ]);

    // 4. redirect the user back to the index.php
    header("Location: /");
    exit;
?>