<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile page</title>
  <link rel="stylesheet" href="./view/style/profile.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
</head>

<body class="body">
  <div class="container">
    <div class="main">
      <div class="topbar">
        <a href="#">logout</a>
        <a href="#">support</a>
        <a href="#">work</a>
        <a href="#">home</a>
      </div>
      <div class="row">
        <div class="col-md-4 mt-1">
          <div id="side" class="card text-center sidebar">
            <div class="card-body">
              <div class="profile-pic">
                <label class="-label" for="file">
                  <span class="glyphicon glyphicon-camera"></span>
                  <span>Change Image</span>
                </label>
                <input id="file" type="file" onchange="loadFile(event)" />
                <img src="https://randomuser.me/api/portraits/women/11.jpg" id="output" width="200" />
              </div>
              <div class="mt-3">
                <h3>Rama Jardat</h3>
                <a href="#">home</a>
                <a href="#">work</a>
                <a href="#">support</a>
                <a href="#">setting</a>
                <a href="#">logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 mt-1">
          <div class="card mb-3 content">
            <a href="./editprofile.php"><button href="/editprofile.php class=" btn btn-warning edit">Edit</button></a>
            <h1 class="m-3 pt-3">About</h1>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <h5>Full Name</h5>
                </div>
                <div class="col-md-9 text-secondary">Rama Jardat</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-md-3">
                  <h5>Last Name</h5>
                </div>
                <div class="col-md-9 text-secondary">Jardat</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-md-3">
                  <h5>Address</h5>
                </div>
                <div class="col-md-9 text-secondary">Zarqa</div>
              </div>
              <hr />

              <div class="row">
                <div class="col-md-3">
                  <h5>password</h5>
                </div>
                <div class="col-md-9 text-secondary">1234</div>
              </div>
              <hr />

              <div class="row">
                <div class="col-md-3">
                  <h5>Email</h5>
                </div>
                <div class="col-md-9 text-secondary">rama@gmail.com</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-md-3">
                  <h5>Mobile</h5>
                </div>
                <div class="col-md-9 text-secondary">0778587455</div>
              </div>
            </div>
          </div>
          <div class="card mb-3 content">
            <h1 class="m-3">Recent Orders</h1>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <h5>Orders</h5>
                </div>
                <div class="col-md-9 text-secondary">product description</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var loadFile = function(event) {
      var image = document.getElementById("output");
      image.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>
</body>

</html>