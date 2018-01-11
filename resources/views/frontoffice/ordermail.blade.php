<h1>Bestelling</h1>
<h2>{{$user->getFullname()}}</h2>
<b>Mail:</b> {{$user->email}}<br/> <b>Tel:</b> {{$user->phone}}<br/>
<br/>
Bestelling:<br/>
<table>
	<tr>
		<th>Link</th>
		<th>Notities</th>
	</tr>
	@foreach($links as $link)
	<tr>
		<th>{{$link['link']}}</th>
		<th>{{$link['note']}}</th>
	</tr>
	@endforeach
</table>