<?php
namespace App\Controllers;

use App\Helpers\View;

class PageController
{
    public function home()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'simple_contact_form') {
            require_once __DIR__ . '/../Helpers/API_Simple_Form.php';
            exit;
        }

        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('home', [
            'title' => 'Bären-Crew – Professionelle Umzüge stressfrei & effizient',
            'description' => 'Umzüge, Entrümpelungen & Hausmeisterservice aus einer Hand. Privat- und Firmenumzüge, Möbelmontage, Wohnungsauflösungen, Renovierung, Gartenpflege & Winterdienst. Schnell, zuverlässig & transparent – jetzt anfragen!',
            'canonical' => $env['APP_URL'] . '/',
            'og_image' => $env['APP_URL'] . '/assets/images/og-image.jpg',
            'styles' => ['minifiedGlobal', 'minifiedSideBar', 'threeD_hero_cards'],
            'scripts' => ['app', 'cookies', 'scroll_button', 'sidebar_sticky', 'mobile-hero-cards'],
            'env' => $env
        ]);
    }

    public function umzuege()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['offer_calculation'])) {
            require_once __DIR__ . '/../Helpers/API_Offer.php';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../Helpers/API_Handler.php';
            exit;
        }
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('umzuege', [
            'title' => 'Bären-Crew – Professionelle Umzüge stressfrei & effizient',
            'description' => 'Umzüge, Entrümpelungen & Hausmeisterservice aus einer Hand. Privat- und Firmenumzüge, Möbelmontage, Wohnungsauflösungen, Renovierung, Gartenpflege & Winterdienst. Schnell, zuverlässig & transparent – jetzt anfragen!',
            'canonical' => $env['APP_URL'] . '/',
            'og_image' => $env['APP_URL'] . '/assets/images/og-image.jpg',
            'styles' => ['minifiedGlobal', 'minified_tier_card', 'offer_calculator', 'minifiedSideBar', 'hero_splited_s3', 'threeD_hero_cards'],
            'scripts' => ['app', 'rates_carousel', 'cookies', 'scroll_button', 'sidebar_sticky', 'mobile-hero-cards'],
            'env' => $env
        ], 'layouts/umzuege');
    }

    public function agb()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('agb', [
            'title' => 'Bären-Crew – AGB',
            'meta_description' => ['Unsere Allgemeinen Geschäftsbedingungen (AGB) regeln die Vertragsbeziehung zwischen der Bären Crew und unseren Kunden. Hier finden Sie alle wichtigen Informationen zu unseren Dienstleistungen, Preisen, Haftung und Datenschutz. Bitte lesen Sie unsere AGB sorgfältig durch, um eine transparente und vertrauensvolle Zusammenarbeit zu gewährleisten.'],
            'description' => 'Unsere Allgemeinen Geschäftsbedingungen (AGB) regeln die Vertragsbeziehung zwischen der Bären Crew und unseren Kunden. Hier finden Sie alle wichtigen Informationen zu unseren Dienstleistungen, Preisen, Haftung und Datenschutz. Bitte lesen Sie unsere AGB sorgfältig durch, um eine transparente und vertrauensvolle Zusammenarbeit zu gewährleisten.',
            'styles' => ['minifiedagb'],
            'scripts' => ['app', 'agb', 'cookies', 'scroll_button'],
            'env' => $env
        ], 'layouts/agb');
    }

    public function dsgvo()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('dsgvo', [
            'title' => 'Bären-Crew – Datenschutz',
            'meta_description' => ['Unsere Datenschutzrichtlinien regeln den Umgang mit Ihren persönlichen Daten und informieren Sie über Ihre Rechte. Hier finden Sie alle wichtigen Informationen zum Datenschutz bei der Bären Crew.'],
            'description' => 'Unsere Datenschutzrichtlinien regeln den Umgang mit Ihren persönlichen Daten und informieren Sie über Ihre Rechte. Hier finden Sie alle wichtigen Informationen zum Datenschutz bei der Bären Crew.',
            'styles' => ['minifiedagb'],
            'scripts' => ['app', 'agb', 'cookies'],
            'env' => $env
        ], 'layouts/dsgvo');
    }

    public function impressum()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('impressum', [
            'title' => 'Bären-Crew – Impressum',
            'meta_description' => ['Unser Impressum enthält alle rechtlich relevanten Informationen über die Bären Crew, einschließlich Unternehmensangaben, Kontaktinformationen und rechtlicher Hinweise.'],
            'description' => 'Unser Impressum enthält alle rechtlich relevanten Informationen über die Bären Crew, einschließlich Unternehmensangaben, Kontaktinformationen und rechtlicher Hinweise.',
            'styles' => ['minifiedImpressum'],
            'scripts' => ['app', 'cookies'],
            'env' => $env
        ], 'layouts/impressum');
    }

    public function jobs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../Helpers/API_Handler.php';
            exit;
        }
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('jobs', [
            'title' => 'Bären-Crew – Karriere & Jobs',
            'description' => 'Professionelle Umzugsfirma für stressfreie, schnelle und sichere Umzüge. Transparente Preise, erfahrenes Team & individuelle Lösungen. Jetzt unverbindlich anfragen!',
            'canonical' => $env['APP_URL'] . '/index?page=jobs',
            'og_image' => $env['APP_URL'] . '/assets/images/og-image.jpg',
            'styles' => ['minifiedGlobal', 'minifiedJob'],
            'scripts' => ['app', 'cookies'],
            'env' => $env
        ], 'layouts/jobs');
    }


}
