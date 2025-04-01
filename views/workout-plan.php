<?php include(__DIR__ . '/header.php'); ?>
<main class="container">
    <h1 class="text-center my-4">Your Workout Plan</h1>
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
    <div class="tree">
        <ul>
            <li>
                <a href="#">Day's Workout Plan</a>
                <ul>
                    <li class="branch">
                        <a href="#">Muscle Group</a>
                        <ul>
                            <li><a href="#">Exercise Name</a></li>
                        </ul>
                    </li>
                    <li class="branch">
                        <a href="#">Muscle Group</a>
                        <ul>
                            <li><a href="#">Exercise Name</a></li>
                        </ul>
                    </li>
                    <li class="branch">
                        <a href="#">Muscle Group</a>
                        <ul>
                            <li><a href="#">Exercise Name</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</main>
<?php include(__DIR__ . '/footer.php'); ?>