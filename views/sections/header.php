<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

    <title>Vanilla PHP</title>

    <!-- Icon that shows in the browser tab when the platform is launched -->
    <link rel="shortcut icon" href="../../public/images/logos/php-logo.jpg">
    <meta name="referrer" content="no-referrer">

    <!-- Scripts -->
    <script src="../../public/js/extra.js" defer></script>
    <!-- Script handler for github buttons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/github-buttons/2.27.0/buttons.min.js"
        integrity="sha512-+FbBfouZ1f3s3mNjA1PLjgJ+NNKq1+Ic8523WvBdiZ3bxpxVRVydh5+gXPZWz0SXHPQ/8gZTl99hxAfRc4g2BA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Script handler for JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Script handler for Popper Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"
        integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Script handler for Bootstrap Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap script that controls dropdown boxes -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- Script handler for waypoints -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"
        integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Script sources for ripple.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ripple.js/1.2.1/ripple.js"
        integrity="sha512-wquKjza9uz7HBX/wy2wQVIq0VZrjKbKqsUSPeHHjEc3lOsEf1xRAoEt5+/89K1P1Ch+hhTlE+EUqKMAEtp6Usg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ripple.js/1.2.1/ripple.min.js"
        integrity="sha512-M7LdVdj6Pck0GDllHuEchDVXzPPvss3VSn3QSgBUcVLgLYq+bPCj91xKRfUSwjF/wmClLJUHEwm+p/d3OmBbtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Font Awesome Icons JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Select2 search library for searching select drop down fields -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSS script for select2 search library for searching select drop down fields -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS script source for Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="../../public/js/extra.css" rel="stylesheet">
</head>
