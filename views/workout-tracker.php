<?php include(__DIR__ . '/header.php'); ?>
<main class="container">
    <h1 class="text-center my-4">Workout Progress</h1>
    <div class="dropdown">
        <label for="daySelect">Select Day:</label>
        <select id="daySelect" name="daySelect">
            <option value="M">Monday</option>
            <option value="Tu">Tuesday</option>
            <option value="W">Wednesday</option>
            <option value="Th">Thursday</option>
            <option value="F">Friday</option>
            <option value="Sat">Saturday</option>
            <option value="Sun">Sunday</option>
        </select>
    </div>
    <div class="exercise-form">
        <h3>Exercise 1</h3>
        <label for="exercise1Weight">Weight (lbs):</label>
        <input type="number" id="exercise1Weight" name="exercise1Weight" placeholder="Enter weight">
        <label for="exercise1Reps">Reps:</label>
        <input type="number" id="exercise1Reps" name="exercise1Reps" placeholder="Enter reps">
    </div>
    <div class="exercise-form">
        <h3>Exercise 2</h3>
        <label for="exercise2Weight">Weight (lbs):</label>
        <input type="number" id="exercise2Weight" name="exercise2Weight" placeholder="Enter weight">
        <label for="exercise2Reps">Reps:</label>
        <input type="number" id="exercise2Reps" name="exercise2Reps" placeholder="Enter reps">
    </div>
    <div class="chart-placeholder">
        [Placeholder for Workout Progress Chart]
    </div>
</main>

<?php include(__DIR__ . '/footer.php'); ?>
