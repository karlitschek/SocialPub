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

namespace SocialPub;

/**
  * AS2Activity
  *
  * Class to construct an Activity
  * @author Frank Karlitschek <frank@karlitschek.de>
  */
class AS2Activity {

    protected $data = array();

    /**
     * Constructor
     *
     * @param string $type The type of the activity
     * @param string $context Optional context
     */
    function __construct($type,$context = 'http://www.w3.org/ns/activitystreams'){
        $this->data['@context'] = $context;
        $this->data['type'] = $type;
    }

    /**
     * setValue
     *
     * Set a value in the Activity
     * @param string $key The key.
     * @param string/object $value The value.
     */
    public function setValue($key,$value){
        if(is_object($value)) {
            $this->data[$key] = $value->get();
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * setActor
     *
     * Set an actor in the Activity
     * @param string/object $actor The actor.
     */
    public function setActor($actor){
        if(is_object($actor)) {
            $this->data['actor'] = $actor->get();
        } else {
            $this->data['actor'] = $actor;
        }
    }

    /**
     * setObject
     *
     * Set an object in the Activity
     * @param string/object $object The object.
     */
    public function setObject($object){
        if(is_object($object)) {
            $this->data['object'] = $object->get();
        } else {
            $this->data['object'] = $object;
        }
    }

    /**
     * setTarget
     *
     * Set an target in the Activity
     * @param string/object $target The target.
     */
    public function setTarget($target){
        if(is_object($target)) {
            $this->data['target'] = $target->get();
        } else {
            $this->data['target'] = $target;
        }
    }

    /**
     * Get
     *
     * @return array The activities as array.
     */
    public function get(){
        return($this->data);
    }


}
