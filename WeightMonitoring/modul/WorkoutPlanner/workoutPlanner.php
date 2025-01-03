<?php
// Include necessary files
include("../../include/session.php");
include("../../include/database.php");
include("../../include/alerts.php");

// Check if user is logged in
if (!$session_loggedin) {
    echo '<script type="text/javascript">parent.window.location.reload();</script>';
    exit();
}
?>

<section class="resume-section p-3 p-lg-5 d-flex d-column" id="workout-planner">
    <div class="my-auto">
        <h2 class="mb-0">Workout Planner</h2>
        <!-- Add dropdown to select workout type -->
        <div class="form-group">
            <label for="workout-type">Select Workout Type:</label>
            <select class="form-control" id="workout-type">
                <option value="Cardio">Cardio</option>
                <option value="Gym">Gym</option>
                <option value="Mix">Mix</option>
            </select>
        </div>

        <!-- Input for calories to burn -->
        <div class="form-group">
            <label for="calories-to-burn">Enter Calories to Burn:</label>
            <input type="number" class="form-control" id="calories-to-burn" placeholder="Calories">
        </div>

        <!-- Button to generate workout plan -->
        <button id="generate-btn" class="btn btn-primary">Generate</button>
        <br>
        <!-- Display generated workout plan -->
        <div class="generated-workout-plan">
            <br>
            <h3>Generated Workout Plan</h3>
            <ul id="generated-plan">
                <!-- Workout plan will be displayed here -->
            </ul>
        </div>

    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="modul/WorkoutPlanner/workoutPlanner.js"></script>
