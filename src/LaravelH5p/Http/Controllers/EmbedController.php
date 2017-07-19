<?php

namespace thomasmars\LaravelH5p\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use H5pCore;
use H5peditor;
use thomasmars\LaravelH5p\LaravelH5p;
use thomasmars\LaravelH5p\Events\H5pEvent;
use thomasmars\LaravelH5p\Eloquents\H5pContent;
use thomasmars\LaravelH5p\Http\Requests\PostH5pContent;
use thomasmars\LaravelH5p\Eloquents\H5pLibrary;

class EmbedController extends Controller {

    public function __invoke(Request $request, $id) {

        $h5p = App::make('LaravelH5p');
        $core = $h5p::$core;

        $settings = $h5p::get_core();

        $content = $h5p->get_content($id);

        $embed_code = $h5p->get_embed($content, $settings);

        event(new H5pEvent('content', NULL, $content['id'], $content['title'], $content['library']['name'], $content['library']['majorVersion'], $content['library']['minorVersion']));

        return view('h5p.content.embed', compact("settings", 'user', 'embed_code'));
    }

}
