<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Routing\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
      /*
      Sample of what LinkedIn returns
      ---------------------
      User {#149 ▼
        +token: "AQUmcn8FTAYmj_-IkAPzcqCxhZRNR-woIX9-fH4JEvCzb7xICTy2uY3JXXiq1co8MFUxxiBsk3IJIeE2kTlH5mP6fRtBnQConCaX2F2BB6fOtbswLmcSio8M1lEo67Nrt7yXbjJueAlz4wPt4T5knXZjV95uPcP0q2XEQG5Jw0zRUhNLcKY"
        +id: "nZmvBPf-nh"
        +nickname: null
        +name: "Ben Allfree"
        +email: "ben@benallfree.com"
        +avatar: "https://media.licdn.com/mpr/mprx/0_NFyu8TZPvM4g9_tqnbS18GglvUyPN_tqn5e18GxTEZe_wF5N43u8aCI7U1puckP4vXYt75Tc0GEr"
        +"user": array:11 [▼
          "emailAddress" => "ben@benallfree.com"
          "firstName" => "Ben"
          "formattedName" => "Ben Allfree"
          "headline" => "I turn ideas into working software."
          "id" => "nZmvBPf-nh"
          "industry" => "Computer Software"
          "lastName" => "Allfree"
          "location" => array:2 [▼
            "country" => array:1 [▼
              "code" => "us"
            ]
            "name" => "Reno, Nevada Area"
          ]
          "pictureUrl" => "https://media.licdn.com/mpr/mprx/0_NFyu8TZPvM4g9_tqnbS18GglvUyPN_tqn5e18GxTEZe_wF5N43u8aCI7U1puckP4vXYt75Tc0GEr"
          "pictureUrls" => array:2 [▼
            "_total" => 1
            "values" => array:1 [▼
              0 => "https://media.licdn.com/mpr/mprx/0_Y7yIKlXzoK8T6SZtx7PLnrvBolli3aZtxmGQnKEMXzr86fopjxjFqnbjkJ-"
            ]
          ]
          "publicProfileUrl" => "https://www.linkedin.com/in/benallfree"
        ]
        +"avatar_original": "https://media.licdn.com/mpr/mprx/0_Y7yIKlXzoK8T6SZtx7PLnrvBolli3aZtxmGQnKEMXzr86fopjxjFqnbjkJ-"
      }      
      */
      $data = Socialite::driver('linkedin')->user();
      $user = User::whereLinkedinId($data->id)->first();
      if(!$user)
      {
        $user = new User();
        $user->linkedin_id = $data->id;
      }
      $user->email = $data->email;
      $user->firstname = $data->user['firstName'];
      $user->lastname = $data->user['lastName'];
      $user->country = $data->user['location']['country']['code'];
      $user->location = $data->user['location']['name'];
      $user->tagline = $data->user['headline'];
      $user->avatar_url = $data->avatar_original;
      $user->save();
      return redirect()->route('home')->with('success', "Welcome back, {$user->firstname}");
    }
}