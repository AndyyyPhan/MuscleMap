<?php include(__DIR__ . '/header.php'); ?>
<main class="container my-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="zoomed-in-muscle.jpg" alt="Zoomed-in muscle image" class="img-fluid rounded shadow">
        </div>
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
                                <button class="btn btn-success w-100">Add to Workout Plan</button>
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