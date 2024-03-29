<?php
// include("../../utilities/connection.php");

function getTVSeriesData($con) {
    $sql = "SELECT * FROM popular_series";
    $result = $con->query($sql);
    $tvSeriesData = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tvSeriesData[] = $row;
        }
    }
    
    return $tvSeriesData;
}

function getSeasonsData($con, $seriesId) {
    $season_sql = "SELECT * FROM seasons WHERE tv_series_id = $seriesId";
    $season_result = $con->query($season_sql);
    $seasonsData = array();

    if ($season_result->num_rows > 0) {
        while ($season_row = $season_result->fetch_assoc()) {
            $seasonsData[] = $season_row;
        }
    }
    
    return $seasonsData;
}

function getEpisodesData($con, $seasonId) {
    $episode_sql = "SELECT * FROM episodes WHERE season_id = $seasonId";
    $episode_result = $con->query($episode_sql);
    $episodesData = array();

    if ($episode_result->num_rows > 0) {
        while ($episode_row = $episode_result->fetch_assoc()) {
            $episodesData[] = $episode_row;
        }
    }
    
    return $episodesData;
}


?>
