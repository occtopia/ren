# Ren Wordpress Starter Theme

"Ren" [stands for "clean" in Norwegian.](https://www.google.com/search?q=norwegian+for+clean&oq=norwegian+for+clean). 

It's no secret that Wordpress adds a lot of extra markup to your theme right out of the gate. Ren is a starter theme that strips just about everything extreneous out of the theme, including:

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


## SASS

The structure is based on the [7-1 pattern](https://sass-guidelin.es/#the-7-1-pattern):

+ ```/abstracts/```: variables, mixins, extends
+ ```/base/```: base styling for typography, containers, tables, etc.
+ ```/compatibility/```: browser specific fixes.
+ ```/components/```: buttons, navigation, etc.
+ ```/pages/```: page-specific styles.
+ ```/partials/```: styles for large page sections...headers, footers, sidebars, etc.
+ ```/themes/```: overall theme styles (light theme, dark theme, etc.).
+ ```/vendor/```: external library files, plugin styles, etc.


## Bourbon, Neat, Bitters

We're using [Thoughtbot's](https://thoughtbot.com/) [Bourbon](http://bourbon.io/), [Neat](http://neat.bourbon.io/), and [Bitters](http://bitters.bourbon.io/) as our framework. These are all much lighter than other frameworks and allow us to organize media queries within our selectors.

### Bourbon and Neat
Within the /vendor/ folder is a copy of \_bourbon.scss and \.neat.scss. These files link to their respective library in whatever package manager you prefer (npm, bower, w/e)...just change the links accordingly. Neat's \_settings.scss is an exception to this, as these should be changed on the fly to accomodate you own grid and container preferences.

+ Bourbon
  + ```/vendor/_bourbon.scss```
+ Neat
  + ```/vendor/_neat-settings.scss```
  + ```/vendor/_neat.scss```

### Bitters
Bitters files are contained within the /abstracts/, /base/, and /components/ folder. You can override or overwrite them. Either way, they're a good starting point.

+ Bitters
  + ```/abstracts/_variables.scss```
  + ```/base/_base.scss```
  + ```/base/_forms.scss```
  + ```/base/_layout.scss```
  + ```/base/_lists.scss```
  + ```/base/_media.scss```
  + ```/base/_tables.scss```
  + ```/base/_typography.scss```
  + ```/components/_buttons.scss```
  
# Inspiration & Shout-outs
A few themes inspired me to build this:

  + [HTML5Blank by Todd Motto](http://html5blank.com/) and [Underscores by Automattic](http://underscores.me/): two nice, clean starter Wordpress themes
  + [Rapid Springs by Paul Stonier](https://github.com/pstonier/rapid-springs): This theme actually moved me to using Bourbon, Neat, and Bitters into my own workflow.
  
# License
100% free to use and redistribute, and licensed under the MIT license. Any other snippets taken are licensed by their respective creators.

