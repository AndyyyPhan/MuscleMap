<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Your Personalized Workout Plan">
    <meta name="author" content="Andy Phan, Kevin Arleen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MuscleMap - Workout Plan</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .tree {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .tree ul {
            padding-top: 20px;
            position: relative;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        .tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        /* Connectors */
        .tree li::before, .tree li::after{
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 20px;
        }
        .tree li::after{
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }
        /* Remove connectors from the root node */
        .tree > ul > li::before, .tree > ul > li::after{
            border: 0;
        }
        /* Connector for first level nodes */
        .tree li:first-child::before{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }
        .tree li:last-child::after{
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 5px 0 0 0;
        }
        /* Time to add downward connectors from parent to children */
        .branch::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 20px;
        }
        .tree div {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
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
                    <li class="nav-item"><a class="nav-link" href="index.php?command=home">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

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

    <footer class="container-fluid bg-dark text-white text-center py-4">
        <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="index.php?command=home">Home</a>
            <a class="nav-link text-white" href="#">Edit Plan</a>
            <a class="nav-link text-white" href="index.php?command=workout-plan">Track a Workout</a>
        </nav>
        <small class="d-block mt-3 text-white">Copyright &copy; 2025 Andy Phan, Kevin Arleen</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('daySelect').addEventListener('change', function() {
            const selectedDay = this.value;
            // In the future, implement logic here to update the tree diagram based on the selected day
            console.log("Selected day: " + selectedDay); // Placeholder functionality
        });
    </script>
</body>
</html>
