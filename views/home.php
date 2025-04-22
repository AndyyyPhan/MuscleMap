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
</style>
<header class="container text-center my-5">
    <h1>Welcome to MuscleMap</h1>
    <p class="lead">Explore muscle groups and discover the best exercises to strengthen them.</p>
</header>
<div class="container text-center my-4">
  <div id="muscle-container">
    <img id="human-body" src="assets/human_body.png" alt="Human Body Diagram" width="500" usemap="#musclemap">
    <div id="highlight" class="highlight-box"></div>
    <map name="musclemap">
        <area shape="rect" coords="130,150,180,200" href="index.php?command=exercise&muscle=biceps" alt="Biceps" id="biceps">
        <area shape="rect" coords="200,300,250,350" href="index.php?command=exercise&muscle=quads" alt="Quads" id="quads">
  </map>
  </div>
</div>
<script src="/tmq6ed/musclemap/assets/js/home.js"></script>       
<?php include(__DIR__ . '/footer.php');?>