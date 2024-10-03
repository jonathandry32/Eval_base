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
                  <h5 class="card-title text-center pb-0 fs-4">Attribuer les permissions d'un role</h5>
                  <p class="text-center small">Remplir les informations requises
                  </p>
                </div>
          <form class="row g-3 needs-validation" action="{{ route('permission.givePermissionToRole')  }} " method="post" novalidate>
            @csrf
            @method('post')

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="idRole">
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @empty
                        <p>Aucun role</p>
                        @endforelse
                        </select>
                </div>
            </div>
            
            <div class="row mb-5">
                  <label class="col-sm-3 col-form-label">Permission(s)</label>
                  <div class="col-sm-9">
                    <div class="col-sm-9 input-group">
                      <input type="text" class="form-control" placeholder="Choisir permission(s)" aria-label="Choisir permission(s)" aria-describedby="basic-addon2" disabled>
                      <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#permission"> ... </button> 
                    </div>
                  </div>
            </div>

            
            <div class="modal fade" id="permission" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      
                      <div class="modal-header">
                        <h5 class="modal-title"> Choix des permissions </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <table class="table">
                          <tr>
                            <th>Oui</th>
                            <th>Nom</th>
                          </tr>
                        @forelse ($permissions as $permission)
                                <tr>
                                  <td> <input class="form-check-input" type="checkbox" name="idPermissions[]" value="{{ $permission->id }}"> </td>
                                  <td> {{ $permission->name }} </td>
                                </tr>
                        @empty
                        <p> aucun permission
                        @endforelse

                        </table>
                        <br/>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuler </button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Valider</button>
                      </div>

                    </div>
                  </div>
                </div>
            <div class="col-6">
                <button class="btn btn-secondary w-100" type="reset">Annuler</button>
            </div>
           <div class="col-6">
             <button class="btn btn-primary w-100 " type="submit">Save</button>
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

