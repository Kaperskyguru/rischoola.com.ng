$(document).ready(function() {
  get_all_news();
  get_all_lodges();

  function get_all_news()
  {
    $.ajax({
        url: "getNews.php",
        method: "POST",
        data: {id:1},
        success: function(data) {
          $('#displayNews').html(data);
        }
    });

  }

  function get_all_lodges() {
    $.ajax({
      url: 'getLodges.php',
      method: "post",
      data: {id:1},
      success: function(data){

      }
    });

  }



});
