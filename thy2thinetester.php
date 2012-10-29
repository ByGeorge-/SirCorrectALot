<?php
/*
*	Just a brief test of using regex to see if thy thine is right.
*/

$comment = "Hello world, thy ease is mine."; // will be the user submitted one from the json. 
$findThy = 'thy';

$explodeString = explode($findThy,$comment); // This splits string into two and where [1] begins with the desired word after thy.

if($explodeString){
	$explodeString1 = explode(" ",$explodeString[1]);
	$wordAfterThy = $explodeString1[1]; // contains offending word.
	
	// Now the word needs to be checked if it contains a vowel via regex.
	
	$firstLetter = substr($wordAfterThy,0,1);
	$regexVowel = "/[aeiouhAEIOUH]/";
	
	// Find out if first letter is vowel via regex.
	$isVowel = preg_match($regexVowel,$firstLetter,$matches);
	if($isVowel){
		echo "<p> <i>'Quoted text goes here: ".$comment."'</i>
		<p>Hi there. I couldn't help but notice you've made the mistake of placing 'thy' before a vowel.
				<br> It changes to 'thine' before a word beginning with A E I O U and H. <br>
				But no biggie. I'll correct it for you: thy <b>".$wordAfterThy."</b> begins with the vowel
				'".$firstLetter."', hence it should be: <b>thine ".$wordAfterThy."</b>. Thank you for listening.";
	} else {
		echo "Hmm something went wrong.";
	}
} else {
	echo "nothing mate";
} 

?>