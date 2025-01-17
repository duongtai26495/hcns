<title>{{ $title }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="{{ mix('resouces/img/favicon_symbol.png') }}"/>
<script src="{{ mix('resources/js/jquery-3.7.1.min.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
@vite('resources/css/app.css')
<meta name="csrf-token" content="{{ csrf_token() }}">