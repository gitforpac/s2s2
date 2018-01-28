 $(".f-items").draggable({ 
        cursor: "pointer", 
        containment: "#main-wrapper",
        axis: "x",
        drag: function(event, obj){
                if(obj.position.left >= 30){
                   obj.position.left = 30;
                }
                if(obj.position.left < -1200) {
                  obj.position.left = -1200;
                }
            },
    });

      $('.prev').click(function(e){
         var pos = $('.f-items').offset();
         if(pos.left <= 200) {
            $('.f-items').animate({
                left: pos.left + 200,
             }, 300);
         }
      })

      $('div.next').click(function(e){
         var pos = $('.f-items').offset();
            if(pos.left > -1200) {
                $('.f-items').animate({
                    left: pos.left + -200,
                }, 300);
            }
        
      })