<?php if(Session::has('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'success!',
    html: `
        <div style="font-size: 14px; line-height: 1.3;">
            <?php echo Session::get('success'); ?>

        </div>
    `,
    input: undefined,        // ✅ يلغي أي input/select موروث
    showCancelButton: false,
    confirmButtonText: "حسناً",
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
        // ✅ لو فيه أي select/input اتضاف بالغلط احذفه
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
    title: 'error!',
    text: <?php echo json_encode(Session::get('error'), 15, 512) ?>,
    input: undefined,        // ✅ نفس الفكرة هنا
    showCancelButton: false,
    confirmButtonText: "إغلاق",
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