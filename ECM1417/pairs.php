<html>
  <head>
    <title>Pairs Game</title>
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
        #game-board{
            background-color: #f2f2f2; 
            box-shadow: 0px 0px 5px #888888;
            display: none;
        }
        #start-button{
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 20px; 
            border: none; cursor: pointer; 
            border-radius: 5px;
        }
        .card {
        width: 23%;
        height: 23%;
        margin: 5px;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.3s;
        cursor: pointer;
        background-color: transparent;
        }

        .card:active {
        transform: scale(0.95);
        transition: transform 0.2s ease-in-out;
        }

        .card.flip {
        transform: rotateY(180deg);
        cursor: pointer;
        }

        .front,
        .back {
        background-color: #807f7f;
        width: 100%;
        height: 100%;
        padding: 10px;
        border-radius: 4px;
        position: absolute;
        backface-visibility: hidden;
        }

        .front {
        transform: rotateY(180deg);
        }
        h2 {
        font-size: 48px;
        font-weight: bold;
        color: white;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
        #play-again {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #f44336;
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 24px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
        }
        #play-again:hover {
        background-color: #d32f2f;
        }
        #timer {
        background-color: black;
        color: white;
        font-weight: bold;
        padding: 10px;
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
    <?php
        function generateEmoji($newfilename) {
            $eye_dir = "eyes/";
            $mouth_dir = "mouth/";
            $skin_dir = "skin/";

            // Load random eye image
            $eye_images = glob($eye_dir . "/*.png");
            $eye_image = $eye_images[array_rand($eye_images)];
            $eye = imagecreatefrompng($eye_image);

            // Load random mouth image
            $mouth_images = glob($mouth_dir . "/*.png");
            $mouth_image = $mouth_images[array_rand($mouth_images)];
            $mouth = imagecreatefrompng($mouth_image);

            // Load random skin image
            $skin_images = glob($skin_dir . "/skin.png");
            $skin_image = $skin_images[array_rand($skin_images)];
            $skin = imagecreatefrompng($skin_image);

            // Resize and paste eye image onto skin image
            list($eye_width, $eye_height) = getimagesize($eye_image);
            imagecopyresized($skin, $eye, 60, 30, 0, 0, 100, 100, $eye_width, $eye_height);

            // Resize and paste mouth image onto skin image
            list($mouth_width, $mouth_height) = getimagesize($mouth_image);
            imagecopyresized($skin, $mouth, 60, 130, 0, 0, 100, 100, $mouth_width, $mouth_height);

            // Save new emoji image
            imagepng($skin, $newfilename);
        }
        generateEmoji("emoji1.png");
        generateEmoji("emoji2.png");
        generateEmoji("emoji3.png");
        generateEmoji("emoji4.png");
        generateEmoji("emoji5.png");

    ?>
    <p id="timer">0</p>
    <div id="main">
    <div id="game-board">
    <button id="start-button">Start the game</button>
    <div class="card" data-image="emoji1">
        <img src="emoji1.png" class="front" alt="emoji1" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji1">
        <img src="emoji1.png" class="front" alt="emoji1" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji2">
        <img src="emoji2.png" class="front" alt="emoji2" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji2">
        <img src="emoji2.png" class="front" alt="emoji2" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji3">
        <img src="emoji3.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji3">
        <img src="emoji3.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji4">
        <img src="emoji4.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji4">
        <img src="emoji4.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji5">
        <img src="emoji5.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <div class="card" data-image="emoji5">
        <img src="emoji5.png" class="front" alt="emoji3" />
        <img src="./images/card.jpeg" class="back" alt="backofcard" />
    </div>
    <script>
        var startButton = document.getElementById('start-button');
        var gameBoard = document.getElementById('game-board');
        var cards = document.querySelectorAll(".card");
        var firstCard;
        var secondCard;
        var isFlipped = false;
        var points = 10;
        let startTime; // start time of the stopwatch
        let elapsedTime = 0; // elapsed time of the stopwatch
        var timerStarted = false;

        //add timer shit
        //when the Start Game button is clicked the startGame function is called
        startButton.addEventListener("click",startGame)
        function startGame(){
            startButton.style.display = 'none';
            gameBoard.style.display = 'display';
            shuffleCards(cards)
            cards.forEach((card) => card.addEventListener("click", flip));
            placeCardsOnGameBoard()

        }
        function shuffleCards(cards) {
            for (var i = cards.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                cards[i].style.order = j;
                cards[j].style.order = i;
            }
            return cards;
        }
        function flip(){
            if (!timerStarted){
                startTimer();
            }
            this.classList.add("flip");
            if (!isFlipped) {
                isFlipped = true;
                firstCard = this;
            } else {
                secondCard = this;
                checkMatch();
            }
        }
        function checkMatch(){
            if (firstCard.dataset.image === secondCard.dataset.image) {
                success();
            } else {
                fail();
            }
        }
        function success(){
            firstCard.removeEventListener("click", flip);
            secondCard.removeEventListener("click", flip);  
            reset();
        }
        function fail() {
            setTimeout(() => {
                firstCard.classList.remove("flip");
                secondCard.classList.remove("flip");
                reset();
            }, 1000);
        }
        function calculatePoints() {
            if (math.round(elapsedTime)>10){
                points=0;
            }else{
                points=points-math.round(elapsedTime);
            }       
        }
        function reset(){
            isFlipped = false;
            firstCard = null;
            secondCard = null;
        }
        function checkgameover(){
            var cards = document.querySelectorAll(".card");
            var cardsWithEventListners=0;
            for (var i = 0; i < cards.length; i++) {
                if (cards[i].hasEventListener("click")) {
                    cardsWithEventListners++;
                }
            }
            if(cacardsWithEventListners==0){
                gameOver();
            }
        }
        function removeGameFromScreen(){
            gameBoard.style.display = 'none'
            gameBoard.remove();
            for (let i = 0; i < cards.length; i++) {
                cards.style.display="none"
                cards[i].remove();
            }
        }
        function checkSession() {
        if (sessionStorage.getItem("username") !== null) {
            // User is in a registered session
            return true;
        } else {
            // User is not in a registered session
            return false;
        }
        }
        function gameOver(){
            //to do
            endTimer()
            removeGameFromScreen()
            let gameOverDiv = document.createElement('div');
            gameOverDiv.setAttribute('id', 'game-over');
            gameOverDiv.innerHTML = `<h2>Congratulations! You're score is ${points} .</h2>`;
            let playAgainBtn = document.createElement('button');
            playAgainBtn.setAttribute('id', 'play-again');
            playAgainBtn.innerText = 'Play Again';
            playAgainBtn.addEventListener('click', resetGame);
            gameOverDiv.appendChild(playAgainBtn);
            if(checkSession()==true){
                let submitScoreBtn = document.createElement('button');
                submitScoreBtn.setAttribute('id', 'submit-score');
                submitScoreBtn.innerText = 'Submit Score';
                submitScoreBtn.addEventListener('click', submitScore);
                gameOverDiv.appendChild(submitScoreBtn);
                }
            document.appendChild(gameOverDiv)
            gameOverDiv.style.display = 'block';

        }
        function submitScore(){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "leaderboard.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var data = "score=" + points
            xhr.send(data);
        }
        function resetGame() {
            location.reload();
        }

        function placeCardsOnGameBoard(){
            for (var i = 0; i < cards.length; i++) {
                gameBoard.appendChild(cards[i]);
            }
        }
        function displayTime() {
            const timer = document.getElementById("timer");
            timer.innerHTML = elapsedTime.toFixed(1); // display the elapsed time with one decimal place
        }
        function startTimer(){
            startTime = new Date(); // get the current time as the start time
            setInterval(() => {
                elapsedTime = (new Date() - startTime) / 1000; // calculate the elapsed time in seconds
                displayTime(); // update the timer display
            }, 100); // update the timer display every 0.1 second
        }
        function endTimer(){
            clearInterval(intervalID);
            // Calculate the elapsed time in seconds
            let elapsedTime = Math.floor((Date.now() - startTime) / 1000);

            // Display the elapsed time in seconds
            let timer = document.getElementById("timer");
            timer.innerHTML = "";
        }

    </script>
    </body>
</html>