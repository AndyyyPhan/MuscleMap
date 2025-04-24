<?php include(__DIR__ . '/header.php'); ?>
<main class="container my-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="zoomed-in-muscle.jpg" alt="Zoomed-in muscle image" class="img-fluid rounded shadow">
        </div>

        <?php if (!empty($_GET["added"])): ?>
            <div class="alert alert-success">Exercise added to your plan!</div>
        <?php endif; ?>
        
        <div class="col-md-8">
            <h2 class="text-center">Recommended Exercises for <span id="muscle-group"><?php echo htmlspecialchars(ucfirst($muscle_group)); ?></span></h2>

            <div class="text-center my-3">
                <label for="difficulty-filter" class="form-label">Filter by Difficulty:</label>
                <select id="difficulty-filter" class="form-select w-auto d-inline-block">
                    <option value="all">All</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>

            <div class="row" id="exercise-list">
                <?php foreach ($exercises as $exercise): ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="<?php echo htmlspecialchars($exercise['image_url'] ?? 'exercise-placeholder.jpg'); ?>" class="card-img-top" alt="Exercise Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($exercise['name']); ?></h5>
                                <p class="card-text">Difficulty: <?php echo htmlspecialchars($exercise['difficulty']); ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($exercise['description']); ?></p>
                                <form method="POST" action="index.php">
                                    <input type="hidden" name="command" value="addToWorkoutPlan">
                                    <input type="hidden" name="exercise_id" value="<?php echo $exercise['id']; ?>">

                                    <label for="daySelect" class="form-label">Add to Day:</label>
                                    <select name="daySelect" class="form-select mb-2" required>
                                        <option value="M">Monday</option>
                                        <option value="Tu">Tuesday</option>
                                        <option value="W">Wednesday</option>
                                        <option value="Th">Thursday</option>
                                        <option value="F">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunday</option>
                                    </select>

                                    <button type="submit" class="btn btn-success w-100">Add to Workout Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/tmq6ed/musclemap/assets/js/exercise.js"></script>
<?php include(__DIR__ . '/footer.php'); ?>