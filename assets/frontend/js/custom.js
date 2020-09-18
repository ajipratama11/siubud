new WOW().init();
$(document).ready(function(){
    if($(".navbar-light").hasClass('transparent')){
        $(document).scroll(function(){
            var navbar = ".navbar-light"
            var offset = $(navbar).offset()
            if(offset.top>0){
                $(navbar).removeClass('transparent')
            }
            else{
                $(navbar).addClass('transparent')
            }
        })
    }
    $(".foto").click(function(){
        var id = $(this).data('id')
        var img = $(".foto[data-id='"+id+"'] .img img").attr('src')
        var title = $(".foto[data-id='"+id+"'] .bottom-title").data('title')
        $('.img-container').toggleClass('show')
        $('.img-container img').attr('src',img)
    })
    $(".img-container .close, .img-container .click-close").click(function(e){
        e.preventDefault()
        $('.img-container').toggleClass('show')
    })
})