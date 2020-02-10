/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @tutorial https://github.com/ahmadawais/WPGulp
 * @author Ahmad Awais <https://twitter.com/MrAhmadAwais/>
 */

/**
 * Load WPGulp Configuration.
 *
 * TODO: Customize your project in the wpgulp.js file.
 */
const config = require( './wpgulp.config.js' );

/**
 * Load Plugins.
 *
 * Load gulp plugins and passing them semantic names.
 */
const gulp = require( 'gulp' ); // Gulp of-course.
const parameterized = require('gulp-parameterized');

// CSS related plugins.
const sass = require( 'gulp-sass' ); // Gulp plugin for Sass compilation.

// JS related plugins.
const uglify = require('gulp-uglify'); // Minifies JS files.

// HTML related plugins
const htmlbeautify = require('gulp-html-beautify'); // Beautify HTML/PHP files

// Image related plugins.
const imagemin = require( 'gulp-imagemin' ); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
const concat = require( 'gulp-concat' ); // Concatenates files.
const lineec = require( 'gulp-line-ending-corrector' ); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings).
const notify = require( 'gulp-notify' ); // Sends message notification to you.

const fs = require('fs'); // File System

/*
	CAWeb Admin Styles
*/
gulp.task('admin-css', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;

	if ( _.params.prod ) {
		buildAdminStyles(true);
	}

	if ( _.params.dev ) {
		buildAdminStyles(false);
	}

	if( noFlags ){
		buildAdminStyles(true);
		buildAdminStyles(false);
	}
}));


/*
	CAWeb Frontend Styles 
*/
gulp.task('frontend-css', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;
	var version = undefined !== _.params.ver ? [ _.params.ver ] : config.availableVers;
	
	version.forEach(function(v){
		if ( _.params.prod ) {
			buildFrontEndStyles(true, v);
		}
	
		if ( _.params.dev ) {
			buildFrontEndStyles(false, v);
		}
	
		if( noFlags ){
			buildFrontEndStyles(false, v);
			buildFrontEndStyles(true, v);
		}
	});

}));

/*
	CAWeb BootStrap Admin Styles
*/
gulp.task('bootstrap-css', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;

	if ( _.params.prod ) {
		buildBootStrapStyles(true);
	}

	if ( _.params.dev ) {
		buildBootStrapStyles(false);
	}

	if( noFlags ){
		buildBootStrapStyles(true);
		buildBootStrapStyles(false);
	}
}));

/*
	CAWeb Admin JavaScript
*/
gulp.task('admin-js', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;

	if ( _.params.prod ) {
		buildAdminJS(true);
	}

	if ( _.params.dev ) {
		buildAdminJS(false);
	}

	if( noFlags ){
		buildAdminJS(true);
		buildAdminJS(false);
	}
}));

/*
	CAWeb BootStrap Admin Styles
*/
gulp.task('bootstrap-js', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;

	if ( _.params.prod ) {
		buildBootStrapJS(true);
	}

	if ( _.params.dev ) {
		buildBootStrapJS(false);
	}

	if( noFlags ){
		buildBootStrapJS(true);
		buildBootStrapJS(false);
	}
}));

/*
	CAWeb FrontEnd JavaScript
*/
gulp.task('frontend-js', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;
	var version = undefined !== _.params.ver ? [ _.params.ver ] : config.availableVers;
	
	version.forEach(function(v){
		if ( _.params.prod ) {
			buildFrontEndJS(true, v);
		}
	
		if ( _.params.dev ) {
			buildFrontEndJS(false, v);
		}
	
		if( noFlags ){
			buildFrontEndJS(true, v);
			buildFrontEndJS(false, v);
		}
	});
	
}));

/*
	CAWeb Theme Customizer JavaScript
*/
gulp.task('customizer-js', parameterized( async function (_) {
	var noFlags = undefined === _.params.length || _.params.all;

	if ( _.params.prod ) {
		buildThemeCustomizerJS(true);
	}

	if ( _.params.dev ) {
		buildThemeCustomizerJS(false);
	}

	if( noFlags ){
		buildThemeCustomizerJS(true);
		buildThemeCustomizerJS(false);
	}

}));


