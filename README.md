#Ren Wordpress Starter Theme
---

"Ren" [stands for "clean" in Norwegian.](https://www.google.com/search?q=norwegian+for+clean&oq=norwegian+for+clean). 

It's no secret that Wordpress adds a lot of extra markup to your theme right out of the gate. I wanted to create a stater theme that stripped just about everything extreneous out of the theme, including:

+ Generator meta tag
+ Windows Live Writer manifest link
+ RSD link
+ JSON REST API link
+ Canononical links
+ RSS feed links
+ Body classes
+ Navigation menu classes
+ Image widths (editor and featured)
+ God-awful Wordpress emojis
+ ...and much more

As expected, most of the magic happens in the functions.php file, so enable or disable whatever you need.


##SASS
---

All of your sass is based on the 7:1 pattern so your files are broken up into the following folders:

+ abstracts: variables, mixins, extends
+ base: base styling for typography, containers, tables, etc.
+ compatibility: browser specific fixes.
+ components: buttons, navigation, etc.
+ pages: page-specific styles.
+ partials: styles for large page sections...headers, footers, sidebars, etc.
+ themes: overall theme styles (light theme, dark theme, etc.)


##Bourbon, Neat, Bitters
---

Bourbon 5.0.0 and Neat 2.0.0 are set as dependences in npm, while Bitters base styles are in your /base/ folder.

