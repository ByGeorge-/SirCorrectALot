<?php
/*
*	Just a brief test of using regex to see if thy thine is right.
*/

$comment = "Hello world, thy ease is mine."; // will be the user submitted one from the json. 

$thyPattern = "/[T]hy [aeiouh]/i"; // finds if offending word exists.


$offenseExists = preg_match($thyPattern,$comment,$matches);
$findThyCase = "/[t]hy/i"; // Grabs case of thy: thy Thy THY. 
$findThyCaseSrch = preg_match($findThyCase,$comment,$matches); 
$explodingThy = $matches[0]; // Saves found thy as var. 

// Updates needed: if there is more than one offending thy. 

if($offenseExists){
	$explodeString = explode($explodingThy,$comment); // Splits string at the found Thy.
	$findOffendingWord = $explodeString[1]; // Saves 2nd part of split beginning with offending word. 
	$findOffendingWord = explode(" ",$findOffendingWord); // explodes further to get offending word.
	$offendingWord = $findOffendingWord[1]; // Saves offending word in var. 
	$letter = substr($offendingWord,0,1); // Gets first letter of offending word for use in comment. 
	
	echo "<p> <i>'Quoted text goes here: ".$comment."'</i>
		<p>Hi there. I couldn't help but notice you've made the mistake of placing 'thy' before a vowel.
				<br> It changes to 'thine' before a word beginning with A E I O U and H. <br>
				But no biggie. I'll correct it for you: thy <b>".$offendingWord."</b> begins with the vowel
				'".$letter."', hence it should be: <b>thine ".$offendingWord."</b>. Thank you for listening.";
	
} else {
	echo "No findy";
}
?>