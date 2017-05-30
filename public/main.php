<?php
/**
 * Copyright 2015 Tom Walder
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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Autocomplete Demo using APP Engine Search API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/search.css">
</head>
<body>

<div class="container" id="main">

    <div class="row">
        <div class="col-md-12">
            <h1><img src="/img/google-app-engine-logo.png" id="gae-logo" /> Autocomplete Demo using App Engine Search </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h2>Product Search</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="well">
                <div class="input-group">
                    <form>
                        <input type="text" class="form-control" id="q" name="q" placeholder="Get typing..." autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="go">Go</button>
                        </span>
                    </form>
                </div>
            </div>
            <p><em>Auto-complete results <span id="ac_hint"></span></em></p>
            <div class="list-group" id="ac_results"></div>
        </div>
        <div class="col-md-8">
            <p><em><span id="fr_hint">Full search results</span></em></p>
            <div class="list-group" id="full_results"></div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/search.js"></script>
</body>
</html>

