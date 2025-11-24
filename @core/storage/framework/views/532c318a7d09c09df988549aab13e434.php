<?php if(Session::has('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'نجاح!',
    html: `
        <div style="font-size: 14px; line-height: 1.3;">
            <?php echo Session::get('success'); ?>

        </div>
    `,
    confirmButtonText: "حسناً",
    timer: 4000,
    //timerProgressBar: true,
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
    }
});
</script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'خطأ!',
    text: `<?php echo e(Session::get('error')); ?>`,
    timer: 4000,
    //timerProgressBar: true,
    confirmButtonText: "إغلاق",
    confirmButtonColor: "#d33",
    position: "center",
    showCloseButton: true,
    allowOutsideClick: false,
    width: 350,
    padding: '0.5rem'
});
</script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\bulk\@core\resources\views/components/sweet-alert-msg.blade.php ENDPATH**/ ?>