<?php
/**
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @copyright Copyright (c) 2016 Frank Karlitschek
 * @license MIT
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


require('AS2Server/Preview.php');
require('AS2Server/Url.php');
require('AS2Server/NameMap.php');
require('AS2Server/Target.php');
require('AS2Server/Object.php');
require('AS2Server/Image.php');
require('AS2Server/Actor.php');
require('AS2Server/Activity.php');
require('AS2Server/Stream.php');



// This generates an Activity Stream Object
$stream = new SocialPub\AS2Stream();


// Simple activity
$activity = new SocialPub\AS2Activity('Create');
$activity->setActor('http://www.test.example/martin');
$activity->setObject('http://example.org/foo.jpg');
$stream -> addActivity($activity);


// More complext Activity
$activity = new SocialPub\AS2Activity('Add');
$activity->setValue('published',date('c'));

$actor = new SocialPub\AS2Actor('Person');
$actor->addValue('id','http://www.test.example/martin');
$actor->addValue('name','Martin Smith');
$actor->addValue('url','http://example.org/martin');

$image = new SocialPub\AS2Image('Link');
$image->addValue('href','http://example.org/martin/image.jpg');
$image->addValue('mediaType','image/jpeg');

$actor->addValue('image',$image);
$activity->setActor($actor);

$object = new SocialPub\AS2Object('Article');
$object->addValue('id','http://www.test.example/blog/abc123/xyz');
$object->addValue('url','http://example.org/blog/2011/02/entry');
$object->addValue('name','Why I love Activity Streams');
$activity->setObject($object);

$target = new SocialPub\AS2Target('OrderedCollection');
$target->addValue('id','http://example.org/blog/');
$target->addValue('name','Martin\'s Blog');
$activity->setTarget($target);

$stream -> addActivity($activity);


// Extended Activity
$activity = new SocialPub\AS2Activity('Add');
$activity->setValue('published',date('c'));
$activity->setValue('generator','http://example.org/activities-app');

$nameMap = new SocialPub\AS2NameMap();
$nameMap->addValue('en','Martin added a new image to his album.');
$nameMap->addValue('ga','Martin phost le fisean nua a albam.');
$activity->setValue('nameMap',$nameMap);

$actor = new SocialPub\AS2Actor('Person');
$actor->addValue('id','http://www.test.example/martin');
$actor->addValue('name','Martin Smith');
$actor->addValue('url','http://example.org/martin');

$image = new SocialPub\AS2Image('Link');
$image->addValue('href','http://example.org/martin/image.jpg');
$image->addValue('mediaType','image/jpeg');
$image->addValue('width',250);
$image->addValue('height',250);

$actor->addValue('image',$image);
$activity->setActor($actor);

$object = new SocialPub\AS2Object('Image');
$object->addValue('id','http://example.org/album/my_fluffy_cat');
$preview = new SocialPub\AS2Preview('Link');
$preview->addValue('href','http://example.org/album/my_fluffy_cat_thumb.jpg');
$preview->addValue('mediaType','image/jpeg');
$object->addValue('preview',$preview);

$url = new SocialPub\AS2Url('Link');
$url->addValue('href','http://example.org/album/my_fluffy_cat.jpg');
$url->addValue('mediaType','image/jpeg');
$object->addMultipleValue('url',$url);

$url = new SocialPub\AS2Url('Link');
$url->addValue('href','http://example.org/album/my_fluffy_cat.png');
$url->addValue('mediaType','image/png');
$object->addMultipleValue('url',$url);

$activity->setObject($object);

$target = new SocialPub\AS2Target('Collection');
$target->addValue('id','http://example.org/album/');

$nameMap = new SocialPub\AS2NameMap();
$nameMap->addValue('en','Martin\'s Photo Album');
$nameMap->addValue('ga','Grianghraif Mairtin');
$target->addValue('nameMap',$nameMap);

$image = new SocialPub\AS2Image('Link');
$image->addValue('href','http://example.org/album/thumbnail.jpg');
$image->addValue('mediaType','image/jpeg');
$target->addValue('image',$image);

$activity->setTarget($target);


$stream -> addActivity($activity);


header("HTTP/1.0 200 OK");
header('Content-Type: application/json');
echo $stream -> get();
