<?php

namespace App\Models;

use App\Structure;
use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    use Structure;
    
    public $timestamps = false;
    public $types = ['select' => '', 'contents' => '', 'faq' => ''];


    public function getContents( $filter = [], $order = [], $limit = 100000, $offset = 0 )
    {
        $sql = $this->get( $filter, $order, $limit, $offset );
        
        $contents = $sql->get();
        
        return $contents;
    }
    
    public function getCount( $filter = [] )
    {
        $count = $this->count( $filter );
        
        return $count;
    }
    
    public function edit( $data = array() )
    {
        if ( empty( $data ) || empty( $data['id'] ) ) {
            
            return false;
        }
          
        $messages = array(
            'required' => \Lang::get('messages.error_empty'),
            'min' => \Lang::get('messages.error_min')
        );
        
        $content = self::find( $data['id'] );
        
        if ( empty( $content ) ) {
            
            return false;
        }
        
        $rules = array();
        
        $validator = \Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {

            return $validator->getMessageBag()->toArray();
        }
        
        $content->name_lt = isset( $data['name_lt'] ) ? $data['name_lt'] : $content->name_lt;
        $content->slug_lt = \App\Helpers\Slug::createSlug( $content->name_lt );
        $content->name_lv = isset( $data['name_lv'] ) ? $data['name_lv'] : $content->name_lv;
        $content->slug_lv = \App\Helpers\Slug::createSlug( $content->name_lv );
        $content->name_ee = isset( $data['name_ee'] ) ? $data['name_ee'] : $content->name_ee;
        $content->slug_ee = \App\Helpers\Slug::createSlug( $content->name_ee );
        $content->name_en = isset( $data['name_en'] ) ? $data['name_en'] : $content->name_en;
        $content->slug_en = \App\Helpers\Slug::createSlug( $content->name_en );
        $content->name_ru = isset( $data['name_ru'] ) ? $data['name_ru'] : $content->name_ru;
        $content->slug_ru = \App\Helpers\Slug::createSlug( $content->name_ru );
        $content->name_pl = isset( $data['name_pl'] ) ? $data['name_pl'] : $content->name_pl;
        $content->slug_pl = \App\Helpers\Slug::createSlug( $content->name_pl );
        $content->text_lt = isset( $data['text_lt'] ) ? $data['text_lt'] : $content->text_lt;
        $content->text_lv = isset( $data['text_lv'] ) ? $data['text_lv'] : $content->text_lv;
        $content->text_ee = isset( $data['text_ee'] ) ? $data['text_ee'] : $content->text_ee;
        $content->text_en = isset( $data['text_en'] ) ? $data['text_en'] : $content->text_en;
        $content->text_ru = isset( $data['text_ru'] ) ? $data['text_ru'] : $content->text_ru;
        $content->text_pl = isset( $data['text_pl'] ) ? $data['text_pl'] : $content->text_pl;
        $content->module = ( !empty( $data['module'] ) && $data['module'] != 'select' ) ? $data['module'] : 'contents';
        $content->type = ( $content->module != 'contents' && $content->module != 'select' ) ? 'module' : 'contents';
        $content->active = !empty( $data['active'] ) ? 1 : 0;
        
        return $content->save();
    }
    
    public function postDelete( $id )
    {
        if ( empty( $id ) ) {
           
            return false;
        }
        
        $content = self::find( $id );
        
        if ( empty( $content ) ) {
            
            return false;
        }
        
        $content->deleted = true;
        
        return $content->save();
    }
    
    public function postActive( $id )
    {
        if ( empty( $id ) ) {
           
            return false;
        }
        
        $content = self::find( $id );
        
        if ( empty( $content ) ) {
            
            return false;
        }
        
        $content->active = !empty( $content->active ) ? 0 : 1;
        
        return $content->save();
    }
    
    public function add( $data = array() )
    {
        if ( empty( $data ) ) {
            
            return false;
        }
          
        $messages = array(
            'required' => \Lang::get('messages.error_empty'),
            'min' => \Lang::get('messages.error_min'),
            'email' => \Lang::get('messages.error_email'),
        );
        
        $rules = array();
        
        $validator = \Validator::make($data, $rules, $messages );
        
        if ( $validator->fails() ) {

            return $validator->getMessageBag()->toArray();
        }
        
        $content = App::make( 'App\Bananacar\Content' );
        
        $content->name_lt = isset( $data['name_lt'] ) ? $data['name_lt'] : '';
        $content->slug_lt = \App\Helpers\Slug::createSlug( $content->name_lt );
        $content->name_lv = isset( $data['name_lv'] ) ? $data['name_lv'] : '';
        $content->slug_lv = \App\Helpers\Slug::createSlug( $content->name_lv );
        $content->name_ee = isset( $data['name_ee'] ) ? $data['name_ee'] : '';
        $content->slug_ee = \App\Helpers\Slug::createSlug( $content->name_ee );
        $content->name_en = isset( $data['name_en'] ) ? $data['name_en'] : '';
        $content->slug_en = \App\Helpers\Slug::createSlug( $content->name_en );
        $content->name_ru = isset( $data['name_ru'] ) ? $data['name_ru'] : '';
        $content->slug_ru = \App\Helpers\Slug::createSlug( $content->name_ru );
        $content->name_pl = isset( $data['name_pl'] ) ? $data['name_pl'] : '';
        $content->slug_pl = \App\Helpers\Slug::createSlug( $content->name_pl );
        $content->text_lt = isset( $data['text_lt'] ) ? $data['text_lt'] : '';
        $content->text_lv = isset( $data['text_lv'] ) ? $data['text_lv'] : '';
        $content->text_ee = isset( $data['text_ee'] ) ? $data['text_ee'] : '';
        $content->text_en = isset( $data['text_en'] ) ? $data['text_en'] : '';
        $content->text_ru = isset( $data['text_ru'] ) ? $data['text_ru'] : '';
        $content->text_pl = isset( $data['text_pl'] ) ? $data['text_pl'] : '';
        $content->module = ( !empty( $data['module'] ) && $data['module'] != 'select' ) ? $data['module'] : 'contents';
        $content->type = ( $content->module != 'contents' && $content->module != 'select' ) ? 'module' : 'contents';
        $content->create = date( 'Y-m-d H:i:s' );
        $content->active = ( !empty( $data['active'] ) ) ? 1 : 0;
        
        return $content->save();
    }
    
    public function footerMenu( $lang )
    {
        $filter = ['null|deleted' => null, 'eq|active' => 1, 'noteq|name_' . $lang => '' ];
        $menu = $this->get( $filter );        
        $list = $menu->get();
        
        $list = \App\Helpers\LangData::changeData( $list, ['name', 'text', 'slug'], $lang );
        
        if ( !empty( $list ) ) {
            
            foreach ( $list as $key => $val ) {
                
                if ( !empty( $val['type'] ) && $val['type'] == 'module' && !empty( $val['module'] ) ) {
                    
                    $list[ $key ]['_url_'] = $val['module'];
                }
            }
        }
        
        return $list;
    }
    
    public function activeContent( $id, $lang )
    {
        $filter = ['null|deleted' => null, 'eq|active' => 1, 'id' => $id, 'noteq|name_' . $lang => '' ];
        $menu = $this->get( $filter );        
        $item = $menu->first();
        
        $item = \App\Helpers\LangData::changeData( [ $item ], ['name', 'text', 'slug'], $lang );
        
        $item = reset( $item );
        
        return $item;
    }
    
    public function getTypes()
    {
        if( $this->types ) {
            
            foreach ( $this->types as $key => $val ) {
                
                $this->types[ $key ] = \Lang::get('select.' . $key );
            }
        }
        
        return $this->types;
    }
}
