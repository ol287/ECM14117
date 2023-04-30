<html>
<head>
	<title>Welcome to Pairs</title>
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
	</style>
</head>
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
	<div id="main">
		<h1>Welcome to Pairs</h1>
		<?php
        session_start();
        if (isset($_SESSION['username'])) { // check if user is using a registered session
            echo "<a href='pairs.php'><button>Click here to play</button></a>";
        } else { // user is not using a registered session
            echo "You're not using a registered session? ";
            echo "<a href='registration.php'>Register now</a>";
        }
        ?>
	</div>
</body>
</html>
