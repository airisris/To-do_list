<?php
    // put the backend code for processing data

    // Connect to Database
    $database = connectToDB();

    // data from the input in index.php
    $todos_label = $_POST["todos_label"];

    // check if student_name is empty or not
    if (empty($todos_label)){
        echo "Please fill up the task field";
    } else{
        // 3. add the student name to students table
        // 3.1 SQL command (recipe)
        $sql = "INSERT INTO todos (`label`) VALUES (:label)";
        // 3.2 prepare your SQL query (prepare your material)
        $query = $database->prepare($sql);
        // 3.3 execute the SQL query (cook it)
        $query->execute([
            "label" => $todos_label
        ]);

        // 4. redirect user back to the index.php
        header("Location: /");
        exit;
    }
?>