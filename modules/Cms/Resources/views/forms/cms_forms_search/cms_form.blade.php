
    <h2>Search for ( {{$search}} ) results :</h2>
    <hr/>

    @foreach($results as $result)

<section id="list-news">

    <article class="news-box">
            <h3><a href="/{{ strtolower(str_replace(' ','-',$result->menuItem->name)) }}">{{$result->title}}</a></h3>

        <p>{{substr( strip_tags($result->body),0,500)}}...</p>
        <a class="read-more search-page-right" href="/{{ strtolower(str_replace(' ','-',$result->menuItem->name)) }}">Read More</a>
    </article><!--.news-box-->
</section>

    @endforeach

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif