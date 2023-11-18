<?php
session_start();
include("../../utilities/connection.php");

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or handle as needed
    header("Location: ../register.php");
    exit();
}

// Check if the required parameters are provided in the URL
if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $media_id = $_GET['id'];

    // Get the user's ID from the session
    $username = $_SESSION['user']; // Assuming the session variable holds the username or email

    // Check if the user exists
    $checkUserQuery = "SELECT id FROM users WHERE username = '$username' OR email = '$username'";
    $userResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($userResult) === 0) {
        // Handle the case when the user doesn't exist
        echo "User does not exist.";
        exit();
    }

    $userRow = mysqli_fetch_assoc($userResult);
    $user_id = $userRow['id'];

    if ($type === 'movie') {
        // Check if the movie exists
        $checkMediaQuery = "SELECT id FROM movies WHERE id = '$media_id'";
        $mediaResult = mysqli_query($con, $checkMediaQuery);

        if (mysqli_num_rows($mediaResult) === 0) {
            // Handle the case when the movie doesn't exist
            echo "Movie does not exist.";
            exit();
        }

        // Check if the movie is already in the user's watchlist
        $checkWatchlistQuery = "SELECT * FROM watchlist WHERE user_id = $user_id AND movie_id = $media_id";
        $watchlistResult = mysqli_query($con, $checkWatchlistQuery);

        if (mysqli_num_rows($watchlistResult) > 0) {
            // Handle the case when the movie is already in the watchlist
            echo "Movie is already in your watchlist.";
            exit();
        }

        // Insert the movie into the user's watchlist
        $insertWatchlistQuery = "INSERT INTO watchlist (user_id, movie_id) VALUES ($user_id, $media_id)";
        if (!mysqli_query($con, $insertWatchlistQuery)) {
            // Handle the case where the watchlist could not be updated
            echo "Error: " . mysqli_error($con);
            exit();
        }

        // Redirect to a page or provide a response indicating success
        header("Location: ../watchlist.php");
        exit();
    } elseif ($type === 'series') {
        // Check if the series exists
        $checkMediaQuery = "SELECT id FROM tv_series WHERE id = '$media_id'";
        $mediaResult = mysqli_query($con, $checkMediaQuery);

        if (mysqli_num_rows($mediaResult) === 0) {
            // Handle the case when the series doesn't exist
            echo "Series does not exist.";
            exit();
        }

        // Check if the series is already in the user's watchlist
        $checkWatchlistQuery = "SELECT * FROM watchlist WHERE user_id = $user_id AND series_id = $media_id";
        $watchlistResult = mysqli_query($con, $checkWatchlistQuery);

        if (mysqli_num_rows($watchlistResult) > 0) {
            // Handle the case when the series is already in the watchlist
            echo "Series is already in your watchlist.";
            exit();
        }

        // Insert the series into the user's watchlist
        $insertWatchlistQuery = "INSERT INTO watchlist (user_id, series_id) VALUES ($user_id, $media_id)";
        if (!mysqli_query($con, $insertWatchlistQuery)) {
            // Handle the case where the watchlist could not be updated
            echo "Error: " . mysqli_error($con);
            exit();
        }

        // Redirect to a page or provide a response indicating success
        header("Location: ../watchlist.php");
        exit();
    } else {
        // Handle the case when an invalid media type is provided
        echo "Invalid media type.";
        exit();
    }
} else {
    // Handle the case when the required parameters are not provided in the URL
    echo "Invalid request";
}
?>
