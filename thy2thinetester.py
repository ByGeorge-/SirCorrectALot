import re
# Thy in ye olde englishe should be Thine before a vowel [aeiou]

comment = "Hello world, thy ease is mine, let it be done " # put comment here
pattern = r"([tT]hy [aeiou]\w*)" # captures thy offense and offending word

offense_exists = re.search(pattern, comment)

if offense_exists:
	offense = re.match(pattern, comment).group(1)
	offense_words = offense.split()
	offending_word = offense_words[1]
	letter = offense_words[1][0] # gets first letter

	## leave a comment reply
	## update <p> tags to whatever reddit markup is for line breaks and pragraph breaks
	## update with functionality to actually submit the comment lol 
	comment = "<p> '*<"+comment+"*'\
\
	<p>Hi there! I couldn't help but notice that you've made the mistake of placing\
	ye olde Englishe word 'thy' before a word beginning with a vowel (A E I O U, \
	and including H) - hence it should rather be 'thine'. \
\
	<p>In your case, you have written '*thy "+offending_word+"*' when it should be '*thine "+offending_word+"*'.\
	You can see that the word '*"+offending_word+"*' begins with the vowel '*"+letter+"*', and \
	so, follows the aforementioned rule. \
\
	<p>Hopefully that was helpful for you! Interested in learning more? Why not check\
	out (http://www.reddit.com/r/linguistics)[r/Linguistics]! Want to read more\
	on thy/thine? Go (http://en.wikipedia.org/wiki/Middle_English#Pronouns)[here]! (Middle english made the distinction between\
	singular and plural 'you' - whereas today we use only the one form. Also\
	that th sound is actually a single letter - it's called the (http://en.wikipedia.org/wiki/Thorn_%28letter%29)[thorn]. It's still\
	in use in Icelandic - which is a language that has in fact many old features\
	still retained.)"
