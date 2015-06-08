<?php namespace JoeCianflone\Http\Controllers;

use Twitter;
use Illuminate\Http\Request;
use JoeCianflone\Http\Requests;
use JoeCianflone\Stream;
use Ramsey\Uuid\Uuid;
use DB;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;

class HomeController extends Controller
{
   protected $stream;

    public function index(StreamRepository $stream)
    {
       $this->stream = $stream;
       $this->stream->getFullStream(10);

       // dd (json_decode($this->stream->getFullStream()));
       //dd (Uuid::uuid1()->toString());
      // $this->stream = $stream;

      // $latestTweets = Transformer::tweets(Twitter::getUserTimeline([['screen_name' => 'joecianflone', 'count' => 10]]));
      // $this->stream->saveLatestTweets($latestTweets);

      // $latestArticles = Transformer::articles(Articles::getLatest(['count' => 5]));
      // $this->stream->saveLatestArticles($latestArticles);



  //   DB::table('streams')->truncate();
/*       foreach ($rawTweets as $t) {
         var_dump($t);
          $this->stream->create([
              'id' => Uuid::uuid1()->toString(),
               'data' => json_encode($t),
               'social_type' => 'twitter',
               'created_at' => $t->created_at
           ]);
          echo "<br>";
        }
        */
        //$data = json_decode($this->stream->find('83982712-0a73-11e5-be67-080027dcfac6')->data);
        //dd ($data->text);


       return view('pages.home');
    }

}
