<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      .modalWidth {
          max-width: 100% !important;
      }
    </style>
  </head>
  <body>
    <div class ="container">
        <table class="table table-striped">
          <a href="http://localhost/fast/public/task1">Click here to go to Task1</a>
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Show</th>
                  <th scope="col">Season</th>
                  <th scope="col">Air Date</th>
                  <th scope="col">Air Time</th>
                </tr>
            </thead>
            <tbody>

                {% for userr in data %}
                    {% for user in userr %}
                      <!-- {{use.id}} -->
                      <tr>
                      <td>{{ user.id}}</td>
                      <td>{{ user.name }}</td>
                      <td>
                        <button id = {{user.show.id}} onclick="showModal('{{user.show.id}}')" type="button" class="btn btn-info btn-lg" >Show More</button>
                      </td>
                      <td>{{ user.season }}</td>
                      <td>{{ user.airdate }}</td>
                      <td>{{ user.airtime }}</td>
                    </tr>
                    {% endfor %}
                    {% if not loop.last %}|{% endif %}
                {% endfor %}
                <!-- {% if data %} -->
                    {% for user in data %}
                    {% endfor %}
                <!-- {% endif %} -->
              
            </tbody>
        </table>
        

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modalWidth">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
    </div>
    


    <script type="text/javascript">
      function showModal(data)
      {
        $.ajax({
              url: "show",
              type: "post",
              data: { id : data },
              success: function(data){
                console.log(data);
                $("#myModal .modal-title").html(data[0]['name']);
                $("#myModal .modal-body").html(
                '<table class="table table-striped"><thead><tr><th scope="col">ID</th><th scope="col">URL</th><th scope="col">Name</th><th scope="col">Type</th><th scope="col">Language</th><th scope="col">Premiered</th><th scope="col">Official Site</th><th scope="col">Schedule</th></tr></thead><tbody><tr><td>'+data[0]['id']+'</td><td>'+data[0]['url']+'</td><td>'+data[0]['name']+'</td><td>'+data[0]['type']+'</td><td>'+data[0]['language']+'</td><td>'+data[0]['premiered']+'</td><td>'+data[0]['officialSite']+'</td><td>'+data[0]['schedule'].time+'</td></tr></tbody></table>');

                $("#myModal").modal();
              }
          });
      }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
