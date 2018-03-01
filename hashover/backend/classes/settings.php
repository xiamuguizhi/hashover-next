<?php namespace HashOver;

// Copyright (C) 2010-2018 Jacob Barkdull
// This file is part of HashOver.
//
// HashOver is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// HashOver is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with HashOver.  If not, see <http://www.gnu.org/licenses/>.
//
//--------------------
//
// IMPORTANT NOTICE:
//
// Do not edit this file unless you know what you are doing. Instead,
// please use the HashOver administration panel to graphically adjust
// the settings, or create/edit the settings JSON file.


// Default and advanced HashOver settings
class Settings extends Secrets
{
	// Primary settings
	public $language		= 'auto';			// UI language, for example 'en', 'de', etc. 'auto' to use system locale
	public $theme			= 'default';			// Comment Cascading Style Sheet (CSS)
	public $usesModeration		= false;			// Whether comments must be approved before they appear to other visitors
	public $pendsUserEdits		= false;			// Whether comments need to be approved again when edited
	public $dataFormat		= 'xml';			// Format comments will be stored in; options: xml, json, sql
	public $defaultName		= 'Anonymous';			// Default name to use when one isn't given
	public $allowsImages		= true;				// Whether external image URLs wrapped in [img] tags are embedded
	public $allowsLogin		= true;				// Whether users can login and logout (when false form cookies are still set)
	public $allowsLikes		= true;				// Whether a "Like" link is displayed
	public $allowsDislikes		= false;			// Whether a "Dislike" link is displayed; allowing Reddit-style voting
	public $usesAjax		= true;				// Whether AJAX is used for posting, editing, and loading comments
	public $collapsesInterface	= false;			// Whether the comment form, thread, and end links are all initially hidden
	public $collapsesComments	= true;				// Whether to hide comments and display a link to show them
	public $collapseLimit		= 3;				// Number of comments that aren't hidden
	public $replyMode		= 'thread';			// Whether to display replies as a 'thread' or as a 'stream'
	public $streamDepth		= 3;				// In stream mode, the number of reply indentions to allow before the thread flattens
	public $popularityThreshold	= 5;				// Minimum likes a comment needs to be popular
	public $popularityLimit		= 2;				// Number of comments allowed to become popular
	public $usesMarkdown		= true;				// Whether comments will be parsed for Markdown

	// Date and Time settings
	public $serverTimezone		= 'America/Los_Angeles';	// Server timezone
	public $usesUserTimezone	= true;				// Whether comment dates should use the user's timezone (JavaScript-mode)
	public $usesShortDates		= true;				// Whether comment dates are shortened, for example "X days ago"
	public $timeFormat		= 'g:ia';			// Time format, use 'H:i' for 24-hour format (see: http://php.net/manual/en/function.date.php)
	public $dateFormat		= 'm/d/Y';			// Date format (see: http://php.net/manual/en/function.date.php)

	// Field options, use true/false to enable/disable a field,
	// use 'required' to require a field be properly filled
	public $fieldOptions = array (
		'name'     => true,
		'password' => true,
		'email'    => true,
		'website'  => true
	);

	// Behavior settings
	public $displaysTitle		= true;				// Whether page title is shown or not
	public $formPosition		= 'top';			// Position for primary form; options: 'top' or 'bottom'
	public $usesAutoLogin		= true;				// Whether a user's first comment automatically logs them in
	public $showsReplyCount		= true;				// Whether to show reply count separately from total
	public $countIncludesDeleted	= true;				// Whether comment counts should include deleted comments
	public $iconMode		= 'image';			// How to display avatar icons (either 'image', 'count' or 'none')
	public $iconSize		= 45;				// Size of Gravatar icons in pixels
	public $imageFormat		= 'png';			// Format for icons and other images (use 'svg' for HDPI)
	public $usesLabels		= false;			// Whether to display labels above inputs
	public $usesCancelButtons	= true;				// Whether forms have "Cancel" buttons
	public $appendsCss		= true;				// Whether to automatically add a CSS <link> element to the page <head>
	public $appendsRss		= true;				// Whether a comment RSS feed link is displayed

