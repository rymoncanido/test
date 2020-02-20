<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Paintjobs;
	use DB;
	class PaintjobsController extends Controller
	{
		//
		private $colors = array('r'=>'Red','g'=>'Green','b'=>'Blue');
		function insert()
		{
			Paintjobs::create($_POST);
			return redirect()->route('paintjobs');
		}
		public function getStats()
		{
			$return['colors'] = $this->colors;
			$return['progress'] = DB::table('paintjobs')->where('status','0')->orderBy('created_at','ASC')->take(5)->get();
			$return['stats']= Paintjobs::select('new_color',DB::raw('count(*) as total'))->where('status','1')->groupBy('new_color')->orderBy('new_color','DESC')->get();
			if(count($return['progress']) == 5)
			{
				// DB::enableQueryLog();
				$return['pending'] = DB::table('paintjobs')->where('status','0')->orderBy('created_at','ASC')->offset(5)->take(5)->get();
				// dd(DB::getQueryLog());
			}
			return $return;
		}
		function refresh()
		{
			$temp = PaintjobsController::getStats();
			foreach($temp['stats'] as $stat)
			{
				$return[$stat['new_color']] = $stat['total'];
				}
			if(!empty($temp['progress']))
			{
				foreach($temp['progress'] as $prog)
				{
					$return['prog']['id'][] = $prog->plate;
					$return['prog']['plate'][] = $prog->plate;
					$return['prog']['last_color'][] = $prog->last_color;
					$return['prog']['new_color'][] = $prog->new_color;
				}
			}
			if(!empty($temp['pending']))
			{
				foreach($temp['pending'] as $prog)
				{
					$return['pend']['id'][] = $prog->plate;
					$return['pend']['plate'][] = $prog->plate;
					$return['pend']['last_color'][] = $this->colors[$prog->last_color];
					$return['pend']['new_color'][] = $this->colors[$prog->new_color];
				}
			}
			echo json_encode($return,false);
		}
		function view()
		{
			$return = PaintjobsController::getStats();
			return view('paintjobs',$return);
		}
		function update($id)
		{
			$pj = Paintjobs::findOrFail($id);
			$pj->status = '1';
			$pj->save();
			return redirect()->route('paintjobs');
		}
	}