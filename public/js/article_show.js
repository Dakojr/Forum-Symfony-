$(document).ready(function() {
    $('.like-article').on('click', function(e) {
        e.preventDefault();

        var $link = $(e.currentTarget);

        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');

        $.ajax({
            method: "POST",
            url: $link.attr('href')
        }).done(function(data) {
            $('.like-article-count').html(data.hearts);
        })
    })
})