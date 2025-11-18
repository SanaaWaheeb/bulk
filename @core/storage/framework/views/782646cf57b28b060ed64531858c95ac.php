$(document).on('click','#submit',function () {
    $(this).addClass("disabled")
    $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Submitting")); ?>');
});<?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/components/btn/submit.blade.php ENDPATH**/ ?>