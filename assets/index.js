

let height = $(window).height();
$('.main-content').css({
    minHeight: height - 150 + 'px'
})



const  dataBaseSetup = async function(){
    const response = await fetch('', {
        method: 'POST',
        body: formData
    });
    const result = await response.json();
};



// form validator

$("#DataEntryForm").submit(  function(e){
    e.preventDefault();
    if(!fieldValidator.check(DataEntryForm)){
        webToast.Danger({
            status:'Sorry !',
            message:'Please check your input'
        });
        return false;
    }

   let  formData = new URLSearchParams([...new FormData(e.target).entries()]);
        fetch("saveData", {
            method: 'post',
            headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            body:  formData
        })
        .then(function (response) {
            if(response.status === 200){
                DataEntryForm.reset();
                $(DataEntryForm).modal('hide');

            }

        })
});

fieldValidator.initValueChecker(DataEntryForm);

