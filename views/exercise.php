<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Find the best exercises for different muscle groups and improve your workouts.">
        <meta name="author" content="Andy Phan, Kevin Arleen">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:title" content="MuscleMap - Exercise Recommendations">
        <meta property="og:type" content="website">
        <meta property="og:image" content="">
        <meta property="og:url" content="https://cs4640.cs.virginia.edu/tmq6ed/musclemap/exercise.html">
        <meta property="og:description" content="Explore muscle-specific exercises and build your fitness routine.">
        <meta property="og:site_name" content="MuscleMap">

        <title>MuscleMap - Exercise Recommendations</title>
        <link rel="stylesheet" href="styles/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <li class="nav-item"><a class="nav-link" href="login.html">Login/Signup</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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
        

        <footer class="container-fluid bg-dark text-white text-center py-4">
            <nav class="nav justify-content-center">
                <a class="nav-link text-white" href="index.html">Home</a>
                <a class="nav-link text-white" href="login.html">Login/Signup</a>
            </nav>
            <small class="d-block mt-3 text-white">Copyright &copy; 2025 Andy Phan, Kevin Arleen</small>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>