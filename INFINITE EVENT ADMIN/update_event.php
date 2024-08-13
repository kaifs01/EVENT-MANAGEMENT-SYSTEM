<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate event ID
    if (isset($_POST['event_id']) && !empty($_POST['event_id'])) {
        $event_id = $_POST['event_id'];

$cn = mysqli_connect("localhost", "root", "", "infinite_event");
     
        // Prepare data for update
        $name = mysqli_real_escape_string($cn, $_POST['name']);
        $description = mysqli_real_escape_string($cn, $_POST['des']);
        $sdesc = mysqli_real_escape_string($cn, $_POST['sdes']);
        $c_date = mysqli_real_escape_string($cn, $_POST['c_date']);
        $price = mysqli_real_escape_string($cn, $_POST['price']);
        // Update event details in the database
        $query = "UPDATE events SET name = '$name', des = '$description', sdes = '$sdesc' c_date = '$c_date', price = '$price',WHERE id = $event_id";
        $result = mysqli_query($cn, $query);

        if ($result) {
            echo "Event details updated successfully.";
            header("Location: add_event1.php");
 
        } else {
            echo "Error updating event details: " . mysqli_error($cn);
        }

        // Close database cnection
        mysqli_close($cn);
    } else {
        echo "Event ID is missing.";
    }
} else {
    // Redirect or handle error if form is not submitted correctly
    echo "Form submission error.";
}
?>
