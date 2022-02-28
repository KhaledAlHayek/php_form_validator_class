const gulp = require("gulp"),
      prefix = require("gulp-autoprefixer"),
      sass = require("gulp-sass")(require("sass")),
      concat = require("gulp-concat"),
      srcmap = require("gulp-sourcemaps");

gulp.task("css", () => {
  return gulp.src("./sass/index.sass")
    .pipe(srcmap.init())
    .pipe(sass({outputStyle: "compressed"}).on("error", sass.logError))
    .pipe(prefix("last 2 versions"))
    .pipe(concat("index.css"))
    .pipe(srcmap.write("."))
    .pipe(gulp.dest("./css/"));
});

gulp.task("watch", () => {
  gulp.watch("./sass/index.sass", gulp.series("css"));
})