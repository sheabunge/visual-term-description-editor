/**
 * Adapted from wp-admin/js/post.js
 */
( function( $, counter ) {
    $( function() {
        var $content = $( '#html-tag-description' ),
            $count = $( '#description-word-count' ).find( '.word-count' ),
            prevCount = 0,
            contentEditor;

        function update() {
            var text, count;

            if ( ! contentEditor || contentEditor.isHidden() ) {
                text = $content.val();
            } else {
                text = contentEditor.getContent( { format: 'raw' } );
            }

            count = counter.count( text );

            if ( count !== prevCount ) {
                $count.text( count );
            }

            prevCount = count;
        }

        $( document ).on( 'tinymce-editor-init', function( event, editor ) {
            if ( editor.id !== 'html-tag-description' ) {
                return;
            }

            contentEditor = editor;

            editor.on( 'nodechange keyup', _.debounce( update, 1000 ) );
        } );

        $content.on( 'input keyup', _.debounce( update, 1000 ) );

        update();
    } );
} )( jQuery, new wp.utils.WordCounter() );
