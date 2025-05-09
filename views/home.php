<!--
Hosted on CS4640 server: https://cs4640.cs.virginia.edu/tmq6ed/musclemap/
Andy Phan's Contributions: index.html, login.html, signup.html, exercise.html, style.css
Kevin Arleen's Contributions: workout-plan.html, workout-tracker.html
-->

<?php include(__DIR__ . '/header.php'); ?>
<style>
    #muscle-container {
    position: relative;
    width: 500px;
    margin: auto;
}

.highlight-box {
    position: absolute;
    background-color: rgba(0,255,0,0.3);
    border: 2px solid green;
    display: none;
    pointer-events: none;
    z-index: 10; /* must be higher than image */
}

.explore-card {
    margin: 40px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #f8f9fa;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.explore-card h2 {
    margin-bottom: 20px;
    font-size: 28px;
    font-weight: bold;
}
</style>
<header class="container text-center my-5">
    <h1>Welcome to MuscleMap</h1>
    <p class="lead">Explore muscle groups and discover the best exercises to strengthen them.</p>
</header>

<div class="explore-card">
    <h2>Explore Exercises</h2>
    <a href="index.php?command=get-exercises-json" target="_blank" class="btn btn-outline-primary">
        View All Exercises (JSON)
    </a>
</div>

<div class="container text-center my-4">
  <div id="muscle-container">
    <img id="human-body" src="assets/human_body.png" alt="Human Body Diagram" width="500" usemap="#musclemap">
    <div id="highlight" class="highlight-box"></div>
    <map name="musclemap">
        <area shape="rect" coords="170,130,220,180" href="index.php?command=exercise&muscle=biceps" alt="Biceps" id="biceps">
        <area shape="rect" coords="130,270,180,320" href="index.php?command=exercise&muscle=quads" alt="Quads" id="quads">
        <area shape="rect" coords="270,130,350,180" href="index.php?command=exercise&muscle=triceps" alt="Triceps" id="triceps">
        <area shape="rect" coords="300,270,350,320" href="index.php?command=exercise&muscle=hamstrings" alt="Hamstrings" id="hamstrings">
        <area shape="rect" coords="300,350,350,400" href="index.php?command=exercise&muscle=calves" alt="Calves" id="calves">
        <area shape="rect" coords="330,110,380,160" href="index.php?command=exercise&muscle=back" alt="Back" id="back">
        <area shape="rect" coords="100,90,150,140" href="index.php?command=exercise&muscle=chest" alt="Chest" id="chest">
  </map>
  </div>
</div>
<script src="/tmq6ed/musclemap/assets/js/home.js"></script>       
<?php include(__DIR__ . '/footer.php');?>