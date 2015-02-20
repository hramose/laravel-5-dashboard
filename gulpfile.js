var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');

// sass task
gulp.task('sass', function()
{
    gulp.src('resources/assets/sass/main.scss')
        .pipe(sass())
        .pipe(prefix({
            browsers: ['last 4 versions']
        }))
        .pipe(gulp.dest('public/css'));
});

// watch task
gulp.task('watch', function()
{
    gulp.watch('resources/assets/**/*.scss', ['sass'])
})

// default task
gulp.task('default', ['watch']);