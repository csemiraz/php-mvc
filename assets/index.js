let height = $(window).height();
$('.main-content').css({
    minHeight: height - 150 + 'px'
})


// add item
const addItem = function () {
    let htmlData = `<div class="form-group col-sm-6 item">
                                    <label for="email">Item  :</label>
                                    <input type="text" class="form-control" name="items[]" data-validate="letter" required>
                                     <div class="invalid-feedback">
                                      must text (Alphabet)
                                    </div>
                                    <span>-</span>
                       </div>`;
    $("#item-append-area").append(htmlData);

};


// remove added item
$("#item-append-area").on('click', '.item>span', function () {
    $(this).closest('.item').remove();
})


// form validator

$("#DataEntryForm").submit(function (e) {
    e.preventDefault();
    if (!fieldValidator.check(DataEntryForm)) {
        webToast.Danger({
            status: 'Sorry !',
            message: 'Please check your input'
        });
        return false;
    }

    let formData = new URLSearchParams([...new FormData(e.target).entries()]);
    fetch("saveData", {
        method: 'post',
        headers: {
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: formData
    })
        .then(function (response) {
            if (response.status === 200) {
                DataEntryForm.reset();
                $("#dataEntryModal").modal('hide');

                webToast.Success({
                    status: 'Success !',
                    message: 'Data Saved Successfully'
                });


                setTimeout(function () {
                    window.location.reload()
                }, 1000);
            } else {
                webToast.Danger({
                    status: 'Sorry !',
                    message: 'Something went wrong. Please check your input'
                });
            }

        })
});

fieldValidator.initValueChecker(DataEntryForm);

