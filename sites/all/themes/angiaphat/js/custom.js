(function ($) {

/**
 * Provide the summary information for the block settings vertical tabs.
 */
Drupal.behaviors.CustomAngiaphat = {
  attach: function (context) {


    $("ul.sf-menu li a").each(function () {
      // if($(this).next().length > 0){
      //   $(this).parent().addClass('sf-with-ul');
      // }
      $(this).hover(function(){
          $(this).next().toggle();
      });
      $(this).next().hover(function(){
        $(this).toggle();
      });
    });

    $(".detail-wrapper .detail a").each(function(){
      $(this).click(function(event){
        event.preventDefault();
        $(this).parent().next().toggle();
      });
    });

  }
};

})(jQuery);
