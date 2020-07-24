(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle").on('click', function (e) {
        e.preventDefault();
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

})(jQuery); // End of use strict

// ckeditor
CKEDITOR.replace('article-ckeditor', {
    filebrowserUploadUrl: "upload.php",
    filebrowserUploadMethod: "form"
});
$("form").submit(function (e) {
    var total_length = CKEDITOR.instances['article-ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
    if (!total_length) {
        $(".results").html('');
        $(".pesan").html('Please enter a body text');
        e.preventDefault();
    }
});
// // ckeditor end