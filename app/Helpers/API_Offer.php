<?php

header('Content-Type: application/json');

$env = parse_ini_file(__DIR__ . '/../../config/.env');
// 🔐 CONFIG
$apiKey = $env['GOOGLE_MAPS_API_KEY'] ?? 'YOUR_GOOGLE_API_KEY';

$spamDetection = $_POST['website'] ?? '';
if ($spamDetection) {
    echo json_encode(['error' => 'Spam detected']);
    exit;
}


// 📥 INPUT
$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';
$wohnflaeche = (float) ($_POST['wohnflaeche'] ?? 0);
$level = $_POST['level'] ?? 'niedrig';
$extras = $_POST['extras'] ?? [];
$parkingDistance = (int) ($_POST['parking'] ?? 0);

// 🛑 BASIC VALIDATION
if (!$from || !$to || !$wohnflaeche) {
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

// 🌍 GOOGLE DISTANCE API
$betriebsitz = urlencode('Isenstraße 15, 84562 Mettenheim, Deutschland');
$origin = urlencode($from);
$destination = urlencode($to);

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&mode=driving&units=metric&key=$apiKey";
$url_anfahrt = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$betriebsitz&destinations=$origin&mode=driving&units=metric&key=$apiKey";

$response = file_get_contents($url);
$response_anfahrt = file_get_contents($url_anfahrt);

$data = json_decode($response, true);
$data_anfahrt = json_decode($response_anfahrt, true);

$status = $data['rows'][0]['elements'][0]['status'] ?? 'MISSING';
if ($status !== 'OK') {
    echo json_encode([
        'error' => 'Distance calculation failed',
        'google_status' => $status,
        'request_url' => $url
    ]);
    exit;
}

$anfahrtDistanz = $data_anfahrt['rows'][0]['elements'][0]['distance']['value'] / 1000;
$anfahrtZeit = $data_anfahrt['rows'][0]['elements'][0]['duration']['value'] / 60;
$beförderungDistanceKm = $data['rows'][0]['elements'][0]['distance']['value'] / 1000;
$beförderungZeitMin = $data['rows'][0]['elements'][0]['duration']['value'] / 60;
$parkingEnfernungKosten = $parkingDistance * 10; // 10€ pro Meter Laufweg


// 💰 PRICING LOGIC
$basePricePerKm = 1.84;
$basePriceVerpackungMaterial = 25;
$basePriceProStunde = 95; // Beladung geschwindigkeit = 7m³/ h 

// Mobilisierungsgrad multiplier
$levelMultiplier = [
    'niedrig' => 0.38,
    'mittel' => 0.45,
    'hoch' => 0.54
];

// Extras pricing
$extrasPrices = [
    'reinigung' => 150,
    'furniture' => 200,
    'lift' => 250
];

// 🧮 CALCULATION
$anfahrtKosten = 200; // Festpreis für Anfahrt

$beförderungsFahrtKosten = ($beförderungDistanceKm > 10) ? $beförderungDistanceKm * $basePricePerKm : "kostenlos (innerhalb 10km) - 0";
$beförderungZeitKosten = ($beförderungZeitMin / 60) * $basePriceProStunde; // 3 Umzugsprofis
$volume = $wohnflaeche * $levelMultiplier[$level];
$volumeKostenBeladung = ($volume / 7) * $basePriceProStunde; // Beladung geschwindigkeit = 7m³/ h 
$volumeKostenEntladung = ($volume / 10) * $basePriceProStunde; // Entladung geschwindigkeit = 10m³/ h 


$extrasKosten = 0;
foreach ($extras as $extra) {
    if (isset($extrasPrices[$extra])) {
        $extrasKosten += $extrasPrices[$extra];
    }
}



$total = $anfahrtKosten +
    ($beförderungsFahrtKosten === "kostenlos (innerhalb 10km) - 0" ? 0 : $beförderungsFahrtKosten) +
    $beförderungZeitKosten +
    $volumeKostenBeladung +
    $basePriceVerpackungMaterial +
    $parkingEnfernungKosten +
    $extrasKosten;

// RESPONSE
echo json_encode([
    'anfahrt_km' => round($anfahrtDistanz, 2),
    'anfahrt_Zeit' => round($anfahrtZeit, 0),
    'anfahrt_Kosten' => $anfahrtKosten === "kostenlos (innerhalb 10km) - 0" ? $anfahrtKosten : round($anfahrtKosten, 2),
    'distance_km' => round($beförderungDistanceKm, 2),
    'distance_Zeit' => round($beförderungZeitMin, 0),
    'distance_Kosten' => $beförderungsFahrtKosten === "kostenlos (innerhalb 10km) - 0" ? $beförderungsFahrtKosten : round($beförderungsFahrtKosten, 2),
    'volume' => round($volume, 0),
    'volume_Kosten' => round($volumeKostenBeladung + $volumeKostenEntladung, 2),
    'total_price' => round($total, 0),
    'zusatzleistungen_breakdown' => round($extrasKosten + $parkingEnfernungKosten, 0)
]);