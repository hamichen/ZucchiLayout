<?php
/**
 * ZucchiLayout (http://zucchi.co.uk)
 *
 * @link      http://github.com/zucchi/ZucchiLayout for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zucchi Limited. (http://zucchi.co.uk)
 * @license   http://zucchi.co.uk/legals/bsd-license New BSD License
 */
namespace ZucchiLayout\Entity;

use ZucchiDoctrine\Entity\AbstractEntity;
use ZucchiDoctrine\Entity\ChangeTrackingTrait;
use ZucchiDoctrine\Behavior\Timestampable\TimestampableTrait;

use Zucchi\Debug\Debug;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use Zend\Form\Annotation AS Form;

/**
 * 
 * @author Matt Cockayne <matt@zucchi.co.uk>
 * @package ZucchiLayout
 * @subpackage Entity

 * @ORM\Entity
 * @ORM\Table(name="zucchi_layout_schedules")
 * @ORM\HasLifecycleCallbacks
 * @Form\Name("layout_schedules")
 * @Form\Hydrator("\Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Options({
 *     "bootstrap": {
 *         "buttons" : {
 *              "tableHead" : {
 *                  "add" : {
 *                      "class" : "btn btn-success",
 *                      "onClick": "$('#Schedule-table').append($('#Schedule-template').data('template').replace(/__index__/g, $('#Schedule-table tbody tr').length)); return false;",
 *                  },
 *              },
 *              "tableRow" : {
 *                  "Delete" : {
 *                      "class": "btn btn-danger",
 *                      "onClick": "if (confirm('Are you sure?')) {$(this).parent('td').parent('tr').remove();} return false;"
 *                  }
 *              }
 *         }
 *     }
 * })
 */
class Schedule extends AbstractEntity
{
    /**
     * users unique id
     * 
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Form\Required(false)
     * @Form\Attributes({"type":"hidden"})
     * @Form\Filter({"name": "Zucchi\Filter\Cast\Integer"})
     */
    public $id;

    /**
     * Layout this schedule entry is associated with
     *
     * @var array
     * @ORM\ManyToOne(targetEntity="ZucchiLayout\Entity\Layout")
     * @ORM\JoinColumn(name="Layout_id", referencedColumnName="id", onDelete="CASCADE")
     * @Form\Exclude
     * @Form\Required(false)
     * @Form\Attributes({"type":"hidden", "name":"Layout"})
     * @Form\Filter({"name": "Zucchi\Filter\Cast\Integer"})
     */
    public $Layout;

    /**
     * When layout is to be displayed from
     *
     * @var Datetime
     * @ORM\Column(type="datetime")
     * @Form\Required(true)
     * @Form\Attributes({"type":"datetime"})
     * @Form\Options({
     *     "label":"From",
     * })
     */
    public $displayFrom;

    /**
     * when layout is to STOP being displayed
     *
     * @var Datetime
     * @ORM\Column(type="datetime")
     * @Form\Required(true)
     * @Form\Attributes({"type":"datetime"})
     * @Form\Options({
     *     "label":"Till",
     * })
     */
    public $displayTill;

}