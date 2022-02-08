var autoprefixer       = require('gulp-autoprefixer');
var beeper             = require('beeper');
var browserSync        = require('browser-sync');
var cache              = require('gulp-cache');
var cleanCSS           = require('gulp-clean-css');
var clean              = require('gulp-clean');
var gconcat            = require('gulp-concat');
var gulp               = require('gulp');
var gutil              = require('gulp-util');
var imagemin           = require('gulp-imagemin');
var notify             = require('gulp-notify');
var plumber            = require('gulp-plumber');
var pug                = require('gulp-pug');
var rename             = require("gulp-rename");
var sass               = require('gulp-sass');
var sourcemaps         = require('gulp-sourcemaps');
var uglify             = require('gulp-uglify');
var libJS              = 'src/js/libs/**/*.js';                      
var frontEndJS         = 'src/js/start/**/*.js'; 
var pluginJS           = 'src/js/plugins/**/*.js'; 
var IE9fixJS           = 'src/js/ie9fix/**/*.js'; 
var formJS             = 'src/js/forms/**/*.js';
var jsFiles            = 'src/js/**/*.js';
var uploadFiles        = 'upload/**/*';
var fs                 = require('fs');  
var onError            = function(err) { 
    notify.onError({
      title:    "Gulp error in " + err.plugin,
      message:  err.toString()
    })(err);
    beeper(3);
    this.emit('end');
    gutil.log(gutil.colors.red(err));
};

function findKeyText(data, txt) {
  for (var i = 0; i < data.length; i++) {
    if(data[i].indexOf(txt) > -1) {
      return true;
    }
  }
  return false;
}

gulp.task('styles', (done) => {
  gulp.src('src/_styles/*.{scss,sass}')
  .pipe(sourcemaps.init())
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sass())
  .pipe(autoprefixer({
    overrideBrowserslist: [
      "last 5 version",
      "> 1%",
      "maintained node versions",
      "not dead"
    ],
    cascade: false,
    remove: false}))
  .pipe(rename({ suffix: '.min'}))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('build/css'))
  .pipe(browserSync.stream());
  done();
});

gulp.task('pug', function() {
  return gulp.src('src/*.pug')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(pug({pretty : true}))
  .pipe(gulp.dest('build/'));
});

gulp.task('clean-scripts',(done) => {
  return gulp.src('build/js',{allowEmpty:true})
      .pipe(clean({force: true}));
});

gulp.task('copy-scripts', function() {
  return gulp.src(frontEndJS)
  .pipe(plumber({ errorHandler: onError }))
  .pipe(gconcat('start.js'))
  .pipe(rename({ suffix: '.min'}))
  .pipe(gulp.dest('build/js'));
});

gulp.task('copy-libraries', function() {
  return gulp.src(libJS)
  .pipe(plumber({ errorHandler: onError }))
  .pipe(gconcat('libs.js'))
  .pipe(rename({ suffix: '.min'}))
  .pipe(gulp.dest('build/js'));
});

gulp.task('copy-plugins', function() {
  return gulp.src(pluginJS)
  .pipe(plumber({ errorHandler: onError }))
  .pipe(gconcat('plugins.js'))
  .pipe(rename({ suffix: '.min'}))
  .pipe(gulp.dest('build/js'));
});

gulp.task('ie9fix-scripts', function() {
  return gulp.src(IE9fixJS)
  .pipe(plumber({ errorHandler: onError }))
  .pipe(gconcat('ie9fix.js'))
  .pipe(rename({ suffix: '.min'}))
  .pipe(gulp.dest('build/js'));
});

gulp.task('scripts-bundle', function() {
  return gulp.src([jsFiles,'!src/js/{libs,libs/**/*.js}','!src/js/{start,start/**/*.js}','!src/js/{plugins,plugins/**/*.js}',
   '!src/js/{ie9fix,ie9fix/**/*.js}','!src/js/{forms,forms/**/*.js}','!src/js/{pagejs,pagejs/**/*.js}'])
  .pipe(plumber({ errorHandler: onError }))
  .pipe(gconcat('bundle.js'))
  .pipe(rename({ suffix: '.min'}))
  .pipe(gulp.dest('build/js'));
}); 

gulp.task('copy-form-scripts', function() {
  return gulp.src(formJS)
  .pipe(gulp.dest('build/js/forms'));
});

gulp.task('copy-page-scripts', function() {
  return gulp.src('src/js/pagejs/**/*.js')
  .pipe(gulp.dest('build/js/pagejs'));
});

gulp.task('scripts', gulp.series('clean-scripts','copy-scripts','copy-libraries','copy-plugins','ie9fix-scripts', 'copy-form-scripts','copy-page-scripts' ,'scripts-bundle'), function() {
});

gulp.task('clean-images', function() {
  return gulp.src('build/assets/img',{allowEmpty:true})
  .pipe(clean({force: true}));
});

gulp.task('copy-images', function() {
  return gulp.src('src/assets/img/**/*')
  .pipe(cache(imagemin({
    optimizationLevel: 3,
    progressive: true,
    interlaced: true})))
  .pipe(gulp.dest('build/assets/img'));
});


gulp.task('copy-local-assets', function() {
  return gulp.src(uploadFiles)
  .pipe(gulp.dest('build/upload'));
});

gulp.task('images', gulp.series('clean-images','copy-images'), function() {
});



gulp.task('clean-fonts', function() {
  
  return gulp.src(['build/assets/**/*','!build/assets/img/**/*'],{allowEmpty:true})
  .pipe(clean({force: true}));
  
});

gulp.task('copy-fonts', function() {
  return gulp.src(['src/assets/**/*','!src/assets/{img,img/**/*}'])
  .pipe(gulp.dest('build/assets/'));
});

gulp.task('fonts', gulp.series('copy-fonts'), function() {
});

gulp.task('setup-src', (done) => {
  var data = fs.readFileSync('src/index.pug').toString().split("\n");

  if(data[data.length - 1] === '') {
    data.pop();
  }

  if(data[data.length - 1].indexOf('script(src="js/bundle.min.js")') > -1) {
    data.pop();
  }

  if(!findKeyText(data, 'bundle.min.js')) {
    data.splice(data.length, 0, '    script(src="js/bundle.min.js")');
  }

  var text = data.join("\n");
  fs.writeFile('./index.pug', text, function (err) {
    if (err) throw err;
  });
  done();
});

gulp.task('reload', function(){
  browserSync.reload();
})

gulp.task('default', function() {
  console.log("Use 'gulp build' command to initialize the project files");
});

gulp.task('build', gulp.series('styles', 'pug', 'scripts', 'images', 'fonts', 'copy-local-assets', 'setup-src'), function() {
});

gulp.task('watch', function() {

  // init server
  browserSync.init({
    server: {
      proxy: "local.build",
      baseDir: "build/"
    }
  });

  gulp.watch('src/_styles/**/*', gulp.series('styles'));
  gulp.watch('src/**/*.pug', gulp.series('pug')).on('change', browserSync.reload);
  gulp.watch('src/js/**/*.js', gulp.series('scripts')).on('change', browserSync.reload);
  gulp.watch('src/assets/img/**/*', gulp.series('images')).on('change', browserSync.reload);
  gulp.watch('src/assets/fonts/**/*', gulp.series('fonts')).on('change', browserSync.reload);
  gulp.watch('src/upload/**/*', gulp.series('copy-local-assets')).on('change', browserSync.reload);
  
});

gulp.task('start', gulp.series('build','watch'), function() { 

});