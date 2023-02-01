<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>E-Ticaret</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">PROJE</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                                </li>
                                @auth()
                                    <li class="nav-item">
                                        <a class="nav-link" href="/sepetim">Sepetim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/cikis">Çıkış</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/giris">Giriş Yap</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/uye-ol">Üye ol</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 pt-4">
                <h5>Kategoriler</h5>
                <div class="list-group">
                    <a href="/"
                       class="list-group-item list-group-item-action">Hepsi</a>
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <a href="/kategori/{{$category->slug}}"
                               class="list-group-item list-group-item-action">{{$category->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-sm-9 pt-4">
                <h5>Ürünler</h5>
                @if(count($products) > 0)
                    <div class="card-group">
                        @foreach($products as $product)
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset("/storage/products/".$product->images[0]->image_url)}}"
                                     class="card-img-top" alt="{{$product->images[0]->alt}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <h6 class="card-title">Fiyat: {{$product->price}}TL</h6>
                                    <p class="card-text">{{$product->lead}}</p>
                                    <a href="/sepetim/ekle/{{$product->product_id}}" class="btn btn-primary">Sepete Ekle</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </body>
<script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });



      
    </script>
</html>