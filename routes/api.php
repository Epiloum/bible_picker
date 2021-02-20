<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/books', function (Request $request) {
    return $request->testament();
});
*/

Route::get('/books', function (Request $request) {
        if (!in_array($request->testament, ['구약', '신약'])) {
            return '{"err":"1"}';
        }

        $data = [];
        $books = App\Book::where('testament', $request->testament)
            ->orderBy('no', 'asc')
            ->get();

        foreach ($books as $v) {
            $data[] = [
                'no' => $v->no,
                'label' => $v->long_label,
                'chapter_cnt' => $v->chapter_cnt
            ];
        }

        return json_encode($data);
    }
);

Route::get('/texts', function (Request $request) {
        $start = explode(':', $request->start);
        $end = explode(':', $request->end);

        $data = [];
        $books = App\Text::where([
                ['book', $request->book],
                ['chapter', '>=', $start[0]],
                ['paragraph', '>=', $start[1]],
                ['chapter', '<=', $end[0]],
                ['paragraph', '<=', $end[1]]
            ])
            ->orderBy('no', 'asc')
            ->get();

        foreach ($books as $v) {
            $data[] = [
                'no' => $v->no,
                'label' => $v->long_label
            ];
        }

        return json_encode($data);
    }
);
