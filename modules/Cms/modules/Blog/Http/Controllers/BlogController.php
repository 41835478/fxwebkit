<?php 

namespace CmsModules\Blog\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use CmsModules\Blog\Entities\Users;
use Modules\Module1\Http\Controllers\Module1Controller;
use Illuminate\Support\Facades\View;
class BlogController extends Controller {
	
	public function index()
	{
            
            
            
             View::addNamespace('blog2', 'Resources\views');
              
              
              
              
		return View::make('blog2::index');
        
        
                return $content->render();
        }
}