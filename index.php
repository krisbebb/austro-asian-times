<?php
/* SET to display all warnings in development. Comment next two lines out for production mode*/
// ini_set('display_errors','On');
// error_reporting(E_ERROR | E_PARSE);

/* Set the path to the framework folder */
// DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib/");
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/../lib/");

/* SET VIEW paths */
DEFINE("VIEWS",LIB."views/");
DEFINE("PARTIALS",VIEWS."partials/");

/* set the path to the Model classes folder */
DEFINE("MODELS",LIB."models");

/* Path to the Mouse application i.e. the Mouse Framework */
DEFINE("MOUSE",LIB."mouse.php");

/* Define a default layout */
DEFINE("LAYOUT","standard");

/* Start the Mouse application */
require MOUSE;

get("/",function($app){
   $app->force_to_http("/");
   $app->set_message("title","The Austro-Asian Times");
   $app->set_message("message","Latest Headlines");
   try{
     $user = new User();
     if($user->is_authenticated()){
        $app->set_message("authenticated",true);
      }
      if($user->is_admin()){
        $app->set_message("is_admin",true);
      }
	    $article = new Article();
      $results= $article->get_latest_articles();



      $app->set_message("latest",$results);

   }
   catch(Exception $e){
         $app->set_message("error, ",$e->getMessage());
   }

   $app->render(LAYOUT,"home");
});

get("/my_articles", function($app){

       $app->force_to_https("/my_articles");
       $name = "";

       try{
         $user = new User();
         $id = $user->get_user_id();
         if($user->is_authenticated()){
             $app->set_message("authenticated",true);
             if($user->is_admin()){
               $app->set_message("is_admin",true);
             }

             $article = new Article();

             $results = $article->get_user_articles($id);
             $name = $user->get_user_name($id);



         }
         else if($user->is_db_empty()){
             $app->redirect_to('/signup');
         }
         else{
	         $app->set_flash("You are not authorised to see Members pages. Sign in first.");
             $app->redirect_to('/signin');
         }
       }
       catch(Exception $e){
             $app->set_flash("error, ",$e->getMessage());
             $app->redirect_to('/home');
       }

       $app->set_message("title","Members");
       $app->set_message("name",$name);
       $app->set_message("stories",$results);

       $app->render(LAYOUT,"member");


});


get("/members",function($app){
   $app->force_to_https("/members");

   try{
     $user = new User();
     if(($user->is_authenticated()) && ($user->is_admin())){
        $app->set_message("authenticated",true);
        $app->set_message("is_admin",true);
        $results = $user->get_users();
        $app->set_message("users",$results);
     }
     else if($user->is_db_empty()){
         $app->redirect_to('/signup');
     }
     else{
         $app->set_flash("You are not authorised for this page. Try signing in.");
         $app->redirect_to('/signin');
     }
   }
   catch(Exception $e){
         $app->set_message("error, ",$e->getMessage());
   }


   $app->set_message("title","Members");
   $app->render(LAYOUT,"members");
});

post("/member/:id",function($app){
  $id = $app->route_var('id');

  if(is_numeric($id)){

       $app->force_to_https("/member");
       $name="";

       try{
         $user = new User();
         if(($user->is_authenticated()) && ($user->is_admin())){
             $app->set_message("authenticated",true);
             $app->set_message("is_admin",true);
             $name = $user->get_user_name($app->route_var("id"));
             $article = new Article();
             // error_log($name);
             $results = $article->get_user_articles($id);
             if(empty($name)){
	            $name = "NO SUCH USER";
            }


         }
         else if($user->is_db_empty()){
             $app->redirect_to('/signup');
         }
         else{
	         $app->set_flash("You are not authorised to see Members pages. Sign in first.");
             $app->redirect_to('/signin');
         }
       }
       catch(Exception $e){
             $app->set_flash("error, ",$e->getMessage());
             $app->redirect_to('/home');
       }

       $app->set_message("title","Members");
       $app->set_message("name",$name);
       $app->set_message("stories",$results);

       $app->render(LAYOUT,"member");
  }
  else{
     $app->reset_route();
    }
});

