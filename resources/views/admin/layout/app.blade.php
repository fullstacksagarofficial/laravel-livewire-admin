<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.partials.links')

    @livewireStyles
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.layout.partials.mobile_header')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('admin.layout.partials.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.layout.partials.desktop_header')

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        {{ $slot }}

                    </div>

                </div>
            </div>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    @include('admin.layout.partials.scripts')



    @livewireScripts
    <script>
        window.addEventListener('show-form', event => {
            $('#mediumModal').modal('show')
        })

        window.addEventListener('show-delete-modal', event => {
            $('.deleteModal').modal('show')
        })

        

    </script>


    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            window.addEventListener('hide-form', event => {
                $('#mediumModal').modal('hide')
                toastr.success(event.detail.message, 'Succcess !');
            })
            window.addEventListener('hide-delete-modal', event => {
                $('.deleteModal').modal('hide')
                toastr.success(event.detail.message, 'Succcess !');
            })
        });
    </script>
</body>

</html>
<!-- end document-->
