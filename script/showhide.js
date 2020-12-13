//frem
$(document).ready(function(){
  $(function() {
     $('button#q2').click(function() {
        $('div#q2_hidden').show();
        return false;
     });
  });
});

$(document).ready(function(){
  $(function() {
     $('button#q2').click(function() {
        $('div#q1_hidden').hide();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#q3').click(function() {
        $('div#q3_hidden').show();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#q3').click(function() {
        $('div#q2_hidden').hide();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#q4').click(function() {
        $('div#q4_hidden').show();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#q4').click(function() {
        $('div#q3_hidden').hide();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#showResult').click(function() {
        $('div#q4_hidden').hide();
        return false;
     });
  });
});
  //Tilbage
$(document).ready(function(){
  $(function() {
     $('button#backQ1').click(function() {
        $('div#q1_hidden').show();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#backQ1').click(function() {
        $('div#q2_hidden').hide();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#backQ2').click(function() {
        $('div#q2_hidden').show();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#backQ2').click(function() {
        $('div#q3_hidden').hide();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#backQ3').click(function() {
        $('div#q3_hidden').show();
        return false;
     });
  });
});
$(document).ready(function(){
  $(function() {
     $('button#backQ3').click(function() {
        $('div#q4_hidden').hide();
        return false;
     });
  });
});
  //show final result (limit 5)
$(document).ready(function(){
  $(function() {
     $('button#showResult').click(function() {
        $('section.result-dd').show();
        $('section.test').hide();
        $('div#result').show();
        return false;
     });
  });
});
