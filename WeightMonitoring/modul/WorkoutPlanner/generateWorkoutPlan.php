<?php
// Function to generate workout plan for Cardio
function generateCardioWorkoutPlan($caloriesToBurn) {
    // Define calorie burning rates for each activity
    $activities = array(
        'Cycling' => 90,
        'Swimming' => 100,
        'Running' => 114,
        'Walking' => 54
    );

    $workoutPlan = '';

    // Calculate duration needed for each activity to burn desired calories
    foreach ($activities as $activity => $caloriesPer10Min) {
        $duration = ceil(($caloriesToBurn * 10) / $caloriesPer10Min); // Calculate duration in 10-minute increments
        $workoutPlan .= "$activity for  $duration minutes. <br>";
    }

    return $workoutPlan;
}

// Function to generate workout plan for Gym
function generateGymWorkoutPlan($caloriesToBurn) {
    // Define calorie burning rate for gym exercise
    $caloriesPerExercise = 40;

    $workoutPlan = '';

    // Calculate number of exercises needed to burn desired calories
    $numExercises = ceil($caloriesToBurn / $caloriesPerExercise);
    $workoutPlan .= "Do $numExercises exercises, each consisting of 3 sets of 10 Repetiton <br> Sample Exercises : <br>       Squats : 3x10 <br>      Bench Press : 3x10  <br>      Shoulder Press : 3x10  <br>      Bicep Curls : 3x10  <br>      Tricep Extensions : 3x10  <br>      Chest Flies : 3x10  <br>      Sumo Deadlift : 3x10  <br>";

    return $workoutPlan;
}

// Function to generate mixed workout plan
function generateMixWorkoutPlan($caloriesToBurn) {
    $workoutPlan = '';

    // Split calories 50-50 between Cardio and Gym
    $caloriesForCardio = $caloriesToBurn / 2;
    $caloriesForGym = $caloriesToBurn / 2;

    // Generate workout plan for Cardio
    $workoutPlan .= "Cardio: <br><br>";
    $workoutPlan .= generateCardioWorkoutPlan($caloriesForCardio);

    // Generate workout plan for Gym
    $workoutPlan .= "<br>And <br><br>Gym: <br><br>";
    $workoutPlan .= generateGymWorkoutPlan($caloriesForGym);

    return $workoutPlan;
}

// Fetch user input: calories to burn and workout type
$caloriesToBurn = $_POST['calories_to_burn'];
$workoutType = $_POST['workout_type'];

// Generate workout plan based on selected workout type
switch ($workoutType) {
    case "Cardio":
        $workoutPlan = generateCardioWorkoutPlan($caloriesToBurn);
        break;
    case "Gym":
        $workoutPlan = generateGymWorkoutPlan($caloriesToBurn);
        break;
    case "Mix":
        $workoutPlan = generateMixWorkoutPlan($caloriesToBurn);
        break;
    default:
        $workoutPlan = "Invalid preference";
}

// Output the generated workout plan
echo $workoutPlan;
?>