	// Technical settings
	public $loginMethod		= 'defaultLogin';		// Login method class for handling user login information
	public $setsCookies		= true;				// Whether cookies are enabled
	public $secureCookies		= false;			// Whether cookies set over secure HTTPS will only be transmitted over HTTPS
	public $storesIpAddress		= false;			// Whether to store users' IP addresses
	public $allowsUserReplies	= false;			// Whether given e-mails are sent as reply-to address to users
	public $noreplyEmail		= 'noreply@example.com';	// E-mail used when no e-mail is given
	public $spamDatabase		= 'remote';			// Whether to use a remote or local spam database
	public $spamCheckModes		= 'php';			// Perform IP spam check in 'json' or 'php' mode, or 'both'
	public $gravatarDefault		= 'custom';			// Gravatar theme to use ('custom', 'identicon', 'monsterid', 'wavatar', or 'retro')
	public $gravatarForce		= false;			// Whether to force the themed Gravatar images instead of an avatar image
	public $minifiesJavascript	= false;			// Whether JavaScript output should be minified
	public $minifyLevel		= 4;				// How much to minify JavaScript code, options: 1, 2, 3, 4
	public $enabledApi		= array ('all');		// An array of enabled API. 'all' = fully-enabled, empty array = fully disabled
	public $latestMax		= 10;				// Maximum number of comments to save as latest comments
	public $latestTrimWidth		= 100;				// Number of characters to trim latest comments to, 0 for no trim
	public $userDeletionsUnlink	= false;			// Whether user deleted files are actually unlinked from the filesystem

	// Types of images allowed to be embedded in comments
	public $imageTypes = array (
		'jpeg',
		'jpg',
		'png',
		'gif'
	);

	// External domains allowed to remotely load HashOver scripts
	public $allowedDomains = array (
		'127.0.0.1:8000'
		// '*.example.com',
		// '*.example.org',
		// '*.example.net'
	);

	// General database options
	public $databaseType		= 'sqlite';			// Type of database, sqlite or mysql
	public $databaseName		= 'hashover-threads';		// Database name

	// SQL database options
	public $databaseHost		= 'localhost';			// Database host name
	public $databaseUser		= 'root';			// Database login user
	public $databasePassword	= 'password';			// Database login password
	public $databaseCharset		= 'utf8';			// Database character set

	// Automated settings
	public $isMobile		= false;

	// Technical settings placeholders
	public $rootDirectory;
	public $httpRoot;
	public $httpBackend;
	public $httpImages;
	public $cookieExpiration;
	public $domain;

	public function __construct ()
	{
		// Theme path
		$this->themePath = 'themes/' . $this->theme;

		// Set server timezone
		date_default_timezone_set ($this->serverTimezone);

		// Set encoding
		mb_internal_encoding ('UTF-8');

		// Get parent directory
		$root_directory = dirname (dirname (__DIR__));

		// Get HTTP parent directory
		$document_root = realpath ($_SERVER['DOCUMENT_ROOT']);
		$http_directory = mb_substr ($root_directory, mb_strlen ($document_root));

		// Replace backslashes with forward slashes on Windows
		if (DIRECTORY_SEPARATOR === '\\') {
			$http_directory = str_replace ('\\', '/', $http_directory);
		}

		// Determine HTTP or HTTPS
		$protocol = ($this->isHTTPS () ? 'https' : 'http') . '://';

		// Technical settings
		$this->rootDirectory	= $root_directory;		// Root directory for script
		$this->httpRoot		= $http_directory;		// Root directory for HTTP
		$this->httpBackend	= $http_directory . '/backend';	// Backend directory for HTTP
		$this->httpImages	= $http_directory . '/images';	// Image directory for HTTP
		$this->cookieExpiration	= time () + 60 * 60 * 24 * 30;	// Cookie expiration date
		$this->domain		= $_SERVER['HTTP_HOST'];	// Domain name for refer checking & notifications
		$this->absolutePath	= $protocol . $this->domain;	// Absolute path or remote access

		// Load JSON settings
		$this->jsonSettings ();

		// Synchronize settings
		$this->syncSettings ();
	}

