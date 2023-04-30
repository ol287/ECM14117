<html>
  <head>
    <title>User Registration Form</title>
    <style type="text/css">
        body {
			margin: 0;
			padding: 0;
			font-family: Verdana, sans-serif;
            color: #fff;
		}
		nav {
			background-color: blue;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 10px;
		}
		nav a {
			color: white;
			font-size: 12px;
			font-weight: bold;
			margin: 0 10px;
			text-decoration: none;
		}
		nav a:hover {
			text-decoration: underline;
		}
		#avatar {
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#main {
			background-image: url('arcade-unsplash.jpg');
			background-size: cover;
			height: 100vh;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		h1 {
            color: white;
			font-size: 36px;
			margin-bottom: 50px;
		}
        #leaderboardtable {
        background-color: #ccc;
        box-shadow: 5px 5px 5px #888;
        padding: 10px;
        }
        table {
            border-spacing: 2px;
        }

        th {
            background-color: blue;
            color: white;
        }

        td, th {
            padding: 5px;
        }
    </style>
    <body>
	<nav>
		<a href="index.php">Home</a>
		<?php
			session_start();
			if (isset($_SESSION['username'])) {
				echo '<a href="pairs.php">Play Pairs</a>';
				echo '<a href="leaderboard.php">Leaderboard</a>';
			} else {
				echo '<a href="registration.php">Register</a>';
			}

			if (isset($_COOKIE['avatar'])) {
				echo '<div id="avatar">' . $_COOKIE['avatar'] . '</div>';
			}
		?>
	</nav>
    <?php
    $leaderboardData = array(
        array('username' => $_SESSION['username'], 'score' => $_POST['score']),
    );
    $filename = 'leaderboard.json';
    if (file_exists($filename)) {
        $existingData = file_get_contents($filename);
        $existingData = json_decode($existingData, true);
        if (is_array($existingData)) {
            $leaderboardData = array_merge($leaderboardData, $existingData);
        }
    }
    // Convert the array to a JSON string
    $json = json_encode($leaderboard_data);
    // Write the JSON string to a file
    file_put_contents($filename, $json);

    // Sort the leaderboard data by score (descending order)
    usort($leaderboardData, function ($a, $b) {
    return $b['score'] - $a['score'];
    });
    ?>
    <div id="main"></div>
    <div id="leaderboardtable">
      <table>
          <thead>
              <tr>
                  <th>Rank</th>
                  <th>Username</th>
                  <th>Score</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($leaderboardData as $i => $entry): ?>
                  <tr>
                      <td><?php echo $i + 1; ?></td>
                      <td><?php echo htmlspecialchars($entry['username']); ?></td>
                      <td><?php echo $entry['score']; ?></td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>
  </body>
</html>