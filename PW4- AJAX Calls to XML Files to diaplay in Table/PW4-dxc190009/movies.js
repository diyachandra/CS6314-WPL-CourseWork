$(document).ready(function() {
  console.log("ready!");
  var button = document.getElementById("loadDataButton");
  button.onclick = loadData;
});

var castList = null;

function loadData() {
  console.log('inside here');
  $.ajax({

    url: "http://127.0.0.1:8888/PW4/movies.xml",
    crossDomain: true,
    //headers: {"Access-Control-Allow-Headers": "*"},
    dataType: "xml",
    type: 'GET',

    success: function(data) {
      $(data).find('movie').each(function() {
        var title = $(this).find('title').text();
        var director = $(this).find('director').text();
        var description = $(this).find('synopsis').text();
        var rating = $(this).find('score').text();
        var genres = $(this).find('genre');

        var info = '<tr><td>' + title + '</td><td>' + director + '</td><td>' + description + '</td><td>' + rating + '</td>';
        info += "<td>";
        for (i = 0; i < genres.length; i++) {
          info += genres[i].textContent + ", ";
        }
        info += "</td><td>";

        var cast = $(this).find('cast');

        var actors = $(cast).find('person');
        castList = actors;
        for (i = 0; i < actors.length; i++) {
          info += ($(castList[i]).attr('name')) + ", ";
        }
        info += "</td";

        info += "</tr>";
        $("table").append(info);
      });

    },
    error: function() {
      alert("error loading file");
    }
  });
}