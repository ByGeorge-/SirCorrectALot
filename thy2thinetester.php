<?php
/*
*	Just a brief test of using regex to see if thy thine is right.
*/

$comment = "Hello world, thy ease is mine.  hearing is fine. "; // will be the user submitted one from the json. 

$thyPattern = "/[T]hy [aeiouh]/i"; // finds if offending word exists: thy + vowel. Case insensitive.
$thyCasePattern = "/[t]hy/i"; // Grabs case of thy: thy Thy THY. 

$offenseExists = preg_match_all($thyPattern,$comment,$matches); // finds if offense exists. 
$count = count($matches[0]); // Count to see if more than 1 thy.

// Updates needed: if there is more than one offending thy. 
// Begin for else block to determine if there is more than one thy. 

if($offenseExists){
	$findThyCaseSrch = preg_match_all($thyCasePattern,$comment,$matches);
	if($count>1){
		// loop through elements and save as var
		foreach($matches[0] as $key=>$value){ // saves each thy to its own var. 
			$foundThy[$key] = $value;
		}
		$i = 0;
		$keyCount = $count - 1; // changes count's value to match array elements starting from 0
		
		while($i<=$keyCount){ // while $i is less than the number of elements in $matches array
			$explodeString = explode($foundThy[$i],$comment); // make exploded arrays
			$i++;
			echo $explodeString[1];
		}
		
	} else {
		// save single element as var.
		$foundThy = $matches[0][0];
		$explodeString = explode($foundThy,$comment);
	}
	
	// Update this block to allow for multiple thy problems. ATM, only allows for 1. 
	
	// $explodeString = explode($foundThy,$comment); // Splits string at the found Thy.
	$findOffendingWord = explode(" ",$explodeString[1]); // explodes further to get offending word.
	$offendingWord = $findOffendingWord[1]; // Saves offending word in var. 
	$letter = substr($offendingWord,0,1); // Gets first letter of offending word for use in comment. 
	// Use reddit comment markup. 
	echo "<p> '<i>$comment</i>'

	<p>Hi there! I couldn't help but notice that you've made the mistake of placing
	ye olde Englishe word 'thy' before a word beginning with a vowel (A E I O U, 
	and including H) - hence it should rather be 'thine'. 

	<p>In your case, you have written '<i>thy $offendingWord</i>' when it should be '<i>thine $offendingWord</i>'.
	You can see that the word '<i>$offendingWord</i>' begins with the vowel '<i>$letter</i>', and 
	so, follows the aforementioned rule. 

	<p>Hopefully that was helpful for you! Interested in learning more? Why not check
	out <a href='http://www.reddit.com/r/linguistics'>r/Linguistics</a>! Want to read more
	on thy/thine? Go <a href='http://en.wikipedia.org/wiki/Middle_English#Pronouns'>here</a>! (Middle english made the distinction between
	singular and plural 'you' - whereas today we use only the one form. Also
	that th sound is actually a single letter - it's called the <a href='http://en.wikipedia.org/wiki/Thorn_%28letter%29'>thorn</a>. It's still
	in use in Icelandic - which is a language that has in fact many old features
	still retained.)";
	
} else {
	echo "Nothing found. It's all good!";
}
?>


