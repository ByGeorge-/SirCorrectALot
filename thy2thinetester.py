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
	## update with functionality to actually submit the comment lol 
	with open('bot_comment.txt','r') as f:
		comment=f.read().replace('\n', '') # opens to string var comment
	# insert vars into comment reply
	comment.format(offending_word, letter)
