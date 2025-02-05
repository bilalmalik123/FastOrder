<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class ="container">
          <a href="http://localhost/fast/public/task2">Click here to go to Task2</a>

        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">URL</th>
                  <th scope="col">Comment Count</th>
                  <th scope="col">Score</th>
                  <th scope="col">Date</th>
                  <th scope="col">Posted By</th>
                </tr>
            </thead>
            <tbody>
                {% if data %}
                    {% for user in data %}
                    <tr>
                      <td>{{ user.objectID }}</td>
                      <td>{{ user.title }}</td>
                      <td>{{ user.url }}</td>
                      <td>{{ user.num_comments }}</td>
                      <td>{{ user.points }}</td>
                      <td>{{ user.created_at_i| date("Y/m/d") }}</td>
                      <td>{{ user.author }}</td>
                    </tr>
                    {% endfor %}
                {% endif %}
            </tbody>
        </table>
    </div>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
