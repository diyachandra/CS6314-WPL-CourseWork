$(function() {
      $("#getrecords").on('click', function() {

          $.ajax({
              method: "GET",
              url: "Assignment3.php",
              data: {
                "year": $('#year').val(),
                "gender": $('#gender').val(),
              },
              success: function(data) {
                var result = data;
                var thf = "thf";
                var thm = "thm";
                var string = '<table class="table table-hover"><thead class="thead-dark"><tr> <th>Name</th><th>Year</th>\
         <th>Ranking</th><th>Gender</th><tr></thead>';


                /* from result create a string of data and append to the div */

                $.each(result, function(key, value) {
                      if (value['Gender'] == 'm') {
                          string += "<tr class=\"table-info\"> <td>" + value['Name'] + "</td><td>" + value['Year'] +
                            "</td><td>" + value['Ranking'] + '</td>  \
                      <td>' + value['Gender'] + "</td> </tr>";
                        } else {
                          string += "<tr class=\"table-danger\"> <td>" + value['Name'] + "</td><td>" + value['Year'] +
                            "</td><td>" + value['Ranking'] + '</td>  \
                      <td>' + value['Gender'] + "</td> </tr>";
                        }

                      }); string += '</table>'; $("#records").html(string);
                  },
                  error: function(xhr) {
                    //Do Something to handle error
                  }
              });
          });
      });
