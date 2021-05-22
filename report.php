<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
        <br>
        <h2 class="bg-primary text-white text-center">Add your Report</h2>
        <div class="col-lg-8 m-auto d-block">
            <form action="upload.php" method="post" enctypr="multipart/form-data">
                <div class="form-group">
                    <label for="user">username:</label>
                    <input type="text" name="username" id="user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file">image:</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <input type="submit" name="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
</body>
</html>