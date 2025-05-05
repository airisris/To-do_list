<?php
    // put backend code before rendering all the html eements

    // Connect to Database
    $database = connectToDB();

    // 3. get the students data from the database
    // 3.1 - SQL command (recipe)
    $sql = "SELECT * FROM todos";
    // 3.2 - prepare SQL query (prepare your material)
    $query = $database->prepare($sql);
    // 3.3 - execute the SQL query (cook it)
    $query->execute();
    // 3.4 - fetch all the results from the query (eat)
    $todos = $query->fetchAll();
?>
<?php require "parts/header.php"; ?>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <?php if(isset($_SESSION["user"])) : ?>
            <p>Hello, <?= $_SESSION["user"]["name"]; ?></p>
        <?php else : ?>
            <div>
            <a href="/login">Login</a>
            <a href="/signup">Sign  Up</a>
            </div>
        <?php endif; ?>
        <?php foreach ($todos as $index => $todo) { ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <form method="POST" action="/label/complete">
                        <input type="hidden" name="todo_id" value="<?php echo $todo["id"]; ?>"/>
                        <input type="hidden" name="todo_completed" value="<?php echo $todo["completed"]; ?>"/>
                        <?php if ($todo["completed"] == 1) { ?>
                            <?php if(isset($_SESSION["user"])) : ?>
                                <button class="btn btn-sm btn-success"><i class="bi bi-check-square"></i></button>
                            <?php else : ?>
                                <button disabled class="btn btn-sm btn-success"><i class="bi bi-check-square"></i></button>
                            <?php endif ; ?>
                            <span class="ms-2 text-decoration-line-through"><?php echo $todo["label"] ?></span>
                        <?php } else { ?>
                            <?php if(isset($_SESSION["user"])) : ?>
                                <button class="btn btn-sm btn-light"><i class="bi bi-square"></i></button>
                            <?php else : ?>
                                <button disabled class="btn btn-sm btn-light"><i class="bi bi-square"></i></button>
                            <?php endif ; ?>
                            <span><?php echo $todo["label"] ?></span>
                        <?php } ?>
                    </form>
                </div>
                <div>
                    <?php if(isset($_SESSION["user"])) : ?>
                        <form method="POST" action="/label/delete">
                            <input type="hidden" name="todo_id" value="<?php echo $todo["id"]; ?>"/>
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    <?php endif ; ?>
                </div>
                </li>
            </ul>
        <?php } ?>

        <div class="mt-4">
            <?php if(isset($_SESSION["user"])) : ?>
                <form method="POST" action="/label/add" class="d-flex justify-content-between align-items-center">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Add new item..."
                        name="todos_label"
                        required
                    />
                    <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
                </form>
            <?php endif ; ?>
        </div>
      </div>
    </div>
    <?php if(isset($_SESSION["user"])) : ?>
        <div class="text-center">
            <a href="/logout">Log Out</a>
        </div>
    <?php endif ; ?>

    <?php require "parts/footer.php" ?>