get("/story/:art_id",function($app){
  $id = $app->route_var('art_id');
  if(is_numeric($id)){

       $results="";

       try{
         $user = new User();
         if($user->is_authenticated()){
            $app->set_message("authenticated",true);
          }
          if ($user->is_admin()){
            $app->set_message("is_admin",true);
          }

         $article = new Article();
         $results = $article->get_article($id);
         $tags = $article->get_tags($id);

       }
       catch(Exception $e){
             $app->set_flash("error, ",$e->getMessage());
             $app->redirect_to('/home');
       }

       $app->set_message("title","Story");
       $app->set_message("story",$results);
       $app->set_message("tags",$tags);

       $app->render(LAYOUT,"story");


  }
  else{

     $app->reset_route();
    }
});
post("/story/:art_id/edit",function($app){
  $id = $app->route_var('art_id');
  if(is_numeric($id)){

       $results="";

       try{
         $user = new User();
         if($user->is_authenticated()){
            $app->set_message("authenticated",true);
          }
          if ($user->is_admin()){
            $app->set_message("is_admin",true);
          }

         $article = new Article();
         $results = $article->get_article($id);
         $tags = $article->get_tags($id);

       }
       catch(Exception $e){
             $app->set_flash("error, ",$e->getMessage());
             $app->redirect_to('/home');
       }

       $app->set_message("title","Story");
       $app->set_message("story",$results);
       $app->set_message("tags",$tags);

       $app->render(LAYOUT,"edit_article");


  }
  else{

     $app->reset_route();
    }
});

get("/signin",function($app){
   $app->force_to_https("/signin");
   $app->set_message("title","Sign in");

   try{
     $user = new User();
     if($user->is_authenticated()){
        $app->set_message("error","You are already signed in.");
        $app->set_message("is_authenticated",true);
     }
   }
   catch(Exception $e){
       $app->set_message("error",$e->getMessage($e));
   }
   $app->render(LAYOUT,"signin");
});

get("/signup",function($app){
   $app->force_to_https("/signup");
    $is_authenticated=false;
    $is_db_empty=false;
    $is_admin = false;

    try{

       $user = new User();
       $is_authenticated = $user->is_authenticated();
       $is_admin = $user->is_admin();
       $is_db_empty = $user->is_db_empty();
    }
    catch(Exception $e){
       $app->set_flash("We have a problem with DB. The gerbils are working on it.");
       $app->redirect_to("/");
    }

    if($is_admin){
        //
        $app->set_message("authenticated",$is_authenticated);
        $app->set_message("is_admin",$is_admin);
    }
    else if(!$is_authenticated && $is_db_empty){
       $app->set_message("super_user",true);
       $app->set_message("error","You are the SUPER USER. This account cannot be deleted. You are the boss. The only way to clear the SUPER USER from the database is to DROP the entire table. Please sign in after you have finished signing up.");
    }
    else{
       $app->set_flash("You are not authorised to access this resource yet. I'm gonna tell your mum if you don't sign in.");
       $app->redirect_to("/signin");
    }
   $app->set_message("title","Sign up");
   $app->render(LAYOUT,"signup");
});


get("/signout",function($app){

   $app->force_to_https("/signout");

   try{
       $user = new User();

      if($user->is_authenticated()){
         $user->sign_out();
         $app->set_flash("You are now signed out.");
         $app->redirect_to("/");
      }
      else{
        $app->set_flash("You can't sign out if you are not signed in!");
        $app->redirect_to("/signin");
      }
   }
   catch(Exception $e){
     $app->set_flash("Something wrong with the sessions.");
     $app->redirect_to("/");
   }
});
get("/add_article",function($app){
  $app->force_to_https("/add_article");
  $app->set_message("title","Add News Article");

  try{
    $user = new User();
    if($user->is_authenticated()){
       $app->set_message("authenticated",true);

       $app->set_message("error","User ID is ".$user->get_user_id());
     }
     if ($user->is_admin()){
       $app->set_message("is_admin",true);
     }
     $article = new Article();
     $results = $article->get_articles();
     $app->set_message("articles",$results);


  }
  catch(Exception $e){
        $app->set_message("error, ",$e->getMessage());
  }

  $app->render(LAYOUT,"add_article");
});

get("/change",function($app){
  $user = new User();
  if($user->is_authenticated()){
     $app->set_message("authenticated",true);
   }
   if($user->is_admin()){
     $app->set_message("is_admin",true);
   }
   $app->force_to_https("/change");
   $app->set_message("title","Change password");
   $app->render(LAYOUT,"change_password");
});


post("/signup",function($app){

    try{
        $user = new User();
        if($user->is_admin() || $user->is_db_empty()){
          $name = $app->form('name');
          $fname = $app->form('firstname');
          $lname = $app->form('lastname');
          $pw = $app->form('password');
          $confirm = $app->form('password-confirm');
          $admin = $app->form('admin');


          if($name && $pw && $fname && $lname && $confirm){
              try{
                $user->sign_up($name,$fname,$lname,$pw,$confirm);
                if($admin){
                  $user->set_privilege($name);
                }
                $app->set_flash(htmlspecialchars($app->form('name'))." is now signed up ");
                $app->redirect_to("/");
             }
             catch(Exception $e){
                  $app->set_flash($e->getMessage());
                  $app->redirect_to("/");
             }
          }
          else{
             $app->set_flash("You are not signed up. Try again and don't leave any fields blank.");
             $app->redirect_to("/signup");
          }

        }
        else{
           $app->set_flash("You are not authorised to access this resource");
           $app->redirect_to("/");
        }

    }
    catch(Exception $e){
         $app->set_flash($e.getMessage());
         $app->redirect_to("/");
    }
});

