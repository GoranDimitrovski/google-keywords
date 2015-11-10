GoogleScraper.Urls = (function ($) {

    $(function () {

        $('#keywords').change(function (e) {
            e.preventDefault();
            getUrls();
        });
        $('#urls_list_container').on('click', '.pagination a', function (e) {
            getUrls($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });

    });

    function getUrls(page) {
        var url = "/keyword/urls";
        var keyword = $('#keywords').val();
        var errorNotification = $('#errors');
        var tableContainer = $('#urls_list_container');

        if (page) {
            url = url + "?page=" + page;
        }

        if (keyword) {
            $.ajax({
                url: url,
                method: "GET",
                data: {keyword: keyword},
                context: document.body
            }).done(function (data) {
                tableContainer.empty();
                tableContainer.html(data);
            }).fail(function (data) {
                tableContainer.empty();
                if (data && data.responseJSON && data.responseJSON.error) {
                    errorNotification.text(data.responseJSON.error);
                }
                errorNotification.removeClass('hidden');
            });
        }
    }

})(jQuery);