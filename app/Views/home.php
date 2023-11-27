<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php $data = ['title' => 'Todo List']; ?>
        <a class="navbar-brand" href="#"><?php echo $data['title']; ?></a>
    </nav>

    <div class="container mt-4">
        <a href="/create" class="btn btn-primary mb-3">Create Todo</a> <!-- Added button -->
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Edit</th>
                    <th>Delete</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo): ?>
                    <tr>
                        <td><?php echo $todo['id']; ?></td>
                        <td><?php echo $todo['title']; ?></td>
                        <td><?php echo $todo['created_at']; ?></td>
                        <td><?php echo $todo['updated_at']; ?></td>
                        <td>
                            <form action="<?= site_url('/todo/edit/' . $todo['id']); ?>" method="get">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= site_url('/todo/delete/' . $todo['id']); ?>" method="get">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
