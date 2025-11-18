<script>
    $('.icp-dd').iconpicker();
    $('body').on('iconpickerSelected','.icp-dd', function (e) {
        var selectedIcon = e.iconpickerValue;
        $(this).parent().parent().children('input').val(selectedIcon);
        $('body .dropdown-menu.iconpicker-container').removeClass('show');
    });
</script><?php /**PATH /home/u177601598/domains/bulk.com.sa/public_html/@core/resources/views/components/icon-picker-activate-js.blade.php ENDPATH**/ ?>