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

    sprite:{
      all: {
        src: 'img/sprites/raw/*.png',
        dest: 'img/sprites/spritesheet.png',
        destCss: 'css/sprite.css'
      },
    },

    responsive_images: {
      options: {
        engine: 'im',
      },
      myTask: {
        options: {
          sizes: [{
            width: 320,
          },{
            width: 480,
          },{
            width: 640,
          }]
        },
        files: [{
          expand: true,
          src: ['**.jpeg'],
          cwd: 'img/',
          dest: 'img/resized/'
        }]
      }
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
          'js/libs/ls.bgset.min.js',
          'js/libs/lazysizes.js',
          'js/doc-ready.js',
        ],
      },
    },

    uglify: {
      app: {
        files: {
          'js/app.min.js': ['js/app.js']
        }
      },
      owl: {
        files: {
          'js/owl.min.js': ['js/libs/owl.js']
        }
      },
    },

    critical: {
      test: {
        options: {
          base: '',
          css: [
            'css/app.css'
          ],
          width: 450,
          height: 800,
          minify: true,
          extract : true
        },
        src: 'http://localhost/original/',
        dest: 'css/critical.css'
      }
    },

    replace: {
      example: {
        src: ['css/critical.css'],
        dest: 'css/critical.css',
        replacements: [{
          from: '/css',
          to: 'css'
        }],
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-spritesmith');
  grunt.loadNpmTasks('grunt-responsive-images');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-text-replace');
  grunt.loadNpmTasks('grunt-critical');
  grunt.registerTask('critical-css', ['critical','replace']);
};
