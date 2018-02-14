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
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-spritesmith');
};
