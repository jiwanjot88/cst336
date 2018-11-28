var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

$("#btnRock").on("click", function(){
	imgPlayer.src = 'img/rock.png';
	btnRock.style.backgroundColor = '#888888';
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnGo.style.display = 'block';
	playerChoice = "rock";
});


$("#btnPaper").on("click", function(){
	imgPlayer.src = 'img/paper.png';
	btnPaper.style.backgroundColor = '#888888';
	btnRock.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnGo.style.display = 'block';
	playerChoice = "paper";
});

$("#btnScissors").on("click", function(){
	imgPlayer.src = 'img/scissors.png';
	btnScissors.style.backgroundColor = '#888888';
	btnPaper.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
	btnGo.style.display = 'block';
	playerChoice = "scissors";
});

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
}

function deselectAll(){
	btnPaper.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
}

function go(){
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	var numChoice = Math.floor(Math.random() * 3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice == 0){
		computerChoice = "rock";
		imgComputer.src = 'img/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
		}
		else if(playerChoice == 'paper'){
			txtEndTitle.innerHTML = 'Paper covers rock.';
			txtEndMessage.innerHTML = 'You win!';
		}
		else if(playerChoice == 'scissors'){
			txtEndTitle.innerHTML = 'Rock smashes scissors.';
			txtEndMessage.innerHTML = 'You lose.';
		}
	}
	else if(numChoice == 1){
		computerChoice = "paper";
		imgComputer.src = 'img/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock'){
			txtEndTitle.innerHTML = 'Paper covers rock.';
			txtEndMessage.innerHTML = 'You lose.';
		}
		else if(playerChoice == 'paper'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
		}
		else if(playerChoice == 'scissors'){
			txtEndTitle.innerHTML = 'Scissors cuts paper.';
			txtEndMessage.innerHTML = 'You win!';
		}
	}
	else if(numChoice == 2){
		computerChoice = "scissors";
		imgComputer.src = 'img/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice == 'rock'){
			txtEndTitle.innerHTML = 'Rock smashes scissors.';
			txtEndMessage.innerHTML = 'You win!';
		}
		else if(playerChoice == 'paper'){
			txtEndTitle.innerHTML = 'Scissors cuts paper.';
			txtEndMessage.innerHTML = 'You lose.';
		}
		else if(playerChoice == 'scissors'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie game.';
		}
	}
	document.getElementById('endScreen').style.display = 'block';
}

function startGame(){
	document.getElementById('introScreen').style.display = 'none';
}

function replay(){
	document.getElementById('endScreen').style.display = 'none';
	btnGo.style.display = 'none';
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	imgPlayer.src = 'img/question.png';
	document.getElementById('imgComputer').src = 'img/question.png';
}