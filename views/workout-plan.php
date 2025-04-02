<?php include(__DIR__ . '/header.php'); ?>

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
                    <td>
                        <a href="index.php?command=searchExercises&searchKeyword=<?php echo urlencode($exercise['exercise_name']); ?>" target="_blank">
                            <?php echo htmlspecialchars($exercise['exercise_name']); ?>
                        </a>
                    </td>
                        <td><?php echo htmlspecialchars($exercise['muscle_group']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "index.php?command=searchExercises",
                    dataType: "json",
                    data: {
                        searchKeyword: request.term
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
<?php include(__DIR__ . '/footer.php');?>
