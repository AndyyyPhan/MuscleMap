<?php include(__DIR__ . '/header.php'); ?>
<main class="container my-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="zoomed-in-muscle.jpg" alt="Zoomed-in muscle image" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-8">
            <h2 class="text-center">Recommended Exercises for <span id="muscle-group">[Muscle Name]</span></h2>

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
                <div class="col-md-6">
                    <div class="card">
                        <img src="exercise-placeholder.jpg" class="card-img-top" alt="Exercise Image">
                        <div class="card-body">
                            <h5 class="card-title">Exercise Name</h5>
                            <p class="card-text">Difficulty: Beginner</p>
                            <p class="card-text">Description: This exercise helps strengthen the targeted muscle.</p>
                            <button class="btn btn-success w-100">Add to Workout Plan</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="exercise-placeholder.jpg" class="card-img-top" alt="Exercise Image">
                        <div class="card-body">
                            <h5 class="card-title">Exercise Name</h5>
                            <p class="card-text">Difficulty: Intermediate</p>
                            <p class="card-text">Description: This exercise helps strengthen the targeted muscle.</p>
                            <button class="btn btn-success w-100">Add to Workout Plan</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="exercise-placeholder.jpg" class="card-img-top" alt="Exercise Image">
                        <div class="card-body">
                            <h5 class="card-title">Exercise Name</h5>
                            <p class="card-text">Difficulty: Advanced</p>
                            <p class="card-text">Description: This exercise helps strengthen the targeted muscle.</p>
                            <button class="btn btn-success w-100">Add to Workout Plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(__DIR__ . '/footer.php'); ?>