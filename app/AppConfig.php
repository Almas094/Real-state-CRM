<?php

class AppConfig
{
	// const PROJECT_PUBLIC_DIR = "/var/www/crm-app/public";
    // const BASE_HTTP = "https://app.abstractcrm.com";

	const PROJECT_PUBLIC_DIR = "/var/www/crm-app/public";
    const BASE_HTTP = "http://127.0.0.1:8000";

	const LOGO_UPLOAD_DIR_INTERNAL = AppConfig::PROJECT_PUBLIC_DIR . "/attachments/logos";
	const LOGO_HTTP_PATH = AppConfig::BASE_HTTP . '/attachments/logos/';
	
	const PROFILE_UPLOAD_DIR_INTERNAL = AppConfig::PROJECT_PUBLIC_DIR . "/attachments/profile";
	const PROFILE_HTTP_PATH = AppConfig::BASE_HTTP . '/attachments/profile/';

}

?>
