<?php

namespace App\Http\Controllers;

use Request;
use \App\Models\Contents;
use Lang;
use Redirect;


class ContentsController extends Controller
{
    protected $limit = 20;
    
    protected $contents;
    
    public function __construct(Contents $contents )
    {
        $this->contents = $contents;
    }
    
    public function index()
    {
        $page = (int)Request::input('page');
        $page = ( !empty( $page ) ) ? $page : 1;
        $locale = Lang::getLocale();
        
        $count = $this->contents->getCount( [ 'null|deleted' => null ] );
        
        $page = max( min( $page, ceil( $count / $this->limit ) ), 1 );
        
        $contents = $this->contents->getContents( [ 'null|deleted' => null ], [ ['id' => 'DESC' ] ], $this->limit, ( $page - 1 ) * $this->limit );
        
        if ( !empty( $locale ) ) {
            
            $contents = \App\Helpers\LangData::changeData( $contents, ['name', 'text'], $locale );
        }
        
        $paging = \App\Helpers\Paging::paging( $count, $this->limit, $page );
        
        return view('admin.contents.list', ['contents' => $contents, 'paging' => $paging ]); 
    }
    
    public function show( $id )
    {
        return view('admin.contents.show', ['content' => Contents::find( $id ) ] );
    }
    
    public function postEdit()
    {
        $data = Request::all();
        
        $return_data = $this->contents->edit( $data );
        
        if ( $return_data === true ) {
            
            \Session::flash('status_msg', Lang::get('messages.Successfully update'));
        } else {
            
            \Session::flash('status_msg', Lang::get('messages.Unsuccessfully update'));
            \Session::flash('status_error', true);
        }
        
        if ( !empty( $data['id'] ) ) {
            
            return Redirect::to('admin/contents/' . $data['id'] . '/edit')->withinput( $data )->withErrors( $return_data );
        } else {
            
            return Redirect::to('admin/contents');
        }
    }
    
    public function postDelete()
    {
        $data = Request::all();
        
        if ( empty( $data['id'] ) ) {
            
            return response()->json( ['status' => 'error'] ); 
        }
        
        $return = $this->contents->postDelete( $data['id'] );
        
        $return_data = !empty( $return ) ? ['status' => 'ok'] : ['status' => 'error'];
        
        return response()->json( $return_data );
    }
    
    public function create()
    {
        $js['editor'] = ['text_lt', 'text_lv', 'text_ee', 'text_en', 'text_ru', 'text_pl'];
        $types = $this->contents->getTypes();
        
        return view('admin.contents.add', ['js' => $js, 'types' => $types ] );
    }
    
    public function postAdd()
    {
        $data = Request::all();
        
        $return_data = $this->contents->add( $data );
        
        if ( $return_data === true ) {
            
            \Session::flash('status_msg', Lang::get('messages.Successfully add'));
        } else {
            
            \Session::flash('status_msg', Lang::get('messages.Unsuccessfully add'));
            \Session::flash('status_error', true);
        }
        
        return Redirect::to('admin/contents/create')->withinput( $data )->withErrors( $return_data );        
    }
    
    public function postActive()
    {
        $data = Request::all();
        
        if ( empty( $data['id'] ) ) {
            
            return response()->json( ['status' => 'error'] ); 
        }
        
        $return = $this->contents->postActive( $data['id'] );
        
        $status = ( !empty( $return ) ) ? ['status' => 'ok']: ['status' => 'error'];
        
        return response()->json( $status ); 
    }
    
    public function edit( $id )
    {
        $content = [];
        
        if ( !empty( $id ) ) {
        
            $content = Contents::find( $id );
        }
        
        $js['editor'] = ['text_lt', 'text_lv', 'text_ee', 'text_en', 'text_ru', 'text_pl'];
        
        $types = $this->contents->getTypes();
        
        return view('admin.contents.edit', ['content' => $content, 'js' => $js, 'types' => $types ] );
    }
    
    public function footerMenu()
    {
        $locale = \Lang::getLocale();
        $locale = !empty( $locale ) ? $locale : 'lt';
        
        $list = $this->contents->footerMenu( $locale );
        
        return $list;
    }
    
    public function activeMenu( $slug, $id )
    {
        if ( empty( $id ) ) {
            
            return Redirect::to('/');
        }
        
        $locale = \Lang::getLocale();
        $locale = !empty( $locale ) ? $locale : 'lt';
        $item = $this->contents->activeContent( $id, $locale );
          
        if ( empty( $item ) ) {
            
            return Redirect::to('/');
        }
        
        return view('user.blocks.active_content', ['content' => $item ] );
    }
}
