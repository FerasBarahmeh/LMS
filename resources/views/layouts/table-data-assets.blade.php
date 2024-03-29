@push('css')
    {{-- Internal Data table css --}}
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush
@push('js')
    {{-- Internal Data tables --}}
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>

    <script src="{{ asset('backend/assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    {{-- Responsive --}}
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    {{-- Internal  Datatable js --}}
    <script src="{{ asset('backend/assets/js/table-data.js')}}"></script>

    {{-- Buttons --}}
        <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
@endpush
