// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var compass = require('gulp-compass');
var prefix = require('gulp-autoprefixer');
var imagemin  = require('gulp-imagemin');
var newer = require('gulp-newer');
//var cssBase64 = require('gulp-css-base64'); // put back in later when you figure out base64 encodes of @import font files
var livereload = require('gulp-livereload');
//var shell = require('gulp-shell') // put back in later when you figure out drush for windows

// Compile Our Sass with Bundle[d] Compass
gulp.task('sass', function() {
  return gulp.src('scss/*.scss')
    .pipe(compass({
      config_file: 'config.rb',
      bundle_exec: true,
			css: 'css',
			sass: 'scss',
			check: true,
			debug: false,
			comments: false,
			style: 'expanded',
			require: ['bourbon']
    }))
		.pipe(prefix({ cascade: true }))
		//.pipe(cssBase64())  // put back in later when you figure out base64 encodes of @import font files
    .pipe(gulp.dest('css'))
		.pipe(livereload());
});


// compress new images
gulp.task('images', function(){
	
	var imgSrc = 'build/images/*';
  var imgDest = 'images/';		
	
	return gulp.src(imgSrc)
		.pipe(newer(imgDest))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false, removeUselessStrokeAndFill: false}]
		}))	
		.pipe(gulp.dest(imgDest));
});

// Lint Task
gulp.task('lint', function() {
	return gulp.src('build/js/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
	return gulp.src('build/js/*.js')
		.pipe(concat('all.js'))
		.pipe(gulp.dest('js'))
		.pipe(rename('all.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('js'));
});

// Run drush to clear the theme registry.  // put back in later when you figure out drush for windows
/*gulp.task('drush', shell.task([
  'drush cache-clear theme-registry'
]));
*/

// Watch Files For Changes
gulp.task('watch', function() {
		
	// Watch for js changes
	gulp.watch('**/*.js', ['lint', 'scripts']);
	// Watch for scss changes
	gulp.watch('**/*.scss', ['sass']);		
	// Watch for new images
  gulp.watch('build/images/*', ['images']);
	
	// Watch php, inc and info file changes to run drush task.  // put back in later when you figure out drush for windows
  //gulp.watch('**/*.{php,inc,info}', ['drush']);  

});


// Default Task
gulp.task('default', ['sass', 'images', 'lint', 'scripts', 'watch']);