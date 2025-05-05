<?php
    // put all the updatr student logic

    // Connect to Database
    $database = connectToDB();

    // data from the update form
    $todo_completed = $_POST["todo_completed"];
    $todo_id = $_POST["todo_id"];

    if ($todo_completed == 1){
        // make sure the name is not empty
        // 3. update the student name
        // 3.1 SQL command (recipe)
        $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
        // 3.2 prepare your SQL query (prepare your material)
        $query = $database->prepare($sql);
        // 3.3 execute the SQL query (cook it)
        $query->execute([
            "id" => $todo_id
        ]);
    } else {
        // make sure the name is not empty
        // 3. update the student name
        // 3.1 SQL command (recipe)
        $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
        // 3.2 prepare your SQL query (prepare your material)
        $query = $database->prepare($sql);
        // 3.3 execute the SQL query (cook it)
        $query->execute([
            "id" => $todo_id
        ]);
    }

        // 4. redirect user back to the index.php
        header("Location: /");
        exit;
?>