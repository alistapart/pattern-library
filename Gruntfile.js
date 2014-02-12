/*jslint node: true */
'use strict';

module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			js_concat: {
				src: [
					'_tmpl/js/*.js',
					'_tmpl/js/**/*.js'
				],
				dest: 'dist/js/pattern-lib.js'
			},
			css_concat: {
				src: [
					'_tmpl/css/*.css',
					'_tmpl/css/**/*.css'
				],
				dest: 'dist/css/pattern-lib.css'
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			dist: {
				files: {
					'dist/js/pattern-lib.min.js': ['<%= concat.js_concat.dest %>']
				}
			}
		},
		cssmin: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			combine: {
				files: {
					'<%= concat.css_concat.dest %>':  '<%= concat.css_concat.src %>'
				}
			}
		},
		jshint: {
			files: ['Gruntfile.js'],
			options: {
				globals: {
					jQuery: true,
					console: true,
					module: true,
					document: true
				}
			}
		},
		watch: {
			files: [
				'_tmpl/*',
				'_tmpl/**/*.css',
				'_tmpl/**/*.js'
			],
			tasks: 'default'
		},
		copy: {
			main: {
				files: [
					{
						src: ['_tmpl/*.php'],
						dest: 'dist/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},
					{
						src: ['_tmpl/patterns/*'],
						dest: 'dist/patterns',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},
					{
						src: ['_tmpl/img/*'],
						dest: 'dist/img',
						expand: true,
						flatten: true,
						filter: 'isFile'
					}
				]
			}
		},
		clean: ['dist'],
		chmod: {
			options: {
			},
			readonly: {
				options: {
					mode: '555'
				},
				src: ['dist/**']
			},
			writeable: {
				options: {
					mode: '755'
				},
				src: ['dist/**']
			}
		}
	});

	grunt.registerTask('cleanup', ['chmod:writeable', 'clean', 'chmod:readonly']);


	grunt.registerTask('default', ['chmod:writeable', 'clean', 'concat', 'jshint', 'uglify', 'cssmin', 'copy', 'chmod:readonly']);
	grunt.registerTask('watch', ['chmod:writeable', 'clean', 'concat', 'jshint', 'uglify', 'cssmin', 'copy', 'chmod:readonly']);
};
