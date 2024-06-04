<h1>{{$heading}}</h1>

if(count($listings)==0)
<p>No listings found</p>
@endif

@foreach($listings as $listing)
    <h2>{{$listing->name}}</h2>
    <p>{{$listing->description}}</p>
    <p>{{$listing->price}}</p>

@endforeach