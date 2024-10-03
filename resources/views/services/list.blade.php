@extends('./layouts/app')
@section('page-content')
<main>
    <section class="section">
            <div class="container">
                    <div class="row justify-content-center" style="background-color:whitesmoke;border-color:whitesmoke ">
                            <div class="col-lg-8" style="margin-top: 100px;">
                                    <div class="card mb-3">
                                            <div class="card-body">
                                             <h5 class="card-title">Liste des services</h5>
                                            <form id="login" class="row g-3 needs-validation" method="get" action="{{ route('services.listePDF') }}">
                                                @method('get')
                                                @csrf 
                                                <div class="icon">
                                                <button type="submit" class="btn btn-primary">
                                                    PDF
                                                </button>
                                                </div>
                                             </form>
                                                <table class="table">
                                                    <tr>
                                                            <th>IdService</th>
                                                            <th>Nom</th>
                                                            <th>Modifier</th>
                                                            <th>Supprimer</th>
                                                    </tr>
                                                    @forelse ($services as $service)
                                                    <tr>
                                                            <td>{{ $service->idService }}</td>
                                                            <td>{{ $service->nom }}</td>
                                                            <td> 
                                                            <form id="login" class="row g-3 needs-validation" method="get" action="{{ route('services.modifier', ['idService' => $service->idService]) }}" novalidate>
                                                                @method('get')
                                                                @csrf 
                                                                <div class="icon">
                                                                     <button type="submit" class="btn btn-success">
                                                                         <i class="bi bi-pencil-square"> </i>
                                                                     </button>
                                                                </div>
                                                            </form>
                                                            </td>
                                                            <td>
                                                            <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('services.supprimer', ['idService' => $service->idService]) }}" novalidate>
                                                                @method('delete')
                                                                @csrf 
                                                                <div class="icon">
                                                                     <button type="submit" class="btn btn-danger">
                                                                         <i class="bi bi-trash-fill"> </i>
                                                                     </button>
                                                                </div>
                                                            </form>
                                                            </td>
                                                    </tr>
                                                    @empty
                                                    <p>aucuns services</p>
                                                    @endforelse
                                                </table>
                                                    {{ $services->links('pagination') }}
                                            <form id="login" class="row g-3 needs-validation" method="post" action="{{ route('services.servicesexport') }}">
                                                @method('post')
                                                @csrf 
                                                <div class="icon">
                                                <button type="submit" class="btn btn-primary">
                                                    Exporter csv
                                                </button>
                                                </div>
                                             </form>
                                            </div>
                                    </div> 
                            </div>
                    </div>
            </div>
    </section>
</main>    
@endsection
