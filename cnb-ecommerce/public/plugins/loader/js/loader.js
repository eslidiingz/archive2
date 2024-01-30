
// $(document).ready(function(){
    function loader(status){
        if (status == 'open') {
            $('body').addClass('loaderOpen');
            $('#loader').removeClass('d-none');
        }else{
            setTimeout(function(){
                $('body').removeClass('loaderOpen');
                $('#loader').addClass('d-none');
            }, 500);
        }
    }
// });