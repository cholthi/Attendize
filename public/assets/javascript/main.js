$(function () {
    $("#btn-nav-toggle").on("click", function () {
        const $body = $("body");
        if ($body.hasClass("show-menu")) {
            $body.removeClass("show-menu");
        } else {
            $body.addClass("show-menu");
        }
    });
});
