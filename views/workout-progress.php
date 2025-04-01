<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Track Your Workout Progress">
    <meta name="author" content="Andy Phan, Kevin Arleen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MuscleMap - Workout Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .exercise-form {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .exercise-form h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .exercise-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .exercise-form input[type="number"] {
            width: 80px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .chart-placeholder {
            height: 200px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            text-align: center;
            line-height: 200px;
            color: #888;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">MuscleMap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="php/logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <h1 class="text-center my-4">Workout Progress</h1>

        <?php if (isset($success)): ?>
            <p style="color:green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="GET">
            <input type="hidden" name="command" value="showWorkoutProgress">
            <label for="daySelect">Select Day:</label>
            <select id="daySelect" name="daySelect">
                <option value="M" <?php if ($day_of_week == 'M') echo 'selected'; ?>>Monday</option>
                <option value="Tu" <?php if ($day_of_week == 'Tu') echo 'selected'; ?>>Tuesday</option>
                <option value="W" <?php if ($day_of_week == 'W') echo 'selected'; ?>>Wednesday</option>
                <option value="Th" <?php if ($day_of_week == 'Th') echo 'selected'; ?>>Thursday</option>
                <option value="F" <?php if ($day_of_week == 'F') echo 'selected'; ?>>Friday</option>
                <option value="Sat" <?php if ($day_of_week == 'Sat') echo 'selected'; ?>>Saturday</option>
                <option value="Sun" <?php if ($day_of_week == 'Sun') echo 'selected'; ?>>Sunday</option>
            </select>
            <button type="submit">Select</button>
        </form>

        <form method="POST">
            <input type="hidden" name="command" value="saveWorkoutProgress">
            <input type="hidden" name="daySelect" value= "<?php echo htmlspecialchars($day_of_week); ?>">
            <?php foreach ($exercises as $exercise): ?>
                <div class="exercise-form">
                    <h3><?php echo htmlspecialchars($exercise['exercise_name']); ?></h3>
                    <input type="hidden" name="exercise_id" value="<?php echo htmlspecialchars($exercise['exercise_id']); ?>">
                    <label for="weight">Weight (lbs):</label>
                    <input type="number" id="weight" name="weight" placeholder="Enter weight">
                    <label for="reps">Reps:</label>
                    <input type="number" id="reps" name="reps" placeholder="Enter reps">
                </div>
            <?php endforeach; ?>

            <button type="submit">Save Progress</button>
        </form>

        <div class="chart-placeholder">
            [Placeholder for Workout Progress Chart]
        </div>
    </main>

    <footer class="container-fluid bg-dark text-white text-center py-4">
        <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="index.html">Home</a>
            <a class="nav-link text-white" href="workout-plan.php?command=showWorkoutPlan">Back to Workout Plan</a>
        </nav>
        <small class="d-block mt-3">Copyright &copy; 2025 Andy Phan, Kevin Arleen</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
