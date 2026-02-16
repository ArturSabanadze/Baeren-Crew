<?php
namespace App\Controllers;

use App\Helpers\View;

class PageController
{
    public function home()
    {
         $env = parse_ini_file(__DIR__ . '/../../config/.env');
        
        View::render('home', [
            'title' => 'Home',
            'meta_description' => ['Umzüge leicht gemacht '],
            'description' => 'Unsere Firma bietet professionelle Umzugsdienstleistungen, die Ihren Umzug stressfrei und effizient gestalten. Mit unserem erfahrenen Team und maßgeschneiderten Lösungen kümmern wir uns um alle Aspekte Ihres Umzugs, von der Planung bis zur Durchführung. Vertrauen Sie auf unsere Expertise, um Ihren Umzug reibungslos zu gestalten.',
            'styles' => ['global'],
            'scripts' => [ 'device_detector', 'app', 'Big_carousel' ],
            'env' => $env
        ]);
    }

}
