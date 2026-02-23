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
            'title' => 'Professionelle Umzugsdienstleistungen – Stressfrei & Effizient | Bären-Crew Umzüge',
            'meta_description' => ['Unsere Firma bietet professionelle Umzugsdienstleistungen, die Ihren Umzug stressfrei und effizient gestalten. Mit unserem erfahrenen Team und maßgeschneiderten Lösungen kümmern wir uns um alle Aspekte Ihres Umzugs, von der Planung bis zur Durchführung. Vertrauen Sie auf unsere Expertise, um Ihren Umzug reibungslos zu gestalten.'],
            'description' => 'Unsere Firma bietet professionelle Umzugsdienstleistungen, die Ihren Umzug stressfrei und effizient gestalten. Mit unserem erfahrenen Team und maßgeschneiderten Lösungen kümmern wir uns um alle Aspekte Ihres Umzugs, von der Planung bis zur Durchführung. Vertrauen Sie auf unsere Expertise, um Ihren Umzug reibungslos zu gestalten.',
            'styles' => ['global'],
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
            'scripts' => ['app', 'agb'],
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
            'scripts' => ['app', 'agb'],
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
            'scripts' => ['app'],
            'env' => $env
        ], 'layouts/impressum');
    }



}
