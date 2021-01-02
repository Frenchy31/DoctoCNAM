<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <h1>Récapitulatif de votre rendez-vous.</h1>
    <p>Retrouvez en pièce jointe le récapitulatif de votre rendez-vous au format PDF.</p>
    <p>Bonne journée.</p>
    <p>L'équipe DoctoCNAM</p>
</body>
</html>