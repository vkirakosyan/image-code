let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/teams.js', 'public/js')
	.js('resources/assets/js/portfolio.js', 'public/js')
	.js('resources/assets/js/teams_one.js', 'public/js')
	.js('resources/assets/js/editteam.js', 'public/js')
	.js('resources/assets/js/photosesia.js', 'public/js')
	.js('resources/assets/js/training.js', 'public/js')
	.js('resources/assets/js/trainingedit.js', 'public/js')
	.js('resources/assets/js/service.js', 'public/js')
	.js('resources/assets/js/editservice.js', 'public/js')
	.js('resources/assets/js/contact.js', 'public/js')
	.js('resources/assets/js/lookbook.js', 'public/js')
	.js('resources/assets/js/programs.js', 'public/js')
	.js('resources/assets/js/editprograms.js', 'public/js')
	.js('resources/assets/js/events.js', 'public/js')
	.js('resources/assets/js/editevents.js', 'public/js')
	.js('resources/assets/js/dashbord.js', 'public/js')
	.js('resources/assets/js/UserTeams.js', 'public/js')
	.js('resources/assets/js/NavBarContent.js', 'public/js')
	.js('resources/assets/js/UserService.js', 'public/js')
	.js('resources/assets/js/UserLookbook.js', 'public/js')
	.js('resources/assets/js/UserPhotosesia.js', 'public/js')
	.js('resources/assets/js/UserPrograms.js', 'public/js')
	.js('resources/assets/js/UserEvents.js', 'public/js')
	.js('resources/assets/js/UserContact.js', 'public/js')
	.js('resources/assets/js/UserTraining.js', 'public/js')
	.js('resources/assets/js/UserPortfolio.js', 'public/js')
	.js('resources/assets/js/TreaningCotegory_one.js', 'public/js')
	.js('resources/assets/js/TeamCotegory_one.js', 'public/js')
	.js('resources/assets/js/slide.js', 'public/js')
	.js('resources/assets/js/lookbook_category.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
