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
  grunt.loadNpmTasks('grunt-text-replace');
  grunt.loadNpmTasks('grunt-critical');
  grunt.registerTask('critical-css', ['critical','replace']);
};
