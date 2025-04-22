<?php include(__DIR__ . '/header.php'); ?>
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
                <input type="hidden" name="exercise_id[]" value="<?php echo htmlspecialchars($exercise['exercise_id']); ?>">
                <label for="weight">Weight (lbs):</label>
                <input type="number" id="weight" name="weight[]" placeholder="Enter weight" value="<?php echo htmlspecialchars($progress[$exercise['exercise_id']]['weight'] ?? '') ?>">
                <label for="reps">Reps:</label>
                <input type="number" id="reps" name="reps[]" placeholder="Enter reps" value="<?php echo htmlspecialchars($progress[$exercise['exercise_id']]['reps'] ?? '') ?>">
            </div>
        <?php endforeach; ?>

        <button type="submit">Save Progress</button>
    </form>

    <div class="chart-placeholder">
        [Placeholder for Workout Progress Chart]
    </div>
</main>
<?php include(__DIR__ . '/footer.php');?>
