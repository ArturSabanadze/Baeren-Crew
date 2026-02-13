<?php
namespace App\Helpers;

class View
{
    public static function render(
        string $view = 'home',
        array $data = [],
        string $layout = 'layouts/main'
    ) {
        extract($data);

        // Render the view
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            throw new \Exception("View not found: $view");
        }

        ob_start();
        include $viewFile;
        $content = ob_get_clean();

        // Render the layout
        $layoutFile = __DIR__ . '/../Views/' . $layout . '.php';
        if (!file_exists($layoutFile)) {
            throw new \Exception("Layout not found: $layout");
        }

        include $layoutFile;
    }
}
