<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Movie;
use App\Models\Branch;
use App\Models\DateTime;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Auth;
use Session;

class MovieController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth'); //the construct require user login before access the controller function
    // }


    public function index()
    {
        $branch = Branch::all();
        $detail = Auth::user();

        $length = count($branch);
        $check = "Yes";

        for ($x = 0; $x < $length; $x++) {
            if (!empty($branch)) {
                $check = "No";
                break;
            } else {
                $check = "Yes";
            }
        }

        if ($check == "Yes") {

            Session::flash('danger', "Please insert branch first!");
            return redirect()->route('viewBranch');
        } else {

            return view('insertMovie')->with('branchs', $branch)
                ->with('details', $detail);
        }
    }

    public function details()
    {

        $r = request();

        $r->validate([
            'movieImage' => 'required|mimes:jpeg, png, jpg, jfif',
            'movieTrailer' => 'required|mimes:mp4, ogg, webm'
        ]);

        $image = $r->movieImage;
        $image->move('images', $image->getClientOriginalName());
        $imageName = $image->getClientOriginalName();

        $trailer = $r->movieTrailer;
        $trailer->move('trailers', $trailer->getClientOriginalName());
        $trailerName = $trailer->getClientOriginalName();

        $subtitle = implode(',', $r->subtitle);
        $branchID = implode(',', $r->branchID);

        $addMovie = Movie::create([
            'name' => $r->movieName,
            'description' => $r->movieDescription,
            'price' => $r->moviePrice,
            'image' => $imageName,
            'video' => '',
            'trailer' => $trailerName,
            'duration' => $r->movieDuration,
            'releaseDate' => $r->movieDate,
            'subtitle' => $subtitle,
            'cast' => $r->movieCast,
            'director' => $r->movieDirector,
            'label' => $r->label,
            'distributor' => $r->movieDistributor,
            'branchID' => $branchID,
            'status' => $r->status,
        ]);

        $detail = Auth::user();

        return view('insertVideo')->with('movieName', $r->movieName)
            ->with('movieDescription', $r->movieDescription)
            ->with('moviePrice', $r->moviePrice)
            ->with('movieImage', $imageName)
            ->with('movieTrailer', $trailerName)
            ->with('movieDuration', $r->movieDuration)
            ->with('movieDate', $r->movieDate)
            ->with('subtitles', $subtitle)
            ->with('movieCast', $r->movieCast)
            ->with('movieDirector', $r->movieDirector)
            ->with('label', $r->label)
            ->with('movieDistributor', $r->movieDistributor)
            ->with('branchID', $branchID)
            ->with('status', $r->status)
            ->with('details', $detail);
    }

    public function upload(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk('public');
            $path = $disk->putFileAs('videos', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function store()
    {
        $r = request();

        $storeVideo = DB::table('movies')
            ->where('movies.name', '=', $r->movieName)
            ->where('movies.description', '=', $r->movieDescription)
            ->where('movies.price', '=', $r->moviePrice)
            ->where('movies.image', '=', $r->movieImage)
            ->where('movies.trailer', '=', $r->movieTrailer)
            ->where('movies.duration', '=', $r->movieDuration)
            ->where('movies.releaseDate', '=', $r->movieDate)
            ->where('movies.subtitle', '=', $r->subtitle)
            ->where('movies.cast', '=', $r->movieCast)
            ->where('movies.director', '=', $r->movieDirector)
            ->where('movies.label', '=', $r->label)
            ->where('movies.distributor', '=', $r->movieDistributor)
            ->where('movies.branchID', '=', $r->branchID)
            ->where('movies.status', '=', $r->status)
            ->update([
                'video' => $r->movieVideo,
            ]);

        return redirect()->route('viewMovie');
    }

    public function view()
    {
        $movie = Movie::all();
        $detail = Auth::user();

        return view('showMovie')->with('movies', $movie)
            ->with('details', $detail);
    }

    public function edit($id)
    {
        $movie = Movie::all()->where('id', $id);
        $movieDetails = Movie::find($id);

        $branch = Branch::all();
        $detail = Auth::user();

        return view("editMovie")->with('movies', $movie)
            ->with('branchs', $branch)
            ->with('movieBranches', explode(',', $movieDetails->branchID))
            ->with('subtitles', explode(',', $movieDetails->subtitle))
            ->with('details', $detail);
    }

    public function delete($id)
    {
        $delete = Movie::find($id);
        $delete->delete();
        Session::flash('danger', "Movie deleted successful!");
        return redirect()->route('viewMovie');
    }

    public function updateDetails()
    {
        $r = request();

        $r->validate([
            'movieImage' => 'required|mimes:jpeg, png, jpg, jfif',
            'movieTrailer' => 'required|mimes:mp4, ogg, webm'
        ]);

        $updateMovie = Movie::find($r->movieID);
        $updateDateTime = DB::table('date_times')
            ->where('date_times.movie', '=', $updateMovie->name)
            ->update([
                'movie' => $r->movieName
            ]);

        $image = $r->movieImage;
        $image->move('images', $image->getClientOriginalName());
        $imageName = $image->getClientOriginalName();

        $trailer = $r->movieTrailer;
        $trailer->move('trailers', $trailer->getClientOriginalName());
        $trailerName = $trailer->getClientOriginalName();

        $subtitle = implode(',', $r->subtitle);
        $branchID = implode(',', $r->branchID);

        $updateMovie->name = $r->movieName;
        $updateMovie->description = $r->movieDescription;
        $updateMovie->price = $r->moviePrice;
        $updateMovie->image = $imageName;
        $updateMovie->trailer = $trailerName;
        $updateMovie->duration = $r->movieDuration;
        $updateMovie->releaseDate = $r->movieDate;
        $updateMovie->subtitle = $subtitle;
        $updateMovie->cast = $r->movieCast;
        $updateMovie->director = $r->movieDirector;
        $updateMovie->label = $r->label;
        $updateMovie->distributor = $r->movieDistributor;
        $updateMovie->branchID = $branchID;
        $updateMovie->status = $r->status;
        $updateMovie->save();

        $detail = Auth::user();

        return view('editVideo')->with('movieName', $r->movieName)
            ->with('movieDescription', $r->movieDescription)
            ->with('moviePrice', $r->moviePrice)
            ->with('movieImage', $imageName)
            ->with('movieTrailer', $trailerName)
            ->with('movieDuration', $r->movieDuration)
            ->with('movieDate', $r->movieDate)
            ->with('subtitles', $subtitle)
            ->with('movieCast', $r->movieCast)
            ->with('movieDirector', $r->movieDirector)
            ->with('label', $r->label)
            ->with('movieDistributor', $r->movieDistributor)
            ->with('branchID', $branchID)
            ->with('status', $r->status)
            ->with('details', $detail);
    }

    public function updateVideo()
    {
        $r = request();

        $storeVideo = DB::table('movies')
            ->where('movies.name', '=', $r->movieName)
            ->where('movies.description', '=', $r->movieDescription)
            ->where('movies.price', '=', $r->moviePrice)
            ->where('movies.image', '=', $r->movieImage)
            ->where('movies.trailer', '=', $r->movieTrailer)
            ->where('movies.duration', '=', $r->movieDuration)
            ->where('movies.releaseDate', '=', $r->movieDate)
            ->where('movies.subtitle', '=', $r->subtitle)
            ->where('movies.cast', '=', $r->movieCast)
            ->where('movies.director', '=', $r->movieDirector)
            ->where('movies.label', '=', $r->label)
            ->where('movies.distributor', '=', $r->movieDistributor)
            ->where('movies.branchID', '=', $r->branchID)
            ->where('movies.status', '=', $r->status)
            ->update([
                'video' => $r->movieVideo,
            ]);

        return redirect()->route('viewMovie');
    }

    public function movieDetail($id)
    {
        $movieDetail = Movie::all()->where('id', $id);
        $detail = Auth::user();
        $branch = Branch::all();
        $movie = Movie::find($id);

        return view('movieDetail')->with('movieDetails', $movieDetail)
            ->with('branchs', $branch)
            ->with('movieBranches', explode(',', $movie->branchID))
            ->with('subtitles', explode(',', $movie->subtitle))
            ->with('details', $detail);
    }

    public function viewAll()
    {
        $movie = Movie::all();
        return view('movieLists')->with('movies', $movie);
    }

    public function confirmDate($id)
    {
        $payment = Payment::all()->where('userId', Auth::id());

        $checkPayment = count($payment);

        if ($checkPayment == 0) {
            $movie = Movie::find($id);
            $time = DateTime::all()->where('movie', $movie->name);

            $length = count($time);

            if ($length != 0) {
                $movieDetail = Movie::all()->where('id', $id);
                $user = DB::table('users')
                    ->where('users.id', '=', Auth::id())
                    ->get();

                return view('movieDateConfirm')->with('dateTimes', $time)
                    ->with('users', $user)
                    ->with('movies', $movieDetail);
            } else {
                Session::flash('danger', "We are not provide booking for this movie now. Please choose another movie!");
                return redirect()->route('movieLists');
            }
        }else {
            Session::flash('danger', "Please clear your payment first before you booking another movie!");
            return redirect()->route('movieLists');
        }
    }

    public function movieListsDetail()
    {
        $movie = Movie::all()->where('id', request()->id);
        $movieName = Movie::find(request()->id);
        $date = request()->date;
        $time = DateTime::all()
            ->where('movie', $movieName->name)
            ->where('date', $date);

        $branchID = explode(',', $time->first()->branchID);
        $branch = Branch::all();
        $user = DB::table('users')
            ->where('users.id', '=', Auth::id())
            ->get();

        return view('movieListsDetail')->with('movies', $movie)
            ->with('branches', $branch)
            ->with('branchesID', $branchID)
            ->with('dateTimes', $date)
            ->with('users', $user)
            ->with('times', explode(',', $time->first()->time));
    }

    public function movieListsInfoMore($id)
    {
        $movie = Movie::all()->where('id', $id);
        $branch = Branch::all();
        $movieBranch = Movie::find($id)->value('branchID');

        return view('movieListsInfoMore')->with('movies', $movie)
            ->with('branchs', $branch)
            ->with('movieBranches', explode(',', $movieBranch));
    }

    public function searchMovie()
    {
        $r = request();
        $keywordMovie = $r->keywordMovie;
        $movie = DB::table('movies')
            ->where('movies.image', 'like', '%' . $keywordMovie . '%')
            //->orWhere('movies.description','like','%'.$keywordMovie.'%')
            ->get();

        return view('movieLists')->with('movies', $movie);
    }

    public function adminSearchMovie()
    {
        $r = request();
        $keywordAdminMovie = $r->keywordAdminMovie;
        $movie = DB::table('movies')
            ->where('movies.name', 'like', '%' . $keywordAdminMovie . '%')
            //->orWhere('movies.description','like','%'.$keywordAdminMovie.'%')
            ->paginate(5);
        $detail = Auth::user();

        return view('showMovie')->with('movies', $movie)
            ->with('details', $detail);
    }

    public function homePageMovie()
    {
        $movie = Movie::all();

        return view('welcome')->with('movies', $movie);
    }
}
