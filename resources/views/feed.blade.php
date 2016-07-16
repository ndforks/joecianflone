<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
      <title>JoeCianflone.co</title>
      <link>{{ url()->full() }} </link>
      <description>Hi there I'm Joe Cianflone and this is my RSS feed</description>
      <atom:link href="{{ url()->full() }}" rel="self" type="application/rss+xml" />
         @foreach ($siteContent as $item)
            <item>
                <title>{{ $item->content->headline }}</title>
                <description>
                    {{ $item->content->summary }}
                </description>
                <pubDate>{{ $item->item_created_at }}</pubDate>
                <link>{{ url($item->type."/".$item->slug) }}</link>
                <guid isPermalink="true">{{ $item->item_id }}</guid>
            </item>
         @endforeach
   </channel>
</rss>
