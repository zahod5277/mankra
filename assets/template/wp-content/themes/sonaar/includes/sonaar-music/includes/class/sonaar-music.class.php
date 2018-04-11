<?php

/**
 * sonaar-music
 */
class sonaar_Music{

    public static function get_current_lang_id($id, $post_type = 'post'){
        $current_lang_id = $id;

        if ( function_exists('icl_object_id') )
            return icl_object_id($id, $post_type, true);


        return $current_lang_id;
    }
}