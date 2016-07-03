<article>
    <h1>{{ $contact->title }}</h1>
    <div>{{ $contact->content }}</div>
</article>
{!! link_to_route('articles.index', 'Articles') !!}