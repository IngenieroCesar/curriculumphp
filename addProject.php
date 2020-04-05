<?php

use App\Models\Project;

if(!empty($_POST)){
    $project = new Project();
    $project->title = $_POST['title'];
    $project->description = $_POST['description'];
    $project->visible = true;
    $project->months = 12;
    $project->save();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
</head>
<body>
    <h3>Add Project</h3>
    <form action="addProject.php" method="post">
        <label for="">Title</label>
        <input type="text" name="title"><br>
        <label for="">Description</label>
        <input type="text" name="description"><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>