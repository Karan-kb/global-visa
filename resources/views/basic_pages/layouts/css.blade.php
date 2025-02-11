<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<!-- Icon Font CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/icons.min.css') }}">
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">

<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
<style>
    /* Basic Button Styles */
    .clear .button {
        background-color: #4CAF50;
        /* Green background */
        color: white;
        /* White text */
        border: none;
        /* Remove border */
        padding: 12px 24px;
        /* Add padding for better size */
        font-size: 16px;
        /* Increase font size */
        font-weight: bold;
        /* Bold text */
        border-radius: 8px;
        /* Rounded corners */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s, transform 0.2s ease;
        /* Smooth hover effect */
        text-transform: uppercase;
        /* Make text uppercase */
    }

    /* Hover Effects */
    .clear .button:hover {
        background-color: #45a049;
        /* Darker green on hover */
        transform: translateY(-2px);
        /* Slightly lift the button */
    }

    /* Focus Styles */
    .clear .button:focus {
        outline: none;
        /* Remove outline */
        box-shadow: 0 0 5px rgba(72, 209, 204, 0.7);
        /* Add focus ring */
    }

    /* Active Button Style */
    .clear .button:active {
        background-color: #3e8e41;
        /* Even darker green on click */
        transform: translateY(0);
        /* Remove lift effect */
    }
</style>
@stack('css')
