var gulp 			= require('gulp'),
    plumber 		= require('gulp-plumber'),
    sass 			= require('gulp-ruby-sass'),
    autoprefixer 	= require('gulp-autoprefixer'),
    minifycss 		= require('gulp-minify-css'),
    newer 			= require('gulp-newer'),
    imagemin 		= require('gulp-imagemin'),
    concat 			= require('gulp-concat'),
    git 			= require('gulp-git'),
    livereload 		= require('gulp-livereload');

var imgSrc = 'assets/images/originals/*',
	imgDest = 'assets/images';

gulp.task('styles', function(){
  	return sass('assets/scss/style.scss')
	    .on('error', function (err) {
	      	console.error('Error!', err.message);
	    })
	   	.pipe(minifycss())
	   	.pipe(gulp.dest('assets/css'))
	   	.pipe(livereload())
});

gulp.task('scripts', function() {
  	return gulp.src([
  			'assets/js/source/general.js'
  		])
    	.pipe(concat('cgcfive.js'))
    	.pipe(gulp.dest('assets/js/'));
});

gulp.task('images', function() {
  	return gulp.src(imgSrc, {base: 'assets/images/originals'})
        .pipe(newer(imgDest))
        .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
        .pipe(gulp.dest(imgDest));
});

gulp.task('default', ['styles', 'images']);

gulp.task('watch', function() {

	livereload.listen({start:true});
      // Watch .scss files
    gulp.watch('../../plugins/cgc-core/cgc-sass-framework/**',['styles']);
    gulp.watch('assets/scss/**/*', ['styles']);
    gulp.watch('assets/js/**/*', ['scripts']);

});

gulp.task('init', function(){
  	git.init();
});

gulp.task('commit', function(){
  	return gulp.src('./*')
  	.pipe(git.add())
  	.pipe(git.commit('initial commit'));
});
gulp.task('setup',['styles','init','commit']);