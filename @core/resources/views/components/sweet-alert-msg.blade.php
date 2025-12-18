 
 @if(Session::has('success'))
<script>
Swal.fire({
    icon: 'success',
    title: @json(__('Success!')),
    html: `
        <div style="font-size: 14px; line-height: 1.3;">
            {!! Session::get('success') !!}
        </div>
    `,
    input: undefined,
    showCancelButton: false,
    confirmButtonText: @json(__('OK')),
    timer: 4000,
    confirmButtonColor: "#6C63FF",
    position: "center",
    showCloseButton: true,
    allowOutsideClick: false,
    width: 350,
    padding: '0.5rem',
    background: '#fff',
    customClass: {
        popup: 'small-swal',
        title: 'small-swal-title',
        htmlContainer: 'small-swal-content'
    },
    didOpen: () => {
        const popup = Swal.getPopup();
        popup.querySelectorAll('.swal2-input, .swal2-select, .swal2-textarea')
             .forEach(el => el.remove());
    }
});
</script>
@endif

@if(Session::has('error'))
<script>
Swal.fire({
    icon: 'error',
    title: @json(__('Error!')),
    text: @json(Session::get('error')),
    input: undefined,
    showCancelButton: false,
    confirmButtonText: @json(__('Close')),
    timer: 4000,
    confirmButtonColor: "#d33",
    position: "center",
    showCloseButton: true,
    allowOutsideClick: false,
    width: 350,
    padding: '0.5rem',
    didOpen: () => {
        const popup = Swal.getPopup();
        popup.querySelectorAll('.swal2-input, .swal2-select, .swal2-textarea')
             .forEach(el => el.remove());
    }
});
</script>
@endif
