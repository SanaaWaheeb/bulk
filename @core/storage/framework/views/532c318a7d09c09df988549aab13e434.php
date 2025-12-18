 
 <?php if(Session::has('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: <?php echo json_encode(__('Success!'), 15, 512) ?>,
    html: `
        <div style="font-size: 14px; line-height: 1.3;">
            <?php echo Session::get('success'); ?>

        </div>
    `,
    input: undefined,
    showCancelButton: false,
    confirmButtonText: <?php echo json_encode(__('OK'), 15, 512) ?>,
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
<?php endif; ?>

<?php if(Session::has('error')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: <?php echo json_encode(__('Error!'), 15, 512) ?>,
    text: <?php echo json_encode(Session::get('error'), 15, 512) ?>,
    input: undefined,
    showCancelButton: false,
    confirmButtonText: <?php echo json_encode(__('Close'), 15, 512) ?>,
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/components/sweet-alert-msg.blade.php ENDPATH**/ ?>