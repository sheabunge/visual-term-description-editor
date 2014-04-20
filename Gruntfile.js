module.exports = function(grunt) {
	'use strict';

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		clean: {
			build: ['build']
		},

		copy: {
			build: {
				src: ['visual-term-description-editor.php', 'readme.txt', 'screenshot-*.{png|jpg}'],
				dest: 'build',
				expand: true
			}
		},

		wp_deploy: {
			deploy: {
				options: {
					plugin_slug: 'visual-term-description-editor',
					svn_user: 'bungeshea',
					build_dir: 'build'
				}
			}
		}

	});

	grunt.registerTask( 'default', ['clean:build', 'copy:build'] );
	grunt.registerTask( 'deploy', ['default', 'wp_deploy'] );
};
