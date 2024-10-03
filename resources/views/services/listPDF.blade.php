<center>
<h1> Liste des services: </h1>
</center>
<table border="1" class="table">
    <tr>
            <th>IdService</th>
            <th>Nom</th>
    </tr>
    @forelse ($services as $service)
    <tr>
            <td>{{ $service->idService }}</td>
            <td>{{ $service->nom }}</td>
    </tr>
    @empty
    <p>aucuns services</p>
    @endforelse
</table>