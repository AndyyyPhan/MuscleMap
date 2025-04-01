<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Your Personalized Workout Plan">
    <meta name="author" content="Andy Phan, Kevin Arleen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MuscleMap - Workout Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .table-container {
            margin-top: 20px;
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
        <h1 class="text-center my-4">Your Workout Plan</h1>

       <form method="GET">
            <input type="hidden" name="command" value="showWorkoutPlan">
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

        <div class="ui-widget">
            <label for="search">Search Exercises: </label>
            <input id="search">
        </div>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Exercise</th>
                        <th>Muscle Group</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($workout_data)): ?>
                    <tr><td colspan="2">No exercises added yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($workout_data as $exercise): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($exercise['exercise_name']); ?></td>
                            <td><?php echo htmlspecialchars($exercise['muscle_group']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="container-fluid bg-dark text-white text-center py-4">
        <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="index.html">Home</a>
            <a class="nav-link text-white" href="workout-plan.php?command=editWorkoutPlan&daySelect=<?php echo htmlspecialchars($day_of_week); ?>">Edit Plan</a>
            <a class="nav-link text-white" href="workout-progress.php?command=showWorkoutProgress">Track a Workout</a>
        </nav>
        <small class="d-block mt-3">Copyright &copy; 2025 Andy Phan, Kevin Arleen</small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "php/search_exercises.php",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name + ' (' + item.muscle_group + ')',
                                    value: item.name,
                                    id: item.id
                                }
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    console.log("Selected: " + ui.item.value + " id:" + ui.item.id);
                    // You can do something with the selected exercise, like add it to the workout plan
                }
            });
        });
    </script>
</body>
</html>
