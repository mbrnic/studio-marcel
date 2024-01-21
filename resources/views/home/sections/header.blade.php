<!DOCTYPE html>
<html lang="en">

<head>
    <title>Studio Marcel</title>
    <link rel="icon" href="{{ asset('item/logo-7-logo-h100.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="{{ $metaDescription }}" name="description" />
    <meta content="{{ $metaKeywords }}" name="keywords" />
    <meta content="Matej Brnić" name="author" />
    <link href="{{ asset('css/front/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap" />
    <link href="{{ asset('css/front/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/front/style.css') }}" rel="stylesheet" type="text/css" />
    <style>
        :root {
            --primary-color: #64785b;
            --primary-color-rgb: 100, 120, 91;
        }
        .darken-image {
            filter: brightness(30%);
        }
        .rounded-image {
            border-radius: 50%;
        }
    </style>
    <link href="{{ asset('css/front/coloring.css') }}" rel="stylesheet" type="text/css" />
</head>