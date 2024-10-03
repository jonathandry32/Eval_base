@extends('./layouts/app')
@section('page-content')
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3" style="margin-top: 50px;">

              <div class="card-body">

                <div class="pt-4 pb-3">
                  <h5 class="card-title text-center pb-0 fs-4">Ajouter un service</h5>
                  <p class="text-center small">Entrez les informations concerant le service.
                  </p>
                </div>

                <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('services.nouveau')}}" novalidate>
                  @method('post')
                  @csrf 
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" name="nom" class="form-control" id="name" required>
                            <div class="invalid-feedback">Please enter the name!</div>
                        </div>
                    </div>

                <div class="col-6">
                  <button class="btn btn-secondary w-100" type="reset">Annuler</button>
                </div>

                <div class="col-6">
                  <button class="btn btn-primary w-100 " type="submit">Save</button>
                </div>
              </form>

              <br/> 
                <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('services.servicecsvimport') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="icon">
                Ou importer les données avec CSV:
                <input class="form-control" type="file" name="csv" required>
                </br>
                <button type="submit" class="btn btn-success">
                Import CSV
                </button>
                </div>
                </form>
              <br/> 
                <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('services.image') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="icon">
                Test image:
                <input class="form-control" type="file" name="image" required>
                </br>
                <button type="submit" class="btn btn-success">
                Upload photo
                </button>
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
@endsection
