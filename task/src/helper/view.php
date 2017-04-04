<?php
namespace task\Helper;

class View {
    function render($file, $variables = array()) {
        extract($variables);

        ob_start();
        include __ROOT__.'/task/src/view/'.$file;
        $renderedView = ob_get_clean();

        return $renderedView;
    }
}