gulp.task('beautify', parameterized(async function(_) {
	var options = {indentSize: 2};
	var noFlags = ! Object.getOwnPropertyNames(_.params).length || undefined === _.params.file;
	var src = ['**/*.php'];

	if( ! noFlags ){
		src = _.params.file;
	}
	
	gulp.src(src, {base: './'})
	  .pipe(htmlbeautify(options))
	  .pipe(gulp.dest('./'));
	
}));

/*
	CAWeb Build All CSS/JS and Beautify
*/
gulp.task('build', parameterized(async function(_){
	var noFlags = ! Object.getOwnPropertyNames(_.params).length || undefined !== _.params.all;
	var version = undefined !== _.params.ver ? [ _.params.ver ] : config.availableVers;

	if ( _.params.prod ) {
		// Build Admin Styles
		buildAdminStyles(true);

		// Build Admin Bootstrap Styles
		buildBootStrapStyles(true);

		version.forEach(function(v){
			// Build Frontend Styles
			buildFrontEndStyles(true, v);
					
			// Build Frontend JS
			buildFrontEndJS(true, v);
		});

		// Build Admin JS
		buildAdminJS(true);

		// Build Admin Bootstrap JS
		buildBootStrapJS(true);

		// Build Theme Customizer JS
		buildThemeCustomizerJS(true);

	}

	if ( _.params.dev ) {
		// Build Admin Styles
		buildAdminStyles(false);

		// Build Admin Bootstrap Styles
		buildBootStrapStyles(false);
		
		version.forEach(function(v){
			// Build Frontend Styles
			buildFrontEndStyles(false, v);

			// Build Frontend JS
			buildFrontEndJS(false, v);
		});

		// Build Admin JS
		buildAdminJS(false);

		// Build Admin Bootstrap JS
		buildBootStrapJS(false);

		// Build Theme Customizer JS
		buildThemeCustomizerJS(false);

	}

	if( noFlags ){
		// Build Admin Styles
		buildAdminStyles(true);
		buildAdminStyles(false);

		// Build Admin Bootstrap Styles
		buildBootStrapStyles(true);
		buildBootStrapStyles(false);

		version.forEach(function(v){
			// Build Frontend Styles
			buildFrontEndStyles(true, v);
			buildFrontEndStyles(false, v);

			// Build Frontend JS
			buildFrontEndJS(true, v);
			buildFrontEndJS(false, v);
		});
		

		// Build Admin JS
		buildAdminJS(true);
		buildAdminJS(false);

		// Build Admin Bootstrap JS
		buildBootStrapJS(true);
		buildBootStrapJS(false);

		// Build Theme Customizer JS
		buildThemeCustomizerJS(true);
		buildThemeCustomizerJS(false);

	}

}));


