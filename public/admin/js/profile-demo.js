(function ($) {
    'use strict';
    var select = document.getElementById('profile-rating');
    $(function () {
        $('#profile-rating').barrating({
            theme: 'css-stars',
            showSelectedRating: true,
            readonly: true,
        });
    });
    console.log(select.options[select.selectedIndex].value);

})(jQuery);
