@extends('./layouts/app')
@section('page-content')
<main>
    <section class="section">
            <div class="container">
                    <div class="row justify-content-center" style="background-color:whitesmoke;border-color:whitesmoke ">
                            <div class="col-lg-8" style="margin-top: 100px;">
                                    <div class="card mb-3">
                                            <div class="card-body">
                                             <h5 class="card-title">Liste des permissions du rôle "{{ $role->name }}"</h5>
                                                <table class="table">
                                                    <tr>
                                                            <th>Id</th>
                                                            <th>Nom</th>
                                                            <th>Supprimer</th>
                                                    </tr>
                                                    @forelse ($permissions as $permission)
                                                    <tr>
                                                            <td>{{ $permission->permission->id }}</td>
                                                            <td>{{ $permission->permission->name }}</td>
                                                            <td>
                                                            <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('role.supprimerPermission') }}" novalidate>
                                                                @method('delete')
                                                                @csrf 
                                                                <input type="hidden" name="idRole" value="{{ $role->id }}">
                                                                <input type="hidden" name="idPermission" value="{{ $permission->permission->id }}">
                                                                <div class="icon">
                                                                     <button type="submit" class="btn btn-danger">
                                                                         <i class="bi bi-trash-fill"> </i>
                                                                     </button>
                                                                </div>
                                                            </form>
                                                            </td>
                                                    </tr>
                                                    @empty
                                                    <p>aucuns details</p>
                                                    @endforelse
                                                </table>
                                            </div>
                                    </div> 
                            </div>
                    </div>
            </div>
    </section>
</main>    
@endsection
