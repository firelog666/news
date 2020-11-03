(function ($) {
    $('.accept-request').click(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        var _self = this;

        var expertId = this.getAttribute('data-id');
        var requestId = this.getAttribute('data-request-id');
        $.ajax({
            url: "requests/accept",
            type: "get",
            data: {
                expertId: expertId,
                requestId: requestId,
            },
            success: function (response) {
                _self.classList.add('disabled');
                _self.innerText = response.msg;

                var expertCell = document.querySelector('tr[data-key="'+ requestId +'"] .expert');
                expertCell.innerText = response.expert;
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
    });
})($);