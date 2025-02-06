<script src="{{ asset('frontend/js/vendor/jquery-v2.2.4.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<!-- Ajax Mail -->
<script src="{{ asset('frontend/js/ajax-mail.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true,
        "preventDuplicates": true,
    }
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @elseif (Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @elseif (Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif
</script>
<script>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>


@stack('js')
