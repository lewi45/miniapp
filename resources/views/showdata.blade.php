@include('layouts.header') 

<div >
    <h2>{{ $cityname }} város utolsó 24 órás mért adatai:</h2>
    <table class="table table-striped">
        <thead>
            <th>Időpont</th>
            <th>Hömérséklet</th>
            <th>Páratartalom</th>
            <th>Légnyomás</th>
            <th>Hömérséklet min.</th>
            <th>Hömérséklet max.</th>
        </thead>
    @foreach ($weatherdatas as $weatherdata)
        <tr>
            <td>{{ $weatherdata->dt }}</td>
            <td>{{ $weatherdata->temp }} °C</td>
            <td>{{ $weatherdata->humidity }} %</td>
            <td>{{ $weatherdata->pressure }} kPa</td>
            <td>{{ $weatherdata->temp_min }} °C</td>
            <td>{{ $weatherdata->temp_max }} °C</td>
        </tr>
    @endforeach
    </table>
</div>

@include('layouts.footer') 