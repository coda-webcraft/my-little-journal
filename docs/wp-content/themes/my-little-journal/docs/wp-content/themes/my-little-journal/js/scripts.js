jQuery(document).ready(function($) {

    // スムーズスクロール
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        if (target === '#') return;
        $('html, body').animate({
            scrollTop: $(target).offset().top - 80
        }, 600, 'swing');
    });

    // トップに戻るボタン
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-to-top').css('opacity', '1');
        } else {
            $('#back-to-top').css('opacity', '0');
        }
    });

    $('#back-to-top').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
    });

    // ハンバーガーメニュー
    $('#hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('nav').toggleClass('open');
    });

});

// カレンダー: 土日を正しく判定してグレー表示にする(colspanのズレに対応)
(function () {
    var table = document.querySelector('.wp-calendar-table');
    if (!table) return;

    var cells = table.querySelectorAll('tbody td');
    var col = 0;

    cells.forEach(function (cell) {
        var span = parseInt(cell.getAttribute('colspan') || '1', 10);

        if (cell.classList.contains('pad')) {
            col = (col + span) % 7;
            return;
        }

        if (col === 5 || col === 6) {
            cell.classList.add('is-weekend');
        }

        col = (col + 1) % 7;
    });
})();