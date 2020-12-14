var spgIndex = 1;
showSpg(spgIndex);

function plusSpg(n) {
  showSpg(spgIndex += n);
}

function currentSpg(n) {
  showSpg(spgIndex = n);
}

function showSpg(n) {
  var i;
  var spg = document.getElementsByClassName('test-wrapper');
  if (n > spg.length) {spgIndex = 1}
  if (n < 1) {spgIndex = spg.length}
  for (i = 0; i < spg.length; i++) {
    spg[i].style.display = "none";
  }
  spg[spgIndex-1].style.display = "block";
}

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