// Gulp Task Functions
async function buildAdminStyles( min = false){
	var buildOutputStyle = min ? 'compressed' : 'expanded';
	var minified = min ? '.min' : '';

	if( ! config.adminCSS.length )
		return;

	return gulp.src(config.adminCSS)
		.pipe(
			sass({
				outputStyle: buildOutputStyle,
			})
		)
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe(concat('admin' + minified + '.css')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Admin Styles', message: '<%= file.relative %> was created successfully.', onLast: true }) )
		.pipe(gulp.dest('./css/'));
}

async function buildBootStrapStyles( min = false ){
	var buildOutputStyle = min ? 'compressed' : 'expanded';
	var minified = min ? '.min' : '';

	if( ! config.adminBootStrapCSS.length )
		return;

	return gulp.src(config.adminBootStrapCSS)
		.pipe(
			sass({
				outputStyle: buildOutputStyle,
			})
		)
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe(concat('bootstrap' + minified + '.css')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Admin Bootstrap Styles', message: '<%= file.relative %> was created successfully.', onLast: true }) )
		.pipe(gulp.dest('./css/'));
}

async function buildFrontEndStyles( min = false, ver = config.templateVer){
	var buildOutputStyle = min ? 'compressed' : 'expanded';
	var minified = min ? '.min' : '';
	var versionDir = config.templateCSSAssetDir + 'version' + ver;
	var versionColorschemesDir = versionDir + '/colorscheme/';
	var colors = fs.readdirSync(versionColorschemesDir);

	colors.forEach(function(e){
		var f = [versionDir + '/cagov.core.css', versionColorschemesDir + e];
		f = f.concat( config.frontendCSS );
		f = f.concat( versionDir + '/custom.css' );

		if( ! f.length )
			return;

		var fileName = 'cagov-v' + ver + '-' +
			( minified ? e.replace('.css', '.min.css') : e);

		return gulp.src(f)
			.pipe(
				sass({
					outputStyle: buildOutputStyle,
				})
			)

			.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
			.pipe(concat(fileName )) // compiled file
			.pipe(gulp.dest('./css/'));
	});
}

async function buildAdminJS( min = false){
	var minified = min ? '.min' : '';

	if( ! config.adminJS.length )
		return;

	let js = gulp.src(config.adminJS)
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe(concat('admin' + minified + '.js')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Admin JavaScript', message: '<%= file.relative %> was created successfully.', onLast: true }) )


	if( min ){
		js = js.pipe(uglify());
	}

	return js.pipe(gulp.dest('./js/'));
}

async function buildBootStrapJS( min = false ){
	var minified = min ? '.min' : '';

	if( ! config.adminBootStrapJS.length )
		return;

	let js = gulp.src(config.adminBootStrapJS)
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe(concat('bootstrap' + minified + '.js')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Admin Bootstrap JavaScript', message: '<%= file.relative %> was created successfully.', onLast: true }) )


	if( min ){
		js = js.pipe(uglify());
	}

	return js.pipe(gulp.dest('./js/'));
}

async function buildFrontEndJS( min = false, ver = config.templateVer){
	var minified = min ? '.min' : '';
	var versionDir = config.JSAssetDir + 'cagov/version' + ver;
	var f = config.frontendJS.concat( [versionDir + '/cagov.core.js', versionDir + '/custom.js'], config.a11yJS);

	if( ! f.length )
		return;

	let js = gulp.src(f)
		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
		.pipe(concat('frontend-v' + ver + minified + '.js')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Front End JavaScript', message: '<%= file.relative %> was created successfully.', onLast: true }) );

	if( min ){
		js = js.pipe(uglify());
	}

	return js.pipe(gulp.dest('./js/'));
}

async function buildThemeCustomizerJS( min = false){
	var minified = min ? '.min' : '';

	if( ! config.themeCustomizer.length )
		return;

	// Theme Customizer
	let js = gulp.src(config.themeCustomizer)
		.pipe( lineec() )
		.pipe(concat('theme-customizer' + minified + '.js')) // compiled file
		.pipe( notify({ title: '✅  CAWeb Theme Customizer JavaScript', message: '<%= file.relative %> was created successfully.', onLast: true }) )
		 // Consistent Line Endings for non UNIX systems.

	if( min ){
		js = js.pipe(uglify());
	}

	js = js.pipe(gulp.dest('./js/'));

	// Theme Customizer Controls
	js = gulp.src(config.themeCustomizerControl)
		.pipe( lineec() )
		.pipe(concat('theme-customizer-controls' + minified + '.js'));

	if( min ){
		js = js.pipe(uglify());
	}

	js = js.pipe(gulp.dest('./js/'));

}

//
// DEV (Development Output)
//
gulp.task('dev', parameterized.series('frontend-css --dev', 'admin-css --dev', 'admin-js --dev', 'frontend-js --dev', 'customizer-js --dev', 'bootstrap-css --dev', 'bootstrap-js --dev' ) );

// PROD (Minified Output)
gulp.task('prod', parameterized.series('frontend-css --prod', 'admin-css --prod', 'admin-js --prod', 'frontend-js --prod', 'customizer-js --prod', 'bootstrap-css --prod', 'bootstrap-js --prod') );

//gulp.task('build', parameterized.series('dev', 'prod') );
