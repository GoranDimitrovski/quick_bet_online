(function ($) {

    $(function () {
        var SELECTORS = {
            CSRF_TOKEN: 'meta[name="csrf-token"]',
            BUTTON: '#convert_odds_btn',
            MODAL: '#convert_odds_modal',
            FRACTION: '#fraction',
            DECIMAL: '#decimal',
            AMERICAN: '#american',
            ERROR: '#errors'
        };
        var errorNotification = $(SELECTORS.ERROR);
        var oddsInputs = $([SELECTORS.FRACTION, SELECTORS.DECIMAL, SELECTORS.AMERICAN].join(','));
        var typingTimer;
        var doneTypingInterval = 500;

        function init() {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $(SELECTORS.CSRF_TOKEN).attr('content')}});
            $(SELECTORS.BUTTON).on('click', openModal);
            $(SELECTORS.FRACTION).on('keypress', filterFraction);
            $(SELECTORS.DECIMAL).on('keypress', filterDecimal);
            $(SELECTORS.AMERICAN).on('keypress', filterAmerican);
            $(oddsInputs).on('keyup', oddsInputKeyUp);
            $(oddsInputs).on('keydown', oddsInputKeyDown);
        }

        function filterFraction(e) {

            if ((e.which != 47 || $(this).val().indexOf('/') != -1) && (e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }

            var input = $(this).val();
            if (((input.indexOf('/') != -1) && (input.substring(input.indexOf('/')).length > 2))) {
                e.preventDefault();
            }

        }

        function filterDecimal(e) {

            if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }

            var input = $(this).val();
            if (((input.indexOf('.') != -1) && (input.substring(input.indexOf('.')).length > 2))) {

                e.preventDefault();
            }

        }

        function filterAmerican(e) {
            console.log(e.which);
            if ((e.which != 45 || $(this).val().indexOf('-') != -1) && (e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }

            var input = $(this).val();
            if (((input.indexOf('.') != -1) && (input.substring(input.indexOf('.')).length > 2))) {
                e.preventDefault();
            }

            if (e.which == 45 && input.indexOf('-') == 0) {
                e.preventDefault();
            }


        }

        function openModal() {
            clearOdds();
            errorNotification.addClass('hidden');
            $(SELECTORS.MODAL).modal('show');
        }

        function oddsInputKeyDown() {
            clearTimeout(typingTimer);
        }

        function oddsInputKeyUp() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(convertOdds.bind(this), doneTypingInterval);
        }

        function clearOdds() {
            oddsInputs.each(function () {
                $(this).val('');
            });
        }

        function convertOdds() {
            var value = $(this).val();
            var type = $(this).prop('id');

            if (value && type) {
                $.ajax({
                    url: "/odds/convert",
                    method: "POST",
                    data: {
                        value: value,
                        type: type
                    }
                }).done(handleSucces).fail(handleError);
            }
        }

        function handleSucces(data) {

            if (data && data.fraction && data.decimal && data.american) {
                $(SELECTORS.FRACTION).val(data.fraction);
                $(SELECTORS.DECIMAL).val(data.decimal);
                $(SELECTORS.AMERICAN).val(data.american);
                errorNotification.addClass('hidden');
            }
        }

        function handleError(data) {
            clearOdds();
            errorNotification.removeClass('hidden');
        }

        init();

    });

})(jQuery);
