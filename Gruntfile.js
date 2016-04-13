module.exports = function(grunt) {

  var options = {

    // External configs
    pkg: grunt.file.readJSON('package.json'),

    // Paths
    paths: {
      bower: 'bower_components',
      node: 'node_modules',
      dist: 'web',
      temp: '.tmp'
    }

  };

  require('time-grunt')(grunt);

  require('load-grunt-config')(grunt, { config: options });

};
