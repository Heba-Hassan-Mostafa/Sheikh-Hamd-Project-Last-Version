<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&amp;display=swap"  rel="stylesheet"/>
<!-- CSS only -->
<link rel="canonical" href="https://hamadalhajri.net/">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/css/nav-login.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend/css/lightgallery.min.css') }}" />
@if (App::getLocale() == 'en')
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/css/style-en.css') }}" rel="stylesheet" />
@else
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
@endif
<link href="{{ asset('frontend/css/mediaQuery.css') }}" rel="stylesheet" />
<link rel="icon" href="{{ asset('/Files/settings/' . setting()->icon) }}" />
@yield('css')
