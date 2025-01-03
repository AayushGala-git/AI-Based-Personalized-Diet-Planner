// Select the generate button
const generateBtn = document.getElementById('generate-btn');

// Event listener for generate button click
generateBtn.addEventListener('click', function() {
    // Get the selected workout type and calories to burn
    const selectedType = document.getElementById('workout-type').value;
    const caloriesToBurn = document.getElementById('calories-to-burn').value;

    // Send an AJAX request to the server to generate workout plan
    $.ajax({
        type: 'POST',
        url: 'modul/WorkoutPlanner/generateWorkoutPlan.php',
        data: {
            workout_type: selectedType,
            calories_to_burn: caloriesToBurn
        },
        success: function(response) {
            // Update the generated workout plan
            document.getElementById('generated-plan').innerHTML = response;
        },
        error: function(xhr, status, error) {
            console.error('Request failed. Status:', status);
        }
    });
});
