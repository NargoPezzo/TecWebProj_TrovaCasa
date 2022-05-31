
<style>
    body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
 
    .fadein { 
        position:relative; height:700px; width:700px; margin:0 auto;
        background: #ebebeb;
        padding: 10px;
    }
    
    .fadein img{
        position:absolute;
        width: calc(96%);
        height: calc(94%);
        object-fit: scale-down;
    }

</style>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
    });
</script>