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

            <div id="preview-message" class="mt-3"></div>

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");
            const previewDiv = document.getElementById("preview-message");
            const addSelect = document.querySelector('select[name="add_exercises[]"]');
            const removeSelect = document.querySelector('select[name="remove_exercises[]"]');

            form.addEventListener("submit", function (e) {
                // Clear previous messages
                previewDiv.innerHTML = "";

                const added = Array.from(addSelect.selectedOptions).map(opt => ({
                    value: opt.value,
                    label: opt.text
                }));
                const removed = Array.from(removeSelect.selectedOptions).map(opt => ({
                    value: opt.value,
                    label: opt.text
                }));

                const addedSet = new Set(added.map(e => e.value));
                const removedSet = new Set(removed.map(e => e.value));
                const overlap = [...addedSet].filter(val => removedSet.has(val));

                // If there are overlapping exercises, stop form and show warning
                if (overlap.length > 0) {
                    e.preventDefault();

                    const overlapLabels = added
                        .filter(e => overlap.includes(e.value))
                        .map(e => e.label);

                    previewDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ⚠️ You’ve selected the same exercise(s) to <strong>add and remove</strong>:<br>
                            <ul>${overlapLabels.map(name => `<li>${name}</li>`).join('')}</ul>
                            Please resolve the conflict before updating.
                        </div>
                    `;
                    return;
                }

                // If no conflict, show preview message
                const addNames = added.map(e => e.label);
                const removeNames = removed.map(e => e.label);

                const previewHTML = `
                    <div class="alert alert-info">
                        <strong>Preview of Changes:</strong><br>
                        ${addNames.length > 0 ? `You are about to <strong>add</strong>: ${addNames.join(", ")}<br>` : ""}
                        ${removeNames.length > 0 ? `You are about to <strong>remove</strong>: ${removeNames.join(", ")}` : ""}
                    </div>
                `;

                // Display preview — then confirm if user wants to continue
                previewDiv.innerHTML = previewHTML;

                // Prevent immediate submission and ask for confirmation
                e.preventDefault();
                const confirmUpdate = confirm("Are you sure you want to make these changes?");
                if (confirmUpdate) {
                    // Submit manually if confirmed
                    form.submit();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>