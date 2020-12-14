$(document).ready(function(){
  $('section.result-wrapper').hide();
  $(".product_check").click(function(){

    var action = 'data';
    var answer1 = get_filter_text('answer1');
    var answer2 = get_filter_text('answer2');
    var answer3 = get_filter_text('answer3');
    var answer4 = get_filter_text('answer4');

    $.ajax({
      url:'action.php',
      method: 'POST',
      data:{action:action,answer1:answer1,answer2:answer2,answer3:answer3,answer4:answer4},
      success:function(response){
        $("#result").html(response);
      }
    });
  });

  function get_filter_text(text_id){
    var filterData = [];
    $('#'+text_id+':checked').each(function(){
      filterData.push($(this).val());
    });
    return filterData;
  }
});
