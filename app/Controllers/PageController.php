<?php
namespace App\Controllers;

use App\Helpers\View;

class PageController
{
    public function home()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../Helpers/API_Handler.php';
            exit;
        }
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('home', [
            'title' => 'Umzugsfirma Bären-Crew – Professionelle Umzüge stressfrei & effizient',
            'description' => 'Professionelle Umzugsfirma für stressfreie, schnelle und sichere Umzüge. Transparente Preise, erfahrenes Team & individuelle Lösungen. Jetzt unverbindlich anfragen!',
            'canonical' => $env['APP_URL'] . '/',
            'og_image' => $env['APP_URL'] . '/assets/images/og-image.jpg',
            'styles' => ['global', 'tier_card'],
            'scripts' => ['app', 'Big_carousel', 'rates_carousel', 'cookies'],
            'env' => $env
        ]);
    }

    public function agb()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('agb', [
            'title' => 'AGB',
            'meta_description' => ['Unsere Allgemeinen Geschäftsbedingungen (AGB) regeln die Vertragsbeziehung zwischen der Bären Crew und unseren Kunden. Hier finden Sie alle wichtigen Informationen zu unseren Dienstleistungen, Preisen, Haftung und Datenschutz. Bitte lesen Sie unsere AGB sorgfältig durch, um eine transparente und vertrauensvolle Zusammenarbeit zu gewährleisten.'],
            'description' => 'Unsere Allgemeinen Geschäftsbedingungen (AGB) regeln die Vertragsbeziehung zwischen der Bären Crew und unseren Kunden. Hier finden Sie alle wichtigen Informationen zu unseren Dienstleistungen, Preisen, Haftung und Datenschutz. Bitte lesen Sie unsere AGB sorgfältig durch, um eine transparente und vertrauensvolle Zusammenarbeit zu gewährleisten.',
            'styles' => ['global'],
            'scripts' => ['app', 'agb', 'cookies'],
            'env' => $env
        ], 'layouts/agb');
    }

    public function dsgvo()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('dsgvo', [
            'title' => 'Datenschutz',
            'meta_description' => ['Unsere Datenschutzrichtlinien regeln den Umgang mit Ihren persönlichen Daten und informieren Sie über Ihre Rechte. Hier finden Sie alle wichtigen Informationen zum Datenschutz bei der Bären Crew.'],
            'description' => 'Unsere Datenschutzrichtlinien regeln den Umgang mit Ihren persönlichen Daten und informieren Sie über Ihre Rechte. Hier finden Sie alle wichtigen Informationen zum Datenschutz bei der Bären Crew.',
            'styles' => ['global'],
            'scripts' => ['app', 'agb', 'cookies'],
            'env' => $env
        ], 'layouts/dsgvo');
    }

    public function impressum()
    {
        $env = parse_ini_file(__DIR__ . '/../../config/.env');

        View::render('impressum', [
            'title' => 'Impressum',
            'meta_description' => ['Unser Impressum enthält alle rechtlich relevanten Informationen über die Bären Crew, einschließlich Unternehmensangaben, Kontaktinformationen und rechtlicher Hinweise.'],
            'description' => 'Unser Impressum enthält alle rechtlich relevanten Informationen über die Bären Crew, einschließlich Unternehmensangaben, Kontaktinformationen und rechtlicher Hinweise.',
            'styles' => ['global'],
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
            'title' => 'Umzugsfirma Bären-Crew – Professionelle Umzüge stressfrei & effizient',
            'description' => 'Professionelle Umzugsfirma für stressfreie, schnelle und sichere Umzüge. Transparente Preise, erfahrenes Team & individuelle Lösungen. Jetzt unverbindlich anfragen!',
            'canonical' => $env['APP_URL'] . '/index?page=jobs',
            'og_image' => $env['APP_URL'] . '/assets/images/og-image.jpg',
            'styles' => ['global'],
            'scripts' => ['app', 'cookies'],
            'env' => $env
        ], 'layouts/jobs');
    }


}
