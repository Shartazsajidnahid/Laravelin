@extends('general_user.layouts.main')
@section('main-section')

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="Branch Homepages">
        <meta name="description" content="">
        <meta name="page_type" content="np-template-header-footer-from-plugin">
        <title>All Divisions</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('css/alldivision.css') }}" media="screen">
        <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>

        <meta name="generator" content="Nicepage 4.8.2, nicepage.com">
        <link id="u-theme-google-font" rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


        <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site2",
		"logo": "images/logo.png"
}</script>
        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="All Divisions">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
    </head>

    <body class="u-body u-xl-mode">
        <section class="u-clearfix  u-section-1" id="sec-1d72">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h2 class="u-text u-text-1"><b>Division Homepages</b></h2>
                <div class="u-expanded-width u-list u-list-1">
                    <div class="u-repeater u-repeater-1">

                        @foreach ($branches as $branch)
                            <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                    <h4 style="text-transform:uppercase"class="u-align-left u-text u-text-2 text">
                                        <b>{{ $branch->char }}</b>
                                    </h4>
                                    @foreach ($branch->branches as $br)
                                        <div class="container mt-3">
                                            <p>
                                                <a
                                                    href="{{ route('general.team', ['home' => 'sys_branches', 'id' => $br->id]) }}">
                                                    <b>{{ $br->name }}</b>
                                                </a>
                                                <a data-toggle="collapse" href="#{{ $br->href }}" role="button">
                                                    <span class="fa fa-angle-down"></span>
                                                </a>

                                            <div class="collapse" id="{{ $br->href }}">
                                                <div class="card card-body">
                                                    @foreach ($br->sub_branches as $sub_br)
                                                        <div class="container mt-1">
                                                            <a
                                                                href="{{ route('general.team', ['home' => 'sys_departments', 'id' => $sub_br->id]) }}">
                                                                <b>{{ $sub_br->name }}</b>
                                                            </a>
                                                            <a data-toggle="collapse" href="#{{ $sub_br->href }}"
                                                                target="_blank">
                                                                <span class="fa fa-angle-down"></span>
                                                            </a>
                                                            <div class="collapse" id="{{ $sub_br->href }}">
                                                                <div class="card card-body">
                                                                    @foreach ($sub_br->units as $unts)
                                                                        <div class="container mt-1">
                                                                            <a
                                                                                href="{{ route('general.team', ['home' => 'sys_units', 'id' => $unts->id]) }}">
                                                                                <b>{{ $unts->name }}</b>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </section>

    </body>
@endsection
