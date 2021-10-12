@if (session('success'))
    @push('scripts')
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endpush
@endif
