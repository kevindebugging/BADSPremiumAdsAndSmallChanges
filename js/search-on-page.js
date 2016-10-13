
// When user press enter on input#searchfor
// Trigger click button#search-on-page
$('#searchfor').keypress(function(e) {
        if ( e.keyCode == 13 ) {  // detect the enter key
            $('#search-on-page').click();
        }
    });

$('#search-on-page').click(function() {

  var searchedText = $('#searchfor').val();
  var previousText = $('#previous-text').val();
  var currentIdx = $('#currentIdx').val();
  var totalFound = $('#total-found').val();;
  var i = 0;

  // if searchedText != previousText = we are searching for new keyword
  // search through all paragraph inside div#to_find to find word that match keyword
  // surround the found keyword with span
  // give the span an id that increment everytime it found the keyword
  // then display the paragraph
  // if no keyword found in the paragraph, hide the paragraph
  if(searchedText != previousText){
    $('#to_find').find('p').each(function (){

      var paragraph = $(this).text();
      var removeNbsp = new RegExp("\xa0", "igm");
      var pageText = " " + paragraph.replace(removeNbsp," ");

      // Regex to find a word. A word is alphabet or numeric surround with single [ ,.!?/;:()\\[\\]]
      // i = ignore case g = global m = multiline
    	var theRegEx = new RegExp("([ ,.!?/;:()\\[\\]]"+searchedText+"[ ,.!?/;:()\\[\\]])", "igm");

      var replaced = pageText.search(theRegEx) >= 0;
      if (replaced) {
        i++;
        var newHtml = pageText.replace(theRegEx ,'<span id="found-' + i + '">$1</span>');
        $(this).html(newHtml);
        $(this).fadeIn();
      }else{
        $(this).html(pageText);
        $(this).fadeOut();
      }


  	});

    // Set input#previous-text equal to the searched word
    // input#previous-text is to tell whether the searced word is new or old
    // if old keyword, go to the next found word by id
    $('#previous-text').val($('#searchfor').val());
    $('#total-found').val(i);
    totalFound = i;
    $('#currentIdx').val(0);
    currentIdx = 0;
  }
    if(totalFound > 0){
      $('#nothing-found').fadeOut();
      $('#opening-paragraph').fadeOut();
      $('#found-info').html(totalFound + " ads found.");
      $('#found-info').fadeIn();
      // if currentIdx > totalFound -> return back to the first found keyword
      // currentIdx++;
      // currentIdx = (currentIdx > totalFound) ? 1 : currentIdx;
      // $('#currentIdx').val(currentIdx);
      // $('html, body').animate({
      //       // scrollTop: $("#found-" + currentIdx).parent().offset().top - 80
      //       scrollTop: $("#to_find").parent().offset().top - 80
      //   }, 1000);
    }else{
      $('#nothing-found').fadeIn();
      $('#found-info').fadeOut();
      $('#to_find').find('p').each(function (){

        // Clear all span from previous search
        var paragraph = $(this).text();
        var pageText = paragraph.replace("<span>","").replace("</span>");
        $(this).text(pageText);

        $(this).fadeIn();
      });
    }

});
