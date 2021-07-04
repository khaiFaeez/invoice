<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
	<script type="text/javascript">
		<!--
		$(function() {

			function autoCalcSetup() {
				$('div#cart').jAutoCalc('destroy');
				$('div#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
				$('div#cart').jAutoCalc({decimalPlaces: 2});
			}

            
			autoCalcSetup();

            function autoCalcSetup2() {
				$('div#cart2').jAutoCalc('destroy');
				$('div#cart2 tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
				$('div#cart2').jAutoCalc({decimalPlaces: 2});
			}

            
			autoCalcSetup2();


			$('button.row-remove').on("click", function(e) {
				e.preventDefault();

				var form = $(this).parents('form')
				$(this).parents('tr').remove();
				autoCalcSetup();

			});

			$('button.row-add').on("click", function(e) {
				e.preventDefault();

				var $table = $(this).parents('table');
				var $top = $table.find('tr.line_items').first();
				var $new = $top.clone(true);

				$new.jAutoCalc('destroy');
				$new.insertBefore($top);
				$new.find('input[type=text]').val('');
				autoCalcSetup();

			});

		});
		//-->
	</script>

     
	

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <style>
            .form-group.required .col-form-label:after {
            content:"*";
            color:red;
                }
            </style>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>



