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
        form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
        }
        label {
        display: block;
        font-size: 18px;
        margin-bottom: 10px;
        }
        input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
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
    <h1>User Registration Form</h1>
    <form action="registration.php" method="post">
      <label for="username">Username/Nickname:</label>
      <input type="text" id="username" name="username" required><br><br>
      
      <label for="avatar">Avatar:</label>
      <select id="avatar" name="avatar">
        <option value="🙂">🙂</option>
        <option value="😎">😎</option>
        <option value="😊">😊</option>
        <option value="😄">😄</option>
        <option value="😍">😍</option>
        <option value="🤩">🤩</option>
        <option value="😇">😇</option>
      </select><br><br>
      
      <input type="submit" value="Register">
    </form>
  </body>
</html>
<?php
// Start the session
session_start();
// Get the form data
$username = $_POST['username'];
$avatar = $_POST['avatar'];
// Check if the username contains any invalid characters
if (preg_match('/[!@#%&*()+=^{}\[\]\—;:\"\'<>?\/]/', $username)) {
  // If the username contains any invalid characters, show an error message
  echo "Error: Invalid characters in username. Please enter a new username.";
} else {
  // If the username is valid, set the session variables and cookies
  $_SESSION['username'] = $username;
  setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie will expire after 30 days
  
  $_SESSION['avatar'] = $avatar;
  setcookie('avatar', $avatar, time() + (86400 * 30), "/"); // Cookie will expire after 30 days
  
  // Redirect the user to the home page
  header('Location: index.php');
}
?>