//variables
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var wordlist = [];
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"},
{word: "monkey",hint: "It's a mammal"},
{word: "beetle", hint: "It's an insect"}];

window.onload = startGame();

$(".letter").click( function()
{
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$("#letterBtn").click(function()
{
    alert( $("#letterBox").val())
} );

$(".replayBtn").on("click", function()
{
    location.reload();
} );

function startGame()
{
    createLetters();
    pickWord();
    initBoard();
    updateBoard();
}

function initBoard()
{
    for(var letter in selectedWord)
    {
        board.push("_");
    }
}

function pickWord()
{
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    wordlist.push(selectedWord);
    selectedHint = words[randomInt].hint;
}

function wordlist(){
    for(var i = 0; i < wordlist.length; i++)
    {
        $("#wordlist").append("<div id='list'> "+  wordlist[i]+"</span>");
       
    }
}

function updateBoard()
{
    $("#word").empty();
    
    
    for (var i=0; i < board.length; i++){
        $("#word").append(board[i] + " ");
    }
    $("#hint").click(function()
{
    
    $("#word").append("<br />");
    $("#word").append("<span class='hint'> Hint: " + selectedHint + "</span>");
    remainingGuesses -= 1;
    updateMan();
    $('#hint').hide();
    
});
}

function createLetters()
{
    for(var letter of alphabet)
    {
        $("#letters").append("<button class = 'letter' id = '" + letter + "'>" + letter + "</button>");
    }
}

function disableButton(btn)
{
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}
function checkLetter(letter)
{
    var positions = new Array();
    for(var i = 0; i < selectedWord.length; i++)
    {
        if(letter == selectedWord[i])
        {
            positions.push(i);
        }
    }
    
    if(positions.length > 0)
    {
        updateWord(positions, letter);
        
        if(!board.includes('_'))
        {
            endGame(true);
        }
    }
    else
    {
        remainingGuesses -= 1;
        updateMan();
    }
    if(remainingGuesses <= 0)
    {
        endGame(false);
    }
}

function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan()
{
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win)
{
    $("#letters").hide();
    if(win)
    {
        $('#won').show();
    }
    else
    {
        $('#lost').show();
    }
}