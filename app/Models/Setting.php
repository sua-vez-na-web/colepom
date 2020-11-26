<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const ABOUT_TEXT = 'about_text';
    const PRIVACY_POLICY_TEXT = 'privacy_policy';
    const USE_TERMS_TEXT = 'use_terms';
    const SITE_PHONE_1 = 'site_phone_1';
    const SITE_PHONE_2 = 'site_phone_2';
    const SITE_EMAIL_1 = 'site_email_1';
    const SITE_EMAIL_2 = 'site_email_2';
    const SITE_ADDRESS_LINE_1 = 'site_address_line_1';
    const SITE_ADDRESS_LINE_2 = 'site_address_line_2';

}
