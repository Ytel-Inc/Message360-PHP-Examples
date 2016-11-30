<?php
    /*
     * Copyright 2016 Ytel Inc.
     *
     * Licensed under the Apache License, Version 2.0 (the "License");
     * you may not use this file except in compliance with the License.
     * You may obtain a copy of the License at
     *
     *     http://www.apache.org/licenses/LICENSE-2.0
     *
     * Unless required by applicable law or agreed to in writing, software
     * distributed under the License is distributed on an "AS IS" BASIS,
     * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     * See the License for the specific language governing permissions and
     * limitations under the License.
     */

    include_once __DIR__.'/../vendor/autoload.php';

    /* ********************************************** *
      We're going to use the SMS Api to send an sms.
     * ********************************************** */

    /**
     * Visit https://portal.message360.com to obtain your acccount sid and token
     */
    $accountSid = '';
    $accountToken = '';

    /**
     * Initialization
     */
    $Message360 = new \Message360Lib\Message360Client($accountSid, $accountToken);


    /**
     * Prepare the send SMS function
     */
    $m360SMS = $Message360->getSMS();


    // From SMS Number, you need to buy a "SMS Enabled" number from https://portal.message360.com/docs/v2/numbers/buyphonenumber
    $collect['fromcountrycode'] = 1;
    $collect['from'] = '';

    // Receiver SMS Number
    $collect['tocountrycode'] = 1;
    $collect['to'] = '';

    // Your message
    $collect['body'] = 'Message 360 Hello World!!';


    // Send SMS
    /**
     * Unirest\Request::verifyPeer(false);
     */
    $result = $m360SMS->createSendSMS($collect);

    print_r($result);