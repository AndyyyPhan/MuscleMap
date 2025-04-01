<footer class="container-fluid bg-dark text-white text-center py-4 mt-5">
    <nav class="nav justify-content-center">
        <a class="nav-link text-white" href="index.php?command=home">Home</a>
        <?php if (!empty($_SESSION["user_id"])): ?>
            <a class="nav-link text-white" href="index.php?command=workout-plan">Workout Plan</a>
        <?php else: ?>
            <a class="nav-link text-white" href="index.php?command=login">Login/Signup</a>
        <?php endif; ?>
    </nav>
    <small class="d-block mt-3 text-white">&copy; 2025 Andy Phan, Kevin Arleen</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>