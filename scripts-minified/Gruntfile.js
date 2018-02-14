module.exports = function(grunt){
  grunt.initConfig({
    compass: {
      dev: {
        options: {
          outputStyle:'compressed',
          sassDir: 'sass',
          cssDir: 'css',
          // watch : true,  
          watch : false,
        }
      },
    },

    concat: {
      options: {
        separator: ';',
      },
      all: {
        dest: 'js/app.js',
        src: [
          'js/libs/loadCss.js',
          'js/libs/jquery.js',
          'js/libs/magnific-popup.js',
          'js/libs/async-gfont.js',
          'js/libs/owl.js',
          'js/doc-ready.js',
        ],
      },
    },

    uglify: {
      my_target: {
        files: {
          'js/app.min.js': ['js/app.js']
        }
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
};
