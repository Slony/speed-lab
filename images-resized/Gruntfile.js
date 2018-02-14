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
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-responsive-images');
};
