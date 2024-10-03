<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>LARACROFT</title>
  <link href="{{ asset('/img/itu.jpg') }}" rel="icon">
  <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3" style="margin-top: 50px;">

              <div class="card-body">

                <div class="pt-4 pb-3">
                  <h5 class="card-title text-center pb-0 fs-4">Ajouter vos donnees personnels</h5>
                  <p class="text-center small">Entrez les informations requis.
                  </p>
                </div>

                <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('registration')}}">
                @method('post')
                @csrf
                  <div class="row mb-3">
                    <label for="yourUsername" class="form-label">Nom</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nom" class="form-control" id="yourUsername" value="{{ old('nom') }}" required>
                        <div class="invalid-feedback">Please enter your Username.</div>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="text" name="motdepasse" class="form-control" id="yourPassword" value="{{ old('motdepasse') }}" required>
                        <div class="invalid-feedback">Please enter your Password.</div>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="yourEmail" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Please enter your Email.</div>
                      </div>
                  </div>

                <div class="col-6">
                  <button class="btn btn-secondary w-100" type="reset">Effacer</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-primary w-100 " type="submit">S'inscrire</button>
                </div>
              </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main>

</html>