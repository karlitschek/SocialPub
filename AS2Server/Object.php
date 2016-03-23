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
  * AS2Object
  *
  * Class to construct an Object as part of an Activity
  * @author Frank Karlitschek <frank@karlitschek.de>
  */
class AS2Object {

    protected $data = array();

    /**
     * Constructor
     *
     * @param string $type The type of the Object
     */
    function __construct($type){
        $this->data['type'] = $type;
    }

    /**
     * addValue
     *
     * Add a value of the object
     * @param string $key The key.
     * @param string/object $value The value.
     */
    public function addValue($key,$value){
        if(is_object($value)) {
            $this->data[$key] = $value->get();
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * addMultipleValue
     *
     * Add a value in case multiple values are added
     * @param string $key The key.
     * @param string/object $value The value.
     */
    public function addMultipleValue($key,$value){
        if(is_object($value)) {
            $this->data[$key][] = $value->get();
        } else {
            $this->data[$key][] = $value;
        }
    }

    /**
     * Get
     *
     * @return array The Object as array.
     */
    public function get(){
        return($this->data);
    }


}
