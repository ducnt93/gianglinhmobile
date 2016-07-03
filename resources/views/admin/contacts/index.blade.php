<h1>Danh sách </h1>
{!! link_to_route('contacts.create', 'New contacts') !!}
<table border="1">
    <tr>
        <th>Edit</th>
        <th>Delete</th>
        <th>Title</th>
    </tr>
    @foreach ($contacts as $contact)
        <tr>
            <td>{!! link_to_route('contacts.edit', 'Edit', $contact->id) !!}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $contact->id]]) !!}
                <button type="submit">Delete</button>
                {!! Form::close() !!}
            </td>
            <td>{!! link_to_route('contacts.show', $contact->title, $contact->id) !!}</td>
        </tr>
    @endforeach
</table>