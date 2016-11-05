module.exports = function(grunt){

  grunt.initConfig({


    critical: {
      test: {
        options: {
          base: './',
          css: [
            'app.css'
          ],
          width: 450,
          height: 800,
          minify: true,
          extract : true
        },
        src: 'http://localhost:8888/speed-lab/',
        dest: 'critical.css'
      }
    },


    /**
    *
    * Hint les js
    *
    */
    jshint: {
      files: {
        src: [
          'js/parts/*.js',
          'js/parts/*/*.js',
          'js/parts/*/*/*.js',
          // exclude ! permet d'exclure un fichier
          '!js/parts/doc_ready_end.js',
          '!js/parts/doc_ready_start.js'
        ]
      },
    },


    /**
    *
    * Concatenne les js
    *
    */
    concat: {
      options: {
        separator: ';', // va ajouter un ; a la fin de chaque fichier
      },
      fusion: {
        src: [

          /**
          *
          *   LIBS
          *
          */

          'js/libs/loadCss.js',
          'js/libs/jquery.js',


          'js/parts/doc_ready_start.js',
          'js/parts/helpers.js',

          //'js/parts/datepicker.js',
          'js/parts/cookies_bar.js',

          'js/parts/misc.js',


          /**
          *
          *   COMPONENTS
          *
          */

          // Forms
          'js/parts/components/forms/form_contact.js',

          // Menu
          'js/parts/components/menu.js',

          // Accordion
          'js/parts/components/accordions/accordion.js',

          // Plugins
          //'js/parts/sliders.js',
          //'js/parts/mansonry.js',
          //'js/parts/mp-gallery.js',

          // Themes
          'js/parts/header.js',

          'js/parts/doc_ready_end.js'
        ],

        // Selectionne les js dans l'odre donné
        dest: 'js/app.js', // crer un fichier de destination
      },


      desktop: { // grunt concat:desktop
        src: [

          'js/libs/owl.js',

          'js/parts/doc_ready_start.js',

          'js/parts/sliders.js',

          'js/parts/doc_ready_end.js'
        ],
        // Selectionne les js dans l'odre donné
        dest: 'js/app-desktop.js', // crer un fichier de destination
      },

    },




    /**
    *
    *   Uglify
    *
    */

    uglify: {
      my_target: {
        files: {
          'js/app.min.js': ['js/app.js']
        }
      },
    },



    /**
    *
    * Ecoute les modifications dans les fichiers renseigné dans l'array files
    *
    */
    watch: {
      scripts: {
        files: ['js/parts/*.js','js/parts/*/*.js','js/parts/*/*/*.js'],
        tasks: ['concat','jshint','uglify'],
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




    perfbudget: {
      default: {
        options: {
          url: 'http://antoinebrossault.com/preprod/speed-lab/',
          key: 'A.fe2a1099fc7b5c8643542df941cd2e3d',
          location : 'ec2-eu-west-1',
          connectivity : "3GFast",
          budget: {
            visualComplete: '4000',
            SpeedIndex: '1500'
          }
        }
      }
    }

  });


  grunt.loadNpmTasks('grunt-perfbudget');
  grunt.loadNpmTasks('grunt-spritesmith');
  grunt.loadNpmTasks('grunt-critical');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('default', ['watch']);
  // créer une tache à executer, ici on execute Concat puis Uglify
};
