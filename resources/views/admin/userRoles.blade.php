@extends('./layouts/app')
@section('page-content')
<main>
    <section class="section">
            <div class="container">
                    <div class="row justify-content-center" style="background-color:whitesmoke;border-color:whitesmoke ">
                            <div class="col-lg-8" style="margin-top: 100px;">
                                    <div class="card mb-3">
                                            <div class="card-body">
                                             <h5 class="card-title">Liste des rôles de l'utilisateur "{{ $user->name }}"</h5>
                                                <table class="table">
                                                    <tr>
                                                            <th>Id</th>
                                                            <th>Nom</th>
                                                            <th>Supprimer</th>
                                                    </tr>
                                                    @forelse ($roles as $role)
                                                    <tr>
                                                            <td>{{ $role->role->id }}</td>
                                                            <td>{{ $role->role->name }}</td>
                                                            <td> 
                                                            <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('role.supprimerRole') }}" novalidate>
                                                                @method('delete')
                                                                @csrf 
                                                                <input type="hidden" name="idRole" value="{{ $role->role->id }}">
                                                                <input type="hidden" name="idUser" value="{{ $user->idUser }}">
                                                                <div class="icon">
                                                                     <button type="submit" class="btn btn-danger">
                                                                         <i class="bi bi-trash-fill"> </i>
                                                                     </button>
                                                                </div>
                                                            </form>
                                                            </td>
                                                    </tr>
                                                    @empty
                                                    <p>aucuns roles</p>
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
