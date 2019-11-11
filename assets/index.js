
let height = $(window).height();
$('.main-content').css({
    minHeight: height - 150 + 'px'
})



const  dataBaseSetup = async function(){
    const response = await fetch('https://example.com/posts', {
        method: 'POST',
        body: formData
    });
    const result = await response.json();
}