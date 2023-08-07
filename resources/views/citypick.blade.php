@include('layouts.header') 

<div >
    <h2>Válassz várost</h2>
    <form method="POST" action="{{ route('showData') }}" class="row">
        @csrf  
        @method('POST')
        <div class="col-md-6">
            <select class="form-control" name="city_name">
                @foreach ($citylist as $city)
                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-secondary">Mehet</button>
        </div>
    </form>

</div>

@include('layouts.footer') 