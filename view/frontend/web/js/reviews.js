define(['jquery'], function ($) {
    return {

        getReviews: function (){
            $.ajax({
                type: "GET",
                url: window.location.origin+'/reviews/map/reviews',
                success: function(data){
                    console.log(data);
                }
            });
        }
    }
});
