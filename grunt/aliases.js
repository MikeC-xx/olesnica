'use strict';

module.exports = {

  'build-css': [
    'less',
    'postcss'
  ],

  'build-js': [
    'concat',
    'uglify'
  ],

  'build-images': [
    'svgmin'
  ],

  build: [
    'clean',
    'build-css',
    'build-js',
    'build-images',
    'copy'
  ],

  dev: [
    'build',
    'watch'
  ],

  default: [
    'build'
  ],

};
