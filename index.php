<?php include 'db_todo.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        li a {
            color: #007bff;
            text-decoration: none;
            margin-left: 5px;
            font-size: 14px;
        }

        li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <form action="add_task.php" method="post">
            <input type="text" name="task" placeholder="Tambah tugas baru" required>
            <button type="submit">Tambah</button>
        </form>

        <h2>Daftar Tugas:</h2>
        <ul>
            <?php
            include 'db_todo.php';
            $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . htmlspecialchars($row['task']) . 
                     " <a href='edit_task.php?id=" . $row['id'] . "'>Edit</a> | 
                       <a href='delete_task.php?id=" . $row['id'] . "'>Hapus</a></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
