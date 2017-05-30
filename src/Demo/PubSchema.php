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
namespace Demo;

/**
 * PubSchema
 */
class PubSchema extends \Search\Schema
{
    /**
     * Configure the schema on construction
     */
    public function __construct()
    {
        $this
            ->addText('id')
            ->addText('name')
            ->addText('name_ngram')
            ->addText('type')
            ->addText('price')
            ->addText('upc')
            ->addText('shipping')
            ->addText('description')
            ->addText('manufacturer')
            ->addText('model')
            ->addText('url')
            ->addText('image');
    }

}
