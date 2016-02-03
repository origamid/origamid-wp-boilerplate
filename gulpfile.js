// Start Gulp Modules
var gulp = require('gulp'),
		sass = require('gulp-sass'),
		concat = require('gulp-concat'),
		uglify = require('gulp-uglify'),
		autoprefixer = require('gulp-autoprefixer'),
		browserSync = require('browser-sync'),
		rsync = require('gulp-rsync'),
		watch = require('gulp-watch'),
		gutil = require('gulp-util'),
		plumber = require('gulp-plumber');

// Sass Function
gulp.task('sass', function(){
	gulp.src('css/**/*.scss')
		.pipe(plumber())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		//.pipe(sass({outputStyle: 'compressed'}))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.reload({ stream: true }))
});

// Plugins Concat
gulp.task('plugins-script', function() {
	gulp.src('js/plugins/*.js')
		.pipe(plumber())
		.pipe(concat('plugins.js'))
		.pipe(uglify())
		.pipe(gulp.dest('js/'))
		.pipe(browserSync.reload({ stream: true }))
});

// Main Concat
gulp.task('main-script', function() {
	gulp.src('js/main/*.js')
		.pipe(plumber())
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest('js/'))
		.pipe(browserSync.reload({ stream: true }))
});

// BrowserSync Function
gulp.task('browserSync', function() {
  browserSync({
    server: {
      baseDir: './'
    },
  })
});

// Watch Function
gulp.task('default', ['browserSync', 'sass'], function(){
  gulp.watch('css/**/*.scss', ['sass']);
  gulp.watch('js/main/*.js', ['main-script']);
  gulp.watch('js/plugins/*.js', ['plugins-script']);
  gulp.watch('./*.html', browserSync.reload);
  gulp.watch('./*.php', browserSync.reload);
  gulp.watch('js/**/*.js', browserSync.reload);
});

// Deploy
gulp.task('deploy', function() {
	gulp.src('./')
	.pipe(rsync({
		exclude: [
			'.git*',
			'node_modules',
			'.sass-cache',
			'gulpfile.js',
			'package.json',
			'.DS_Store',
			'README.md',
			'.jshintrc',
			'*.sublime-workspace',
			'*.sublime-project'
		],
		root: './',
		hostname: 'carrolluser@aaroncarrollhealth.com',
		destination: 'aaroncarrollhealth.com/',
		recursive: true,
		clean: true,
		progress: true
	}));
});
