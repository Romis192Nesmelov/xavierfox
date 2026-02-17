$(document).ready(function() {
    $('a.img-preview').fancybox({
        padding: 3
    });

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        e.preventDefault();
        let self = $(this);
        if (!window.menuScrollFlag) {
            gotoScroll(self.attr('data-scroll'));
        }
    });
});

function gotoScroll(scroll) {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top - 51
    }, 1500, 'easeInOutQuint');
}
