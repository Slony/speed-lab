module.exports = function(grunt){
  grunt.initConfig({
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
        src: 'http://localhost:8888/speed-lab/',
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

    jshint: {
      files: {
        src: [
          'js/parts/*.js',
          'js/parts/*/*.js',
          'js/parts/*/*/*.js',
          '!js/parts/doc_ready_end.js',
          '!js/parts/doc_ready_start.js'
        ]
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
          'js/parts/doc_ready_start.js',
          'js/parts/helpers.js',
          'js/parts/cookies_bar.js',
          'js/parts/misc.js',
          'js/parts/components/forms/form_contact.js',
          'js/parts/components/menu.js',
          'js/parts/components/accordions/accordion.js',
          'js/parts/header.js',
          'js/parts/doc_ready_end.js'
        ],
      },
      desktop: {
        dest: 'js/app-desktop.js',
        src: [
          'js/libs/owl.js',
          'js/parts/doc_ready_start.js',
          'js/parts/sliders.js',
          'js/parts/doc_ready_end.js'
        ],
      },
    },

    compass: {
      dev: {
        options: {
          outputStyle:'compressed',
          sassDir: 'sass',
          cssDir: 'css',
          watch : true
        }
      },
    },

    uglify: {
      my_target: {
        files: {
          'js/app.min.js': ['js/app.js']
        }
      },
    },

    watch: {
      scripts: {
        files: ['js/parts/*.js','js/parts/*/*.js','js/parts/*/*/*.js','css/*.css','css/*/*.css', '!css/*.min.css'],
        tasks: ['concat','jshint','uglify','cssmin'],
        options: {
          spawn: false,
        },
      },
    },

    sprite:{
      all: {
        src: 'img/sprites/raw/*.png',
        dest: 'img/sprites/spritesheet.png',
        destCss: 'css/sprite.css'
      },
    },

    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      combine: {
        files: {
          'css/app.min.css': ['css/*.css','css/*/*.css','!css/desktop/*.css','!critical.css']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-text-replace');
  grunt.loadNpmTasks('grunt-spritesmith');
  grunt.loadNpmTasks('grunt-critical');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('default', ['watch']);
  grunt.registerTask('critical-css', ['critical','replace']);
};
