<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PURCHASE REQUISITION</title>
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href={{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('assets/dist/css/adminlte.min.css') }}>
    {{-- Custom css --}}
    <link rel="stylesheet" href={{ asset('assets/dist/css/custom/invoiceprint.css') }}>
    <style>
    input[type=file]::file-selector-button {
      margin-right: 20px;
      border: none;
      background: #084cdf;
      padding: 10px 20px;
      border-radius: 10px;
      color: #fff;
      cursor: pointer;
      transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
      background: #0d45a5;

    }
    body{
        background: linear-gradient(to  right, #D3F5CF 0%, #A8DBFA 0%,#635EE2 100%);
    }

    .glass{
        /* From https://css.glass */
            background: rgba(255, 255, 255, 0.22);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.7px);
            -webkit-backdrop-filter: blur(6.7px);
            border: 1px solid rgba(255, 255, 255, 0.37);
    }

    </style>

</head>

<body>
    <div class="container">
        <!--Section: Contact v.2-->
        <section class="section ">
            <div class="col-xl-12">
                <!--Section heading-->
                <br>
                <img class="glass" src="{{ url('storage/logo/log1.png') }}"></img>
                <img class="glass" src="{{ url('storage/logo/log.png') }}" align="right"></img>
                <div  class="col-xl-8 offset-xl-2 py-5">
                    <!--Section heading-->
                    <h4 align="center">PURCHASE REQUISITION </h4>
                </div>



