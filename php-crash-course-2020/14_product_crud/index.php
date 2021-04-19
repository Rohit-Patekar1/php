<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('Select*FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('Select*FROM products ORDER BY create_date DESC');
}


$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products Crud</title>
</head>

<body>
    <h1>Products Crud</h1>

    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>

    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for products" value="<?php echo $search ?>" name="search">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <th scope="row">1</th>
                    <td><img class="thumb-image" src="<?php echo $product['image'] ?>"> </td>
                    <td><?php echo $product['title'] ?> </td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary">Edit</a>
                        <form style="display: inline-block" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>

</html>