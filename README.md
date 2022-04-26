# ca.gov WordPress theme
* Depends on [Generate Press](https://generatepress.com) Version: 3.0.4 (free)

*DRAFT*

* Installed on editor for drought.ca.gov
* Designed to be used with [ca-design-system-gutenberg-block](https://github.com/cagov/ca-design-system-gutenberg-blocks) 

## Features
* Performant parent theme (high lighthouse score, let's keep it that way.)
* Sets up basic page templates. 
* Designed to work with the CA Design System
* No Divi dependency

## Notes
* We are using layouts & NOT configuration settings for content pages.
* Packages and blocks might be able to move over here eventually, but still coordinating workstreams.
* We might be able to test this for cannabis on Flywheel AFTER we ship headless cannabis site.
* To activate specific color theme go Appearance > Theme Editor > expand "css" folder > click on ds-cagov.css file > comment out one of CA Design System themes themes.
	- Use one of these CA Design System themes: CAGOV, CANNABIS, DROUGHT
* To add Footer menu go to Appearance > Menus and add new "Footer Menu" (don't set it as primary menu), add necessary links to it. Then go to appearance > customize > Widgets > Footer bar and add "Navigation Menu" widget to it. In the "select menu" option select Footer menu.
* To add Agency Footer menus you will need to:
	- Create agency links menu: Go to Appearance > menus create new "agency footer" menu
	- Create social icons menu: Go Appearance > menus create new "social" menu. Important: if you want your social menu to display icons only in each menu item add specific social media icon class. Available social media icons classes are:
		- icon-facebook
		- icon-twitter
		- icon-instagram
		- icon-youtube
		- icon-pinterest
		- icon-snapchat
		- icon-linkedin
		- icon-email
		- icon-share
		- icon-vimeo
	- In Appearance > customize > widgets > Footer widget 1 > Add navigation menu block and select "agency footer" menu.
	- In Appearance > customize > widgets > Footer widget 2 > Add navigation menu block and select "social" menu.