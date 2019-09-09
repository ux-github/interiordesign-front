<?php
if ( ! function_exists('js')) {
    function js($js) {
        $js_base_path = '';
        if(is_array($js)) {
            foreach($js as $script_src) {
                if(strpos($script_src, 'http://') === false && strpos($script_src, 'https://') === false) {
                    $js_base_path = base_url();
                }
                echo "<script src=\"{$js_base_path}{$script_src}\"></script>";
            }
        } else {
            if(strpos($js, 'http://') === false && strpos($js, 'https://') === false) {
                $js_base_path = base_url();
            }
            echo "<script src=\"{$js_base_path}{$js}\"></script>";
        }
    }
}

if ( ! function_exists('css')) {
    function css($css) {
        $js_base_path = '';
        if(is_array($css)) {
            foreach($css as $style_src) {
                if(strpos($style_src, 'http://') === false && strpos($style_src, 'https://') === false) {
                    $css_base_path = base_url();
                }
                echo "<link rel='stylesheet' href=\"{$css_base_path}{$style_src}\">";
            }
        } else {
            if(strpos($css, 'http://') === false && strpos($css, 'https://') === false) {
                $css_base_path = base_url();
            }
            echo "<link rel='stylesheet' href=\"{$css_base_path}{$css}\">";
        }
    }
}

function remove_p_tags($text) {
    $text=str_ireplace('<p>','',$text);
    $text=str_ireplace('</p>','',$text);

    return $text;
}
?>