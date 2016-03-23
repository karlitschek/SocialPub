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
  * AS2Stream
  *
  * Class to construct an Activity Stream out of several Activities
  * @author Frank Karlitschek <frank@karlitschek.de>
  */
class AS2Stream {

    protected $data = array();

    /**
     * Constructor
     */
    function __construct(){
    }

    /**
     * addActivity
     *
     * Add an Activity
     * @param string/object $activity The Activity
     */
    public function AddActivity($activity){
        if(is_object($activity)) {
            $this->data[] = $activity->get();
        } else {
            $this->data[] = $activity;
        }
    }

    /**
     * Get
     *
     * @return json The stream as json.
     */
    public function get(){
        return(json_encode($this->data,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }


}
