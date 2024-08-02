
@php
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
@endphp

    @yield('content')

@php 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
@endphp