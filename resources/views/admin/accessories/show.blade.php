<article>
    <h1>{{ $accessory->Accessoryname }}</h1>
    <div>{{ $accessory->Price }}</div>
</article>
{!! link_to_route('admin/accessories.index', 'Phụ kiện') !!}