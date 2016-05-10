<?php

namespace Fxweb\Http\Controllers;

use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use League\OAuth1\Client\Server\User;
//class Twitter extends Controller

    class Twitter extends League\OAuth1\Client\Server\Server {

        /**
         * The response type for data returned from API calls.
         *
         * @var string
         */
        protected $responseType = 'json';

        /**
         * Get the URL for retrieving temporary credentials.
         *
         * @return string
         */
        public function urlTemporaryCredentials()
        {
            return 'https://api.myprovider.com/oauth/temporary_credentials';
        }

        /**
         * Get the URL for redirecting the resource owner to authorize the client.
         *
         * @return string
         */
        public function urlAuthorization()
        {
            return 'https://api.twitter.com/oauth2/token';
        }

        /**
         * Get the URL retrieving token credentials.
         *
         * @return string
         */
        public function urlTokenCredentials()
        {
            return 'https://api.myprovider.com/oauth/token_credentials';
        }

        /**
         * Get the URL for retrieving user details.
         *
         * @return string
         */
        public function urlUserDetails()
        {
            return 'https://api.myprovider/1.0/user.json';
        }

        /**
         * Take the decoded data from the user details URL and convert
         * it to a User object.
         *
         * @param  mixed  $data
         * @param  TokenCredentials  $tokenCredentials
         * @return User
         */
        public function userDetails($data, TokenCredentials $tokenCredentials)
        {
            $user = new User;

            // Take the decoded data (determined by $this->responseType)
            // and fill out the user object by abstracting out the API
            // properties (this keeps our user object simple and adds
            // a layer of protection in-case the API response changes)

            $user->first_name = $data['user']['firstname'];
            $user->last_name  = $data['user']['lastname'];
            $user->email      = $data['emails']['primary'];
            // Etc..

            return $user;
        }

        /**
         * Take the decoded data from the user details URL and extract
         * the user's UID.
         *
         * @param  mixed  $data
         * @param  TokenCredentials  $tokenCredentials
         * @return string|int
         */
        public function userUid($data, TokenCredentials $tokenCredentials)
        {
            return $data['unique_id'];
        }

        /**
         * Take the decoded data from the user details URL and extract
         * the user's email.
         *
         * @param  mixed  $data
         * @param  TokenCredentials  $tokenCredentials
         * @return string
         */
        public function userEmail($data, TokenCredentials $tokenCredentials)
        {
            // Optional
            if (isset($data['email']))
            {
                return $data['email'];
            }
        }

        /**
         * Take the decoded data from the user details URL and extract
         * the user's screen name.
         *
         * @param  mixed  $data
         * @param  TokenCredentials  $tokenCredentials
         * @return User
         */
        public function userScreenName($data, TokenCredentials $tokenCredentials)
        {
            // Optional
            if (isset($data['screen_name']))
            {
                return $data['screen_name'];
            }
        }
    }