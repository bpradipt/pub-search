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

require_once('../vendor/autoload.php');

$obj_schema = new Demo\PubSchema();
$obj_index = new \Search\Index('pubs');

// Clear out old data
$obj_response = $obj_index->search((new \Search\Query())->limit(200));
$arr_ids = [];
foreach($obj_response->results as $obj_result) {
    $arr_ids[] = $obj_result->doc->getId();
}
echo "Deleting " . count($arr_ids) . "<br />";
$obj_index->delete($arr_ids);



// Load and process file
$filelist = array('gs://catalog-pkb/products.1.json', 'gs://catalog-pkb/products.2.json',
              'gs://catalog-pkb/products.3.json', 'gs://catalog-pkb/products.4.json',
	      'gs://catalog-pkb/products.5.json', 'gs://catalog-pkb/products.6.json');

foreach ($filelist as $file) {

    	echo "Inserting data from " . $file . "<br/>";
	$arr_pubs = json_decode(file_get_contents($file),true);
	$arr_pub_docs = [];
	$obj_tkzr = new \Search\Tokenizer();
	foreach($arr_pubs as $arr_pub) {

    		// Prepare doc
	    	$arr_pub_docs[] = $obj_schema->createDocument([
        		'id' => $arr_pub['id'],
	        	'name' => $arr_pub['name'],
	        	'name_ngram' => $obj_tkzr->edgeNGram($arr_pub['name']),
		        'type' => $arr_pub['type'],
		        'price' => $arr_pub['price'],
		        'upc' => $arr_pub['upc'],
		        'shipping' => $arr_pub['shipping'],
		        'description' => $arr_pub['description'],
		        'manufacturer' => $arr_pub['manufacturer'],
		        'model' => $arr_pub['model'],
		        'url' => $arr_pub['url'],
		        'image' => $arr_pub['image']
		    ]);

	    	// Insert batch
		if(count($arr_pub_docs) >= 100) {
        		echo "Inserting batch of " . count($arr_pub_docs) . "<br/>";
		        $obj_index->put($arr_pub_docs);
		        $arr_pub_docs = [];
    		}
	}
	// Insert last batch
	if(count($arr_pub_docs) >= 1) {
	    echo "Inserting batch of " . count($arr_pub_docs) . "<br/>";
	    $obj_index->put($arr_pub_docs);
	    $arr_pub_docs = [];
	}
	unset($arr_pubs);
}


