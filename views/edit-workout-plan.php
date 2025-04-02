<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit your Personalized Workout Plan">
    <meta name="author" content="Andy Phan, Kevin Arleen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Workout Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin-top: 20px;
        }
        select[multiple] {
            height: 200px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?command=home">MuscleMap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?command=logout">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <h1 class="text-center my-4">Edit Workout Plan for <?php echo htmlspecialchars($day_of_week); ?></h1>

        <form method="POST" action="index.php">
            <input type="hidden" name="command" value="updateWorkoutPlan">
            <input type="hidden" name="daySelect" value="<?php echo htmlspecialchars($day_of_week); ?>">

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4>Add Exercises</h4>
                    <select name="add_exercises[]" class="form-control" multiple>
                        <?php foreach ($all_exercises as $exercise): ?>
                            <option value="<?php echo $exercise['id']; ?>">
                                <?php echo htmlspecialchars($exercise['name']) . " ({$exercise['muscle_group']})"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <h4>Remove Exercises</h4>
                    <select name="remove_exercises[]" class="form-control" multiple>
                        <?php foreach ($workout_data as $exercise): ?>
                            <option value="<?php echo $exercise['exercise_id']; ?>">
                                <?php echo htmlspecialchars($exercise['exercise_name']) . " ({$exercise['muscle_group']})"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Plan</button>
            <a href="index.php?command=showWorkoutPlan&daySelect=<?php echo htmlspecialchars($day_of_week); ?>" class="btn btn-secondary">Back to Plan</a>
        </form>
    </main>

    <footer class="container-fluid bg-dark text-white text-center py-4 mt-5">
        <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="index.php?command=home">Home</a>
            <a class="nav-link text-white" href="index.php?command=showWorkoutPlan&daySelect=<?php echo htmlspecialchars($day_of_week); ?>">Workout Plan</a>
        </nav>
        <small class="d-block mt-3 text-white">Copyright &copy; 2025 Andy Phan, Kevin Arleen</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>