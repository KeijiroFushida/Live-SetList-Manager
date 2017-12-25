<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
	private $filters = array(
		'eventName' => null,
		'artistName' => null,
		'eventPlace' => null,
		'eventDate' => null,
	);

	public function index(Request $request){
		// POSTデータを取得
		$post = $request->input();
		var_dump($post);
		// POSTがあれば検索
		if (!empty($post)) {
			$this->filters['eventName'] = $post['eventName'];
			$this->filters['artistName'] = $post['artistName'];
			$this->filters['eventPlace'] = $post['eventPlace'];
			$this->filters['eventDate'] = $post['eventDate'];
			$request->session()->put('filters', $this->filters);
		} elseif ($request->session()->has('filters')) {
			$this->filters = session('filters');
		}

		if (isset($this->filters)) {
			$event_data = $this->retrieval($this->filters);
		} else {
			$event_data = Event::select()
				->join('artist_event','events.id','=','artist_event.event_id')
				->join('artists','artist_event.artist_id','=','artists.id')
				->get();
		}
		return view('events.index',['event_data' => $event_data]);
	}

	public function getEventDetail($event_id)
	{
		$event = Event::findOrFail($event_id);
		return view('events.detail', ['event' => $event]);
	}

	public function retrieval($filters) {
		$query = Event::select();
		// イベント名
		if (isset($filters['eventName'])) {
			$query->where('events.event_name',$filters['eventName']);
		}
		// アーティスト名
		if (isset($filters['artistName'])) {
			$query->where('artists.artist_name',$filters['artistName']);
		}
		// 開催地
		if (isset($filters['eventPlace'])) {
			$query->where('events.artist_name',$filters['eventPlace']);
		}
		// イベント日時
		if (isset($filters['eventDate'])) {
			$query->where('artists.event_date',$filters['eventDate']);
		}
		$ret = $query->join('artist_event','events.id','=','artist_event.event_id')
				->join('artists','artist_event.artist_id','=','artists.id')
				->get();
		return $ret;
	}
}
