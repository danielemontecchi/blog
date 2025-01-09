<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

{!! SEO::generate() !!}

<!-- FONT -->
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<!-- FAVICON -->
<link rel="icon" type="image/png" href="{{ asset('/images/favicon/favicon-96x96.png') }}"
      sizes="96x96"/>
<link rel="icon" type="image/svg+xml" href="{{ asset('/images/favicon/favicon.svg') }}"/>
<link rel="shortcut icon" href="{{ asset('/images/favicon/favicon.ico') }}"/>
<link rel="apple-touch-icon" sizes="180x180"
      href="{{ asset('/images/favicon/apple-touch-icon.png') }}"/>
<meta name="apple-mobile-web-app-title" content="Daniele Montecchi"/>
<link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}"/>

@if(!empty(config('services.google.analytics_tracking_id')) && app()->environment('production'))
    <!-- GOOGLE ANALYTICS -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', '{{ config('services.google.analytics_tracking_id') }}</script>



    @if(config('services.google.analytics_tracking_id'))
        <!-- Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_tracking_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            document.addEventListener('DOMContentLoaded', function () {
                const consentGiven = localStorage.getItem('cookie_consent');
                const isNavigating = sessionStorage.getItem('navigating') || false;

                if (consentGiven === 'granted' || isNavigating) {
                    gtag('js', new Date());
                    gtag('config', '{{ config('services.google.analytics_tracking_id') }}', {
                        'anonymize_ip': false
                    });
                } else {
                    gtag('js', new Date());
                    gtag('config', '{{ config('services.google.analytics_tracking_id') }}', {
                        'anonymize_ip': true
                    });
                }
            });
        </script>
    @endif

@endif
