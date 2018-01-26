@if(empty($crew))
<h5>No Crews for now - Maybe add?</h5>
@else
@foreach($crew as $c)
<tr>
<td>{{$loop->iteration}}</td>
<td id="crew-avatar"><img src="/storage/crew_avatars/{{$c->avatar}}" class="pb"></td>
<td>{{$c->name}}</td>
<td>
{{$c->position}}
</td>
<td>{{$c->contact_number}}</td>
<td>{{$c->About}}</td>
<td>
	<button type="button" id="editcrewbtn" class="btn btn-primary mpw" data-id="{{$c->id}}" data-name="{{$c->name}}" data-position="{{$c->position}}" data-contact="{{$c->contact_number}}" data-about="{{$c->about}}"><i class="fa fa-pencil"></i>&nbsp; Edit</button>
    <button type="button" id="removecrewbtn" class="btn btn-danger mpw" data-id="{{$c->id}}"><i class="fa fa-trash"></i>&nbsp; Remove</button>
</td>
</tr>
@endforeach
@endif