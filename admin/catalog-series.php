<?php
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("../utilities/connection.php");

// Get current page from URL, default to 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Number of items to display per page
$itemsPerPage = 10;

// Calculate the offset for pagination
$offset = ($page - 1) * $itemsPerPage;

// Query to fetch movies with pagination

// Query to fetch TV series with pagination
$series = "SELECT tv_series.id, tv_series.title, tv_series.imdb, tv_series.rated, tv_series.poster_image, COUNT(seasons.id) AS total_seasons, SUM(seasons.num_episodes) AS total_episodes
        FROM tv_series
        LEFT JOIN seasons ON tv_series.id = seasons.tv_series_id
        GROUP BY tv_series.id LIMIT $offset, $itemsPerPage";
$tv_series = $con->query($series);


$searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
$searchTerm = '%' . mysqli_real_escape_string($con, $searchTerm) . '%';

// Modify the query to fetch TV series with pagination and search filter
$selectSeries = "SELECT tv_series.id, tv_series.title, tv_series.imdb, tv_series.rated, tv_series.poster_image,
        COUNT(seasons.id) AS total_seasons, SUM(seasons.num_episodes) AS total_episodes
        FROM tv_series
        LEFT JOIN seasons ON tv_series.id = seasons.tv_series_id
        WHERE title LIKE ? 
        GROUP BY tv_series.id 
        LIMIT $offset, $itemsPerPage";

$stmt = mysqli_prepare($con, $selectSeries);
mysqli_stmt_bind_param($stmt, "s", $searchTerm);
mysqli_stmt_execute($stmt);
$seriesdetail = mysqli_stmt_get_result($stmt);

// Query to get the total number of movies for pagination
$sql = "SELECT COUNT(*) as row_count FROM `tv_series`";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$rowCount = $row['row_count'];

// Calculate total number of pages
$totalPages = ceil($rowCount / $itemsPerPage);

// Calculate the start page for pagination
$maxVisibleButtons = 3;
$startPage = max(1, min($totalPages - $maxVisibleButtons + 1, $page - floor($maxVisibleButtons / 2)));

$selectedFilter = isset($_GET['sort']) ? $_GET['sort'] : "1";
?>

<?php 

include("./common/nav.php");
?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>TV SHOWS</h2>

						<?php 
						$sql = "SELECT COUNT(*) as row_count FROM `tv_series`";
						$result = $con->query($sql);	
$row = $result->fetch_assoc();
$rowCount = $row['row_count'];
?>

						<span class="main__title-stat"><?php echo $rowCount ?> Total</span>

						<div class="main__title-wrap">
						

						 <!-- search -->
                         <form action="#" class="main__title-form">
                         <input type="text" placeholder="Find movie / tv series.." name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path ... />
                                    </svg>
                                </button>
                            </form>

                            <!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- items -->
				<div class="col-12">
					<div class="catalog catalog--1">
					<div class="table-responsive">
						


						<table id="tvSeriesTable" class="catalog__table">
							<thead>
								<tr>
								<th>ID</th>
								<th>Title</th>
								<th>IMDb</th>
								<th>Rated</th>
								<th>Total Seasons</th>
                                <th>Total Episodes</th>
								<th>Poster</th>
                            
                           
                            
							<th>Actions</th>
								</tr>
							</thead>

							<tbody >
							<?php 
					  while ($catalog = mysqli_fetch_assoc($seriesdetail)) {
                            echo ' 
								<tr>
									<td>
										<div class="catalog__text">'.$catalog['id'].'</div>
									</td>

									<td>
										<div class="catalog__text catalog__text--green">'.$catalog['title'].'</div>
									</td>
									
									<td>
										<div class="catalog__text catalog__text--rate">'.$catalog['imdb'].'</div>
									</td>
									
									<td>
										<div class="catalog__text">'.$catalog['rated'].'</div>
									</td>	
									<td>
										<div class="catalog__text">'.$catalog['total_seasons'].'</div>
									</td>
									<td>
										<div class="catalog__text ">'.$catalog['total_episodes'].'</div>
									</td>

									<td>
									<img class="catalog__text" src="../utilities/images/poster/'.$catalog['poster_image'].'" alt="" height="100px" width="80px">
									</td>
									
									<td>
										<div class="catalog__btns">
											
											<a href="update-series.php?updateidseries='.$catalog['id'].'" class="catalog__btn catalog__btn--edit">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg>
											</a>
											
										</div>
									</td>
								</tr>

								'; }
						
								?>
							</tbody>
						</table>





						</div>

					</div>
				</div>
				<!-- end items -->




<!-- paginator -->
<div class="col-12">
    <div class="main__paginator">
        <ul class="" style="display: flex; margin-top: 5%;">

			<?php
for ($i = $startPage; $i <= min($startPage + $maxVisibleButtons - 1, $totalPages); $i++) {
    echo '<li class="paginator__item ' . ($i == $page ? 'paginator__item--active' : '') . '">';
    echo '<a href="?page=' . $i . '">' . $i . '</a>';
    echo '</li>';
}

?>


          
        </ul>
    </div>
</div>
<!-- end paginator -->





			</div>
		</div>
	</main>
	<!-- end main content -->



	<?php 
include("./common/footer.php");
	?>


</body>
</html>