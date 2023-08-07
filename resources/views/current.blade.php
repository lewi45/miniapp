@include('layouts.header') 

<div>
    @if ($forecast)
        @foreach($forecast as $citydata)  
            <b>{{ $citydata->name }}</b>
            (        {{ $citydata->coord->lat }},{{ $citydata->coord->lon }} )
            <br/>
            Hőmérséklet: {{ $citydata->main->temp }} <br/>
            Páratartalom: {{ $citydata->main->humidity }} <br/>
            Légnyomás: {{ $citydata->main->pressure }} <br/>
            Hőmérséklet-minimum: {{ $citydata->main->temp_min }} <br/>
            Hőmérséklet-maximum: {{ $citydata->main->temp_max }} <br/>
        
            Lekérdezési idő: {{ \Carbon\Carbon::now()->format('Y-m-d h:i:s')}} 
            <br/>
            Mérési idő: {{ \Carbon\Carbon::parse($citydata->dt)->format('Y-m-d h:i:s')}} 
            <br/><br/>   
        @endforeach 
        @else
        <p>Hiba a távoli elérésnél.</p>
    @endif
      
    


</div>

@include('layouts.footer') 