	function isHTTPS ()
	{
		// The connection is HTTPS if server says so
		if (!empty ($_SERVER['HTTPS']) and $_SERVER['HTTPS'] !== 'off') {
			return true;
		}

		// Assume the connection is HTTPS on standard SSL port
		if ($_SERVER['SERVER_PORT'] == 443) {
			return true;
		}

		return false;
	}

	// Returns a server-side absolute file path
	public function getAbsolutePath ($file)
	{
		return realpath ($this->rootDirectory . '/' . trim ($file, '/'));
	}

	// Returns a client-side path for a file within the HashOver root
	public function getHttpPath ($file)
	{
		return $this->httpRoot . '/' . trim ($file, '/');
	}

	// Returns a client-side path for a file within the backend directory
	public function getBackendPath ($file)
	{
		return $this->httpBackend . '/' . trim ($file, '/');
	}

	// Returns a client-side path for a file within the images directory
	public function getImagePath ($filename)
	{
		$path  = $this->httpImages . '/' . trim ($filename, '/');
		$path .= '.' . $this->imageFormat;

		return $path;
	}

	// Returns a client-side path for a file within the configured theme
	public function getThemePath ($file, $http = true)
	{
		// Path to the requested file in the configured theme
		$theme_file = $this->themePath . '/' . $file;

		// Use the same file from the default theme if it doesn't exist
		if (!file_exists ($this->getAbsolutePath ($theme_file))) {
			$theme_file = 'themes/default/' . $file;
		}

		// Convert the theme file path for HTTP use if told to
		if ($http !== false) {
			$theme_file = $this->getHttpPath ($theme_file);
		}

		return $theme_file;
	}

	public function jsonSettings ()
	{
		// JSON settings file path
		$path = $this->getAbsolutePath ('config/settings.json');

		// Do nothing if the JSON settings file doesn't exist
		if (!file_exists ($path)) {
			return;
		}

		// Get JSON data
		$data = @file_get_contents ($path);

		// Load and decode JSON settings file
		$json_settings = @json_decode ($data, true);

		// Return void on failure
		if ($json_settings === null) {
			return;
		}

		// Loop through each setting
		foreach ($json_settings as $key => $value) {
			// Convert setting name to camelCase
			$title_case_key = ucwords (str_replace ('-', ' ', strtolower ($key)));
			$setting = lcfirst (str_replace (' ', '', $title_case_key));

			// Check if the JSON setting property exists in the defaults
			if (property_exists ($this, $setting)) {
				// Check if the JSON value is the same type as the default
				if (gettype ($value) === gettype ($this->{$setting})) {
					// Override default setting
					$this->{$setting} = $value;
				}
			}
		}
	}

	// Synchronizes specific settings after remote changes
	public function syncSettings ()
	{
		// Theme path
		$this->themePath = 'themes/' . $this->theme;

		// Disable likes and dislikes if cookies are disabled
		if ($this->setsCookies === false) {
			$this->allowsLikes = false;
			$this->allowsDislikes = false;
		}

		// Setup default field options
		foreach (array ('name', 'password', 'email', 'website') as $field) {
			if (!isset ($this->fieldOptions[$field])) {
				$this->fieldOptions[$field] = true;
			}
		}

		// Disable password if name is disabled
		if ($this->fieldOptions['name'] === false) {
			$this->fieldOptions['password'] = false;
		}

		// Disable login if name or password is disabled
		if ($this->fieldOptions['name'] === false
		    or $this->fieldOptions['password'] === false)
		{
			$this->allowsLogin = false;
		}

		// Disable autologin if login is disabled
		if ($this->allowsLogin === false) {
			$this->usesAutoLogin = false;
		}

		// Backend directory for HTTP
		$this->httpBackend = $this->httpRoot . '/backend';

		// Image directory for HTTP
		$this->httpImages = $this->httpRoot . '/images';
	}

	// Check if a given API format is enabled
	public function apiStatus ($api)
	{
		// Check if the given API is enabled
		if (is_array ($this->enabledApi)) {
			// Return enabled if all available APIs are enabled
			if (in_array ('all', $this->enabledApi)) {
				return 'enabled';
			}

			// Return enabled if the given API is enabled
			if (in_array ($api, $this->enabledApi)) {
				return 'enabled';
			}
		}

		// Otherwise, assume API is disabled by default
		return 'disabled';
	}
}
