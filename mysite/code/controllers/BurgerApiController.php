<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTPResponse;

class BurgerApiController extends ContentController
{
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * [
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * ];
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = [
        "burgers",
        "index",
        "add",
    ];

    // private static $url_handlers = [
    //     'burgers/$Action' => 'add'
    // ];

    protected function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
    }

    /*
        {
            streamer :  "bob",
            [
                burgerseeeeeeeeeeeeee    
            ]
        }

    */

    public function add() 
    {
        
        $post = json_decode( $this->getRequest()->getBody() );

  

        if(!$post->streamer){
            return $this->getResponse()->setStatusCode(401);
        }

        $streamer = Streamer::addOrCreate($post->streamer);

        $burger = null;
        if($post->burger->ingredients){
            $burger = Burger::create();
            $burger->write();
            foreach ($post->burger->ingredients as $key => $value) {
                $burger->Ingredients()->add(
                    Ingredient::create([ "Key" => $value ])
                );
            }

            $streamer->Burgers()->add($burger);
            $streamer->write();
        }

        $this->getResponse()->setBody(json_encode(
            [
                "status" => $burger
            ]
        ));


        $this->getResponse()->addHeader("Content-type", "application/json");
    
        return $this->getResponse();

    }

}
