<?php

/**
 * Part of the Sentinel Social package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel Social
 * @version    2.0.4
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Sentinel\Addons\Social\RequestProviders;

class NativeRequestProvider implements RequestProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOAuth1TemporaryCredentialsIdentifier()
    {
        return isset($_GET['oauth_token']) ? $_GET['oauth_token'] : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOAuth1Verifier()
    {
        return isset($_GET['oauth_verifier']) ? $_GET['oauth_verifier'] : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOAuth2Code()
    {
        return isset($_GET['code']) ? $_GET['code'] : null;
    }
}