post("/signin",function($app){
  $name = $app->form('name');
  $password = $app->form('password');
  if($name && $password){

    try{
       $user = new User();
       $user->sign_in($name,$password);
    }
    catch(Exception $e){
      $app->set_flash("Could not sign you in. Try again. {$e->getMessage()}");
      $app->redirect_to("/signin");
    }
  }
  else{
       $app->set_flash("Something wrong with name or password. Try again.");
       $app->redirect_to("/signin");
  }
  $app->set_flash("Congratulations, you are now signed in!");
  $app->redirect_to("/");
});

delete("/members/:id",function($app){
  $id = $app->route_var('id');
  if(is_numeric($id)){
      $name = "UNKNOWN";

      try{
          $user = new User();
          $name = $user->get_user_name($id);
          $user->delete_user($id);
      }
      catch(Exception $e){
           $app->set_flash("Could not delete record. {$e->getMessage()}");
           $app->redirect_to("/members");

      }
      $app->set_flash("{$name} was deleted.");
      $app->redirect_to("/members");
  }
  else{
     $app->reset_route();
  }
});
post("/add_article",function($app){
  $headline = $app->form('headline');
  $data = $app->form('data');
  $tags = $app->checkboxes('tags');

  if($headline && $data){
    try{
       $user = new User();
       $created_by = $user->get_user_id();
    }
    catch(Exception $e){
      $app->set_flash("Could not get current user {$e->getMessage()}");
      $app->redirect_to("/add_article");
    }

    try{
       $article = new Article();
       $article->add_article($headline,$data,$created_by,$tags);

       foreach($tags as $k=>$d){
         error_log("key {$k}, data {$d}");

       }
       //
    }
    catch(Exception $e){
      $app->set_flash("Error adding article. {$e->getMessage()}");
      $app->redirect_to("/add_article");
    }
  }
  else{
       $app->set_flash("Something wrong with headline or data. Try again.");
       $app->redirect_to("/add_article");
  }
  $app->set_flash("Success! Article has been added");
  $app->redirect_to("/");
});
post("/edit_article",function($app){
  $headline = $app->form('headline');
  $data = $app->form('data');
  $tags = $app->checkboxes('tags');

  if($data && $tags ){
    try{
       $user = new User();
       $created_by = $user->get_user_id();
    }
    catch(Exception $e){
      $app->set_flash("Could not get current user {$e->getMessage()}");
      $app->redirect_to("/add_article");
    }

    try{
       $article = new Article();
       $art_id = $article->get_article_id($headline);
       error_log("article ID is {$art_id['article_id']}");
       $article->edit_article($headline,$data,$created_by,$tags,$art_id['article_id']);

       foreach($tags as $k=>$d){
         error_log("key {$k}, data {$d}");

       }
       //
    }
    catch(Exception $e){
      $app->set_flash("Error editing article. {$e->getMessage()}");
      $app->redirect_to("/my_articles");
    }
  }
  else{
       $app->set_flash("Something wrong with headline or data. Try again.");
       $app->redirect_to("/add_article");
  }
  $app->set_flash("Success! Article has been edited");
  $app->redirect_to("/");
});

post("/change",function($app){
  $oldpw = $app->form("old-password");
  $newpw = $app->form("password");
  $pw_confirm = $app->form("password-confirm");

  if($oldpw && $newpw && $pw_confirm){
    try{
       $user = new User();
       $id = $user->get_user_id();
       error_log("This current user is {$id}");
       $user->change_password($id, $oldpw, $newpw, $pw_confirm);
    }
    catch(Exception $e){
      $app->set_flash("Try again! {$e->getMessage()}");
      $app->redirect_to("/change");
    }
  } else{
           $app->set_flash("Please complete all fields.");
           $app->redirect_to("/change");
      }
      $app->set_flash("Congratulations, you are now signed in!");
      $app->redirect_to("/");


});

delete("/story/:id",function($app){
  $id = $app->route_var('id');
  if(is_numeric($id)){


      try{
        $article = new Article();

          $article->delete_article($id);
      }
      catch(Exception $e){
           $app->set_flash("Could not delete record. {$e->getMessage()}");
           $app->redirect_to("/");

      }
      $app->set_flash("Article was deleted.");
      $app->redirect_to("/my_articles");
  }
  else{
     $app->reset_route();
  }
});


resolve();
