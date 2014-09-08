#Cute Localhost

Cute Localhost is a single *index.php* to customize your localhost homepage.
It provides a 2 columns layout with directories on left and files on the right, including a quick search engine, and a "fresh work" icon to identify quickly folders and files you are working on.

##Installation
Just drop this file into your local server environnement document root, and set up the $root_path variable (for me it is just '/Users/vincent/Documents/Web/').
You can also set a $ignore array containing documents or paths that you would not display (for example ".DS_Store" if you're on Mac...) 

##Requirements
No other files are required. Both CSS and JS are loaded from CDNs.
Cute Localhost uses :
- [Semantic UI](https://github.com/Semantic-Org/Semantic-UI) from [Jack Lukic](https://github.com/jlukic)
- [Datatables.js](http://www.datatables.net/)
- and jQuery