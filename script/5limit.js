//limit to 5
$beername_wrapper = $('.beername_wrapper');
$beername_wrapper.each(function() {
   var $bn_wrapper = $(this).children();
   if ($bn_wrapper.length > 5) {
       $beername_wrapper.children(':nth-of-type(n+6)').hide();
   }
});
