# gentelella

## The Theme
Gentellela Admin is a free to use Bootstrap admin template.
This template uses the default Bootstrap 3 styles along with a variety of powerful jQuery plugins and tools to create a powerful framework for creating admin panels or back-end dashboards.

Theme uses several libraries for charts, calendar, form validation, wizard style interface, off-canvas navigation menu, text forms, date range, upload area, form autocomplete, range slider, progress bars, notifications and much more.

The original repository for this theme is found [Here](https://github.com/puikinsh/gentelella).

## Theme Demo
![Gentelella Bootstrap Admin Template](https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/gentelella-admin-template-preview.jpg "Gentelella Theme Browser Preview")


## This Repository
This repository is made because I am lazy in doing it again. It is designed to allow quick modifications on the template without writing the HTML codes again and again. This repository was a result of a "nothing to do" day and "way too much time".



## Installation

Our goal is to make it installable on different Package Manager! Do you want to use it on your favorite Package Manager and you know how? Pull request all the way!

As of now, this is some installation available:
**Prerequisite**
Before you can run this repository, you need to ensure that the php-cli is accessible in the command line. You can test this by opening your command line and type in the command `php -v`. If the command spits out the version as output, then you are good to go. But if not, you need to add the `php-cli` or `php.exe` (in windows) to the path.
**Bower**
```
bower install
```
**npm**
```
npm install
```
## Features
The development framework relies on gulp, which also features everything you need for quick development. Supported features are as follows

| Feature | Compiles | Source | Destination | Description |
|--------------|----------|--------------------|---------------------|------------------------------------------------------------------------------------|
| PHP | HTML | src/php/ | dist/ | Compiles from PHP to HTML to allow easy modification and reduce code redundancy |
| SCSS | CSS | src/scss/main.scss | assets/css/main.css | Compiles from SCSS/SASS to CSS to allow easy modification and maintainance of CSS. |
| CoffeeScript | JS | src/coffee/ | assets/js/ | Compiles from CoffeeScript to JS. Allows quick modification and readability |

The technology above allows me to work on front-end faster because I am lazy. This is not built for others I built this mainly for myself. If you like it, then your welcome.

You can simply activate all this feature by following the simple steps below:
* Open command line
* `cd` to this Project
* run the command `gulp`

NOTE: Edit only in src.

### Enjoy!
