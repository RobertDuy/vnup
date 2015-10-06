<?php

class ViewUtils {
    public static function loadTemplate($templatePath, $data = array()){
        if (file_exists($templatePath)) {
            extract($data);
            ob_start();
            require($templatePath);
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        } else {
            trigger_error('Error: Could not load template ' . $templatePath . '!');
            exit();
        }
    }
}