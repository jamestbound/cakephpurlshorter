<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->script('urlShorter') ?>
</head>
<body class="home">
    <header>
    </header>
    <div id="content">
        <div id="loading" class="displayOn">
              ....Loading....
        </div>
        <div id="urlQuery" class="displayOff">
            Long Url:<input type="text"> <button onclick="urlSubmit()">send</button>
        </div>
        <div id="urlResponseCorrect" class="displayOff">
            <div id="urlResponseCorrectShortUrl"></div>
            <button id="urlResponseCorrectToMain" onclick="containerShow('urlQuery')">
                Back the main page
            </button>
        </div>
        <div id="urlResponseAccessDenied" class="displayOff">
            <div >Access Denied</div>
            <button id="urlResponseAccessDeniedToMain" onclick="containerShow('urlQuery')">
                Back the main page
            </button>    
        </div>
        <div id="urlResponseUnknownError" class="displayOff">
            <div >Error</div>
            <button id="urlResponseUnknownErrorToMain" onclick="containerShow('urlQuery')">
                Back the main page
            </button>    
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
