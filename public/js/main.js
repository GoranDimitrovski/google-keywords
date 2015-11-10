GoogleScraper = {};

GoogleScraper.Main = (function ($) {

    $(function () {

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $('#keyword_search button[type="submit"]').click(function (e) {
            e.preventDefault();

            var loadingPanel = $('.loading-panel');
            var successNotification = $('h4.success');
            var errorNotification = $('#errors');
            var keyword = $('input[name=keyword]').val();

            successNotification.addClass('hidden');
            loadingPanel.removeClass('hidden');
            errorNotification.addClass('hidden');

            $.ajax({
                url: "/keyword/urls",
                method: "POST",
                data: {keyword: keyword},
                context: document.body
            }).done(function (data) {
                loadingPanel.addClass('hidden');
                successNotification.removeClass('hidden');
            }).fail(function (data) {
                loadingPanel.addClass('hidden');

                if (data && data.responseJSON && data.responseJSON.error) {
                    errorNotification.text(data.responseJSON.error);
                }
                errorNotification.removeClass('hidden');
            });

        });

    });

})(jQuery);